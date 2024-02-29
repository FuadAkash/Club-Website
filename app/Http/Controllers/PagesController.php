<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

use App\Models\Main;

class PagesController extends Controller
{
    public function index(){

        $main = Main::first();
        $event = Event::all();
        return view('pages.index', data: compact('main', 'event'));
    }
}
