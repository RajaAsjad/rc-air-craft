<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Coupon extends Model
{
    use HasFactory, SoftDeletes;

    public function hasCreatedBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

}
