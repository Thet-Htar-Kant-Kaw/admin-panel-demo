<?php

namespace App\Http\Controllers;

use App\Models\UserBase;
use Illuminate\Http\Request;

class UserBaseController extends Controller
{
    public function index()
    {
        // Retrieve all data from the user_base table
        $users = UserBase::all(); // Or use paginate() for pagination: UserBase::paginate(10);

        // Return the Blade view with the data
        return view('index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user_bases,email',
            'msisdn' => 'required|string|max:15',
            'company' => 'nullable|string|max:255',
            'role' => 'required|string|max:255',
        ]);

        UserBase::create([
            'name' => $request->name,
            'email' => $request->email,
            'msisdn' => $request->msisdn,
            'company' => $request->company,
            'role' => $request->role,
        ]);
        
        return redirect()->route('home');
        // return redirect()->back()->with('success', 'User created successfully!');
    }

    public function edit($id)
    {
        $user = UserBase::find($id);

        return view('edit', compact('user'));
        // return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'msisdn' => 'required|string|max:15',
            'company' => 'nullable|string|max:255',
            'role' => 'required|string|max:255',
        ]);

        UserBase::where('id', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'msisdn' => $request->msisdn,
            'company' => $request->company,
            'role' => $request->role,
        ]);

        return redirect()->route('home');
        // return redirect()->back()->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {
        UserBase::destroy($id);

        return redirect()->route('home');
    }
}
