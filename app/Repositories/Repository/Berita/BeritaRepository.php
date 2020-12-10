<?php

namespace App\Repositories\Repository\Berita;


use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Repository\Berita\BeritaInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\Berita;


class BeritaRepository extends BaseRepository implements BeritaInterface
{
    public function __construct(Berita $model)
    {
        parent::__construct($model);
    }   

    public function store(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    public function update(array $attributes, int $id)
    {
        return $this->model->where('id', $id)->update($attributes);
    }

    public function getALl()
    {
        return $this->model->with(['categories', 'tags'])->get();
    }

    public function getAllPagination(): LengthAwarePaginator 
    {
        return $this->model->with(['categories', 'tags'])->paginate(5);
    }

    public function destroy(int $id)
    {
        $this->model->find($id)->delete();
    }

}