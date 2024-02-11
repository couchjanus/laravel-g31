<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        $categories = DB::query("select * from users where email_verified_at is null");
        dd($categories);
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
