<?php

namespace App\Services;

class BlogService
{

    public function __construct(
        protected readonly ImageService $imageService,
    ){}


    public function create($request, $repository)
    {
        $validate = $request->validated();
        $validate['image'] = $this->imageService->UploadImage($request, 'images/', 'image');

        return $repository->create($validate);
    }

    public function update($request,$repository,$id)
    {
        $validate = $request->validated();
        $validate['image'] = $this->imageService->UploadImage($request, 'images/', 'image');

        return $repository->update($validate,$id);
    }
}
