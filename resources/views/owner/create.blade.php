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
        <form action="/items" method="POST"　enctype="multipart/form-data">
        @csrf
            <div class='title'>
                <h2>商品名</h2>
                <input type="text" name="item[title]" placeholder="商品名" value="{{ old('item.title') }}"/>
            </div>
            <div class='body'>
                 <h2>商品説明</h2>
                 <textarea name="item[body]" placeholder="説明" value="{{ old('item.body')}}"></textarea>
            </div>
            <div class='body'>
                 <h2>値段</h2>
                 <textarea name="item[price]" placeholder="100" value="{{ old('item.price')}}"></textarea>
            </div>
            <div class='body'>
                 <h2>タグ</h2>
                 <textarea name="tag_name" value="{{ old('tag.name')}}"></textarea>
                 <h2>画像</h2>
                 <input type="file" name="image">
            </div>
                  <input type="submit" value="保存"/>
        </form>
        <div class='footer'>
           <a href='/owner'>back</a>
        </div>
    </body>
</html>
@endsection