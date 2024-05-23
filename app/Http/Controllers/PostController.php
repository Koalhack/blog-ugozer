<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    // Posts
    public function getPosts(Request $request, ?string $id = null)
    {
        $paginatelimit = intval($request->query('limit')) ?: 10;
        if ($id != null) {
            return PostResource::collection(Post::orderBy('id', 'DESC')->where('category_id', $id)->paginate($paginatelimit));
        }
        return PostResource::collection(Post::orderBy('id', 'DESC')->paginate($paginatelimit));
    }

    public function getPost(string $id)
    {
        $post = Post::where('id', $id)->first();
        if ($post) {
            return new PostResource(Post::findOrFail($id));
        }
        return Response::json(['state' => 'error', 'error' => 'Post not found!']);
    }

    public function createPost(Request $request)
    {
        $validators = Validator::make($request->all(), [
            'title' => 'required',
            'category' => 'required',
            'content' => 'required'
        ]);

        if ($validators->passes()) {
            Post::create([
                'title' => $request->input('title'),
                'slug' => $request->input('slug') ?: Str::slug($request->input('title')),
                'category_id' => $request->input('category'),
                'image_id' => $request->input('image'),
                'content' => $request->input('content'),
            ]);
            return Response::json(['state' => 'success', 'success' => 'Post created successfully']);
        }

        return Response::json(['state' => 'error', 'error' => $validators->getMessageBag()->toArray()]);
    }

    public function updatePost(Request $request, string $id)
    {
        $validators = Validator::make($request->all(), [
            'title' => 'required',
            'category' => 'required',
            'content' => 'required'
        ]);

        if ($validators->passes()) {
            $post = Post::where('id', $id)->first();
            if ($post) {
                $post->update([
                    'title' => $request->input('title'),
                    'slug' => $request->input('slug') ?: Str::slug($request->input('title')),
                    'category_id' => $request->input('category'),
                    'image_id' => $request->input('image'),
                    'content' => $request->input('content'),
                ]);
                return Response::json(['state' => 'success', 'success' => 'Post updated successfully']);
            }
            return Response::json(['state' => 'error', 'error' => 'Post not found!']);
        }

        return Response::json(['state' => 'error', 'error' => $validators->getMessageBag()->toArray()]);
    }

    public function deletePost(string $id)
    {
        $post = Post::where('id', $id)->first();
        if ($post) {
            $post->delete();
            return Response::json(['state' => 'success', 'success' => 'Post deleted successfully']);
        }
        return Response::json(['state' => 'error', 'error' => 'Post not found!']);
    }
}
