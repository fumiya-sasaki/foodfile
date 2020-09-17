@extends('layouts.app')

@section('content')
<div id="content_wrap">
    <div class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Login') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>
        
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="col-md-5 mx-auto pt-4 pb-4">
                [food file]の使い方！
            </h1>
            <div class="col-md-10 mx-auto">
              
                    <h3 class="pt-2 pb-2">
                        
                        メモしたいお店の情報が乗ってるページを検索してURLをコピー！
                    </h3>
                 
                    
                    
                    <img src="https://i.gyazo.com/02490d6375ead33eb90419a001efa0b1.png"></img>
                   <h3 class="pt-3 pb-3">
                       
                        URLを貼り付けてボタンを押したらお店の名前と画像を自動入力されます！<br>
                        もちろん自分好みに入力してもOK!
                   </h3>
                   
                    <img src="https://i.gyazo.com/ec3f747c07d29e304b2b320348d708f6.png"></img>
                   <h3 class="pt-3 pb-3">
                       
                        ジャンル分けできるようにジャンルを入力
                        、たったこれだけで登録準備完了！
                   </h3>
                    
                    <img src="https://i.gyazo.com/8ef6935501116dd77a656f3b0c43279d.png"></img>
                    <h3 class="pt-3 pb-3">
                        
                        MAPにピンを立てたい時は住所を入れてボタンを押すとMAPナンバーが自動で取得されます！これだけでOK!
                    </h3>
                   
                    <img src="https://i.gyazo.com/1cd813ac8c18448e54fa50cfe779d703.png"></img>
                   <h3 class="pt-3 pb-3">
                       
                        見たいお店もジャンルリストから楽々検索！
                        登録したURLもすぐに開けるので気になる情報もすぐにGET!
                   </h3>
                   
                    <img src="https://i.gyazo.com/6b9b9e3200d784e618fc8eeea0e897da.png"></img>
                    <h2 class="pt-3 pb-3">
                        
                        未登録の方は右上の新規登録からユーザー登録をしてください！
                    </h2>
                    
               
            </div>
            
        </div>
    </div>
</div>
@endsection
