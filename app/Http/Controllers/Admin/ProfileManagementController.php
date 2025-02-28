<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateProfileRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ProfileManagementController extends Controller
{
    public function index()
    {
        return view('screens.admin.profile.index');
    }

    public function update(UpdateProfileRequest $request)
    {
        // dd($request->sanitized());
        try {
            DB::beginTransaction();
            auth()->user()->update($request->sanitized());
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Profile updated successfully',
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to update profile',
            ]);
        }
    }


    public function updatePassword(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            throw ValidationException::withMessages([
                'current_password' => ['The provided password does not match your current password.'],
            ]);
        }

        try {
            DB::beginTransaction();
            $user->password = Hash::make($request->password);
            $user->save();
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Password updated successfully',
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to update password',
            ]);
        }
    }


    public function updateImage(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        $user = Auth::user();

        try {
            DB::beginTransaction();
            $user->addMedia($request->avatar, 'avatar');
            // $user->clearMediaCollection('avatar');

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Profile picture updated successfully',
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to update profile picture',
            ]);
        }
    }
}
