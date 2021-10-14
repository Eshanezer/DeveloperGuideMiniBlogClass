<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->update();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showLogin(Request $request){
        return view('auth.login');
    }

    public function showRegister(){
        return view('auth.register');
    }

    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|string|unique:users,email',
            'password'=>'required|confirmed'
        ]);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        return redirect()->route('login');
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $user = User::where('email',$request->email)->first();
        if(!$user || !Hash::check($request->password,$user->password)){
            return 'Password not matched !';
        }

        Auth::login($user);

        return redirect()->route('home');
    }

    public function logout(){
        Auth::logout();

        return redirect()->back();
    }

    public function users(){
        return view('management.user.index')
        ->with('allUsers',User::getAllUsers());
    }
}
