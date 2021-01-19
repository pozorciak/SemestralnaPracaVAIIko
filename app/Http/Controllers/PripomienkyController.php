<?php

namespace App\Http\Controllers;

use App\Models\Pripomienky;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PripomienkyController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->name == "admin") {
            $pripomienky = Pripomienky::paginate(20);
            return view("pripomienky.index", compact("pripomienky"));
        }
    }

    public function create()
    {
        return view("pripomienky.add", [
            "action" => route("pripomienky.store"),
            "method" => "post"
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'meno' => 'max:50',
            'text' => 'required'
        ]);

        $pripomienka = Pripomienky::create($request->all());
        $pripomienka->save();
        return view("home");
    }



}
