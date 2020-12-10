<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements EloquentRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;


    /**
     * @desc Base Repository Counstructor
     * @param Model $model
     */
     
     public function __construct(Model $model)
     {
         $this->model = $model;
     }
}
