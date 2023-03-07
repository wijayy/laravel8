<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Posts;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Tests\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
 /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
 public function index()
 {
  return view("dashboard.posts.index", [
   "posts" => Posts::where("user_id", auth()->user()->id)->get(),
  ]);
 }

 /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
 public function create()
 {
  return view("dashboard.posts.create", [
   "categories" => Category::all(),
  ]);
 }

 /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
 public function store(Request $request)
 {
  $validateData = $request->validate([
   'title' => 'required|max:255',
   'slug' => 'required|unique:posts',
   'category_id' => 'required',
   'body' => 'required',
   'image' => 'image|file|max:1024',
  ]);

  if ($request->file("image")) {
   $validateData['image'] = $request->file("image")->store('img');
  }

  $validateData["user_id"] = auth()->user()->id;
  $validateData["excerpt"] = Str::limit(strip_tags($request->body), 50, '...');

  Posts::create($validateData);

  return redirect("/dashboard/post")->with("success", "New Post Added");

 }

 /**
  * Display the specified resource.
  *
  * @param  int  Posts $posts
  * @return \Illuminate\Http\Response
  */
 public function show(Posts $post)
 {
  return view("dashboard.posts.show", [
   "post" => $post,
  ]);
 }

 /**
  * Show the form for editing the specified resource.
  *
  * @param  int  Posts $posts
  * @return \Illuminate\Http\Response
  */
 public function edit(Posts $post)
 {
  return view("dashboard.posts.edit", [
   "post" => $post,
   "categories" => Category::all(),
  ]);
 }

 /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  Posts $posts
  * @return \Illuminate\Http\Response
  */
 public function update(Request $request, Posts $post)
 {
  $rules = [
   'title' => 'required|max:255',
   'category_id' => 'required',
   'body' => 'required',
   'image' => 'image|file|max:1024',
  ];

  if ($request->slug != $post->slug) {
   $rules["slug"] = 'required|unique:posts';
  }

  $validateData = $request->validate($rules);

  if ($request->file("image")) {
   if ($post->image) {
    Storage::delete($post->image);
   }

   $validateData['image'] = $request->file("image")->store('img');
  }

  $validateData["user_id"] = auth()->user()->id;
  $validateData["excerpt"] = Str::limit(strip_tags($request->body), 50, '...');

  Posts::where('id', $post->id)
   ->update($validateData);

  return redirect("/dashboard/post")->with("success", "Post Updated");
 }

 /**
  * Remove the specified resource from storage.
  *
  * @param  int  Posts $posts
  * @return \Illuminate\Http\Response
  */
 public function destroy(Posts $post)
 {
  if ($post->image) {
   Storage::delete($post->image);
  }

  Posts::destroy($post->id);

  return redirect("/dashboard/post")->with("success", "Posts Deleted");
 }

 public function checkSlug(Request $request)
 {
  $slug = SlugService::createSlug(Posts::class, 'slug', $request->title);
  return response()->json(["slug" => $slug]);
 }
}
