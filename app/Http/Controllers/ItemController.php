<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Storage;

class ItemController extends Controller
{
     public function home(Item $item)
     {
        return view('owner/home');
     }
     
     public function index(Item $item)
     {
         return view('owner/items')->with(['items' => $item->getByLimit()]);  
     }
     
     public function show(Item $item)
     {
          return view('owner/show')->with(['item' => $item]);
     }
     
     public function create(Item $item)
     {
        return view('owner/create'); 
     }
     
     public function store(Request $request, Item $item, Storage $image)
     {
          
        $input = $request['item'];
        
        $image = $request->file('image');
        $path = Storage::disk('s3')->putfile('item-image', $image,'public');
        $item->image_path = Storage::disk('s3')->url($path);
        
        $item->fill($input)->save();
        return redirect('owner/items/' . $item->id);
    }
}
