<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }
    
    public function update($userId)
    {
        $user = User::find($userId);

        // Check if the user exists and is not an admin
        if ($user && $user->role !== 'admin') {
            if ($user->is_banned) {
                // Unban the user
                $user->is_banned = false;
                $user->restore(); // Restore the soft-deleted user
            } else {
                // Ban the user
                $user->is_banned = true;
                $user->delete(); // Soft delete the user
            }
        }

    return back();

    }
}
