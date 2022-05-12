<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hasCreatedBy()
    {
        return $this->hasOne(user::class, 'id', 'created_by');
    }


}
