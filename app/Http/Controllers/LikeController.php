<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{ 
    public function liker(Request $request){
        $post = Post::find($request->get('post_id'));
        $liker = Like::where('user_id', Auth::id())->where('post_id', $request->get('post_id'))->first();
        if ($liker == null) {
            $liker = new Like();
            $liker->post_id = $request->get('post_id');
            $liker->user_id = Auth::id();
            $liker->save();
            return ["action"=> 'liked', "reaction" => $liker];
        }
        else {
            $liker->delete();
            return ["action"=> 'unlike'];
        }
        return back();
    }
}