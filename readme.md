画像囲みツール
------------

このツールは、特徴検出用のカスケードを生成する前段階で必要な、
アノテーションファイルを生成するために作りました。

使い方
-----
四角で囲みたい画像を public/crop-img/stash/ディレクトリに置いてください。

- public/crop-img/stash/
  - 囲みたい画像置き場
- public/crop-img/watched/
  - 囲んだ後の画像
- public/crop-img/destroy/
  - Destroyした画像置き場。ブラックリスト画像に使うつもりでつくってます。


囲んだ画像の座標データは、app/database/production.sqliteの、
「annotations」テーブルに、JSONで保持しています。

```
データサンプル
- img
  - /crop-img/watched/cat01.jpg
- points
  - [{"left":"28","top":"14","width":"156","height":"122"}]
```

TODO
----
- annotation.txtを吐き出す処理


開発環境
---
- 言語
  - php 5.5.12
- phpフレームワーク
  - larabel4
- cssフレームワーク
  - gumby
- パッケージ管理
  - grunt
  - bower


メモ
---
sqlite生成
```php artisan migrate```

開発サーバー立ち上げ
```php artisan serve```

bower.js読み込んで、public/lib/にjqueryなどのライブラリばら撒く
```grunt```