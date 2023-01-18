<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Admin;
use App\Models\Writer;

use Illuminate\Auth\Events\Attempting;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Monolog\Handler\ElasticsearchHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Profilcontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        $noti = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->limit(8)->get();
        $noticount = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->get();

        $data = Admin::findOrfail(Auth::guard('admin')->user()->id);
        $message = Contact::all();
        return view('admin.profile', compact('data', 'message', 'noti', 'noticount'));
    }

    public function  profile_inc(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|',


        ]);



        $data = $request->all();
        $image = time() . '-' . $data['name'] . '.' . $data['image']->extension();
        $data['image']->move(public_path('img'), $image);
        if (!empty($data['password'])) {
            $array = array(
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'image_path' => $image,
            );
        } else {
            $array = array(
                'name' => $data['name'],
                'email' => $data['email'],



            );
        }


        Admin::whereid(Auth::guard('admin')->user()->id)->update($array);

        return redirect('profile')->with('success', 'update success');
    }

    public function profile_writer()
    {
        $data_writer = Writer::findOrfail(Auth::guard('writer')->user()->id);
        $message = Contact::all();
        $noti = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->limit(8)->get();
        $noticount = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->get();

        return view('writer.profile_writer', compact('data_writer', 'message', 'noti', 'noticount'));
    }

    public function profile_writer_inc(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|',


        ]);



        $data = $request->all();
        $image = time() . '-' . $data['name'] . '.' . $data['image']->extension();
        $data['image']->move(public_path('img'), $image);
        if (!empty($data['password'])) {
            $array = array(
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'image_path' => $image,
            );
        } else {
            $array = array(
                'name' => $data['name'],
                'email' => $data['email'],



            );
        }
        Writer::whereid(Auth::guard('writer')->user()->id)->update($array);

        return redirect()->route('writer.profile')->with('success', 'success');
    }
}
