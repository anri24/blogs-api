<?php

declare(strict_types=1);

namespace App\Actions\Blog;

use App\Repositories\BlogRepositoryInterface;

readonly class DeleteBlogAction
{
    public function __construct(private BlogRepositoryInterface $repository)
    {
    }

    public function execute($id)
    {
        $blog = $this->repository->findById($id);

        $blog->delete();
    }
}
