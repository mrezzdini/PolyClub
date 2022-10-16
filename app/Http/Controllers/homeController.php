<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Club;
use App\Event;
use App\Models\User;

class homeController extends Controller
{
    public function index()
    {
    $Events = Event::latest()->paginate(3);
    $Clubs = club::latest()->paginate(3);
    return view('home', compact('Clubs','Events'));
    }
}
