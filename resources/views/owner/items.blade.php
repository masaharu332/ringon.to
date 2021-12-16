<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ringon.to</title>
    </head>
    <body>
        <h1>商品</h1>
        @foreach ($items as $item)
         <div class='item'>
                  <img src="{{ $item->image_path}}" style="width:auto;height:200px;" >
                  <h2 class='title'>  <a href="items/{{ $item->id }}">{{ $item->title }}</a> </h2>
                  <p class='body'> {{$item->body}} </p>
                  <p class='price'> {{$item->price}} </p>
                  <p class='review'> {{$item->review}} </p>
                  <p class='updated_at'> {{$item->updated_at}}</p>
         </div>    
         @endforeach
            
            
        <div class="back">[<a href="/owner">もどる</a>]</div>
    </body>
</html>