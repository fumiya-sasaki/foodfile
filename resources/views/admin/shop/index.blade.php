<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
         <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
         <link href="{{ secure_asset('css/admin.css') }}" rel="stylesheet">
        
        <title>foodfile</title>
        </head>
        <body>
            <div class="container">
                <div class="row">
                    <h2>アナタのリスト</h2>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <a href="{{ action('Admin\Shopscontroller@add') }}" role="button" class="btn btn-primary">新規作成</a>
                    </div>
                    <div class="col-md-8">
                        <form action="{{ action('Admin\Shopscontroller@index') }}" method="get">
                            <div class="form-group row">  
                                <label class="col-md-2">お店の名前</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="cond_name" value="{{ $cond_name }}">
                                    </div>
                                    <div class="col-md-2">
                                    <input type="submit" class="btn btn-primary" value="検索">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="list-news col-md-10 mx-auto">
                    <div class="row">
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th width="10%">ID</th>
                                    <th width="10%">お店の名前</th>
                                    <th width="10%">URL</th>
                                    <th width="10%">ジャンル</th>
                                    <th width="10%">画像</th>
                                    <th width="10%">緯度</th>
                                    <th width="10%">経度</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $shop)
                                <tr>
                                    <th>{{ $shop->id }}</th>
                                    <th>{{ \Str::limit($shop->name,100) }}</th>
                                    <th>{{ \Str::limit($shop->url,100) }}</th>
                                    <th>{{ \Str::limit($shop->genre,100) }}</th>
                                    <th>{{ \Str::limit($shop->image,100) }}</th>
                                    <th>{{ \Str::limit($shop->latitude,100) }}</th>
                                    <th>{{ \Str::limit($shop->longitube,100) }}</th>
                                    <th>
                <div>
                    <a href="{{ action('Admin\Shopscontroller@delete', ['id' => $shop->id]) }}">削除</a>
                </div>
                                        
                                    </th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </body>
</html>