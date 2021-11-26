<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="{{asset('images/favicon.jpg')}}" type="image/jpg"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
@include('layouts.pagecsslinks')
</head>

<body class="bg-vo">
   
<div id="app">
   <navigation></navigation>
 <div class="" >
    		<div class="row">
                <div class="container-fluid">
                    	<div class="row">
                    		<div class="col-md-12 mt-10">
                    		
    								Thank you for the vote
                    		</div>
                    	</div>
                 </div>
            </div>
        </div>
</div>


<script>
   var laravel = @json(['baseURL' => url('/')])
</script>  
<script>
function openNav() {
    console.log('hello jaan')
  document.getElementById("mySidenav").style.width = "300px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script> 
<script src="{{ url('js/app.js') }}"></script>    
</body>
</html>

