<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

class PaymentMethodOffline extends Model
{
    use HasFactory ,Sluggable , SearchableTrait , SoftDeletes;

    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'method_name'
            ]
        ];
    }

    protected $searchable = [
        'columns' => [
            'payment_method_offlines.owner_account_name' => 10,
            'payment_method_offlines.customer_account_name' => 10,
            'payment_method_offlines.method_name' => 10,
            'payment_method_offlines.method_description' => 10,
        ]
    ];

    public function status(){
        return $this->status ? 'مفعل' : "غير مفعل";
    }

    public function scopeActive($query){
        return $query->whereStatus(true);
    }

    public function scopeActiveCategory($query){
        return $query->whereHas('paymentCategory',function($query){
            $query->whereStatus(1) ;
        });
    }

    // product category has only one photo in photo table so relationship is morphone
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

    public function paymentCategory(){
        return $this->belongsTo(PaymentCategory::class, 'payment_category_id', 'id');
    }

    public function orders():HasMany{
        return $this->hasMany(Order::class);
    }
    
    
}
