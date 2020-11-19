<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;

class UserAuthController extends Controller
{
    public function login() {
      return view('auth.login');
    }

    public function register() {
        return view('auth.register');
    }


    public function create(Request $request) {
        $request->validate([
            'first' => 'required|min:3|max:50',
            'last' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users',
            'password' => ['required',
                           'min:6',
                           'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/',
                           ],
            'password2' => 'required|same:password',
            'terms' => 'required',
        ]);

        $user = new User;
        $user->first = $request->first;
        $user->last = $request->last;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->password2 = Hash::make($request->password2);
        $query = $user->save();

        $role = Role::select('id')->where('name', 'user')->first();
        $user->roles()->attach($role);

        if ($query) {
            return back()->with('success', "You have been successfuly registered!");
        }
        else {
            return back()->with('fail', 'Something went wrong...');
        }
    }


    public function check(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => ['required',
                           'min:6',
                           'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/',
                           ]
        ]);

        $user = User::where('email', '=', $request->email)->first();
        if ($user) {
            if(Hash::check($request->password, $user->password)) {
                $request->session()->put('LoggedUser', $user->id);
                if ($user->hasRole('admin')) {
                    return redirect(route('admin.users.index'));
                }
                return redirect('profile');
            }
            else {
                return back()->with('fail', 'The password you just entered is incorrect. Please try again.');
            }
        }
        else {
            return back()->with('fail', 'There are no accounts registered with this email.');
        }
    }


    public function profile() {

        if (session()->has('LoggedUser')) {
            $user = User::whereId(session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo' => $user,
            ];
        }
        return view('admin.profile', $data);
    }

    public function logout() {
        if (session()->has('LoggedUser')) {
            session()->pull('LoggedUser');
            return redirect('login');
        }
    }

    // public function redirectTo() {
    //     if (Auth::user()->hasRole('admin')) {
    //         return view('admin.users.index');
    //     }
    //     else {
    //         return redirect('/profile');
    //     }
    // }
    public function showCond() {
      return view('termsnconds');
    }

    public function showPrivacy() {
        return view('privacypoli');
    }

}
// 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/',
// 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'
