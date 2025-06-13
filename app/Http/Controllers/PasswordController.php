<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PasswordController extends Controller
{
    //
    // changePassword Ajax request

    public function changePassword(Request $request)
    {
        Log::info('Change password request received');
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:1', // 'confirmed' expects new_password_confirmation
        ]);

        $user = auth()->user();

        if (!password_verify($request->current_password, $user->password)) {
            Log::error('Current password does not match for user ID: ' . $user->id);
            return response()->json(['errors' => [
                'current_password' => ['Current password is incorrect.']
            ]], 422);
        }

        $user->password = bcrypt($request->new_password);
        $user->save();

        return response()->json(['status' => 'success', 'message' => 'Password changed successfully.']);
    }
}
