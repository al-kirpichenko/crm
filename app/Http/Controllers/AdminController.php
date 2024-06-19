<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {

        return view('admin');
    }

    public function users(){

        $users = User::get()->map(function (User $user) {

            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role->name,
            ];
        });

        return view('users.index')->with(['users' => $users]);
    }

    public function newUser() {

        return view('users.new');
    }

    public function createUser(Request $request) {

        $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'role_id' => 'required',
            'password' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        $user->password = Hash::make($request->password);
        $user->save();


        return redirect()->route('users')->with('success','Новый пользователь успешно создан!');
    }
}
