<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settingmodel;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function setting()
    {
        $message = Contact::all();
        $noti = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->limit(8)->get();
        $noticount = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->get();

        $data2 = Settingmodel::where('id', '!=', '0')->first();

        return view('admin.setting', compact('data2', 'message', 'noti', 'noticount'));
    }
    public function setting_writer()
    {
        $message = Contact::all();
        $data2 = Settingmodel::where('id', '!=', '0')->first();
        $noti = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->limit(8)->get();
        $noticount = DB::table('activites')->where('id', '!=', '0')->orderBy('datetime', 'DESC')->get();


        return view('writer.setting', compact('data2', 'message', 'noti', 'noticount'));
    }


    public function add_setting(Request $request)
    {
        $request->validate([
            'site_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',



        ]);

        // to  update data from settings  olumns dta
        // and we check the columns data  empty   or not 

        $data = $request->all();
        $logo = time() . '-' . $data['site_name'] . '.' . $data['logo']->extension();
        $data['logo']->move(public_path('img/sett'), $logo);

        $array = array(
            'site_name' => $data['site_name'],
            'phone' => $data['phone'],
            'email' =>  $data['email'],
            'map' =>  $data['map'],
            'address' =>  $data['address'],
            'twitter' => $data['twitter'],
            'linkedin' => $data['linkedin'],
            'instagram' => $data['instagram'],
            'youtube' =>  $data['youtube'],
            'facebook' => $data['facebook'],
            'logo' => $logo,


        );







        Settingmodel::where('id', '!=', '0')->update($array);

        return  redirect('setting')->with('add_succ', 'succ');
    }

    public function add_setting_writer(Request $request)
    {
        $request->validate([
            'site_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',



        ]);

        // to  update data from settings  olumns dta
        // and we check the columns data  empty   or not 

        $data = $request->all();
        $logo = time() . '-' . $data['site_name'] . '.' . $data['logo']->extension();
        $data['logo']->move(public_path('img/sett'), $logo);

        $array = array(
            'site_name' => $data['site_name'],
            'phone' => $data['phone'],
            'email' =>  $data['email'],
            'map' =>  $data['map'],
            'address' =>  $data['address'],
            'twitter' => $data['twitter'],
            'linkedin' => $data['linkedin'],
            'instagram' => $data['instagram'],
            'youtube' =>  $data['youtube'],
            'facebook' => $data['facebook'],
            'logo' => $logo,


        );







        Settingmodel::where('id', '!=', '0')->update($array);

        return  redirect('setting_writer')->with('add_succ', 'succ');
    }
}
