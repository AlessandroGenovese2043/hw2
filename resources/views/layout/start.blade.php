
<html>
    <head>
        @section('head')
        <meta charset="utf-8" />
        <link rel = "stylesheet" href = "{{url('css/registrazione.css')}}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @show
    </head>
    <body>
        <main>
        <section>
        <header>
               @yield('content1')
        </header>
        @yield('content2')
        </section>
        
        </main>
        
    </body>
</html>