<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Posts extends Model
{
    protected $fillable=['name','description','content'];

    public static function listPosts(){
    	return DB::table('posts')->get();
    }

    public static function findpostbyID($id){
		return DB::table('posts')->where('id',$id)->first();
	}

    public static function store($data){
    	Posts::create($data);
    	return true;
    }

 //    public static function destroy($id){
	// 	DB::table('posts')->where('id',$id)->delete();

	// 	return true;
	// }
	
	// public static function updatepostbyID($id){
	// 	return  Posts::find($id)->update($data);
	// }
}
