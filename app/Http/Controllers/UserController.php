<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); 
        return view('user.index', compact('users'));
    }

    public function add()
    {
        return view('user.form');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.form', ['user' => $user]);
    }

    public function save(Request $request)
    {
        $data = $request->only([
            'name','gender','phone_number','address', 'email', 'password','role'
        ]);

        $user = User::create($data);

        return redirect()->route('user.index');
    }

    public function update($id, Request $request)
    {
        $data = $request->only([
            'name', 'email', 'password', 'role','phone_number','gender','address'
        ]);

        // Find the user to update
        $user = User::findOrFail($id);

        // Update user information
        $user->update($data);

        return redirect()->route('user.index');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index');
    }
    public function search(Request $request)
{
    $searchTerm = $request->input('search');

    $users = User::where('name', 'LIKE', "%$searchTerm%")
                 ->orWhere('email', 'LIKE', "%$searchTerm%")
                 ->orWhere('phone_number', 'LIKE', "%$searchTerm%")
                 ->orWhere('address', 'LIKE', "%$searchTerm%")
                 ->paginate(10);

    return view('users.search-results', compact('users', 'searchTerm'));
}

}
