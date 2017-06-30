@extends('layouts.Default')
@section('content')


<div class="container first-container">
    <div class="row">

        <h4 class="center-align">Edit {{$profile_info->username}}</h4>
        <div class="col s8 offset-s2 red lighten-3">
            <div class="row">
                <div class="col s2">
                    <img src="{{asset('img/')}}/{{$profile_info->avatar}}" alt="" class="circle responsive-img">
                </div>
                <form class="col s8 " method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$profile_info->id }}">
                    <div class="row">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>File</span>
                                <input type="file" name="avatar" value="{{$profile_info->avatar}}">
                            </div>
                            <div class="file-path-wrapper">
                                <input name="avatar" value="{{$profile_info->avatar}}" class="file-path validate" type="text">
                            </div>
                        </div>
                    </div>
                    <row>
                        @if(Auth::check() && Auth::user()->IsAdmin())
                        <div class="input-field col s12">
                            <select name="role_id">
                                    <option name="role_id" value="{{$profile_info->role_id}}" disabled selected>Choose role</option>
                                    @foreach($roles as $role)
                                    <option name="role_id" value="{{$role->id}}">{{$role->role_name}}</option>
                                    @endforeach
                            </select>
                            <label>role</label>
                        </div>
                        @endif
                        <div class="input-field col s12">
                            <select name="gender">
                                <option name="gender" value="{{$profile_info->gender}}" disabled selected>gender</option>
                                <option name="gender" value="woman">woman</option>
                                <option name="gender" value="men">men</option>
                            </select>
                        </div>
                        <div class="input-field col s12">
                            <input name="birthday" type="date" value="{{$profile_info->birthday}}" class="timepicker">
                        </div>
                    </row>
                    <div class="row">
                        <label class="white-text" for="message-body">bio</label>
                        <textarea id="message-body" class="form-control" name="bio">{{$profile_info->bio}}</textarea>
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