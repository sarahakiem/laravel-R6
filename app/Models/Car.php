<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Car extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=[
        'carTable',
        'description',
        'price',
        'published',
        'cat_id',
        'image'
    ];
    public function category() {
        return $this->belongsTo(Category::class,'cat_id');
    }
}
