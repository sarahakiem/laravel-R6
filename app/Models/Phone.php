<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;
    protected $fillable=[
        'phone_num',
        
    ];

    public function student() {
        return $this->hasOne(Student::class);
    }
}
