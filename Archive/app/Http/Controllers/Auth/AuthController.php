<?php
namespace App\Http\Controllers\Auth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Kreait\Firebase\JWT\Error\IdTokenVerificationFailed;
use Kreait\Firebase\JWT\IdTokenVerifier;
use Hash;
use App\Models\IdentityCard;
use App\Models\AppLoginStatus;

class AuthController extends Controller
{
	public function getUser($user){
		return User::where('id',$user['id'])->with('identity','profileimage')->first();
	}
	
	public function changepasswordwithoutconfirmation(Request $request){
		$user = $request->user();
		$newpassword = Hash::make($request['password']);
		$user['password']=$newpassword;
		$user->update();
		$response = [
				'user'=>null,
				'token'=>null,
				'success' => true,
				'message' => ''
		];
		return response()->json($response);
	}
	
	public function verifytoken(Request $request){
		$response = [
				'user'=>null,
				'token'=>null,
				'success' => false,
				'message' => ''
		];
		//if ( $request->has('access_token') || $request->header('access_token') ) {
			$user = Auth::guard('api')->user();
			
			if($user!=null){
				$obj['userid']=$user['id'];
				AppLoginStatus::create($obj);
				$response['token'] = $user->createToken('Personal Access Token')->accessToken;
				$response['user']=$this->getUser($user);
				$response['success']=true;
			}
		//}
		return response()->json($response);
		
	}
	
	public function loginwithmobilepassword(Request $request){
		$response = [
				'user'=>null,
				'token'=>null,
				'success' => false,
				'message' => ''
		];
		if($request['mobileno']!=null && $request['password']!=null) {
			//get the uuid and phone no and other details
			$user = User::where('mobileno','like','%'.$request['mobileno'])->first();
			if($user!=null && Hash::check($request['password'], $user->password)){
				if($user['countrycode']==0 && $user['firebaseuuid']!=null){
					$user['countrycode']=str_replace($request['mobileno'],'',$user['mobileno']);
					$user['countrycode']=str_replace('+','',$user['countrycode']);
					$user->update();
				}
				$token = $user->createToken('Personal Access Token')->accessToken;
				$obj['userid']=$user['id'];
				AppLoginStatus::create($obj);
				$response = [
						'user'=>$this->getUser($user),
						'token'=>$token,
						'success' => true,
						'message' => ''
				];
			} else {
				$response['message']='Mobile Password Combination not correct';
			}
		}
		return response()->json($response);
	}
	
	public function loginwithfirebase(Request $request){
		$response = [
				'user'=>null,
				'token'=>null,
				'success' => false,
				'message' => ''
		];
		if($request['token']!=null) {
			//get the uuid and phone no and other details
			$projectId = env('FIREBASE_PROJECT_ID','edureporter-b58bf');
			
			$verifier = IdTokenVerifier::createWithProjectId($projectId);
			try {
				
				$token = $verifier->verifyIdToken($request['token']);
				$uuid=$token->payload()['user_id'];
				$mobile=$token->payload()['phone_number'];
				$user = User::where('firebaseuuid',$uuid)->first();
				if($user==null){
					$obj['firebaseuuid']=$uuid;
					$obj['mobileno']=$mobile;
					$obj['countrycode']=str_replace($request['mobileno'],'',$mobile);
					$obj['countrycode']=str_replace('+','',$obj['countrycode']);
					$user = User::create($obj);
				} else {
					if($user['countrycode']==0){
						$user['countrycode']=str_replace($request['mobileno'],'',$mobile);
						$user['countrycode']=str_replace('+','',$user['countrycode']);
						$user->update();
					}
				}
				$token = $user->createToken('Personal Access Token')->accessToken;
				$obj1['userid']=$user['id'];
				AppLoginStatus::create($obj1);
				$response = [
					'user'=>$this->getUser($user),
					'token'=>$token,
					'success' => true,
					'message' => ''
				];
			} catch (IdTokenVerificationFailed $e) {
				$response['message']=$e->getMessage();
			}
		}
		return response()->json($response);
	}
	
	public function loginwithfirebase1(Request $request){
		$response = [
				'user'=>null,
				'token'=>null,
				'success' => false,
				'message' => ''
		];
			//get the uuid and phone no and other details
			$projectId = env('FIREBASE_PROJECT_ID','edureporter-b58bf');
			
			$verifier = IdTokenVerifier::createWithProjectId($projectId);
			try {
				
				$user = User::where('id',2475)->first();
				if($user==null){
					$obj['firebaseuuid']=$uuid;
					$obj['mobileno']=$mobile;
					$user = User::create($obj);
				}
				$token = $user->createToken('Personal Access Token')->accessToken;
				$response = [
						'user'=>$this->getUser($user),
						'token'=>$token,
						'success' => true,
						'message' => ''
				];
			} catch (IdTokenVerificationFailed $e) {
				$response['message']=$e->getMessage();
			}
		return response()->json($response);
	}
	
	public function login(Request $request) {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            //'remember_me' => 'boolean'
        ]);
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }
    public function register(Request $request)
    {
        $request->validate([
            'fName' => 'required|string',
            'lName' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string'
        ]);
        $user = new User;
        $user->first_name = $request->fName;
        $user->last_name = $request->lName;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
  
    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
    
    public function profile(Request $request){
    	$user = Auth::user();
    	if($request['name']!=null && $request['name']!=''){
    		$user['name']=$request['name'];
    	}
    	if($request['age']!=null && $request['age']>0){
    		$user['age']=$request['age'];
    		$user['agedate']=Carbon::today()->format('Y-m-d');
    		
    	}
    	if($request['gender']!=null && $request['gender']>0){
    		$user['gender']=$request['gender'];
    	}
    	$user->update();
    	if($request['aadhar']!=null){
    		//1
    		$aadhar = IdentityCard::where('typeint',1)->where('userid',$user['id'])->first();
    		if($aadhar==null){
    			$aadhar['userid']=$user['id'];
    			$aadhar['value1']=$request['aadhar'];
    			$aadhar['typeint']=1;
    			IdentityCard::create($aadhar);
    		} else {
    			$aadhar['value1']=$request['aadhar'];
    			$aadhar->update();
    		}
    	}
    	if($request['pan']!=null){
    		//1
    		$aadhar = IdentityCard::where('typeint',2)->where('userid',$user['id'])->first();
    		if($aadhar==null){
    			$aadhar['userid']=$user['id'];
    			$aadhar['value1']=$request['pan'];
    			$aadhar['typeint']=2;
    			IdentityCard::create($aadhar);
    		} else {
    			$aadhar['value1']=$request['pan'];
    			$aadhar->update();
    		}
    	}
    	$response['token'] = $user->createToken('Personal Access Token')->accessToken;
    	$response['user']=$this->getUser($user);
    	$response['success']=true;
    	return response()->json($response);
    }
}