@extends('layouts.app')

@section('content') 
<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ringon.to</title>
    </head>
    <body>
          <div class="add_area">
              <div class="title_image">
                  <img src="https://ringonto-bucket.s3.ap-northeast-1.amazonaws.com/web_image/ringonto.jpg" width="100%">
              </div>
              <div class="season_title">
                  <a href="/user/season"><img src="https://ringonto-bucket.s3.ap-northeast-1.amazonaws.com/web_image/season_accessory.jpg" width="100%"></a>
              </div>
          </div>   
          <div class="category" >
                <a style="display:inline" href="/user/pierce"><img src="https://ringonto-bucket.s3.ap-northeast-1.amazonaws.com/web_image/pierce.jpg" width="49%"></a>
                <a style="display:inline" href="/user/earring"><img src="https://ringonto-bucket.s3.ap-northeast-1.amazonaws.com/web_image/earring.jpg" width="49%"></a>
                <a style="display:inline" href="/user/ring"><img src="https://ringonto-bucket.s3.ap-northeast-1.amazonaws.com/web_image/ring.jpg" width="49%"></a>
                <a style="display:inline" href="/user/stand"><img src="https://ringonto-bucket.s3.ap-northeast-1.amazonaws.com/web_image/stand.jpg" width="49%"></a>
                <a style="display:inline" href="/user/all"><img src="https://ringonto-bucket.s3.ap-northeast-1.amazonaws.com/web_image/all.jpg" width="49%"></a>
                <a style="display:inline" href="/user/season"><img src="https://ringonto-bucket.s3.ap-northeast-1.amazonaws.com/web_image/season.jpg" width="49%"></a>
         </div>
            
            
        
    </body>
</html>
@endsection