<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize("viewAny", User::class);

        $users = User::all();
        return view("User.index", ["users" => $users]);
    }

    public function create()
    {
        $this->authorize("create", User::class);

        return view(("User.create"));
    }

    public function store(Request $request)
    {
        $this->authorize("create", User::class);

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

    public function show(User $user)
    {
        $this->authorize("view", $user);

        $currentlyFollow = 0;

        if (auth()->check()) {
            $currentlyFollow = Follow::where([
                ['user_id', auth()->user()->id],
                ['followeduser', $user->id],
            ])->count();
        }

        return view("User.show", ["user" => $user, "currentlyFollow" => $currentlyFollow, "follows" => $user->followers()->count(), "following" => $user->following()->count() ]);
    }

    public function edit(User $user)
    {
        $this->authorize("update", $user);
        return view("User.edit", ["user" => $user]);
    }

    public function update(Request $request, User $user)
    {
        $this->authorize("update", $user);

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
        $this->authorize("update", $user);

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

    public function destroy(User $user)
    {
        $this->authorize("delete", $user);

        $user->delete();
        return redirect("/")->with("success", "User deleted successfully");
    }
}
