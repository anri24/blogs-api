<?php

namespace App\Repositories;

interface BlogRepositoryInterface
{
    public function getAll();

    public function findById($id);

    public function create($data);

    public function update($data,$id);

    public function delete($id);

    public function getLimited();
}
