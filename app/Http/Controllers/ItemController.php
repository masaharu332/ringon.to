<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
     public function index(Item $item)
     {
        return $item->get();
     }
     
     public function create(Item $item)
     {
        return view('owner/create'); 
     }
}
