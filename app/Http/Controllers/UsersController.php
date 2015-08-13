<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('Admin',['except'=>['show','edit','update']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $users= User::where('type','client')->get();
        return view('user.all')->with(['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
        $user=new User();
        $user->name=$request->get('name');
        $user->phone=$request->get('phone');
        $user->email=$request->get('email');
        $user->password=bcrypt($request->get('password'));
        $user->type='client';
        $user->save();
        return redirect('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
        $loggedInUser= auth::user();
        if($loggedInUser['type']=='admin'||$loggedInUser['id']==$id) {
        $user= User::find($id);
        return view('user.show')->with(['user'=>$user]);
        }
        else{
            return view('errors.Unauth')->with(['msg'=>'You are Not Authorized to see this']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
        $loggedInUser= auth::user();
        if($loggedInUser['type']=='admin'||$loggedInUser['id']==$id) {
            $user = User::findOrFail($id);
            return view('user.edit')->with(['user' => $user]);
        }
        else{
            return view('errors.Unauth')->with(['msg'=>'You are Not Authorized to see this']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
        $loggedInUser= auth::user();
        if($loggedInUser['type']=='admin'||$loggedInUser['id']==$id) {
            $user = User::findOrFail($id);
            $user->name=$request->get('name');
            $user->phone=$request->get('phone');
            $user->email=$request->get('email');
            $user->save();

            return view('user.show')->with(['user'=>$user]);
        }
        else{
            return view('errors.Unauth')->with(['msg'=>'You are Not Authorized to see this']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        return view('errors.Unauth')->with(['msg'=>'Not Done yet']);

    }
}
