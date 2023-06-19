<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
class UserController extends Controller
{

    public function index()
    {
        $users = DB::table('users')->get();
        return view('users.index', compact('users'));
    }

    public function show($user)
    {
        try {
            $user = User::findOrFail($user);
            return view('users.show', compact('user'));
        } catch (ModelNotFoundException $e) {
            return abort(404);
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = User::create($validatedData);

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }


}

