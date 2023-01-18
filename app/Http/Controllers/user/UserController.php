<?php

// namespace App\Http\Controllers\user;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use App\Models\User;
// use App\Models\Blog;
// use App\Models\Settingmodel;




// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Auth;
// use Monolog\Handler\ElasticsearchHandler;

// class UserController extends Controller
// {
//     public function loginuser()
//     {
//         return view('pages.loginuser');
//     }

//     public function signup()
//     {
//         return view('pages.loginuser');
//     }
//     public function loginuser_inc(Request $request)
//     {
//         $request->validate([
//             'email'     =>  'required',
//             'password'  =>  'required'
//         ]);

//         $credential = $request->only('email', 'password');

//         if (Auth::guard('web')->attempt($credential)) {
//             return redirect()->route('homeuser');
//         }

//         return redirect()->route('homeuser')->with('fail', 'Login Details are not valid');
//     }
//     public function signupuser_inc(Request $request)
//     {
//         $request->validate([
//             'username' => 'required',
//             'email' => 'required|email|unique:users',
//             'passwrod' => 'requird|min:6',
//             'image' => 'required|',
//         ]);


//         $data = $request->all();
//         $nameimg = time() . '-' . $request->username . '.' . $request->image->extension();
//         $request->image->move(public_path('img'), $nameimg);

//         User::create([
//             'name' => $data['username'],
//             'email' => $data['email'],
//             'password' => Hash::make($data['password']),
//             'image_path' => $nameimg,



//         ]);

//         return redirect('signupuser')->with('success', 'signup success');
//     }
//     public function home()
//     {
//         if (Auth::check()) {
//             $data = Settingmodel::first();
//             $data2 = Blog::all();
//             return view('pages.home', compact('data', 'data2'));
//         }

//         return redirect('loginuser');
//     }

//     public function logout()
//     {
//         Auth::logout();
//         return redirect()->route('loginuser');
//     }
// }
