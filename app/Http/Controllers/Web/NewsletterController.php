<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\NewsLetter;
use App\Models\User;
use App\Notifications\NewContactNotification;
use App\Notifications\NewsletterNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class NewsletterController extends Controller
{


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'agreement' => 'required',

            ],
            [
                'email.required' => 'Please enter your email address.',
                'email.email' => 'Please enter a valid email address.',
                'agreement.required' => 'You must agree to our terms and conditions.',
            ]
        );

        try {
            // Send newsletter logic here
            DB::beginTransaction();
            $admin = User::role('Admin')->first();

            $newsletter = NewsLetter::create([
                'email' => $request->email,
                'agreement' => $request->agreement ? true : false,
            ]);
            $admin->notify(new NewsletterNotification(
                'New Email Recieved',
                "{$newsletter->email} wants to go with new Trends",
                route('admin.newsletter.index'),
            ));
            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Newsletter subscription successful.'
            ], 200);
        } catch (Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to send newsletter. Please try again later.'
            ], 400);
        }
    }
}
