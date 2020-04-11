<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
  protected $hidden = [
    'id',
    'created_by',
    'updated_by',
    'deleted_by',
    'deleted_at',
    'pivot'
  ];
}
