<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Repositories\BlogRepositoryInterface;
use App\Services\BlogService;
use Illuminate\Http\UploadedFile;

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

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        return $this->service->create($request, $this->repository);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->repository->findById($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, $id)
    {
        return $this->service->update($request,$this->repository, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->repository->delete($id);
    }

    public function getLimited()
    {
        return $this->repository->getLimited();
    }
}
