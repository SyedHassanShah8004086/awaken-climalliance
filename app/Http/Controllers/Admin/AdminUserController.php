<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id')->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function makeAdmin(User $user)
    {
        $user->update(['is_admin' => true]);
        return redirect()->back()->with('success', $user->name . ' is now an admin!');
    }

   public function removeAdmin(User $user)
{
    // Debug - log the request
    \Log::info('Remove admin request received for user ID: ' . $user->id);
    \Log::info('Current is_admin value: ' . $user->is_admin);
    
    // Perform the update
    $user->update(['is_admin' => false]);
    
    // Log after update
    \Log::info('After update - is_admin value: ' . $user->fresh()->is_admin);
    
    return redirect()->back()->with('success', $user->name . ' is no longer an admin.');
}

public function destroy(User $user)
{
    // Prevent deleting yourself
    if ($user->id === auth()->id()) {
        return redirect()->back()->with('error', 'You cannot delete your own account.');
    }
    
    $user->delete();
    return redirect()->back()->with('success', 'User deleted successfully!');
}

}