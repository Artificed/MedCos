<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function getProfilePage() {
        return view('profile');
    }

    public function updateProfile(Request $request) {

        $request->validate([
            'image_upload' => 'mimes:png,jpg|max:10000',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $user = User::find(Auth::user()->id);

        $user->update([
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        if($request->image_upload) {

            if($user->image != 'default_pfp.png') {
                Storage::delete('public/images/' . $user->image);
            }

            $path = $request->file('image_upload')->store('images','public');
            $path = str_replace('images/', '', $path);
            $user->update([
                'image' => $path,
            ]);
        }

        return redirect()->back();
    }
}
