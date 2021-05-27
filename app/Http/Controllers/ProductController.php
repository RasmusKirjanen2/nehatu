<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // sa saad kustutada pilte sellega
use Auth; // for logout
use Session;

class ProductController extends Controller
{
   
    public function products()
	{
		//$product = Product::all();
        $product = Product::orderBy('created_at', 'desc')->paginate(21);
         //dd($product);
      
         return view('products', ['products' => $product]);

	}

    public function posts(){
        //$product = Product::all();
        $product = Product::orderBy('created_at', 'desc')->paginate(21);
        return view('posts', ['products' => $product]);
    }



    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([                          // siia saab lisada näiteks kui pikk tekst võib olla, või kas formi peab kindlasti andmeid sisestama
            'product_name' => ['required', 'min:2', 'max:50'],
            'product_price' => 'required',
            'product_desc' => ['required', 'min:2', 'max:400'],
            'product_img' => 'image|nullable|max:1999'	// 1999-just under 2MB
        ]);

        // Handle File Upload
        if($request->hasFile('product_img')){
            // Get filename with the extension
            $filenameWithExt = $request->file('product_img')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('product_img')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('product_img')->storeAs('public/uploads', $fileNameToStore);
        }


        $product = new Product();
        $product->product_name = request('product_name');
        $product->product_price = request('product_price');
        $product->product_desc = request('product_desc');
        $user_id = Auth::id();
        $product->user_id = $user_id;

        if($request->hasFile('product_img')){
            $product->upload_img = $fileNameToStore;
        }
        $product->save();

        return redirect('/products');
    }

  
    public function show($id)
    {
        $product = Product::find($id);
        $comments = Comment::orderBy('id','DESC')->where('product_id', $id)->paginate(10);

		return view('products.show', ['product' => $product, 'comments' => $comments]);  // resources/views/articles/show.blade.php
    }

  
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([                          // siia saab lisada näiteks kui pikk tekst võib olla, või kas formi peab kindlasti teksti sisestama
            'product_name' => ['required', 'min:2', 'max:50'],
            'product_price' => 'required',
            'product_desc' => ['required', 'min:2', 'max:400'],
            'product_img' => 'image|nullable|max:1999'    // 1999-just under 2MB
        ]);

        // Handle File Upload
        if ($request->hasFile('product_img')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('product_img')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('product_img')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('product_img')->storeAs('public/uploads', $fileNameToStore);

        }

        $product = Product::findOrFail($id);
        $product->product_name = request('product_name');
        $product->product_price = request('product_price');
        $product->product_desc = request('product_desc');

        if ($request->hasFile('product_img')) {

            Storage::delete('public/uploads/' . $product->factory_img);
            Storage::delete('public/uploads/' . $product->upload_img);
            $product->upload_img = $fileNameToStore;

        }
        $product->save();

        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        Storage::delete('public/uploads/' . $product->factory_img);
        Storage::delete('public/uploads/' . $product->upload_img);

        Storage::delete('public/thumbnails/' . $product->factory_img);
        Storage::delete('public/thumbnails/' . $product->upload_img);

        $product->delete();

        return redirect('/products');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/products');
    }

}
