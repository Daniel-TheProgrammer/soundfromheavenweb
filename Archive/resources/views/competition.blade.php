<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Petit+Formal+Script&display=swap" rel="stylesheet">
    <link rel="icon" href="{{asset('images/favicon.jpg')}}" type="image/jpg"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@include('layouts.pagecsslinks')
    <!-- <title>Document</title> -->
    <style>
        .bgimage{
            background-image:url('./images/background.jpg');
            background-size: cover;
            height: 150%;
            width: 100%;
        }
    </style>
</head>
<body>
<div id="app">
    <div>
        <navigation></navigation>
    </div>
    <div class=" bgimage" >
        <div class="">
            <div class="">
                <div class="">
                    <div class=" " >
                        <competition></competition>
                    </div>
                    <div class=" mt_10">
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
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Petit+Formal+Script&display=swap" rel="stylesheet">
<link rel="icon" href="{{asset('images/favicon.jpg')}}" type="image/jpg"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
@include('layouts.pagecsslinks')
<style>
.bgimage{
    background-image:url('./images/background.jpg');
    background-size: cover;
    height: 150%;
    width: 100%;
}
    </style>
</head>
<body>
<div id="app">
    <div>
        <navigation></navigation>
    </div>
    <div class="col-md-12 bgimage" >
        <div class="row">
            <div class="container-fluid">
                <div class="row">
                    <div class=" col-md-12 mt-10 " >
                        <competition></competition>
                    </div>
                    <div class=" mt_10">
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
</html> -->

