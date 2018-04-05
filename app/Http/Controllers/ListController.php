<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ListController extends Controller
{

    public function index(){
        $items = Item::all();
        return view('list',compact('items'));
    }

    public function create(Request $request){
        $item = new Item();
        $item->item = $request->text;
        $item->save();
         return 'Done';
         }

    public function update(Request $request) {
        $item = Item::find($request->id);
        $item->item = $request->text;
        $item->save();
    }



    public function delete(Request $request) {
        $id = $request->id;
       $item = Item::find($id);
       $item->delete();
       }


       public function search(Request $request){
           $term = $request->term;
           // we are getting searched values of items in array
           $items = Item::where('item',"LIKE","%".$term."%")->get()->pluck('item');
           if(count($items) == 0){
               //every result must be in  an array
               return ["No items found"];
           }else{
               return $items;
           }

       }


}
