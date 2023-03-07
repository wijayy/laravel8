<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostsRequest;
use App\Http\Requests\UpdatePostsRequest;
use App\Models\Category;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Routing\Controller;

class PostsController extends Controller
{
 /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
 public function index()
 {

  $title = '';
  if (request("category")) {
   $category = Category::firstWhere("slug", request("category"));
   $title = "in $category->name";
  }
  if (request("author")) {
   $author = User::firstWhere("username", request("author"));
   $title = "by $author->name";
  }

  return view("posts", [
   "title" => "all posts $title",
   'active' => "posts",
   "posts" => Posts::latest()->search(request("search"))
    ->category(request("category"))->author(request("author"))->paginate(10)->withQueryString(),
   "heading" => "Posts",
  ]);
 }

 /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
 public function create()
 {
  //
 }

 /**
  * Store a newly created resource in storage.
  *
  * @param  \App\Http\Requests\StorePostsRequest  $request
  * @return \Illuminate\Http\Response
  */
 public function store(StorePostsRequest $request)
 {
  
 }

 /**
  * Display the specified resource.
  *
  * @param  \App\Models\Posts  $posts
  * @return \Illuminate\Http\Response
  */
 public function show(Posts $posts)
 {
  return view("post", [
   'title' => $posts->title,
   'active' => "posts",
   'heading' => $posts->title,
   'post' => $posts,

  ]);
 }

 /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Models\Posts  $posts
  * @return \Illuminate\Http\Response
  */
 public function edit(Posts $posts)
 {
  //
 }

 /**
  * Update the specified resource in storage.
  *
  * @param  \App\Http\Requests\UpdatePostsRequest  $request
  * @param  \App\Models\Posts  $posts
  * @return \Illuminate\Http\Response
  */
 public function update(UpdatePostsRequest $request, Posts $posts)
 {
  //
 }

 /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Models\Posts  $posts
  * @return \Illuminate\Http\Response
  */
 public function destroy(Posts $posts)
 {
  //
 }
}