@extends('layouts.app')

@section('content') 
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ringon.to</title>
    </head>
    <body>
          <h1>All items</h1> 
              <div class="item">
            @foreach($items as $item)
              <div class='item'>
                  @foreach($item->photos as $item_photo)
                  <img src="https://ringonto-bucket.s3.ap-northeast-1.amazonaws.com/{{$item_photo->path}}" style="width:49%;height:auto;" >
                  @endforeach
                  <h2 class='title'>  <a href="items/{{ $item->id }}">{{ $item->title }}</a> </h2>
                  <p class='body'> {{$item->body}} </p>
                  <p class='price'>¥{{$item->price}} </p>
                  @foreach($item->tags as $item_tag)
		            <span class="badge badge-pill badge-info">{{$item_tag->name}}</span>
                  @endforeach
                  <p class='review'> {{$item->review}} </p>
                  <p class='updated_at'> {{$item->updated_at}}</p>
             </div>    
           @endforeach
           <div class='paginate'>
               {{ $items->links() }}
           </div>
              </div>
              <div class='footer'>
                <a href='/user/home'>もどる</a>
              </div>
            
            
        
    </body>
</html>
@endsection