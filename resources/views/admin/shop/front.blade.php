<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
         <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        
        <style>
           .btn-horizontal-border {
                  position: relative;
                  display: inline-block;
                  font-weight: bold;
                  padding: 12px 0 8px;
                  text-decoration: none;
                  color: #67c5ff;
                  transition: .4s;
                }
                
                .btn-horizontal-border:before {
                  position: absolute;
                  content: '';
                  width: 100%;
                  height: 4px;
                  top:100%;
                  left: 0;
                  border-radius: 3px;
                  background:#67c5ff;
                  transition: .2s;
                }
                
                .btn-horizontal-border:after {
                  position: absolute;
                  content: '';
                  width: 100%;
                  height: 4px;
                  top:0;
                  left: 0;
                  border-radius: 3px;
                  background:#67c5ff;
                  transition: .2s;
                }
                
                .btn-horizontal-border:hover:before {
                  top: -webkit-calc(100% - 3px);
                  top: calc(100% - 3px);
                }
                
                .btn-horizontal-border:hover:after {
                  top: 3px;
                }
                
                .btn--orange {
                  color: #fff;
                  background-color: #eb6100;
                }
                .btn--orange:hover,
                .btn--orange:hover {
                  color: #fff;
                  background: #f56500;
                }
                
                .genre_list {
                    padding: 5px;
                }
                
               .image_list {
                  max-width: 100%;
                　height: auto;
               }
               .edit {
                   padding: 1px;
               }
               
               .delete {
                   padding: 1px;
               }
               
               .url {
                   font-size: 20px;
               }
               .rounded {
               border-width:100px
                   
               }
        </style>
        
        <title>foodfile</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h2>アナタのリスト</h2>
                </div>
            </div>
            <hr class="border border-primary">
            <div class="row">
                <div class="col-md-3 py-2">
                    <a href="{{ action('Admin\Shopscontroller@add') }}" role="button" class="btn-horizontal-border btn-lg">あなたのお店登録</a>
                </div>
                <div class="col-md-3 py-2">
                    
        <a href="{{ action('Admin\Shopscontroller@map') }}" role="button" class="btn btn-primary">mapへ移動</a>
                </div>
            </div>
                <div class="row">
                    <div class="col-md-3">
                    <ul class="nav flex-column">
                        <div class="dropdown">
                          <button type="button" id="dropdown1" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> ジャンルリスト</button>
                            <div class="genre">
                                <div class="dropdown-menu" aria-labelledby="dropdown1">
                                    <form class="genre_list"action="{{ action('Admin\Shopscontroller@index') }}" method="get">
                                        <li>
                                            {{ csrf_field() }}
                                            <input type="submit" value="全て表示" class="btn btn--orange btn-sm">
                                        </li>
                                    </form>
                                    @foreach($genres_all as $genre)
                                    <form class="genre_list"action="{{ action('Admin\Shopscontroller@index') }}" method="get">
                                        <li>
                                            <input type="hidden" name="cond_genre" value="{{ $genre }}">
                                            {{ csrf_field() }}
                                            <input type="submit" value="{{ str_limit($genre, 50) }}" class="btn btn--orange btn-sm">
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
                                        <div class="text col-xs-6">
                                            <div class="name">
                                                {{ str_limit($post->name, 50) }}
                                            </div>
                                        <div class="url">
                                            <a href="{{ str_limit($post->url, 100) }}">お店のページ</a>
                                        </div>
                                            <div class="genre">
                                                {{ str_limit($post->genre, 100) }}
                                            </div>
                                        <div class="image">
                                           <div "card border-primary" style="max-width: 20rem">
                                               
                                            <image class="image_list" src="{{ $post->image }}"></image>
                                           </div>
                                            
                                        </div>
                                        </div>
                                        <div class="edit">
                                            <form method="GET" action="admin/shop/edit/{{ $post->id }}">    
                                                {{ csrf_field() }}
                                                <input type="submit" value="編集" class="btn btn-primary btn-sm">
                                            </form>
                                        </div>
                                        <div class="delete">
                                            <form class="delete_btn" method="POST" action="admin/shop/delete/{{ $post->id }}">    
                                                {{ csrf_field() }}
                                                <input type="submit" value="削除" class="btn btn-danger btn-sm btn-dell">
                                            </form>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>$(function() {
                    $('form.delete_btn').submit(function() {
                        if (!confirm('削除しますか？')) {
                        return false; 
                        }
                });});</script>
    </body>
</html>    