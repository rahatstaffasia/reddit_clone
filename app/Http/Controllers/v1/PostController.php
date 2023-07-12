<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\CreatePostRequest;
use App\Http\Resources\Post\PostResource;
use App\Http\Resources\Post\PostResourceCollection;
use App\Models\Post;
use App\Traits\CanSendResponses;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostController extends Controller
{
    use CanSendResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $posts = Post::with('user')->paginate(1);
            // dd($posts);
            // return PostResource::collection($posts);
            return $this->sendResponse(new PostResourceCollection($posts), 'Posts retrieved successfully.');
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage(), []);
        }

    }

    /**
     * Display a listing of the resource.
     */
    public function myPosts()
    {
        try {
            $user = user();
            $posts = $user->posts()->paginate(1);
            return $this->sendResponse(new PostResourceCollection($posts), 'Posts retrieved successfully.');
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage(), []);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostRequest $request)
    {
        $user = user();
        $post = $user->posts()->create($request->validated());

        return $this->sendResponse([
            'message' => 'Post created successfully',
            'post' => PostResource::make($post),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post = PostResource::make($post);
        return $this->sendResponse($post, 'Post retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}