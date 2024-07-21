<?php

declare(strict_types=1);

namespace App\Actions\Blog;

use App\Http\Requests\StoreBlogRequest;
use App\Models\Blog;

class CreateBlogAction
{
    public function execute(StoreBlogRequest $request)
    {
        Blog::query()->create($request->validated());
    }
}
