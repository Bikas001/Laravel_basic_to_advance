<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Collective\Html\Eloquent\FormAccessible;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'asc')->get();

         return view('posts.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $input= $request->all();
        if($file= $request->file('file')){
            $filename=$file->getClientOriginalName();
            $file->move('images',$filename);
            $input['path']=$filename;
        }
        Post::create($input);

        //this all methods of files..

//      echo  $file= $request->file('file');
//      echo '<br>';
//      echo $file->getClientOriginalName();
//      echo '<br>';
//      echo $file->getClientOriginalExtension();
//      echo '<br>';
//      echo $file->getSize();



        // validation here
        //  $this -> validate($request,[
        //      'title'=> 'required'
        //
        //  ]);

        //return  $request->all();

        //different ways to store data

        //Post::create($request->all());

//        $input=$request->all();
//        $input['title'] = $request->title;
//        Post::create($request->all());



//        $post = new Post;
//        $post->title = $request->title;
//        $post->save();

      // return redirect('/posts');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts=Post::findOrFail($id);

        return view('/posts.show',compact('posts'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post= Post::findOrFail($id);
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=Post::findOrFail($id);
        $post->update($request->all());

        return redirect('/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::findOrFail($id);
        $post->delete();

        return redirect('/posts');
    }


    public function contact(){
        $people=['bikas','harry','shyam','binod'];
        return view('contact', compact('people'));
    }

    public function post($id,$name){
        //return view('post')-> with('id',$id);
        return view('post',compact('id','name'));
    }

}
