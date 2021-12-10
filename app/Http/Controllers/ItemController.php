<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
     public function home(Item $item)
     {
        return view('owner/home');
     }
     
     public function create(Item $item)
     {
        return view('owner/create'); 
     }
}
