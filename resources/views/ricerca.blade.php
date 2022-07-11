@extends('layout.homelayout')
@section('head')
@parent 
       <title>Ricerca</title>
       <script src="{{ url('js/ricerca.js') }}" defer></script>

@endsection

@section('content')
<header>
            <nav>
            <div id = 'logo'> City-Tips </div>
            <div>
            <a href = "{{ url('home') }}" id = 'home'> Home </a>
            <a href = "{{ url('newPost') }}"> Nuovo Post </a>
            <a href = '{{ url( "preferiti") }}'>Preferiti</a>
            <a href="{{ url('logout') }}" >Logout</a>
            </div>
            </nav>
        </header>
        <section id = "new_post">
            <div id ="flex" class ='preferiti'>
                <strong >Cerca consigli sulla tua meta desiderata</strong>
                <em id='pref_em'>(I risultati saranno in ordine cronologico)</em>
                <seciton id ='feed' >
                    <form class='form_comments' id='search_form'>
                        <input type="text" name="ricerca" maxlength="50" placeholder="Scrivi qui dove vorresti andare" class="input_comment" id = 'ricerca'>
                        <input type="submit" value="Cerca" class="submit_comment" id='submit_ricerca' >
                    </form>
                </seciton>
            </div>
        </div>
@endsection

