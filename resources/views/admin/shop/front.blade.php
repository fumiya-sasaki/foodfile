<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/front.css') }}" rel="stylesheet">
        <title>foodfile</title>
    </head>
    <body>
        <div id="content_wrap">
    	    <div class="content">
                <div class="container">
                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                    <div class="col-12 clearfix text-center">
                        <h1 class="col-md-5 mx-auto mt-2 title" >Yours List</h1>
                        <p class="float-right">food file</p>
                    </div>
                    <hr class="border">
                    <div class="row">
                        <div class="col-md-3 py-4">
                            <a href="{{ action('Admin\Shopscontroller@add') }}" role="button" class="btn-horizontal-border btn-lg">add shop</a>
                        </div>
                        <div class="col-md-3 py-2">
                            <a href="{{ action('Admin\Shopscontroller@map') }}" role="button" class="btn btn-success">MAPへ移動</a>
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col-md-2">
                            <ul class="nav flex-column">
                                <div class="genre_title"> <a>genre list</a></div>
                                <div class="genre mt-2">
                                    <form class="genre_list"action="{{ action('Admin\Shopscontroller@index') }}" method="get">
                                        <li>
                                            {{ csrf_field() }}
                                            <input type="submit" value="全て表示" class="btn btn-success btn-sm">
                                        </li>
                                    </form>
                                    @foreach($genres_all as $genre)
                                        <form class="genre_list"action="{{ action('Admin\Shopscontroller@index') }}" method="get">
                                            <li>
                                                <input type="hidden" name="cond_genre" value="{{ $genre }}">
                                                {{ csrf_field() }}
                                                <input type="submit" value="{{ str_limit($genre, 50) }}" class="btn btn-success btn-sm">
                                            </li>
                                        </form>
                                    @endforeach
                                </div>
                            </ul>
                        </div>
                        <div class="posts col-md-10 mx-auto mt-3">
                            <div class="card-deck">
                                @foreach($posts as $post)
                                    <div class="post  mt-2">
                                        <div class="card_border card border-success mb-3" style="max-width: 18rem;">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="text col-xs-6">
                                                        <div class="url mt-1 ml-2">
                                                            <a class="name_url" href="javascript:void(0);" onclick="window.open('{{ $post->url }}','_blank')">{{ str_limit($post->name, 30) }}</a>
                                                        </div>
                                                        <div class="d-flex flex-row">
                                                            <div class="address col-md-8">
                                                                @if ($post->address == null)
                                                                   <a>MAP未入力</a>
                                                               @endif
                                                            </div>
                                                            <div class="edit col-md-3">
                                                                <form method="GET" action="admin/shop/edit/{{ $post->id }}">    
                                                                    {{ csrf_field() }}
                                                                    <input type="submit" value="編集" class="btn btn-success btn-sm mb-2 mt-1">
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <div class="image border-top border-image">
                                                            <div "card border-primary" style="max-width: 20rem">
                                                                <image class="image_list" src="{{ $post->image }}"></image>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>    
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>    
                </div>
    	    </div>
    	</div> 
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="{{ asset('js/front.js') }}" defer></script>
    </body>
</html>    