<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 

use App\Shop;
use App\User;
class Shopscontroller extends Controller
{
    public function add()
    {
        return view('admin.shop.create');    
    }
    
    public function create(Request $request)
    {
        $validated = $this->validate($request, Shop::$rules);
        $shop = new Shop;
        $shop->user_id = Auth::user()->id;
        $shop->fill($validated);
        $shop->save();
        
        return redirect('admin');
    }
    
    public function index(Request $request) 
    {   
        $user = Auth::user()->id;
        $genres_all = Shop::where('user_id', $user)->distinct()->pluck('genre');
        $cond_genre = $request->cond_genre;
      if ($cond_genre != '') {
          $posts = Shop::where('genre', $cond_genre)->where('user_id', $user)->get()->sortByDesc('updated_at');
      } else {
          $posts = Shop::where('user_id', $user)->get()->sortByDesc('updated_at');
      }
        
        return view('admin.shop.front',  ['posts' => $posts, 'genres_all' => $genres_all, 'cond_genre' => $cond_genre]);
    }

    public function delete(Request $request)
    {
        Shop::find($request->id)->delete();

        return redirect('admin/');
    }
    
    
    public function edit(Request $request)
    {
        $shop = Shop::find($request->id);
        if (empty($shop)) {
            abort(404);
        }
        return view('admin.shop.edit', ['shop_form' => $shop]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Shop::$rules);
        $shop = Shop::find($request->id);
        $shop_form = $request->all();
        $shop->fill($shop_form)->save($shop_form);
        return redirect('admin/');
    }
    
    public function test()
    {   
        return view('test');
    }
    
    public function api(Request $request)
    {
        $html = file_get_contents( $request->query('url')); //取得するページの URL
        preg_match('/<head(?: .+?)?>.*?<\/head>/si', $html, $head); //headタグのみ取得
        // OGPパース（タイトル）
        $title = null;
        $image = null;
        $url = null;
        if (preg_match('/.*<meta\s+(.*property\s*=\s*"og:title"\s*.*?)>/si', $head[0], $m)) {
            $param = $m[1];
            if (preg_match('/.*content\s*=\s*"(.*?)".*/si', $param, $m)) {
                $title = $m[1];
            }
        } else {
            
            // OGPが無いときは、titleタグから取得
            if (preg_match('/.*<title\s*.*>\s*(.*)\s*<\/title>.*/si', $head[0], $m)) {
                $title = $m[1];
            }
        }
        if (preg_match('/.*<meta\s+(.*property\s*=\s*"og:image"\s*.*?)>/si', $head[0], $m)) {
            $param = $m[1];
            if (preg_match('/.*content\s*=\s*"(.*?)".*/si', $param, $m)) {
                $image = $m[1];
            }
        }
        if (preg_match('/.*<meta\s+(.*property\s*=\s*"og:url"\s*.*?)>/si', $head[0], $m)) {
            $param = $m[1];
            if (preg_match('/.*content\s*=\s*"(.*?)".*/si', $param, $m)) {
                $url = $m[1];
            }
        }
        return [
            'title' => $title,
            'image' => $image,
            'url'   => $url
        ];
    }
    public function map()
    {
        return view('admin.shop.map');
    }
    
    public function mapmarker() 
    {
       
        $user = Auth::user()->id;
          $map = Shop::where('user_id', $user)->select('name','latitude','longitube')->get();
         
          
    
          return response()->json($map);
    }
    
     public function ind(Request $request) {
        $user = Auth::user();   #ログインユーザー情報を取得します。
        return view('hello', ['user' => $user]);
    }
}
