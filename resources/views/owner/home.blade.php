<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ringon.to</title>
    </head>
    <body>
        <h1>Momo'sRoom</h1>

            
            <div class="button">
                <a href="/items">商品一覧</a>
            </div>
            <div class="button">
                <a href="owner/items/create">商品登録</a>
            </div>
            <div class="price">
                <a href="/from">問い合わせ確認</a>
            </div>
            
            
        <div class="logout">[<a href="/login">ログアウト</a>]</div>
    </body>
</html>