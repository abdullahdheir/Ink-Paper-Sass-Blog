<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'nullable|string|max:50|unique:users,username,' . $request->user()->id,
            'bio' => 'nullable|string|max:500',
            'website' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'avatar' => 'nullable|image|max:5120', // 5MB max
        ]);

        $user = $request->user();

        if ($request->hasFile('avatar')) {
            if ($user->avatar_path) {
                Storage::disk('public')->delete($user->avatar_path);
            }
            $validated['avatar_path'] = $request->file('avatar')->store('avatars', 'public');
        }
        
        unset($validated['avatar']); // Ensure we don't try to save the uploaded file instance

        $user->update($validated);

        return back()->with('status', 'profile-updated');
    }
}
