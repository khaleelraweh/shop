<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
{
    use HasFactory ,Sluggable , SearchableTrait ;

    protected $guarded = [];

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
            'products.name' => 10,
        ]
    ]; 


    public function status(){
        return $this->status ? 'مفعل' : "غير مفعل";
    }

    public function featured(){
        return $this->featured ? 'Yes' : "No";
    }

    public function scopeFeatured($query){
        return $query->whereFeatured(true);
    }

    public function scopeActive($query){
        return $query->whereStatus(true);
    }

    public function scopeHasQuantity($query){
        return $query->where('quantity','>=',-1);
    }

    public function scopeActiveCategory($query){
        return $query->whereHas('category',function($query){
            $query->whereStatus(1) ;
        });
    }

    public function scopeProductCategory($query){
        return $query->whereHas('category',function($query){
            $query->whereSection(1); //means any product 
        });
    }

    public function scopeCardCategory($query){
        return $query->whereHas('category',function($query){
            $query->whereSection(2); //only product whoes section is 1 means card product 
        });
    }

    public function category(){
                                                    //   foreign_key_of this , primary key of productCategory
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }


    // to get only first one media elemet
    public function firstMedia(): MorphOne{
        return $this->MorphOne(Photo::class, 'imageable')->orderBy('file_sort','asc');
    }

    public function lastMedia(): MorphOne{
        return $this->MorphOne(Photo::class, 'imageable')->orderBy('file_sort','desc');
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

    public function reviews():HasMany{
        return $this->hasMany(ProductReview::class);
    }

    public function orders(): BelongsToMany{
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }




}
