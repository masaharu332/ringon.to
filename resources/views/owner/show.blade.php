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
                  <img src="{{ $item->image_path}}" style="width:auto;height:200px;" >
                  <h2 class='title'> {{$item->title}} </h2>
                  <p class='body'> {{$item->body}} </p>
                  @foreach($item->tags as $item_tag)
		            <span class="badge badge-pill badge-info">{{$item_tag->name}}</span>
                  @endforeach
                  <p class='updated_at'> {{$item->updated_at}}</p>
              </div>
        </div>
        <div class='footer'>
           <a href='/owner/items'>back</a>
        </div>
    </body>
</html>
@endsection