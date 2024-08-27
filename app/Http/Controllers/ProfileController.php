<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     *
     * @param Request $request
     * @return Response
     */
    public function edit(Request $request): Response
    {
        // Display the user's profile form
        return Inertia::render('Profile/Edit', [
            // Whether the user must verify their email address
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,

            // The status message from the session
            'status' => session('status'),
        ]);
    }

    /**
     * Update the user's profile information.
     *
     * This method is invoked when the user submits the profile edit form.
     * It validates the request data, updates the user's profile, and
     * redirects the user back to the profile edit page. If the user's
     * email address has changed, this method sets the email_verified_at
     * timestamp to null, so that the user is forced to re-verify their
     * email address.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Validate the request data
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
        ]);

        // Update the user's profile information
        $request->user()->fill($request->validated());

        // If the user's email address has changed, set the email_verified_at
        // timestamp to null, so that the user is forced to re-verify their
        // email address
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // Save the user's profile changes
        $request->user()->save();

        // Redirect the user back to the profile edit page
        return Redirect::route('profile.edit');
    }

    /**
     * Delete the user's account.
     *
     * This method is invoked when the user submits the account deletion form.
     * It validates the request data, logs the user out, deletes the user's
     * account, and redirects the user back to the login page.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Validate the request data
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        // Get the current user
        $user = $request->user();

        // Log the user out
        Auth::logout();

        // Delete the user's account
        $user->delete();

        // Invalidate the session and regenerate the session token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect the user back to the login page
        return Redirect::to('/');
    }
}
