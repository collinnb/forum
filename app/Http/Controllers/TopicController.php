<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($theme_id)
    {
        return view('topic_create')->with('theme',$theme_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Topic::create($request->input());

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $topic_id)
    {
        $topic = Topic::find($topic_id);
        return view('topic_post')->with('topic', $topic);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $topic_id)
    {
        $topic = Topic::find($topic_id);
        if (Auth::user()->IsAdmin() || Auth::user()->id == $topic->user_id) {
            return view('topic_edit')->with('topic', $topic);
        } else{
            return redirect(route('home'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $topic_id)
    {
        $new3 = Topic::find($topic_id);
        if (Auth::user()->IsAdmin() || Auth::user()->id == $new3->user_id) {



            $new3->topic_title = $request->topic_title;


            $new3->topic_text = $request->topic_text;
            $new3->save();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($theme_id, $id)
    {
        $Topic = Topic::find($id);
        $Reply = Reply::where('topic_id','=',$id );
        if (Auth::user()->IsAdmin() || Auth::user()->id == $Topic->user_id) {
            $Reply->delete();
            $Topic->delete();
        }
        return redirect()->back();
    }
}
