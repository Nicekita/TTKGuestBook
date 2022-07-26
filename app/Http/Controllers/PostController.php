<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Post;
use App\Models\User;
use App\Events\PostUpdate;
class PostController extends Controller
{
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'text' => 'required|max:255',
            'is_guest'=> 'required'
        ]);
        $post = new Post;
        $post->text=$request->text;
        if(!$request->is_guest)
        {
        $post->user_id=Auth::id();
        }
        $post->save();
        broadcast(new PostUpdate());
        return redirect()->intended(RouteServiceProvider::HOME);;
    }

    public function paginatePosts(){
        $paginated=Post::paginate(9);
        $paginated->getCollection()->transform(function($post){
            if($post->user_id)
            $post->username=User::find($post->user_id)->name;
            else $post->username="Anonymous";
            return $post;
            
        });
        return response()->json($paginated);
    }


    public function viewPost(Request $request){
        return Post::find($request->id);
    }

    public function updatePost(Request $request)
    {
        $post = Post::find($request->route('id'));
        $validated = $request->validate([
            'text' => 'required|max:255',
        ]);
        if (Auth::check()){
            if (Auth::user()->is_admin||Auth::id()==$post->user_id) 
            $post->update(['text'=>$request->text]);
            broadcast(new PostUpdate());
        }     
        return redirect()->intended(RouteServiceProvider::HOME);
    }
    public function deletePost(Request $request)
    {
        $post = Post::find($request->route('id'));
        if (Auth::check()){
            if (Auth::user()->is_admin||Auth::id()==$post->user_id) 
            $post->delete();
            broadcast(new PostUpdate());
        }        
        return;
    }
}
