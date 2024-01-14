<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class CommonQuestion extends Model
{
    use HasFactory , SearchableTrait;
    protected $guarded = [];

   

    protected $searchable = [
        'columns' => [
            
            'common_questions.title' => 10,
            'common_questions.content' => 10,
        ]
    ];


    protected $casts = [
        'published_on' => 'datetime',
    ];

    public function status(){
        return $this->status ? 'مفعل' : 'غير مفعل';
    }

    public function scopeActive($query){
        return $query->whereStatus(true);
    }
}
