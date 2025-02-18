<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreNewUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function index() : View {
        $users = User::where('role','user')->get();
        return view('screens.admin.user-management.index',compact('users'));
    }

    public function show(User $user) : View {
        return view('screens.admin.user-management.detail',compact('user'));
    }

    public function create() : View {
        return view('screens.admin.user-management.create');
    }

    public function store(StoreNewUserRequest $request) {
        // dd($request->all(),$request->sanitized());
        if($request)
        {
            $user = User::create($request->sanitized());
            if($request->hasFile('avatar'))
            {
                $user->addMedia($request->avatar)->toMediaCollection('avatar');
            }
            // dd($user);
            toastr()->success($user->name . ' registered successfully ..!');
            return redirect()->route('admin.users.index');
        }

        toastr()->success('Registration Failed ..!');
        return back();
    }

    public function edit(User $user) : View {
        return view('screens.admin.user-management.edit',compact('user'));
    }

    public function update(UpdateUserRequest $request,User $user) {
        // dd(13);
        if($request->sanitized())
        {
            $user->update($request->sanitized());
            if($request->sanitizedImage())
            {
                $user->addMedia($request->sanitizedImage())->toMediaCollection('avatar');
            }
            // dd(134444);
            toastr()->success($user->name . ' updated successfully ..!');
            return redirect()->route('admin.users.index');
        }

        toastr()->success('Updation Failed ..!');
        return back();
    }
}
