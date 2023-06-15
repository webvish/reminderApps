<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\UserRegisterRequest;

class LoginController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function loginRequest()
    {
        return view('admin/account.login');
    }

    public function register()
    {
        return view('admin/account.register');
    }

    public function storeRegister(UserRegisterRequest $request)
    {

        $userData = new User();
        $userData->name = $request->name;
        $userData->email = $request->email;
        $userData->password = bcrypt($request->password);
        $userData->save();

        return redirect()->route('login')
        ->withSuccess('You have successfully registered!');
    }

    public function canLogin(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $user = User::where('email', $request->email)->first();

            if($user->is_admin()){
                return redirect()->intended('admin/dashboard');
            }else{
                return redirect()->intended('admin/dashboard');
            }
        }
        return redirect()->back()->with('error', 'Incorrect username & password!');
    }


    public function logout(Request $request) {

        Auth::guard('admin')->logout();
        $request->session()->flush();
        return redirect()->route('login');
    }
}
