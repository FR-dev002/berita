<?php

namespace App\Repositories\Repository\Berita;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface BeritaInterface
{
    public function store(array $attributes): Model;

    public function update(array $attributes, int $id);

    public function getAll();
    
    public function getAllPagination() : LengthAwarePaginator;

    public function destroy(int $id);
}