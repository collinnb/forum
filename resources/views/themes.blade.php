@extends('layouts.Default')
@section('content')


    <div class="container first-container">
        <div class="row">

            <h4 class="center-align">themes</h4>
            <div class="col s8 offset-s2 red lighten-3">
                @if(Auth::check() && Auth::user()->IsAdmin())
                <a class="btn-floating btn-large waves-effect waves-light red" href="{{route('theme_create')}}"><i class="material-icons">add</i></a>
                @endif
                <ul class="collection">
                    @foreach($themes as $theme)
                    <li class="collection-item avatar">
                        <img src="{{asset('img/')}}/{{$theme->user->avatar}}" alt="" class="circle">
                        <span class="title">{{$theme->theme_title}}</span>
                        <p>{!!$theme->theme_description!!} <br>
                            aantal posts: {{$theme->topics->count()}}
                        </p>
                        @if(Auth::check() && Auth::user()->IsAdmin())
                        <a href="{{route('theme_edit', ['id'=>$theme->id])}}" class=""><i class="material-icons ">edit</i></a>
                            <form  method="DELETE" action="{{ route('theme_delete', ['id'=> $theme->id]) }}">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <button type="submit" class="btn btn-default "><span class="glyphicon glyphicon-trash icon-large" aria-hidden="true"><i class="material-icons ">delete</i></span></button>
                            </form>
                        @endif
                        <a href="{{route('home')}}/themes/{{$theme->id}}" class="secondary-content"><i class="material-icons medium">play_circle_filled</i></a>
                    </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>


@endsection
@section('script')

@endsection