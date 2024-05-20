<?php

namespace App\Repositories;

use App\Models\Blog;

class BlogRepository implements BlogRepositoryInterface
{
    public function __construct(
        protected readonly Blog $model
    ){}

    public function getAll()
    {
        return $this->model::query()->orderBy('id','DESC')->get();
    }

    public function findById($id)
    {
        return $this->model::query()->findOrFail($id);
    }

    public function create($data)
    {
        return $this->model::create($data);
    }

    public function update($data, $id)
    {
        return $this->findById($id)->update($data);
    }

    public function delete($id)
    {
        return $this->findById($id)->delete();
    }

    public function getLimited()
    {
        return $this->model::query()->orderBy('id','DESC')->limit(10)->get();
    }
}
