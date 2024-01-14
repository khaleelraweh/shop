<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

class Tag extends Model
{
    use HasFactory , Sluggable , SearchableTrait , SoftDeletes;

    protected $guarded = [];


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $searchable = [
        'columns' => [
            // tableName.fieldName => priority
            'tags.name' => 10,
        ]
    ]; 



    public function status(){
        return $this->status ? 'مفعل' : "غير مفعل";
    }

    public function products(): MorphToMany{
        return $this->morphedByMany(Product::class,'taggable');
    }

}
