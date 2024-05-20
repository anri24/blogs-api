<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Repositories\BlogRepositoryInterface;

class BlogController extends Controller
{
    public function __construct(
        protected readonly BlogRepositoryInterface $repository
    ){}
    public function index()
    {
        return $this->repository->getAll();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        return $this->repository->create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return $this->repository->findById($blog);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        return $this->repository->update($request->validated(),$blog);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        return $this->repository->delete($blog);
    }

    public function getLimited()
    {
        return $this->repository->getLimited();
    }
}
