<?php

use App\Models\Country;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Carbon\Carbon;

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
//
//Route::get('/', function () {
//    return view('welcome');
//});

//passing variable
//Route::get('/contact/{id}/{name}', function ($id,$name) {
//    return "hello contact ".$id." ".$name;
//});

//Nameing route
//Route::get("admin/example", array('as'=>"admin.home", function(){
//    $url=route('admin.home');
//    return "this is url: ".$url;
//
//}));

//Route::get('post', [PostController::class, 'index']);
//Route::get('contact',[PostController::class,'contact']);
//Route::get('post/{id}/{name}',[PostController::class,'post']);
//
//Route::get('/insert', function(){
//    DB::insert('insert into posts(title,content) values(?,?)',['Laravel','Laravel is very cool'] );
//});

//Route::get('/read', function (){
//    $result=DB::select('select * from posts where id=?',[1]);
//    return var_dump($result);
//  if($result){
//      foreach ($result as $name){
//          return $name->title;
//      }
//  }
//
//
//});
//Route::get('/update', function (){
//    $updated=DB::update('update posts set title="Updated Title" where id=?', [1]);
//    return $updated;
//
//
//});


//Route::get('/delete', function (){
//    $delete=DB::delete('delete from posts where id=?',[1]);
//    return $delete;
//});

//Eluquent model
//
//Route::get('posts', function (){
//
//    $result=Post::all();
//    foreach ($result as $posts){
//        return $posts->title;
//    }
//
//
//});
//
//Route::get('/find',function (){
//    $result=Post::find(1);
//    return $result->title;
//});


//Route::get('/findwhere',function (){
//
//    $posts=Post::where('id',2)->orderBy('id','desc')->take(1)->get();
//    return $posts;
//});
//
//Route::get('/find', function (){
//    $post=Post::findOrFail(2);
//
//    $post=Post::where('user_count', '<', 50)->firstOrFail();
//    return $post;
//});
//insert data by Eloquent Model
//
//Route::get('/basicinsert', function (){
//    $post =new Post;
//    $post->title="This Eloquent title";
//    $post -> content="Eloquent is super cool";
//    $post->save();
//});

//Route::get('/update1', function (){
//    $post = Post::find(1);
//    $post->title="This Eloquent title 1";
//    $post -> content="Eloquent is super cool 1";
//    $post->save();
//
//
//});

//
//Route::get('/create', function (){
//    Post::create(['title'=>'wow amzing elouquent','content'=>'eloquent model is amazing to learn']);
//});


//Route::get('/update',function (){
//    Post::where('id',1)->where('is_admin',0)->update(['title'=>'this is updated title','content'=>'updated content is here']);
//
//});
//
//Route::get('/delete', function (){
//    $post=Post::find(1);
//    $post->delete();
//
//});


//Route::get('delete1',function (){
//    Post::destroy([3,4]);
//  //  Post::where('id','3')->delete();
//
//});

//deleteusing softdelete
//
//Route::get('/softdelete', function (){
//
//    Post::find(1)->delete();
//
//});

//Route::get('/readsoftdelete', function (){
//  // $post= Post::withTrashed()->where('id',1)->get();
//
//   $post= Post::onlyTrashed()->where('is_admin', 0)->get();
//
//
//    return $post;
//});
//
//Route::get('restored', function (){
//    Post::withTrashed()->where('is_admin', 0)->restore();
//});

//
//Route::get('forcedelete', function (){
//    Post::onlyTrashed()->where('id',1)->forceDelete();
//});

//Eloquent Relationship

//one to one relationship
//Route::get('/user/{id}/posts', function ($id){
//   return User::find($id)->post->title;
//
//});
//
//Route::get('/posts/{id}/user', function ($id){
//   return Post::find($id)->user->name;
//});
//
////one to many relationship
//Route::get('/posts', function (){
//
//    $post=User::find(1);
//    foreach ($post->posts as $item) {
//        echo $item->title . "<br>";
//
//    }
//
//
//
//});

//many to many relationship
//
//Route::get('/user/{id}/role',function ($id){
//   $user= User::find($id)->roles()->orderBy('id','desc')->get();
//   return $user;
//
//
//
////    foreach ($user->roles as $role){
////        return $role->name;
////
////    }
//
//});

//
//Route::get('/user/pivot',function (){
//
//   $user= User::find(2);
//    foreach ($user -> roles as $role){
//        return $role->pivot->created_at;
//    }
//
//
//});
//
//
//Route::get('user/country',function (){
//   $country= Country::find(3);
//
//   foreach ($country -> posts as $post){
//      return $post->title;
//   }
//});
//
////polymorphic relationship
//
//Route::get('/user/photo', function (){
//
//   $user= User::find(1);
//    foreach ($user -> Photos as $photo){
//       return $photo -> path;
//    }
//
//});
//
//
//Route::get('/posts/photo',function (){
//    $post=Post::find(1);
//    foreach ($post -> Photos as $photo){
//       echo $photo-> path . "<br>";
//    }
//});
//
//
//Route::get('/photo/{id}/post', function ($id){
//
//    $photo = \App\Models\Photo::findOrFail($id);
//    echo $photo-> imageable . '<br>';
//
//
//});
//
////polymorphic many to many relationship
//
//Route::get('post/tag', function (){
//
//    $post= Post::find(2);
//    foreach ($post -> tags as $tag){
//        return $tag->name;
//
//    }
//});
//
//Route::get('/tag/post', function (){
//    $tag=Tag::find(2);
//
//    foreach ($tag -> posts as $post){
//        return $post;
//    }
//
//});

Route::group(['middleware'=>['web']], function(){

    Route::resource('/posts',PostController::class);

});

Route::get('/date', function (){
    $date= new DateTime('+1 week');
    echo $date->format('m-d-Y');

    echo '<br>';
    echo Carbon::now()->addDay(20)->diffForHumans();
    echo '<br>';
    echo Carbon::now()->subMonth(6)->diffForHumans();
    echo '<br>';
    echo Carbon::yesterday();

});

Route::get('/accessor', function (){
     $user=User::findOrFail(1);
     echo $user->name;


});


Route::get('/mutator', function (){
    $user=User::findOrFail(1);
    $user->name = "chaudhary";
    $user->save();


});

