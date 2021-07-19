<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePorductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['products']= Product::all();
        return view('pages.products.product',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['categories'] = Product::CategoryListArray ();      
        return view('pages.products.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePorductRequest $request)
    {
        $data = $request->all();
        if(Product::create($data))
        {
            return redirect()->to('products')->with('success','Product is Saved Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $this->data['product']=Product::find($id);
      $this->data['category'] = Product::CategoryListArray ();

      return view('pages.products.show',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['product']   = Product::findOrFail($id);
        $this->data['categories'] = Product::CategoryListArray ();

        return view('pages.products.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $data = $request->all();

        $product = Product::find($id);
        $product->category_id  = $data['category_id'];
        $product->title        = $data['title'];
        $product->description  = $data['description'];
        $product->cost_price   = $data['cost_price'];
        $product->price        = $data['price'];
        $product->save();

        return redirect()->to('products')->with('success','Product is Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::find($id);
        $data->delete();
 
        return redirect()->to('products')->with('success','User Data is Deleted Successfully');
    }
}
