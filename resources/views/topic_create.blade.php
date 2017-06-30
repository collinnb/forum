@extends('layouts.Default')
@section('content')


    <div class="container first-container">
        <div class="row">

            <h4 class="center-align">Create topic</h4>
            <div class="col s8 offset-s2 red lighten-3">
                <div class="row">
                    <div class="col s2">
                        {{--<img src="{{asset('img/')}}/{{$theme->user->avatar}}" alt="" class="circle responsive-img">--}}
                    </div>
                    <form class="col s8 " method="post">
                        {{ csrf_field() }}
                        <input name="user_id" type="hidden" value="{{auth::user()->id}}">
                        <input name="theme_id" type="hidden" value="{{$theme}}">
                        <div class="row">
                            <label class="white-text" for="message-body">topic name</label>
                            <input name="topic_title" value="">
                        </div>
                        <div class="row">
                            <label class="white-text" for="message-body">text</label>
                            <textarea id="message-body" class="form-control" name="topic_text"></textarea>
                        </div>


                        <button class="btn waves-effect waves-light" type="submit">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
@section('script')
    <script type="text/javascript" src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/editor.js')}}"></script>
    <script type="text/javascript" src=" {{asset('js/blog.js')}}"></script>
    <script>$(document).ready(function() {
            $('select').material_select();
        });

        $('.timepicker').pickatime({
            default: 'now', // Set default time
            fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
            twelvehour: false, // Use AM/PM or 24-hour format
            donetext: 'OK', // text for done-button
            cleartext: 'Clear', // text for clear-button
            canceltext: 'Cancel', // Text for cancel-button
            autoclose: false, // automatic close timepicker
            ampmclickable: true, // make AM PM clickable
            aftershow: function(){} //Function for after opening timepicker
        });</script>
@endsection