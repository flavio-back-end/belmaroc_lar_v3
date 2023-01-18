<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Contact;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;



class BlogController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function blog()
    {
        $data = Blog::get();
        $message = Contact::all();
        $noti = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->limit(8)->get();
        $noticount = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->get();
        return view('admin.blog', compact('data', 'message', 'noti', 'noticount'));
    }



    public function add_blog()
    {
        $noti = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->limit(8)->get();
        $noticount = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->get();

        $data = Blog::where('id', '!=', '0')->first();
        $message = Contact::all();
        return view('admin.add_blog', compact('data', 'message', 'noti', 'noticount'));
    }


    public function add_blog_inc(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'descrip' => 'required',

        ]);
        $data = $request->all();
        $image = time() . '-' . $data['title'] . '.' . $data['image']->extension();
        $data['image']->move(public_path('img/blog'), $image);
        Blog::create(
            [
                'title' => $data['title'],
                'category' => $data['category'],
                'descrip' => $data['descrip'],
                'image' => $image,


            ]


        );
        $dt = Carbon::now()->toDayDateTimeString();
        $admin = Auth::guard('admin')->user();
        Session::put('admin', $admin);
        $admin = Session::get('admin');
        $activity = array(
            'id' => $request->id,
            'name' => $data['title'],
            'email' => null,
            'role' => 'Blog',
            'modify' => 'Add',
            'role_modify' => $admin->name,
            'datetime' => $dt,
            'image' => $admin->image_path,



        );
        DB::table('activites')->insert($activity);
        return redirect('blog')->with('succ');
    }



    public function edit_blog($id)
    {
        $data = Blog::findOrfail($id);
        $message = Contact::all();
        $noti = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->limit(8)->get();
        $noticount = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->get();

        return view('admin.edit_blog', compact('data', 'message', 'noti', 'noticount'));
    }


    public function edit_blog_inc(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'descrip' => 'required',

        ]);
        $data = $request->all();
        $image = time() . '-' . $data['title'] . '.' . $data['image']->extension();
        $data['image']->move(public_path('img/blog'), $image);

        if (!empty($data['image'])) {
            $array = array(
                'title' => $data['title'],
                'category' => $data['category'],
                'descrip' => $data['descrip'],
                'image' => $image,


            );
        } else {
            $array = array(
                'title' => $data['title'],
                'category' => $data['category'],
                'descrip' => $data['descrip'],


            );
        }
        $dt = Carbon::now()->toDayDateTimeString();
        $admin = Auth::guard('admin')->user();
        Session::put('admin', $admin);
        $admin = Session::get('admin');
        $activity = array(
            'id' => $request->id,
            'name' => $data['title'],
            'email' => null,
            'role' => 'Blog',
            'modify' => 'Update',
            'role_modify' => $admin->name,
            'datetime' => $dt,
            'image' => $admin->image_path,



        );




        Blog::whereId($data['hidden_id'])->update($array);
        DB::table('activites')->insert($activity);
        return redirect('admin/blog')->with('succ');
    }





    public function  delete_blog($id)
    {
        $data = Blog::findOrfail($id);
        $data->delete();
        $dt = Carbon::now()->toDayDateTimeString();
        $admin = Auth::guard('admin')->user();
        Session::put(' admin',  $admin);
        $admin = Session::get(' admin');
        $activity = array(

            'name' => null,
            'email' => null,
            'role' => 'Blog',
            'modify' => 'Delete',
            'role_modify' =>  $admin->name,
            'datetime' => $dt,
            'image' =>  $admin->image_path,



        );
        DB::table('activites')->insert($activity);
        return redirect('admin/blog')->with('succ', 'succ');
    }





    //=================================================================================================================================================================================
    //                                                                             THIS FOR BLOG WRITER
    //==============================================================================================================================================================================




    public function blog_writer()
    {
        $noti = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->limit(8)->get();
        $noticount = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->get();

        $data = Blog::get();
        $message = Contact::all();
        return view('writer.blog', compact('data', 'message', 'noti', 'noticount'));
    }

    public function add_blog_writer()
    {
        $data = Blog::where('id', '!=', '0')->first();
        $noti = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->limit(8)->get();
        $noticount = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->get();

        $message = Contact::all();
        return view('writer.add_blog', compact('data', 'message', 'noti', 'noticount'));
    }
    public function add_blog_writer_inc(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'descrip' => 'required',

        ]);
        $data = $request->all();
        $image = time() . '-' . $data['title'] . '.' . $data['image']->extension();
        $data['image']->move(public_path('img/blog'), $image);
        Blog::create(
            [
                'title' => $data['title'],
                'category' => $data['category'],
                'descrip' => $data['descrip'],
                'image' => $image,


            ]
        );
        $dt = Carbon::now()->toDayDateTimeString();
        $writer = Auth::guard('writer')->user();
        Session::put('writer', $writer);
        $writer = Session::get('writer');
        $activity = array(
            'id' => $request->id,
            'name' => $data['title'],
            'email' => null,
            'role' => 'Blog',
            'modify' => 'Add',
            'role_modify' => $writer->name,
            'datetime' => $dt,
            'image' => $writer->image_path,



        );
        DB::table('activites')->insert($activity);
        return redirect('writer/blog')->with('succ');
    }
    public function edit_blog_writer($id)
    {
        $data = Blog::findOrfail($id);
        $message = Contact::all();
        $noti = DB::table('activites')->where('id', '!=', '0')->orderBy('id', 'DESC')->limit(8)->get();
        $noticount = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->get();

        return view('writer.edit_blog', compact('data', 'message', 'noticount', 'noti'));
    }
    public function edit_blog_writer_inc(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'descrip' => 'required',

        ]);
        $data = $request->all();
        $image = time() . '-' . $data['title'] . '.' . $data['image']->extension();
        $data['image']->move(public_path('img/blog'), $image);

        if (!empty($data['image'])) {
            $array = array(
                'title' => $data['title'],
                'category' => $data['category'],
                'descrip' => $data['descrip'],
                'image' => $image,


            );
        } else {
            $array = array(
                'title' => $data['title'],
                'category' => $data['category'],
                'descrip' => $data['descrip'],


            );
        }
        $dt = Carbon::now()->toDayDateTimeString();
        $writer = Auth::guard('writer')->user();
        Session::put(' writer',  $writer);
        $writer = Session::get(' writer');
        $activity = array(
            'id' => $request->id,
            'name' => $data['title'],
            'email' => null,
            'role' => 'Blog',
            'modify' => 'Update',
            'role_modify' =>  $writer->name,
            'datetime' => $dt,
            'image' =>  $writer->image_path,



        );




        Blog::whereId($data['hidden_id'])->update($array);
        DB::table('activites')->insert($activity);
        return redirect('writer/blog')->with('succ');
    }
    public function  delete_blog_writer($id)
    {
        $data = Blog::findOrfail($id);
        $data->delete();
        $dt = Carbon::now()->toDayDateTimeString();
        $writer = Auth::guard(' writer')->user();
        Session::put(' writer',  $writer);
        $writer = Session::get(' writer');
        $activity = array(

            'name' => null,
            'email' => null,
            'role' => 'Blog',
            'modify' => 'Delete',
            'role_modify' =>  $writer->name,
            'datetime' => $dt,
            'image' =>  $writer->image_path,



        );
        DB::table('activites')->insert($activity);
        return redirect('writer/blog')->with('succ', 'succ');
    }
}
