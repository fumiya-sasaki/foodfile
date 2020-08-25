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
        
        return redirect('admin/shop/create');
    }
    
    public function index() 
    {
        $posts = Shop::all()->sortByDesc('update_at');
        $genres_all = Shop::distinct()->pluck('genre');
        
        
        return view('admin.shop.front', ['posts' => $posts, 'genres_all' => $genres_all]);
    }
    public function delete(Request $request)
    {
        Shop::find($request->id)->delete();

        return redirect('admin/');
    }
    
    public function url()
    {
        return view('admin.url');
    }
    
    public function index2(Request $request)
    {
        $cond_name = $request->cond_name;
      if ($cond_name != '') {
          $posts = Shop::where('title', $cond_name)->get();
      } else {
          $posts = Shop::all();
      }
      return view('admin.shop.index', ['posts' => $posts, 'cond_name' => $cond_name]);
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
