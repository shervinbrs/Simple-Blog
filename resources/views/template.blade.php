<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{URL::asset('/css')}}/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="{{URL::asset('/storage')}}/favicon.ico">
    <link rel="canonical" href="{{URL::asset('/')}}"/>
    @yield('header')
</head>
<body>
    <div class="mobile-menu">
        <i class='bx bx-menu' ></i>
    </div>
    <x-navbar/>
    <div class="container">
        @yield('content')
    </div>
</body>
<script src="{{URL::asset('/js')}}/jquery.min.js">
</script>
<script>
     $('.mobile-menu').on('click',function()
    {
        var con = this.nextElementSibling;
        $(con).toggleClass('menu-active');
        $(this).children(1).toggleClass('bx-x-circle');
    });
</script>
</html>