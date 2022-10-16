<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Club;
use App\Event;
use App\Models\User;

class ClubController extends Controller
{
    public function index()
    {
    $Clubs = club::latest()->paginate(6);
    return view('clubs', compact('Clubs'))
    ->with('i', (request()->input('page', 1) - 1) * 6);
    }
    /**
    * Display the specified resource.
    * 
    * @param \App\Club $club
    * @return \Illuminate\Http\Response
    */
    public function show(Club $club)
    {
        $events = Event::where('club_id', '=', $club->id)->latest()->paginate(6);
        $User = User::where('id', '=', $club->president)->firstOrFail();
        return view('single-club', compact('club','events','User'));
    }
}
