<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Actions\Blog\CreateBlogAction;
use App\Actions\Blog\DeleteBlogAction;
use App\Actions\Blog\UpdateBlogAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Repositories\BlogRepositoryInterface;
use App\Services\BlogService;

class BlogController extends Controller
{
    public function __construct(
        protected readonly BlogRepositoryInterface $repository,
        protected readonly BlogService $service,
    ){}
    public function index()
    {
        return $this->repository->getAll();
    }

    public function show($id)
    {
        return $this->repository->findById($id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateBlogAction $createBlogAction,StoreBlogRequest $request)
    {
        $createBlogAction->execute($request->validated());

        return response()->noContent(201);
    }

    public function update(UpdateBlogAction $updateBlogAction,UpdateBlogRequest $request, $id)
    {
        $updateBlogAction->execute($request, $id);

        return response()->noContent();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteBlogAction $deleteBlogAction,$id)
    {
        $deleteBlogAction->execute($id);

        return response()->noContent(202);
    }

    public function getLimited()
    {
        return $this->repository->getLimited();
    }
}
