<html>
<head>
        @section('head')
        <meta charset="utf-8" />
        <link rel = "stylesheet" href = "{{ url('css/home.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Smooch&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript">
            const BASE_URL = "{{ url('/') }}/";
            const csrf_token = '{{ csrf_token() }}';
            const user_id = '{{ $user["id"] }}';
        </script>
        @show
    </head>
    <body>
        <main>
        @yield('content')
    
        </main>
        <footer>
            <em> Alessandro Genovese 1000002043 </em>
        </footer>
    </body>
</html>