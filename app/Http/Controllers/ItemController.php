<?php

namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
class ItemController extends Controller
{
   
    public function index()
    {
        return Item::orderBy('created_at',"DESC")->get();
    }


    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        $newItem= new Item;
        $newItem->name=$request->item["name"];
        $newItem->save();
        return $newItem;
    }

   
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        $exitingItem= Item::find($id);
       if($exitingItem){
        $exitingItem->completed=$request->item['completed'] ? true : false;
        $exitingItem->completed_at=$request->item['completed'] ? Carbon::now() : null;
      return $exitingItem;
       }
       return "not found";

    }

   
    public function destory($id)
    {
        $exitingItem= Item::find($id);
        if($exitingItem){
            $exitingItem->delete();
            return "successfully delet";
        }
        return "not found";

    }
}