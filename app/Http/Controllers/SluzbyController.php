<?php

namespace App\Http\Controllers;

use App\Models\Sluzby;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SluzbyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $sluzby = Sluzby::paginate(100);
        return view("sluzby.index",compact("sluzby"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {

        return view("sluzby.add",[
            "action" => route("sluzby.store"),
            "method" => "post"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'meno' => 'required',
            'priezvisko' => 'required',
            'email' => 'required|email',
            'mesto' => 'required',
            'datum' => 'required'
        ]);

        $sluzby = Sluzby::create($request->all());
        $sluzby->created_by_id = Auth::user()->id;

        $sluzby->save();
        return redirect()->route("sluzby.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sluzby  $sluzby
     * @return \Illuminate\Http\Response
     */
    public function show(Sluzby $sluzby)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sluzby  $sluzby
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Sluzby $sluzby)
    {
        return view('sluzby.edit', [
            'action' => route('sluzby.update', $sluzby->id),
            'method' => 'put',
            'model' => $sluzby
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sluzby  $sluzby
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, Sluzby $sluzby)
    {
        $request->validate([
            'meno' => 'required',
            'priezvisko' => 'required',
            'email' => 'required|email',
            'mesto' => 'required',
            'datum' => 'required'
        ]);

        $sluzby->update($request->all());
        return redirect()->route('sluzby.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sluzby  $sluzby
     * @return int
     */
    public function destroy($id)
    {
        Sluzby::destroy($id);
        //$sluzby->delete();
        //return json_encode(array('statusCode' => 200));
//          return redirect()->route('sluzby.index');
    }


}
