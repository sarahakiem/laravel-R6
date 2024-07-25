<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clacss extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'classes';
    protected $fillable=[
        'className',
        'capacity',
        'is_fulled',
        'price',
        'time_from',
        'time_to',
        'published'
    ];
}
