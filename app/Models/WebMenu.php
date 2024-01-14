<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

class WebMenu extends Model
{
    use HasFactory ,Sluggable , SearchableTrait , SoftDeletes;

    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name_ar'
            ]
        ];
    }

    protected $searchable = [
        'columns' => [
            'web_menus.name_ar' => 10,
            'web_menus.name_en' => 10,
            'web_menus.link' => 10,
        ]
    ];

    public function status(){
        return $this->status ? 'مفعل' : "غير مفعل";
    }

    public function scopeActive($query){
        return $query->whereStatus(true);
    }

    public function scopeRootCategory($query){
        return $query->whereNull('parent_id');
        
    }

    public function scopeMainMenu($query){
        return $query->whereSection(1);  
    }
  


    // Get Parent of This Element in the same table inner Relationship
    public function parent():HasOne
    {       
        return $this->hasOne(webMenu::class, 'id'       ,  'parent_id');
    }

    // Get All Childreen of This Element in the same table inner Relationship
    public function children()
    {
        return $this->hasMany(webMenu::class, 'parent_id', 'id');
    }

    // Get The children that allowed to be appeared and used
    public function appearedChildren()
    {
        return $this->hasMany(webMenu::class, 'parent_id', 'id')->where('status',true);
    }

     //This will get all route categories and its childreen under route categories
    public static function tree( $level = 1 )
    {
        return static::with(implode('.', array_fill(0, $level, 'children')))
            ->whereNull('parent_id')
            ->whereStatus(true)
            ->where('section' , 1)
            ->orderBy('id', 'asc')
            ->get();
    } 

    // for calling help menu in the footer 
    public static function helpTree( $level = 1 )
    {
        return static::with(implode('.', array_fill(0, $level, 'children')))
            ->whereNull('parent_id')
            ->whereStatus(true)
            ->where('section' , 2)
            ->orderBy('id', 'asc')
            ->get();
    } 



}
