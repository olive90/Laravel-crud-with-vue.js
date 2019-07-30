<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Resources\PostCollection;

class PostController extends Controller
{
    public function store(Request $request){
        $post = new Post([
            'title' => $request->get('title'),
            'body' => $request->get('body')
        ]);
        $post->save();

        return response()->json('success');
    }

    public function index(){
        return new PostCollection(Post::all());
    }

    public function edit($id){
        $post = Post::find($id);
        return response()->json($post);
    }

    public function update($id, Request $request){
        $post = Post::find($id);
        $post->update($request->all());
        return response()->json('Successfully Updated');
    }

    public function delete($id){
        $post = Post::find($id);
        $post->delete();
        return response()->json('Successfully Deleted');
    }
}
