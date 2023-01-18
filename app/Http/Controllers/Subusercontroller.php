<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Writer;
use App\Models\Contact;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

class Subusercontroller extends Controller
{
    //   this for athentication but have one in route
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    // functionn to show user -----------------------------------------------------
    public function Sub_user()
    {
        $message = Contact::all();
        $noti = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->limit(8)->get();
        $noticount = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->get();
        $data = User::select("*")
            ->orderBy('last_seen', 'DESC')
            ->paginate(10);
        return view('admin.Sub_user', compact('data', 'message', 'noti', 'noticount'));
    }
    // ------------------------------------------------------

    // show writer---------------------------
    public function  sub_user_writer()
    {
        $message = Contact::all();
        $data = User::all();
        $noti = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->limit(8)->get();
        $noticount = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->get();

        return view('writer.Sub_user', compact('data', 'message', 'noti', 'noticount'));
    }

    //------------------------------------------------

    // add sub user------------------------------------------------------------------------------
    public function  add_Sub_user()

    {
        $message = Contact::all();
        $noti = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->limit(8)->get();
        $noticount = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->get();
        return view('admin.add_Sub', compact('message', 'noti', 'noticount'));
    }
    // -------------------------------------------------------------------------------------------
    //  add writer  return  -------------------------------------------------------------------------------


    // -------------------------------------------------------------------------------------------


    // add user inc -------------------------------------------------------------------------------------------

    public function add_Sub_user_inc(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            // 'type' => 'required',
            'image' => 'required',

        ]);

        $data = $request->all();
        $new_img = time() . '-' . $data['name'] . '.' . $data['image']->extension();
        $data['image']->move(public_path('img'), $new_img);
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            // 'type' => $data['type'],
            'image_path' => $new_img,
        ]);

        $dt = Carbon::now()->toDayDateTimeString();

        $admin = Auth::guard('admin')->user();
        Session::put('admin', $admin);
        $admin = Session::get('admin');

        $role_modify = $admin->name;
        $activity = array(
            'id' => $request->id,
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => 'User',
            'modify' => 'Add',
            'role_modify' => $role_modify,
            'datetime' => $dt,
            'image' => $admin->image_path,

        );

        DB::table('activites')->insert($activity);
        return redirect()->route('admin.add_sub_user')->with('add_succ', 'succ');
    }
    // -------------------------------------------------------------------------------------------
    // in this function writer  add user 
    // -------------------------------------------------------------------------------------------


    // -------------------------------------------------------------------------------------------


    // -------------------------------------------------------------------------------------------

    public function edit_sub($id)
    {

        $message = Contact::all();
        $data = User::findOrfail($id);
        $noti = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->limit(8)->get();
        $noticount = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->get();
        return view('admin.edit_sub', compact('data', 'message', 'noti', 'noticount'));
    }
    // -------------------------------------------------------------------------------------------
    // -------------------------------------------------------------------------------------------



    // -------------------------------------------------------------------------------------------
    // -------------------------------------------------------------------------------------------

    public function update_sub(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $data = $request->all();
        $new_img = time() . '-' . $data['name'] . '.' . $data['image']->extension();
        $data['image']->move(public_path('img'), $new_img);
        if (!empty($data['password'])) {
            $array = array(
                'name' => $data['name'],
                'email' => $data['email'],
                // 'type' => $data['type'],

                'password' => Hash::make($data['password']),
                'image_path' => $new_img,

            );
        } else {
            $array = array(
                'name' => $data['name'],
                'email' => $data['email'],
                'type' => $data['type'],


            );
        }
        $dt = Carbon::now()->toDayDateTimeString();

        $admin = Auth::guard('admin')->user();
        Session::put('admin', $admin);
        $admin = Session::get('admin');

        $role_modify = $admin->name;
        $activity = array(
            'id' => $request->id,
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => 'User',
            'modify' => 'Update',
            'role_modify' => $role_modify,
            'datetime' => $dt,
            'image' => $admin->image_path,

        );

        DB::table('activites')->insert($activity);
        User::whereId($data['hidden_id'])->update($array);
        return redirect('Sub_user')->with('update_succ', 'succ');
    }
    // -------------------------------------------------------------------------------------------

    // -------------------------------------------------------------------------------------------


    // -------------------------------------------------------------------------------------------



    // -------------------------------------------------------------------------------------------


    public function delete_user($id)
    {
        $dt = Carbon::now()->toDayDateTimeString();
        //  session 
        $admin = Auth::guard('admin')->user();
        Session::put('admin', $admin);
        $admin = Session::get('admin');


        //  session user
        $user = Auth::user();
        Session::put('user', $user);
        $user = Session::get('user');


        $activity = array(

            'name' => null,
            'email' => null,
            'role' => 'User',
            'modify' => 'Delete',
            'role_modify' => $admin->name,
            'datetime' => $dt,
            'image' => $admin->image_path,
        );



        DB::table('activites')->insert($activity);
        $data = User::findOrfail($id);
        $data->delete();
        return redirect('Sub_user')->with('delete_succ', 'delete');
    }
    // -------------------------------------------------------------------------------------------

}
