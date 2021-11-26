<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class AmazonController extends Controller
{
	public function getpresignedurl(Request $request){
		//save the data
		//get the uuid from the request
		$s3 = \Storage::disk('s3');
		$client = $s3->getDriver()->getAdapter()->getClient();
		$expiry = "+30 minutes";
		
		$fileName = Uuid::uuid4();
		$fileType = $request['fileType'];
		//$fileType = '.jpg';
		if ($fileType != ".jpg" && $fileType != ".png" && $fileType != ".jpeg") {
			$obj['success']=false;
			$obj['message']="Image format invalid";
			return response()->json($obj);
		}
		$command = $client->getCommand('PutObject', [
				'Bucket' => \Config::get('filesystems.disks.s3.bucket'),
				'Key'    => $fileName . $fileType,
				'ContentType'=>"image/" . $fileType,
				'ACL'=> "public-read"
		]);
		$request = $client->createPresignedRequest($command, $expiry);
		$downloadUrl = "https://".env('AWS_BUCKET').".s3.amazonaws.com/".$fileName. $fileType;
		$result['uploadUrl']=(string)$request->getUri();
		//dd((string)$request->getUri());
		$result['downloadUrl']=$downloadUrl;
		$result['success']=true;
		$result['message']="";
		return response()->json($result);
	}
}
