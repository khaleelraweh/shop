<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;


class Slider extends Model
{
    use HasFactory ,Sluggable , SearchableTrait , SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'start_date' => 'datetime',
        'expire_date' => 'datetime',
        'published_on' => 'datetime',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $searchable = [
        'columns' => [
            'sliders.title' => 10,
        ]
    ]; 

    public function status(){
        return $this->status ? 'مفعل' : "غير مفعل";
    }

    // public function featured(){
    //     return $this->featured ? 'نعم' : "لا";
    // }

    // public function scopeFeatured($query){
    //     return $query->whereFeatured(true);
    // }

    public function scopeActive($query){
        return $query->whereStatus(true);
    }

   
    // not working now because there is no categories for sliders
    public function scopeActiveCategory($query){
        return $query->whereHas('category',function($query){
            $query->whereStatus(1) ;
        });
    }

    // To check if this slider is main or not 
    public function scopeMainSliders($query){
        return $query->whereSection(1);
    }

    // to check if this slider is advertisorsliders or not 
    public function scopeAdvertisorSliders($query){
        return $query->whereSection(2);
    }

     // to get only first one media elemet
     public function firstMedia(): MorphOne{
        return $this->MorphOne(Photo::class, 'imageable')->orderBy('file_sort','asc');
    }
    
    // one product may have more than one photo
    public function photos():MorphMany
    {
        return $this->morphMany(Photo::class, 'imageable');
    }


    public function tags():MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
    
}
