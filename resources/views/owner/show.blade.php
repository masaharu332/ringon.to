@extends('layouts.app')

@section('content') 
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ringon.to</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>ringon.to</h1>
        @csrf
        <div class='items'>
              <div class='item'>
                  @foreach($item->photos as $item_photo)
                  <img src="https://ringonto-bucket.s3.ap-northeast-1.amazonaws.com/{{$item_photo->path}}" style="width:auto;height:200px;" >
                  @endforeach
                  <h2 class='title'> {{$item->title}} </h2>
                  <p class='body'> {{$item->body}} </p>
                  <p class='price'>¥ {{$item->price}}</p>
                  @foreach($item->tags as $item_tag)
		            <span class="badge badge-pill badge-info">{{$item_tag->name}}</span>
                  @endforeach
                  <p class='updated_at'> {{$item->updated_at}}</p>
                  <p class="edit">[<a href="{{ $item->id }}/edit">編集</a>]</p>
                  <form action="{{ $item->id }}" id="form_delete" method="post" style="display:inline">
                      @csrf
                      @method('DELETE')
                      <p class="delete">[<span onclick="return deleteItem(this)">削除</spam>]</p>
                  </form>
              </div>
        </div>
        <div class='footer'>
           <a href='/owner/items'>back</a>
        </div>
        
        <script>
            function deleteItem(e) {
                'use strict';
                if (window.confirm("削除すると復元できません。\n 本当に削除しますか？")){
                    document.getElementById("form_delete").submit();
                }
            }
        </script>
    </body>
</html>
@endsection