<?php

namespace App\Repositories;

use App\Interfaces\AuthRepositoryInterface;
use App\Models\Role;
use App\Models\User;
use App\Notifications\NewRegistrationNotification;
use App\Services\OtpService;
use App\Traits\HasAuth;
use Exception;

class AuthRepository implements AuthRepositoryInterface
{
    use HasAuth;

    public function registerByEmailPassword(array $data, $remember = false)
    {
        // dd(request()->has('avatar'));
        try {
            $user = User::create($data);
            $admin = User::role('Admin')->first();

            if ($user) {
                if (request()->has('avatar')) {
                    $user->addMedia(request()->avatar, 'avatar');
                }
                $credentials = [
                    'email' => $data['email'],
                    'password' => $data['password']
                ];
                $this->authenticate($credentials, $remember);
                if (str_contains(url()->previous(), 'vendor')) {
                    $role = Role::where('name', 'Vendor')->first();
                    $user->roles()->sync($role->id);
                    $user->update(['status' => 'pending']);
                    $admin->notify(new NewRegistrationNotification(
                        "New Vendor Registered",
                        "Vendor's Name: {$user->first_name} and Store Name: {$user->business_name}",
                        route('admin.vendors.index'),
                    ));
                } else {
                    $role = Role::where('name', 'User')->first();
                    $user->roles()->sync($role->id);
                    $user->update(['status' => 'approved']);
                    $admin->notify(new NewRegistrationNotification(
                        "New User Registered",
                        "User's Full Name: {$user->first_name} {$user->last_name}",
                        route('admin.users.index'),
                    ));
                }
                if (!empty($data['category'])) {
                    auth()->user()->categories()->sync($data['category']);
                }
            }
            return response([
                'success' => true,
                'message' => 'Registered Successfully',
                'user' => $user,
            ]);
        } catch (Exception $e) {

            return response([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function registerByUserNamePassword(array $data, $remember)
    {
        $user = User::create($data);
        if ($user) {
            $credentials = [
                'user_name' => $data['user_name'],
                'password' => $data['password']
            ];
            $this->authenticate($credentials, $remember);
        }
    }

    public function registerByPhonePassword(array $data, $remember)
    {
        $user = User::create($data);
        if ($user) {
            $credentials = [
                'phone' => $data['phone'],
                'password' => $data['password']
            ];
            $this->authenticate($credentials, $remember);
        }
    }

    public function registerByOtp(array $data, $remember, $via = ['phone'], $expiry, $length = 6)
    {
        try {


            $otp = OtpService::generateOtp($length);
            $otp_expires_at = OtpService::generateOtpExpiry($expiry);
            $data['otp'] = $otp;
            $data['otp_expires_at'] = $otp_expires_at;
            $user = User::where('phone', $data['phone'])->orWhere('email', $data['email'])->first();
            if ($user) {
                $user->update(['otp' => $otp, 'otp_expires_at' => $otp_expires_at]);
            } else {
                $user = User::create($data);
            }

            (new OtpService())->sendOtp($otp, $data['phone'], $data['email'], $via, $expiry);
            // (new OtpService())->sendOtp($otp, $data['phone'], $data['email'], $via, $expiry);
            return response([
                'success' => true,
                'message' => 'Otp sent successfully',
                'user' => $user,
            ]);
        } catch (Exception $e) {
            return response([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
