<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use App\Models\Admin;
use App\Models\Writer;

use Illuminate\Auth\Events\Attempting;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Monolog\Handler\ElasticsearchHandler;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login_admin');
    }

    public function signup()
    {
        return view('admin.signup_admin');
    }
    public function login_inc(Request $request)
    {
        $request->validate([
            'email'     =>  'required',
            'password'  =>  'required'
        ]);

        $credential = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credential)) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('admin.login')->with('fail', 'Login Details are not valid');
    }
    public function signup_inc(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'passwrod' => 'requird|min:6',
            'image' => 'required|',
        ]);


        $data = $request->all();
        $nameimg = time() . '-' . $request->username . '.' . $request->image->extension();
        $request->image->move(public_path('img'), $nameimg);

        Admin::create([
            'name' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type' => 'Admin',
            'image_path' => $nameimg,



        ]);

        return redirect('signup')->with('success', 'signup success');
    }
    public function dashboard()
    {
        if (Auth::check()) {
            $message = Contact::all();
            $noti = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->limit(8)->get();
            $noticount = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->get();
            return view('admin.dashboard', compact('message', 'noti', 'noticount'));
        }

        return redirect('login');
    }

    public function message($id)
    {
        $message = Contact::all();
        $message2 = Contact::findOrfail($id);
        $noti = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->limit(8)->get();
        $noticount = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->get();
        return  view('admin.message', compact('message', 'message2', 'noti', 'noticount'));
    }
    public function inbox()
    {
        $message = Contact::all();
        // if you wanna see visitor messages you create array in this array  you have insert data from visitor  
        $noti = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->limit(8)->get();
        $noticount = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->get();
        return view('admin.inbox', compact('message', 'noti', 'noticount'));
    }

    public function delete_message($id)
    {
        $data = Contact::findorfail($id);
        $data->delete();
        return redirect('admin/inbox')->with('delete_succ', 'succ');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.logout');
    }
}
