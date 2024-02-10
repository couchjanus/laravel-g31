<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', ['title' => "Home page"]);
    }

    public function show(Request $request)
    {
        $name = $request->name;
        $sort = $request->sort;
        $date = $request->date;

        return view('home.show', compact('name', 'sort','date'));
    }
}
