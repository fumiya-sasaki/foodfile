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
        $this->validate($request, Shop::$rules);
        $shop = new Shop;
        $form = $request->all();
        $shop->fill($form);
        $shop->save();
        
        return redirect('admin/shop/create');
    }
}
