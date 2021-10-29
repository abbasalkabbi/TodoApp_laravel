<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TodoControler extends Controller
{
    // show todo list
    function index(){
        //get all todo 
        $todo_data=DB::table('todo')->get();
        return view('home',compact('todo_data'));
    }
    //add item into todo
    function additem(Request $request){
        DB::table('todo')->insert([
            'context'=>$request->context
        ]);
        return back()->with('add_item','item Has Beeen ADD');
    }
    //delete item from todo
    function delete(Request $request){
        $id=$request->id;
        DB::table('todo')->where('id',$id)->delete();
        return back()->with('Delete_item','item Has Beeen Delete');
    }
}
