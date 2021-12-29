<?php

namespace App\Http\Controllers;

use App\Item;
use App\ItemPhoto;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
     
     public function show(Item $item, ItemPhoto $item_photos)
     {
         
          return view('owner/show')->with(['item' => $item]);
     }
     
     public function create(Item $item)
     {
        return view('owner/create'); 
     }
     
     
     public function store(Request $request, Item $item, Storage $image, Tag $tag ,ItemPhoto $item_photos)
     {
          
        $input = $request['item'];
        $item->fill($input)->save();
        
        
        preg_match_all('/#([a-zA-Z0-9０-９ぁ-んァ-ヶー一-龠]+)/u', $request->tag_name, $match);
       
        
        // $match[0]に#(ハッシュタグ)あり、$match[1]に#(ハッシュタグ)なしの結果が入ってくるので、$match[1]で#(ハッシュタグ)なしの結果のみを使います。
        $tags = [];
        foreach ($match[1] as $tag) {
           $record = Tag::firstOrCreate(['name' => $tag]); //firstOrCreateメソッドで、tags_tableのnameカラムに該当のない$tagは新規登録される。
           array_push($tags, $record);// $recordを配列に追加します(=$tags)
           };

        // 投稿に紐付けされるタグのidを配列化
        $tags_id = [];
        foreach ($tags as $tag) {
           array_push($tags_id, $tag['id']);
        };
        
        //画像の保存
        $images = $request->file('files');
        foreach($images as $image){
             $path = Storage::disk('s3')->putfile('item-image', $image,'public');
             $item_photos->path = Storage::disk('s3')->url($path);
             $item->photos()->create(['path'=> $path]);
        };
        
        
        
        
        $item->tags()->attach($tags_id);
        return redirect('owner/items/' . $item->id);
    }
    
    
    
    
     public function edit(Item $item)
     {
        return view('owner/edit')->with(['item' => $item]); 
     }    
     
     public function update(Request $request, Item $item)
     {
        $input_item = $request['item'];
        
        preg_match_all('/#([a-zA-Z0-9０-９ぁ-んァ-ヶー一-龠]+)/u', $request->tag_name, $match);
       
        
        // $match[0]に#(ハッシュタグ)あり、$match[1]に#(ハッシュタグ)なしの結果が入ってくるので、$match[1]で#(ハッシュタグ)なしの結果のみを使います。
        $tags = [];
        foreach ($match[1] as $tag) {
           $record = Tag::firstOrCreate(['name' => $tag]); //firstOrCreateメソッドで、tags_tableのnameカラムに該当のない$tagは新規登録される。
           array_push($tags, $record);// $recordを配列に追加します(=$tags)
           };

        // 投稿に紐付けされるタグのidを配列化
        $tags_id = [];
        foreach ($tags as $tag) {
           array_push($tags_id, $tag['id']);
        };
        
        $image=$request->file('image');
        $path = Storage::disk('s3')->putfile('item-image', $image,'public');
        $item->image_path = Storage::disk('s3')->url($path);
        
        $item->fill($input_item)->save();
        $item->tags()->sync($tags_id);
        return redirect('owner/items/' . $item->id);
     } 
}
