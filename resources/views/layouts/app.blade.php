<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}"> {{-- <- bootstrap css --}}
    <title>@yield('title','Web Applications Framework')</title>
</head>
<body>
    {{-- That's how you write a comment in blade --}}

    @include('inc.navbar')
    @if(session('status')) {{-- <- If session key exists --}}
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('status')}} {{-- <- Display the session value --}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

    <main class="container mt-4">
        @yield('content')
    </main>
    @include('inc.footer')
    <script src="{{asset('js/app.js')}}"></script> {{-- <- bootstrap js --}}

<script>
    //close the alert after 3 seconds.
    $(document).ready(function(){
       setTimeout(function() {
          $(".alert").alert('close');
       }, 3000);
    });
</script>

</body>
</html>
