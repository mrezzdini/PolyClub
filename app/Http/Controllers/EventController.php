<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Club;
use App\Event;
use App\Models\User;
use App\Comment;

class EventController extends Controller
{
    public function index()
    {
    $Events = Event::latest()->paginate(6);
    return view('events', compact('Events'));
    }
    
    public function show(Event $event)
    {
        $club = Club::where('id', '=', $event->club_id)->first();

        $comments = Comment::where([['event_id', '=', $event->id],['reply', '=', null]])->latest()->paginate(10);
        $reps = Comment::where([['event_id', '=', $event->id],['reply', '!=', null]])->latest()->paginate(10);
        $users = User::all();
        $nbComment = Comment::where('event_id', '=', $event->id)->latest();
        $nbTotal = $nbComment->count();
        return view('single-event', compact('event','club','comments','nbTotal','reps','users'));
    }

    public function store(Request $req)
    {
        $Comment= new \App\Comment();
        $Comment->comment=$req->input('comment');
        $Comment->user_id=$req->input('user');
        $Comment->event_id=$req->input('id_event');
        $Comment->reply=$req->input('reply');
        $Comment->save();
        
        return redirect()->action([EventController::class, 'show'], ['event' => $Comment->event_id]);
    }
}
