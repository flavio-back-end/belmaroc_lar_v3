<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;
use App\Models\Settingmodel;
use App\Models\Blog;
use App\Models\Aboutmodel;
use App\Models\Contact;
use App\Models\User;


class homecontroller extends Controller
{
    public function home()
    {
        $data = Settingmodel::first();
        $data2 = Blog::all();
        return view('pages.home', compact('data', 'data2'));
    }
    public function about_page()
    {
        $data = Settingmodel::first();
        $data2 = Blog::all();
        $data3 = Aboutmodel::first();
        return view('pages.about_page', compact('data', 'data2', 'data3'));
    }

    public function contact()
    {
        $data = Settingmodel::first();
        $data2 = Blog::all();
        return view('pages.contact', compact('data', 'data2'));
    }

    public function show_blog($id)
    {
        $data = Settingmodel::first();
        $data2 = Blog::all();
        $data3 = Blog::findORfail($id);



        return view('pages.show_blog', compact('data', 'data2', 'data3'));
    }
    public function add_contact(Request $request)
    {
        $request->validate([
            'name' => 'required|min:6|max:50',
            'phone' => 'required',
            'email' => 'required',
            'message' => 'required',

        ]);
        $data = $request->all();
        Contact::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'message' => $data['message'],
        ]);
        return redirect('contact')->with('success', 'thankls i will find sulotion ');
    }

    public function loginuser()
    {
        return view('pages.loginuser');
    }
    public function signupuser_inc(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',

        ]);


        $data = $request->all();

        $nameimg = time() . '-' . $data['name'] . '.' . $data['image']->extension();
        $data['image']->move(public_path('img'), $nameimg);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type' => 'User',
            'image_path' => $nameimg,



        ]);

        return redirect('signup')->with('success', 'signup success');
    }
    public function loginuser_inc(Request $request)
    {
        $request->validate([
            'email'     =>  'required',
            'password'  =>  'required'
        ]);

        $credential = $request->only('email', 'password');

        if (Auth::attempt($credential)) {
            return redirect()->route('home')->withSuccess('Loginuser');
        }

        return redirect('loginuser')->with('fail', 'Login Details are not valid');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
