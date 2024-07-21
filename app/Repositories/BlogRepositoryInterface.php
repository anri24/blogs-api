<?php

namespace App\Repositories;

interface BlogRepositoryInterface
{
    public function getAll();

    public function findById($id);

    public function getLimited();
}
