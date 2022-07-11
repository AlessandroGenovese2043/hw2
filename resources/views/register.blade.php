@extends('layout.start')

@section('head')
@parent
        <title>Registrazione</title>
        <script src="{{ url('js/registrazione.js')}}" defer></script>
        <script type="text/javascript">
            const REGISTER_ROUTE = "{{route('register')}}";
        </script>
@endsection

@section('content1')
<h1> Registrazione</h1>
@endsection

@section('content2')

<form method='post' action= "{{ route('register') }}"> 
            @csrf
            <label>Nome <input type='text' name='nome' id= 'nome' value = '{{ old("nome") }}' ></label>
            <label>Cognome <input type='text' name='cognome' id ='cognome' value = '{{ old("cognome") }}'></label>
            <label>E-mail <input type='text' name='email' id = 'email' value = '{{ old("email") }}'></label>
            <label>Username <input type='text' name='username' id = 'username' value = '{{ old("username") }}' ></label>
            <label>Password <input type='password' name='password' id = 'password' value = '{{ old("password") }}'></label>
            
            <label>Conferma Password <input type='password' name='conferma_password' id = 'conferma_password' value = '{{ old("conferma_password") }}'></label>
            <label><a href= "{{ url ('login') }}">Accedi</a><input type='submit' id = 'submit' value='Registrati'></label>
            <div class = 'campo'></div>
            <div class = 'cognome'></div>
            <div class = 'username'></div>
            <div class = 'email'></div>
            <div class = 'password'></div>
            <div class = 'conferma_password'></div>
        </form>
@endsection
