<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Alert;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->keyword;
        if($search){
            $data = User::with('role')
                        ->join('roles', 'users.role_id', '=', 'roles.id')
                        ->where('name', 'LIKE', "%{$search}%")
                        ->orWhere('email', 'LIKE', "%{$search}%")
                        ->orWhere('roles.role_name', 'LIKE', "%{$search}%")
                        ->paginate(10);
        } else {
            $data = User::with(['role'])->paginate(10);
        }

        return view('admin.user.index', [
            'active' => 'users',
            'title' => 'Users',
            'data' => $data,
        ]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $data = User::where('id',$id)->first();
        return view('admin.user.edit', [
            'active' => 'users',
            'title' => 'Edit User',
            'data' => $data,
            'roles' => Role::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = User::where('id',$id)->first();

        $validated = $request->validate([
            'name' => 'required',
            'role_id' => 'required',
        ]);

        $update = [
            'name' => $request->name,
            'role_id' => $request->role_id,
            'active' => $request->active,
            'updated_at' => now(),
        ];
        User::where('id', $id)->update($update);
        Alert::success('Congrats', 'You\'ve Update a User!');
        return redirect('admin/user');
    }

    public function reset($id)
    {
        $update = [
            'password' => bcrypt('123456'),
            'updated_at' => now(),
        ];
        User::where('id', $id)->update($update);
        Alert::success('Congrats', "You're new Password is '123456'");
        return redirect('admin/user');
    }

    public function destroy($id)
    {
        //
    }
}
