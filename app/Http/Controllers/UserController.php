<?php

namespace App\Http\Controllers;


use Aginev\Datagrid\Datagrid;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class,"user");
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::paginate(25);
        $grid = new Datagrid($user,$request->get("f",[]));

        $grid->setColumn("name","Meno a Priezvisko")
            ->setColumn("email","E-mail")
            ->setColumn("created_at","Datum registrácie")
            ->setActionColumn([
                'wrapper' => function ($value, $row) {
                    return '<a href="' . route('user.edit', [$row->id]) . '" title="Edit" class="btn btn-sn btn-primary">Editovať</a>
                    <a href="' . route('user.delete', [$row->id]) . '" title="Delete" data-method="DELETE" class="btn btn-sn btn-danger" data-confirm="Are you sure?">Zmazať</a>';
                }
            ]);

        return view("user.index",[
            "grid"=>$grid
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view("user.create",[
            "action" => route("user.store"),
            "method" => "post"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|min:2',
            'email' => 'required|email|min:3|max:255|unique:users,email,',
            'password' => 'required|min:8|confirmed|max:255']);

        $user = User::create($request->all());
        $user->save();
        return redirect()->route("user.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user->password = "";
        return view('user.edit', [
            'action' => route('user.update', $user->id),
            'method' => 'put',
            'model' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:255|min:2',
            'email' => 'required|email|min:3|max:255|unique:users,email,',
            'password' => 'required|min:8|confirmed|max:255']);

        $user->update($request->all());
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }

    public function ucet(){
        return view('user.ucet');
    }

}
