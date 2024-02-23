<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerPage()
    {
        $categories = Categorie::all();

        return view('authentifcation.register')->with("categories",$categories);
    }
    public function registerPost(Request $request)
    {
        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser) {
            return back()->with('error', 'Email already exists. Please use a different email address.');
        }
    
        if (strlen($request->password) < 8) {
            return back()->with('error', 'Password should be at least 8 characters long.');
        }
        if (!preg_match('/[A-Z]/', $request->password) || !preg_match('/[0-9]/', $request->password)) {
                return back()->with('error', 'Password should contain at least one uppercase letter and one number.');
            }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->tel = $request->tel;
        $user->city = $request->city;
        $user->street = $request->street;
        $user->state = $request->state;
        $user->zip_code = $request->zip_code;

        
        $user->password = Hash::make($request->password);



       $newname =uniqid();
        $image = $request ->file('userPhoto');
        if($image){
            $newname.="." .$image -> getClientOriginalExtension();
            $destinationPath = "Uploads";
            $image -> move ($destinationPath ,$newname);

            $user ->photo = $newname;
        }
        
        $user->save();
        return redirect()->route('login')->with('successRegister', 'Register successfuly');
    }

    public function loginPage()
    {
        
        $categories = Categorie::all();
        return view('authentifcation.login')->with("categories",$categories);
    }


    public function loginPost(Request $request)
    {

        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credetials)) {
            return redirect('/home')->with('success', 'login success');
        }

        return back()->with('error', 'error Email or password');
    }


    public function logout()
    {
        $categories = Categorie::all();

        Auth::logout();

        return redirect()->route('login')->with("categories",$categories);
    }
}


