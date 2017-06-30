@extends('layouts.Default')

@section('content')
    <div class="container first-container">
        <div class="row">
            @if(Auth::check() && Auth::user()->id == $user->id || Auth::check() && Auth::user()->IsAdmin())
            <a class="btn-floating btn-large waves-effect waves-light red" href="{{route('home')}}/users/edit/{{$user->id}}"><i class="material-icons">edit</i></a>
            @endif
            <div class="col s2">
                <img src="{{asset('img/')}}/{{$user->avatar}}" alt="" class="circle responsive-img">
            </div>
            <div class="col s8">
                <div class="card-panel red lighten-4">
                    <h5>{{$user->username}}</h5>
                    <p>{!! $user->bio!!}</p>
                    <table class="table highlight">
                        <tr><td>Leeftijd</td><td>{{$user->birthday}}</td></tr>
                        <tr><td>Geslacht</td><td>{{$user->gender}}</td></tr>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
