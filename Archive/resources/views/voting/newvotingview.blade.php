<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="{{asset('images/favicon.jpg')}}" type="image/jpg"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
@include('layouts.pagecsslinks')
  <!-- <title>Document</title> -->
</head>
<body>
<div id="app">
  <navigation></navigation>
  <br>
  <div class="container-fluid">
  <new-voting></new-voting>
  </div>
  <sfooter></sfooter>
</div>

<script src="https://js.stripe.com/v3/"></script>
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

<!-- <!DOCTYPE html>
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
                <div class="container-fluid">
                    	<div class="row">
                    		
    								<voting></voting>
                    	</div>
                 </div>
        </div>
		<sfooter></sfooter>

</div>

<script src="https://js.stripe.com/v3/"></script>
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
 -->
