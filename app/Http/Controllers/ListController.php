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


    public function delete(Request $request) {
        $id = $request->id;
       $item = Item::find($id);
       $item->delete();

    }
}
