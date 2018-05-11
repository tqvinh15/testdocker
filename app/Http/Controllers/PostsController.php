<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Posts;
class PostsController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::get();
        // dd($posts);
        return view('tables',compact('posts',$posts));
    }

    /**
     * [create description]
     * @return [type] [description]
     */
     public function create(){
        return view('create');
    }
  

     /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $posts = $request->all();
        // dd($posts);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'content' => 'required',
        ]);
        Posts::store($posts);
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $posts = Posts::findpostbyID($id);
        return view('edit',
            [
            'posts'=>$posts,
            ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->All();
        unset($data['_token']);
        unset($data['_method']);
        // dd($data);
         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'content' => 'required',
        ]);
        $update = Posts::where('id',$id)->update($data);
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $posts = Posts::find($id)->delete();
        return redirect()->route('post.index');
    }

}
