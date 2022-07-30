<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Alert;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.role.index', [
            'active' => 'role',
            'title' => 'Role',
            'data' => Role::paginate(10),
        ]);
    }

    public function create()
    {
        return view('admin.role.add', [
            'active' => 'role',
            'title' => 'Add Role',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'role_name' => 'required|unique:roles,role_name',
        ]);

        Role::insert($validated);
        Alert::success('Congrats', 'You\'ve Add New Role!');
        return redirect('admin/role');
    }

    public function edit($id)
    {
        return view('admin.role.edit', [
            'active' => 'role',
            'title' => 'Edit Role',
            'data' => Role::where('id',$id)->first(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Role::where('id',$id)->first();

        if($data->role_name != $request->role_name){
            $validated = $request->validate([
                'role_name' => 'required|unique:roles,role_name',
            ]);
        }
        $update = [
            'role_name' => $request->role_name,
            'updated_at' => now(),
        ];
        Role::where('id', $id)->update($update);
        Alert::success('Congrats', 'You\'ve Update a Role!');
        return redirect('admin/role');
    }

    public function destroy($id)
    {
        Role::where('id', $id)->delete();
        User::where('role_id', $id)->delete();
        Alert::success('Congrats', 'You\'ve Deleted a Role!');
        return redirect('admin/role');
    }
}
