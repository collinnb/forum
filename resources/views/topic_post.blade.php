@extends('layouts.Default')
@section('content')


    <div class="container first-container">
        <div class="row">
            <h4 class="center-align">{{$topic->topic_title}}</h4>
            <div class="col s6 offset-s3 red lighten-3">

                <p>{!!$topic->topic_text!!}</p>
            </div>
        </div>

        <div class="row">
            <div class="col s6 offset-s3 red lighten-3">
                <h4 class="center-align">replies</h4>
                <div class="row">
                    <div class="col s6 offset-s3 red lighten-4">
                        <form  method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="user_id" value="{{auth::user()->id }}">
                            <input type="hidden" name="theme_id" value="{{$topic->theme_id}}">
                            <input type="hidden" name="topic_id" value="{{$topic->id}}">
                            <div class="form-group">
                                <textarea id="message-body" class="form-control" name="reply_text"></textarea>
                            </div>
                            <button type="submit" class="btn btn-default pull-right">React</button>
                        </form>
                    </div>
                </div>
                <ul class="collection red lighten-4 highlight">
                    <ul class="collection">
                        @foreach($topic->replies as $reply)
                        <li class="collection-item avatar">
                            <img src="{{asset('img/')}}/{{$reply->user->avatar}}" alt="" class="circle">
                            <span class="title">{{$reply->user->username}}</span>
                            <p>{!!$reply->reply_text!!}

                            </p>
                            @if(Auth::check() && Auth::user()->id == $reply->user_id || Auth::check() && Auth::user()->IsAdmin())
                            <a href="{{route('reply_edit', ['id'=> $reply->id])}}" class=""><i class="material-icons ">edit</i></a>
                            <form  method="DELETE" action="{{ route('reply_delete', ['id' => $reply->id]) }}">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <button type="submit" class="btn btn-default "><span class="glyphicon glyphicon-trash icon-large" aria-hidden="true"></span></button>
                            </form>
                            <a href="#!" class=""><i class="material-icons ">delete</i></a>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </ul>
            </div>
        </div>


    </div>


@endsection
@section('script')

@endsection