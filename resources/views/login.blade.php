@extends('layout.start')

@section('head')
@parent
    <title>Login</title>
    <script src="{{ url('js/login.js') }}" defer></script>
@endsection

@section('content1')
<h1> Login</h1>
@endsection

@section('content2')
<form method='post'>
            @csrf
            <label class = 'login' >Username o email <input type='text' name='username' id = 'username' value = '{{ old("username") }}'></label>
            <label class = 'login'>Password <input type='password' name='password' id = 'password'></label>
            <label id = 'last_label'><a href="{{ url('register') }}">Registrati</a><input type='submit' id = 'submit' value='Accedi'></label>
            <div class = 'username'></div>
            <div class = 'password'></div>
            <div class = 'errore'>
            @if($error == 'campi_errati')
            <p>Username e/o password errati</p>
            @elseif($error == 'campi_mancanti')
            <p>Inserisci sia username sia password.p>
            @endif
            
            </div>
        </form>
@endsection

