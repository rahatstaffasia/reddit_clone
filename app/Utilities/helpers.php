<?php



if (!function_exists('user')) {

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

if (!function_exists('should_queue')) {
    /**
     * Check if queue is enabled.
     */
    function should_queue(): bool
    {
        return config('queue.default') != 'sync';
    }
}