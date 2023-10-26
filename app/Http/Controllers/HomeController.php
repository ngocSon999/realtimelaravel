<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     */
    public function index()
    {
        $messages = Message::with('user')->get();

        return view('room', compact('messages'));
    }
}
