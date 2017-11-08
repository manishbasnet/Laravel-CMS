<?php

use App\Country;
use App\Post;
use App\User;
use App\Tag;
use App\Photo;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//
//});
//
//
////DATABASE Raw SQL Queries
//
//Route::get('/read', function (){
//
//    $results = DB::select('select * from posts where id = ?', [1]);
//
//    return var_dump($results);
//
////    foreach($results as $post){
////
////        return $post->title;
////    }
//
//});

//Route::get('/update', function (){
//
//    $updated = DB::update('update posts set title = "update title" where id = ?', [1]);
//
//    return $updated;
//
//});

//
//Route::get('/delete', function (){
//
//    $deleted = DB::delete('delete from posts where id = ?', [1]);
//
//    return $deleted;
//});














//Route::get('/about', function () {
//    return "Hi about page";
//
//});
//
//
//Route::get('/contact', function () {
//    return "Hi I am contact";
//
//});
//
//Route::get('/post/{id}/{name}', function($id, $name){
//
//    return "This is post number " . $id . " " . $name;
//
//});
//
//Route::get('admin/posts/example', array('as'=>'admin.home', function(){
//
//    $url = route('admin.home');
//    return "this url is " . $url;
//
//}));



//Route::get('/post/{id}', 'PostsController@index');

//
//Route::resource('posts', 'PostsController');
//
//
//Route::get('post/{id}/{name}/{password}', 'PostsController@show_post');



//Route::get('/Post/{index}', function(){
//
//   return "from route or web";
//
//});


Route::get('/insert', function (){

    DB::insert('insert into posts(title, content) values(?, ?)', ['Laravel is awesome ', 'Laravel is the best thing that has happened to PHP, PERIOD']);

});



/*
|--------------------------------------------------------------------------
| ELOQUENT
|--------------------------------------------------------------------------
*/
//
//Route::get('/read', function(){
//
//
//$posts = Post::all();
//
//foreach($posts as $post){
//
//    return $post->title;
//}
//
//});

//
//Route::get('/find', function(){
//
//    $post = Post::find(1);
//
//    return $post->title;
//
//});



//Route::get('/findmore', function(){
//
//    $posts = Post::where('user_count', '<', 50)->firstOrFail();
//
//});

//Route::get('/basicinsert', function (){
//
//    $post = new Post;
//
//    $post->title = 'New Eloquent title insert';
//    $post->content= 'Wow eloquent is really cool, look at this content';
//
//    $post->save();
//
//
//});


Route::get('/insert2', function (){

    $post = Post::find(2);

    $post->title = 'New Eloquent title insert 2';
    $post->content= 'Wow eloquent is really cool, look at this content 2';

    $post->save();


});


Route::get('/create', function(){

   Post::create(['title'=>'the create method','content'=>'WOW I\'am learning alot with Edwin Diaz']);


});

//Route::get('/update', function (){
//
//    Post::where('id', 3)->where('is_admin', 0)->update(['title'=>'NEW PHP TITLE', 'content'=>'I love my instructor']);
//
//
//});

//Route::get('/delete', function(){
//
//    $post = Post::find(1);
//
//    $post->delete();
//
//});


//Route::get('/delete2', function(){
//
//    Post::destroy([4,5]);
//
////    Post::where('is_admin', 0)->delete();
//
//});

Route::get('/softdelete', function (){

    post::find(3)->delete();


});






//Route::get('/readsoftdelete', function (){
//
////    $post = Post::find(3);
////
////    return $post;
//
//
////    $post = Post::withTrashed()->where('id',3)->get();
////
////    return $post;
//
//    $post = Post::onlyTrashed()->where('is_admin',0)->get();
//
//    return $post;
//
//});


//Route::get('/restore', function(){
//
//
//    Post::withTrashed()->where('id', 3)->restore();
//
//});


Route::get('/forcedelete', function(){

   Post::withTrashed()->where('id',3)->forceDelete();

});



/*
|--------------------------------------------------------------------------
| ELOQUENT Relationships
|--------------------------------------------------------------------------
*/

// One to One relationship

Route::get('/user/{id}/post',function($id){

    return User::find($id)->post->title;

});

Route::get('/post/{id}/user', function($id){

    return Post::find($id)->user->name;

});



//One to many relationship
Route::get('/posts', function (){

    $user = User::find(0);

    foreach($user->posts as $post){

        return $post->title . "<br>";



    }

});

//Many to Many relationship

Route::get('/user/{id}/role', function ($id ){

    $user = User::find($id)->roles()->orderBy('id', 'desc')->get();


    return $user;

//    foreach($user->roles as $role){
//
//        return $role->name;
//
//    }

});


//Accessing the intermediate table / pivot /lookup table

Route::get('user/pivot', function (){


    $user = User::find(2);

    foreach($user->roles as $role){

            return $role->pivot;

    }

});

Route::get('/user/country', function (){

    $country = Country::find(4);

    foreach($country->posts as $post){

        return $post->title;
    }


});



// Polymorphic Relations

//Route::get('/post/{id}/photos', function ($id){
//
//    $post = Post::find($id);
//
//    foreach ($post->photos as $photo) {
//
//        echo $photo->path . "<br>";
//    }
//
//
//});

//Route::get('photo/{id}/post', function ($id){
//
//    $photo = Photo::findorFail($id);
//
//    echo $photo->imageable;
//
//});

//Polymorphic Many to Many

//Route::get('/post/tag', function (){
//
//    $post = Post::find(1);
//
//    foreach ($post->tags as $tag){
//
//        echo $tag->name;
//    }
//
//
//});

Route::get('/tag/post/', function (){

   $tag = Tag::find(2);

   foreach ($tag->posts as $post){

       echo $post;
   }

});










?>