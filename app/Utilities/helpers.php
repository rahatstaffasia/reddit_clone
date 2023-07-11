<?php

if (!function_exists('user')) {
    /**
     * Get the authenticated user.
     *
     * @return \App\Models\Auth\User
     */
    function user()
    {
        return auth()->user();
    }
}

if (!function_exists('user_id')) {
    /**
     * Get id of current user.
     */
    function user_id(): int|null
    {
        return user()?->id;
    }
}