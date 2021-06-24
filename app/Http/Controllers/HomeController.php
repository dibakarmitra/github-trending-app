<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\VarDumper\Cloner\Data;

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
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        if(Auth::check()) {
            $user = User::where('id', Auth::user()->id)->first();
        }
        return view('home')->with('user',$user);
    }

    public function newPassword (Request $request) {
        $this->validate($request, [
            'password' => 'min:8|required_with:confirm-password|same:confirm-password',
            'confirm-password' => 'min:8'
            ]);
        if(Auth::check()) {
            $user = User::findOrFail(Auth::user()->id);
            if(!$user->password) {
                $user->password = Hash::make($request->password);
                $user->save();
            }
        }
        return back()->with('success', 'new password generated.');
    }

}
