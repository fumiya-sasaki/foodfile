<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
         <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
         <link href="{{ secure_asset('css/admin.css') }}" rel="stylesheet">
        
        <title>foodfile</title>
    </head>
    <style>
        .h2 {
            text-align: center;
        }
    </style>
    <body>
        <header>
       
        </header>
        <div class="container">
            <h2>アナタのリスト</h2>
            <hr color="#c0c0c0">
            <div class="row">
            <div class="col-md-3">
                <a href="{{ action('Admin\Shopscontroller@add') }}" role="button" class="btn btn-primary">新規作成</a>
                <ul class="nav flex-column">
                    <div class="dropdown">
                      <button type="button" id="dropdown1" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> ジャンルリスト</button>
                            <div class="genre">
                            <div class="dropdown-menu" aria-labelledby="dropdown1">
                                <form action="{{ action('Admin\Shopscontroller@index') }}" method="get">
                                    <li>
                                        {{ csrf_field() }}
                                    <input type="submit" value="全て表示" class="btn btn-primary btn-sm">
                                    </li>
                                </form>
                             @foreach($genres_all as $genre)
                                <form action="{{ action('Admin\Shopscontroller@index') }}" method="get">
                                <li>
                                    <input type="hidden" name="cond_genre" value="{{ $genre }}">
                                    {{ csrf_field() }}
                                    <input type="submit" value="{{ str_limit($genre, 50) }}" class="btn btn-primary btn-sm">
                                </li>
                                </form>
                             @endforeach
                            </div>     
                            </div>
                    </div>
                </ul>
            </div>
                    <div class="posts col-md-9 mx-auto mt-3">
                <div class="card-deck">
                    @foreach($posts as $post)
                        <div class="post mt-2">
                            <div class="card border-primary mb-3" style="max-width: 18rem;">
                                <div class="container-fluid">
                            <div class="row">
                                <div class="text col-md-10">
                                    <div class="name">
                                        {{ str_limit($post->name, 50) }}
                                    </div>
                                    <div class="url">
                                        <a href="{{ str_limit($post->url, 100) }}">詳細</a>
                                    </div>
                                     <div class="genre">
                                        {{ str_limit($post->genre, 100) }}
                                    </div>
                                </div>
                                     <div>
                                    <form method="GET" action="admin/shop/edit/{{ $post->id }}">    
                                    {{ csrf_field() }}
                                    <input type="submit" value="編集" class="btn btn-primary btn-sm">
                                    </form>
                                    </div>
                                    <div>
                                    <form method="POST" action="admin/shop/delete/{{ $post->id }}">    
                                    {{ csrf_field() }}
                                     
                                    <input type="submit" value="削除" class="btn btn-danger btn-sm btn-dell">
                                    </form>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    <hr color="#c0c0c0">
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
        
       <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>    