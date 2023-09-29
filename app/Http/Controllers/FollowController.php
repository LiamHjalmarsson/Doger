<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function userFollowers (User $user) {
        $currentlyFollowing = 0;
        
        if (auth()->check()) {
            $currentlyFollowing = Follow::where([["user_id", "=", auth()->user()->id], ["followeduser", "=", $user->id]])->count();
        }

        return view('User.Follow.followers', [
            "user" => $user, 
            "currentlyFollowing" => $currentlyFollowing,
            "followers" => $user->followers()->latest()->get(),
            "follows" => $user->followers()->count(),
            "following" => $user->following()->count()
        ]);
    }

    public function userFollowing (User $user) {
        $currentlyFollowing = 0;
        
        if (auth()->check()) {
            $currentlyFollowing = Follow::where([["user_id", "=", auth()->user()->id], ["followeduser", "=", $user->id]])->count();
        }

        return view('User.Follow.following', [
            "user" => $user, 
            "currentlyFollowing" => $currentlyFollowing,
            "followings" => $user->following()->latest()->get(),
            "follows" => $user->followers()->count(),
            "following" => $user->following()->count()
        ]);
    }

    public function store(User $user)
    {
        if ($user->id == auth()->user()->id) {
            return back()->with("failure", "Cant follow yourself");
        }
    
        $followCheck = Follow::where([
            ["user_id", "=", auth()->user()->id], ["followeduser", "=", $user->id]
        ])->count();

        if ($followCheck) {
            return back()->with("failure", "Already following this user");
        }
    
        $newFollow = new Follow;
        
        $newFollow->user_id = auth()->user()->id;
        $newFollow->followeduser = $user->id;
    
        $newFollow->save();
    
        return back()->with("success", "User successfully followed");
    }

    public function destroy(User $user)
    {
        Follow::where([["user_id", "=", auth()->user()->id], ["followeduser", "=", $user->id]])->delete();
        return back()->with("success", "User successfully unfollowed");
    }
}
