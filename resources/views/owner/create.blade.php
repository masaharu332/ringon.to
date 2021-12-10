<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ringon.to</title>
    </head>
    <body>
        <h1>アイテム登録</h1>
        <form action="/posts" method="POST">
            @csrf
            <div class="title">
                <h2>商品名</h2>
                <input type="text" name="ringonto[title]" placeholder="タイトル"/>
            </div>
            <div class="body">
                <h2>商品詳細</h2>
                <textarea name="rinognto[body]" placeholder="こちらは○○な商品になっています。"></textarea>
            </div>
            <div class="price">
                <h2>価格</h2>
                <input type="text" name="ringonto[price]" placeholder="100万円！！"/>
            </div>
            <div class="tag">
                <h2>タグ登録</h2>
                <input type="text" name="ringonto[tag]" placeholder="春、さわやか、かわいい、"/>
            </div>
            <div class="image">
                <h2>登録画像</h2>
                
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>