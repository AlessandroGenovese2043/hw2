@extends('layout.homelayout')
@section('head')
@parent
        <title>Home</title>
        <script src="{{ url('js/home.js') }}" defer></script>

@endsection

@section('content')
<header>
            <nav>
            <div id = 'logo'> City-Tips </div>
            <div>
            <a href = "{{ url('home') }}" id = 'home'> Home </a>
            <a href = "{{ url('newPost') }}"> Nuovo Post </a>
            <a href = '{{ url("preferiti")}}'>Preferiti</a>
            <a href = '{{ url("ricerca")}}'>Ricerca</a>
            <a href="{{ url('logout')}}" >Logout</a>
            </div>
            </nav>
        </header>
        <div id='sezioni'>
            <section class = 'profile'>
            <div id="profile-flex">
            <div id="profile">
                <img src='https://pianetasocial.it/wp-content/uploads/2013/10/faccia.jpg'>
            </div>
            
                <p> &#64;{{$user['username']}} </p>
            </div>
            <p> Nome: {{$user['nome']}} </p>
            <p> Cognome:  {{$user['cognome']}}</p>
            <p> Email: {{$user['email']}}</p>
            <p> Numero di post: {{$user['number_posts']}} </p>
            
            </section>
            <section id = 'feed'>
   
            </section>
        </div>
@endsection