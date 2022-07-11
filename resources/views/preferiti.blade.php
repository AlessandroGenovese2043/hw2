@extends('layout.homelayout')
@section('head')
@parent 
       <title>Preferiti</title>
       <script src="{{ url('js/preferiti.js') }}" defer></script>

@endsection

@section('content')
<header>
            <nav>
            <div id = 'logo'> City-Tips </div>
            <div>
            <a href = "{{ url('home') }}" id = 'home'> Home </a>
            <a href = "{{ url('newPost') }}"> Nuovo Post </a>
            <a href = '{{ url("ricerca")}}'>Ricerca</a>
            <a href="{{ url('logout') }}" >Logout</a>
            </div>
            </nav>
        </header>
        <section id = "new_post">
            <div id ="flex" class ='preferiti'>
                <strong>I tuoi Preferiti </strong>
                <seciton id ='feed' >

                </seciton>
            </div>
        </div>
@endsection
