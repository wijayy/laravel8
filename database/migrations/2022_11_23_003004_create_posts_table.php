<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 /**
  * Run the migrations.
  *
  * @return void
  */
 public function up()
 {
  Schema::create('posts', function (Blueprint $table) {
   $table->id();
   $table->foreignId("category_id");
   $table->foreignId("user_id");
   $table->string("title");
   $table->string("slug")->unique();
   $table->text("excerpt");
   $table->text("body");
   $table->string("image")->nullable();
   $table->timestamp("published_at")->nullable();
   $table->timestamps();
  });
 }

 /**
  * Reverse the migrations.
  *
  * @return void
  */
 public function down()
 {
  Schema::dropIfExists('posts');
 }
};

// Posts::create([
//   "category_id" => 1,
//     "title"=>"satu",
//     "slug"=>"satu",
//     "excerpt"=>"Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio ad amet debitis officiis, consectetur numquam obcaecati nam ratione inventore,",
//     "body"=>"<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio ad amet debitis officiis, consectetur numquam obcaecati nam ratione inventore, eveniet ullam provident doloremque unde hic itaque cupiditate at quod omnis aspernatur ex iusto pariatur sequi nisi. Cupiditate nemo fugit reiciendis, at repellat eum neque quo praesentium atque odit enim aliquam.</p>
//     <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio ad amet debitis officiis, consectetur numquam obcaecati nam ratione inventore, eveniet ullam provident doloremque unde hic itaque cupiditate at quod omnis aspernatur ex iusto pariatur sequi nisi. Cupiditate nemo fugit reiciendis, at repellat eum neque quo praesentium atque odit enim aliquam.</p>
//     <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio ad amet debitis officiis, consectetur numquam obcaecati nam ratione inventore, eveniet ullam provident doloremque unde hic itaque cupiditate at quod omnis aspernatur ex iusto pariatur sequi nisi. Cupiditate nemo fugit reiciendis, at repellat eum neque quo praesentium atque odit enim aliquam.</p>"

// ]);
// Posts::create([
//   "category_id" => 1,
//     "title"=>"tuju",
//     "slug"=>"tuju",
//     "excerpt"=>"Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio ad amet debitis officiis, consectetur numquam obcaecati nam ratione inventore,",
//     "body"=>"<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio ad amet debitis officiis, consectetur numquam obcaecati nam ratione inventore, eveniet ullam provident doloremque unde hic itaque cupiditate at quod omnis aspernatur ex iusto pariatur sequi nisi. Cupiditate nemo fugit reiciendis, at repellat eum neque quo praesentium atque odit enim aliquam.</p>
//     <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio ad amet debitis officiis, consectetur numquam obcaecati nam ratione inventore, eveniet ullam provident doloremque unde hic itaque cupiditate at quod omnis aspernatur ex iusto pariatur sequi nisi. Cupiditate nemo fugit reiciendis, at repellat eum neque quo praesentium atque odit enim aliquam.</p>
//     <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio ad amet debitis officiis, consectetur numquam obcaecati nam ratione inventore, eveniet ullam provident doloremque unde hic itaque cupiditate at quod omnis aspernatur ex iusto pariatur sequi nisi. Cupiditate nemo fugit reiciendis, at repellat eum neque quo praesentium atque odit enim aliquam.</p>"

// ]);
// Posts::create([
//   "category_id" => 3,
//     "title"=>"sembil",
//     "slug"=>"sembil",
//     "excerpt"=>"Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio ad amet debitis officiis, consectetur numquam obcaecati nam ratione inventore,",
//     "body"=>"<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio ad amet debitis officiis, consectetur numquam obcaecati nam ratione inventore, eveniet ullam provident doloremque unde hic itaque cupiditate at quod omnis aspernatur ex iusto pariatur sequi nisi. Cupiditate nemo fugit reiciendis, at repellat eum neque quo praesentium atque odit enim aliquam.</p>
//     <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio ad amet debitis officiis, consectetur numquam obcaecati nam ratione inventore, eveniet ullam provident doloremque unde hic itaque cupiditate at quod omnis aspernatur ex iusto pariatur sequi nisi. Cupiditate nemo fugit reiciendis, at repellat eum neque quo praesentium atque odit enim aliquam.</p>
//     <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio ad amet debitis officiis, consectetur numquam obcaecati nam ratione inventore, eveniet ullam provident doloremque unde hic itaque cupiditate at quod omnis aspernatur ex iusto pariatur sequi nisi. Cupiditate nemo fugit reiciendis, at repellat eum neque quo praesentium atque odit enim aliquam.</p>"

// ]);

// Category::create([
//   "name"=>"programming",
//   "slug"=>"programming"
// ])
// Category::create([
//   "name"=>"web design",
//   "slug"=>"web-design"
// ])
// Category::create([
//   "name"=>"personal",
//   "slug"=>"personal"
// ])
