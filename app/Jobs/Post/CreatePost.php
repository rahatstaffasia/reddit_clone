<?php

namespace App\Jobs\Post;

use App\Abstracts\Job;
use App\Interfaces\Job\ShouldCreate;
use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreatePost extends Job implements ShouldCreate
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        \DB::transaction(function () {
            $this->model = Post::create($this->request->all());

            // Set default account
            if ($this->request['default_account']) {
                setting()->set('default.account', $this->model->id);
                setting()->save();
            }
        });

        // return $this->model;
    }
}