<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aboutmodel;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class Aboutcontroller extends Controller
{
    public function add_about()
    {
        $data = Aboutmodel::first();
        $message = Contact::all();
        $noti = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->limit(8)->get();
        $noticount = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->get();
        return view('admin.add_about', compact('data', 'message', 'noti', 'noticount'));
    }

    public function add_about_writer()
    {
        $data = Aboutmodel::first();
        $message = Contact::all();
        $noti = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->limit(8)->get();
        $noticount = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->get();
        return view('writer.add_about', compact('data', 'message', 'noti', 'noticount'));
    }

    public function add_about_inc(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'ceo' => 'required',
            'mission' => 'required',
            'version' => 'required',
            'value' => 'required',
            'descrip' => 'required',
            'image' => 'required',

        ]);
        $data = $request->all();
        $image = time() . '.' . $data['image']->extension();
        $data['image']->move(public_path('about/img'), $image);
        $array = array(

            'title' => $data['title'],
            'ceo' => $data['ceo'],
            'info_mission' => $data['mission'],
            'info_version' => $data['version'],
            'info_value' => $data['value'],
            'descrip' => $data['descrip'],
            'info' => $data['info'],
            'image' => $image,

        );
        Aboutmodel::where('id', '!=', '0')->update($array);
        return redirect('add_about')->with('succ');
    }
    public function add_about_writer_inc(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'ceo' => 'required',
            'mission' => 'required',
            'version' => 'required',
            'value' => 'required',
            'descrip' => 'required',
            'image' => 'required',

        ]);
        $data = $request->all();
        $image = time() . '.' . $data['image']->extension();
        $data['image']->move(public_path('about/img'), $image);
        $array = array(

            'title' => $data['title'],
            'ceo' => $data['ceo'],
            'info_mission' => $data['mission'],
            'info_version' => $data['version'],
            'info_value' => $data['value'],
            'descrip' => $data['descrip'],
            'info' => $data['info'],
            'image' => $image,

        );
        Aboutmodel::where('id', '!=', '0')->update($array);
        return redirect('add_about_writer')->with('succ');
    }
}
