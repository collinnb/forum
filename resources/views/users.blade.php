@extends('layouts.Default')
@section('content')
<div class="container first-container">
    <div class="row">

        <h4 class="center-align">Users</h4>
        <div class="col s8 offset-s2 red lighten-3">
            <a class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
            <ul class="collection">
                @foreach($users as $user)
                <li class="collection-item avatar">
                    <img src="img/{{$user->avatar}}" alt="" class="circle">
                    <span class="title">{{$user->username}}</span>

                    <a href="{{route('home')}}/users/edit/{{$user->id}}" class=""><i class="material-icons ">edit</i></a>
                </li>
                @endforeach
            </ul>

        </div>
    </div>
</div>
    @endsection