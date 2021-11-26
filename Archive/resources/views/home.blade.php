<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{asset('images/favicon.jpg')}}" type="image/jpg"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>Document</title> -->
@include('layouts.pagecsslinks')

</head>
<body>
<div id="app">
    <div>
        <navigation></navigation>
    </div>
    <div>
    <home></home><br><br>
    <sfooter></sfooter>
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
<script src="{{ url('assets/styles/bootstrap-4.3.1-dist/js/bootstrap.min.js') }}"></script> 
</body>
</html>
<!-- <!DOCTYPE html>
<html>
<head>
<link rel="icon" href="{{asset('images/favicon.jpg')}}" type="image/jpg"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
@include('layouts.pagecsslinks')
</head>
<body>
<div id="app">
    <div>
        <navigation></navigation>
    </div>
    <div class="" >
        <div class="row">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 mt-10">
                        <home></home>
                        <sfooter></sfooter>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
     
</div>
</div>
   
<script>
   var laravel = @json(['baseURL' => url('/')])
</script>   
<script src="{{ url('js/app.js') }}"></script>   
<script src="{{ url('assets/styles/bootstrap-4.3.1-dist/js/bootstrap.min.js') }}"></script>    

</body>
</html>
 -->
