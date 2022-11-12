<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vendor extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'address', 'collection_point_1', 'collection_point_2', 'collection_point_3', 'city', 'state', 'country', 'pincode', 'mobile', 'email', 'status', 'created_at', 'updated_at'];
}
