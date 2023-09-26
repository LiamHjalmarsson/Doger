<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::select('id', 'username', 'email', 'avatar')->get();

        return view("User.index", ["users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(("User.create"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'avatar' => 'sometimes|image',
        ]);
        
        if ($request->has("avatar")) {
            $filename = $request["username"] . "-" . uniqid() . ".jpg";
    
            $imageData = Image::make($request->file("avatar"))->fit(240)->encode("jpg");
            Storage::put("public/avatars/" . $filename, $imageData); 
            $data["avatar"] = $filename;
        }

        $user = User::create($data);

        auth()->login($user);
        
        return redirect()->route("user.show", ["user" => $user])->with("success", "User created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view("User.show", ["user" => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view("User.edit", ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            "username" => "sometimes",
            "description" => "sometimes",
        ]);

        $user->update([
            "username" => $request->input("username"),
            "description" => $request->input("description"),
        ]);

        return back()->with("success", "user updated successfully");
    }

    public function avatarUpdate (Request $request, User $user) {
        $request->validate([
            "avatar" => "sometimes",
        ]);

        if ($request->hasFile("avatar")) {
            $oldAvatar = $user->avatar;

            $filename = $request["username"] . "-" . uniqid() . ".jpg";
            $imageData = Image::make($request->file("avatar"))->fit(120)->encode("jpg");
    
            Storage::put("public/avatars/" . $filename, $imageData); 
            $data["avatar"] = $filename;

            $user->update(["avatar" => $filename ]);

            if ($oldAvatar != "/fallback-avatar.jpg") {
                Storage::delete(str_replace("/storage/", "public/", $oldAvatar));
            }
        }

        return back()->with("success", "user updated successfully");
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect("/")->with("success", "User deleted successfully");
    }
}
