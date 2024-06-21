<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\like;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class profileController extends Controller
{
    public function index() {
        return view('profile');
    }

    public function updateProfilePicture(Request $request) {
        $request->validate([
            'image' => 'file|image|mimes:jpeg,jpg,png'
        ]);

        $user = Auth::user();
        if ($request->file('image')) {
            if (Auth::user()->image ) {
                Storage::disk('public')->delete($user['image']);
            }
            $user->updateProfileImage($request);
        }

        return redirect()-> route('profile')->with('success', 'Profile Picture Successfully Changed');
    }

    public function liked() {
        $likes = Auth::user()->likes()->with('product')->get();
        return view('liked', [
            'likes' => $likes
        ]);
    }

    public function history() {
        $histories = Auth::user()->orders()->with('product')->get();
        return view('history', [
            'histories' => $histories
        ]);
    }
}
