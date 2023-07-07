<?php

namespace App\Http\Controllers;

use App\Jobs\Post\CreatePost;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // $response = $this->ajaxDispatch(new CreatePost($request));

        // if ($response['success']) {
        //     $response['redirect'] = route('accounts.show', $response['data']->id);

        //     $message = trans('messages.success.added', ['type' => trans_choice('general.accounts', 1)]);

        //     flash($message)->success();
        // } else {
        //     $response['redirect'] = route('accounts.create');

        //     $message = $response['message'];

        //     flash($message)->error()->important();
        // }

        // return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
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