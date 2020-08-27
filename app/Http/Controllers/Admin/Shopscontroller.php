<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\shop;
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
        $shop->fill($validated);
        $shop->save();
        
        return redirect('admin');
    }
    
    public function index(Request $request) 
    {
        $genres_all = Shop::distinct()->pluck('genre');
        $cond_genre = $request->cond_genre;
      if ($cond_genre != '') {
          $posts = Shop::where('genre', $cond_genre)->get();
      } else {
          $posts = Shop::all();
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
    
}
