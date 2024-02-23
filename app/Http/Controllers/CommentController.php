<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
}


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{ 
    public function liker(Post $post, Request $request){
        $liker = Like::where('user_id', auth()->user()->id)->where('post_id', $request->get('post_id'))->first();
        if ($liker == null) {
            $liker = $post->likes()->create([
                'user_id' => request()->user()->id,
            ]);
            $liker->save();
            return ["action" => 'liked', $liker];
        }
        else {
            $liker->delete();
            return ["action" => 'unlike'];
        }
        return back();
        } 

}

?>
