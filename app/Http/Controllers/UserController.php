<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::all();
        $users = User::withTrashed()->get();

        return view('dashboard.users.index', ['users' => $users]);
        // dd($users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validation = $request->validate([
            'name'      => ['required', 'string', 'min:3', 'max:20'],
            'email'     => ['required', 'email'],
            'mobile'    => ['nullable', 'numeric', 'min:9', 'max:9'],
            'gender'    => ['required', 'in:1,2'],
            'password'  => ['required', 'confirmed', Password::min(6)],
        ]);
        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'mobile'    => $request->mobile,
            'gender'    => $request->gender,
            // 'password'  => Hash::make($request->password),
            'password'  => bcrypt($request->password),
        ]);

        return redirect()->route('users.index');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('dashboard.users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', [ 'user'=> $user]);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        
        $validation = $request->validate([
            'name'      => ['required', 'string', 'min:3', 'max:20'],
            'email'     => ['required', 'email'],
            'mobile'    => ['nullable', 'numeric', 'min:9', 'max:9'],
            'gender'    => ['required'],
        ]);
        // dd($request->gender);
        $user->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'mobile'    => $request->mobile,
            'gender'    => $request->gender,
        ]);
        
        return view('dashboard.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }
    
    
    public function restore(User $user)
    {
        dd('QWERTYUIUTREWQ');
        $user->restore();
        return redirect()->route('users.index');
    }
    
    // change user password
    public function getChangePasswordForm()
    {
      return view('dashboard.users.change-password');
    }

    public function changePassword()
    {
      
    }
}
