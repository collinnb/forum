@extends('layouts.Default')

@section('content')
    <div class="slider">
        <ul class="slides">
            <li>
                <img src="img/placeholder1.png"> <!-- random image -->
                <div class="caption right-align">
                    <h3>Forum</h3>
                    <h5 class="light grey-text text-lighten-3">all your forum questions</h5>
                </div>
            </li>
        </ul>
    </div>

    <div class="container first-container">
        <div class="row">
            <div class="col s8 offset-s2 red lighten-3">
                <h4 class="center-align">last posts</h4>
                <ul class="collection red lighten-4 highlight">
                    @foreach($topics as $topic)
                    <li class="collection-item avatar red lighten-4">
                        <a href="{{ route('profile', ['id' => $topic->user->id]) }}"><img src="img/{{$topic->user->avatar}}" alt="" class="circle"></a>
                        <span class="title">{{$topic->topic_title}}</span>
                        <p>{{$topic->theme->theme_title}} <br>
                            reacties: {{$topic->replies->count()}}
                        </p>
                        <a href="{{ route('post', ['theme_id'=>$topic->theme_id,'id' => $topic->id]) }}" class="secondary-content"><i class="material-icons medium">play_circle_filled</i></a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
