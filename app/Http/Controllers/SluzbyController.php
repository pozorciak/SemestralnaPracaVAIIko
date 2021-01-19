<?php

namespace App\Http\Controllers;

use App\Models\Sluzby;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use const http\Client\Curl\AUTH_ANY;

class SluzbyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $sluzby = Sluzby::paginate(40);
       //$sluzby =DB::table('ponuky')->paginate(4);
        return view("sluzby.index",compact("sluzby"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            return view("sluzby.add", [
                "action" => route("sluzby.store"),
                "method" => "post"
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $request->validate([
                'meno' => 'required|max:50|regex:/[A-zÀ-ž]{2,}/u',
                'priezvisko' => 'required|max:50|regex:/[A-zÀ-ž]{2,}/u',
                'email' => 'required|email|max:50|min:3',
                'mesto' => 'required|max:50|regex:/^\S[A-zÀ-ž\s]{2,}/u',
                'datum' => 'required'
            ]);

            $sluzby = Sluzby::create($request->all());
            $sluzby->created_by_id = Auth::user()->id;

            $sluzby->save();
            return redirect()->route("sluzby.index");
        }
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
        if (Auth::check() && (Auth::user()->name == "admin" || Auth::user()->id == $sluzby->created_by_id)) {
            return view('sluzby.edit', [
                'action' => route('sluzby.update', $sluzby->id),
                'method' => 'put',
                'model' => $sluzby
            ]);
        }
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
        if (Auth::check() && (Auth::user()->name == "admin" || Auth::user()->id == $sluzby->created_by_id)) {
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sluzby  $sluzby
     * @return int
     */
    public function destroy($id)
    {
        if (Auth::check() && (Auth::user()->name == "admin" || Auth::user()->id == Sluzby::find($id)->created_by_id)) {
            Sluzby::destroy($id);
        }

    }

//    public function selectByOrder(){
//        $vysledok = DB::select('select * from ponuky order by meno ', array(1));
//        return $vysledok;
//    }

}
