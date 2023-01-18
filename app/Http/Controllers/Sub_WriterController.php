<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Writer;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Carbon;


class Sub_WriterController extends Controller
{
    public function Sub_writer()
    {
        $message = Contact::all();
        $noti = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->limit(8)->get();
        $noticount = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->get();

        $data = Writer::select('*')


            ->orderby('last_seen', 'DESC')
            ->paginate(10);

        return view('admin.Sub_writer', compact('data', 'message', 'noti', 'noticount'));
    }



    public function add_Sub_writer()
    {
        $data = Writer::all();
        $message = Contact::all();
        $noti = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->limit(8)->get();
        $noticount = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->get();

        return view('admin.add_Sub_writer', compact('data', 'message', 'noti', 'noticount'));
    }

    public function add_Sub_writer_inc(Request $request)
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
        Writer::create([
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
            'role' => 'Writer',
            'modify' => 'Add',
            'role_modify' => $role_modify,
            'datetime' => $dt,
            'image' => $admin->image_path,

        );

        DB::table('activites')->insert($activity);
        return redirect()->route('admin.Sub_writer')->with('add_succ', 'succ');
    }
    public function  edit_Sub_writer($id)
    {
        $data = Writer::findOrfail($id);
        $message = Contact::all();
        $noti = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->limit(8)->get();
        $noticount = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->get();


        return view('admin.edit_Sub_writer', compact('data', 'message', 'noti', 'noticount'));
    }
    public function update_writer(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',

        ]);
        // $data = $request->all();
        // $img = time() . '-' . $data['username'] . '.' . $data['image']->extension();
        // $data['image']->move(public_path('writer/img'), $img);

        $data = $request->all();
        $nameimg = time() . '-' . $request->username . '.' . $request->image->extension();
        $request->image->move(public_path('img'), $nameimg);

        if (!empty($data['password'])) {
            $array = array(
                'name' => $data['username'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'image_path' => $nameimg,


            );
        } else {
            $array = array(
                'name' => $data['username'],
                'email' => $data['email'],
                'image_path' => $nameimg,


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
            'role' => 'Writer',
            'modify' => 'Update',
            'role_modify' => $role_modify,
            'datetime' => $dt,
            'image' => $admin->image_path,

        );

        DB::table('activites')->insert($activity);
        Writer::whereId($data['hidden_id'])->update($array);
        return redirect()->route('admin.Sub_writer')->with('update_succ', 'succ');
    }
    public function delete_writer($id)
    {
        $dt = Carbon::now()->toDayDateTimeString();
        //  session 
        $admin = Auth::guard('admin')->user();
        Session::put('admin', $admin);
        $admin = Session::get('admin');


        //  session user
        $user = Auth::guard('writer')->user();
        Session::put('user', $user);
        $user = Session::get('user');


        $activity = array(

            'name' => null,
            'email' => null,
            'role' => 'Writer',
            'modify' => 'Delete',
            'role_modify' => $admin->name,
            'datetime' => $dt,
            'image' => $admin->image_path,
        );



        DB::table('activites')->insert($activity);
        $data = Writer::findOrfail($id);
        $data->delete();

        return redirect()->route('admin.Sub_writer')->with('delete_succ', 'delete');
    }

    // ---------------------------------------------------------- part add writer to user --------------------------------------------------


    public function Sub_user()
    {
        $message = Contact::all();
        $noti = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->limit(8)->get();
        $noticount = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->get();

        $data = User::select('*')


            ->orderby('last_seen', 'DESC')
            ->paginate(10);

        return view('writer.Sub_user', compact('data', 'message', 'noti', 'noticount'));
    }

    public function  add_Sub_user()

    {
        $message = Contact::all();
        $noti = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->limit(8)->get();
        $noticount = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->get();

        return view('writer.add_Sub', compact('message', 'noti', 'noticount'));
    }

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

        $writer = Auth::guard('writer')->user();
        Session::put('writer', $writer);
        $writer = Session::get('writer');


        $activity = array(
            'id' => $request->id,
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => 'User',
            'modify' => 'Add',
            'role_modify' => $writer->name,
            'datetime' => $dt,
            'image' => $writer->image_path,

        );

        DB::table('activites')->insert($activity);
        return redirect('writer/add_Sub')->with('success', 'add success');
    }

    public function edit_sub_user($id)
    {
        $message = Contact::all();
        $data = User::findOrfail($id);
        $noti = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->limit(8)->get();
        $noticount = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->get();
        return view('writer.edit_sub', compact('data', 'message', 'noti', 'noticount'));
    }

    public function update_sub_user(Request $request)
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
                'image_path' => $new_img,
                // 'type' => $data['type'],


            );
        }
        $dt = Carbon::now()->toDayDateTimeString();

        $writer = Auth::guard('writer')->user();
        Session::put('admin', $writer);
        $writer = Session::get('writer');


        $activity = array(
            'id' => $request->id,
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => 'User',
            'modify' => 'Update',
            'role_modify' => $writer->name,
            'datetime' => $dt,
            'image' => $writer->image_path,

        );

        DB::table('activites')->insert($activity);
        User::whereId($data['hidden_id'])->update($array);
        return redirect()->route('writer.Sub_user')->with('update_succ', 'succ');
    }
    public function delete_user($id)
    {
        $dt = Carbon::now()->toDayDateTimeString();
        //  session 
        $writer = Auth::guard('writer')->user();
        Session::put('admin', $writer);
        $writer = Session::get('writer');


        //  session user
        $user = Auth::user();
        Session::put('user', $user);
        $user = Session::get('user');


        $activity = array(

            'name' => null,
            'email' => null,
            'role' => 'User',
            'modify' => 'Delete',
            'role_modify' => $writer->name,
            'datetime' => $dt,
            'image' => $writer->image_path,
        );




        $data = User::findOrfail($id);
        $data->delete();
        DB::table('activites')->insert($activity);
        return redirect('writer/Sub_user')->with('delete_succ', 'delete_succ');
    }
}
