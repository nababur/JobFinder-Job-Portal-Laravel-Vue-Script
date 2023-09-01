<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmployerRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function employerRegister(Request $request)
    {


        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cname'=> 'required|unique:companies,cname|max:50',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        $user =  User::create([
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'user_type' => request('user_type'),
            'status' => '1',
        ]);


        Company::create([
            'user_id'=>$user->id,
            'cname'=> request('cname'),
            'slug'=> Str::slug(request('cname'))
        ]);

        $user->sendEmailVerificationNotification();

        return redirect()->back()->with('message', 'A verification link is sent to your email. Please follow the link to verify it.');
    }


}
