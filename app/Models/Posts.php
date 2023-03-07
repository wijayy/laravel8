<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
 use HasFactory, Sluggable;

//  protected $fillable = ["title", "slug", "excerpt", "body", "category_id"];
 protected $guarded = ["id"];
 protected $with = ["category", "author"];

 public function category()
 {
  return $this->belongsTo(Category::class);
 }

 public function author()
 {
  return $this->belongsTo(User::class, "user_id");
 }

 public function scopeSearch($query, $filters)
 {
  $query->when($filters ?? false, function ($query, $search) {
   return $query->where("title", "like", "%" . $search . "%")
    ->orWhere("body", "like", "%" . $search . "%");
  });
 }

 public function scopeCategory($query, $filters)
 {
  $query->when($filters ?? false, function ($query, $category) {
   return $query->whereHas("category", function ($query) use ($category) {
    $query->where("slug", $category);
   });
  });
 }

 public function scopeAuthor($query, $filters)
 {
  $query->when($filters ?? false, function ($query, $author) {
   return $query->whereHas("author", function ($query) use ($author) {
    $query->where("username", $author);
   });
  });
 }

 public function getRouteKeyName()
 {
  return 'slug';
 }

 /**
  * Return the sluggable configuration array for this model.
  *
  * @return array
  */
 public function sluggable(): array
 {
  return [
   'slug' => [
    'source' => 'title',
   ],
  ];
 }
}