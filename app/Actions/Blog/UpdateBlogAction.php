<?php

declare(strict_types=1);

namespace App\Actions\Blog;

use App\Http\Requests\UpdateBlogRequest;
use App\Repositories\BlogRepository;
use App\Repositories\BlogRepositoryInterface;

readonly  class UpdateBlogAction
{
    public function __construct(private BlogRepositoryInterface $repository)
    {
    }

    public function execute(UpdateBlogRequest $request, $id)
    {
        $blog = $this->repository->findById($id);

        $blog->update($request->validated());
    }
}
