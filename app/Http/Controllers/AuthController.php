<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('auth.login');
    }

    public function registration(Request $request)
    {
        return view('auth.registration');
    }

    public function createAccount(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'string'],
            'password' => ['required', 'confirmed'],
        ]);

        $user = new User();
        $user->id = Uuid::uuid4()->toString();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->status = User::USER_STATUS_ACTIVE;
        $user->save();

        $lecturer = new Lecturer();
        $lecturer->id = Uuid::uuid4()->toString();
        $lecturer->name = $request->name;
        $lecturer->user_id = $user->id;
        $lecturer->save();

        $user->markEmailAsVerified();

        Auth::login($user, true);

        return redirect()->route('dashboard');
    }

    public function dashboard(Request $request)
    {
        return view('pages.dashboard');
    }
}
