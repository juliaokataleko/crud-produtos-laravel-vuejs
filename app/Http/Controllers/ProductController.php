<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::orderBy('id', 'DESC')->get();
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
        $newProduct = new Product;
        $newProduct->name = $request->product['name'];
        $newProduct->price = $request->product['price'];
        $newProduct->image = $request->product['image'];
        $newProduct->save();

        return $newProduct;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find( $id );

        if($product) 
        {
            $product->name = $request->product['name'];
            $product->price = $request->product['price'];
            $product->image = $request->product['image'];
            $product->available = $request->product['available'] ? true : false;
            $product->status = $request->product['status'] ? true : false;
            $product->save();

            return $product;
        }

        return "Produto não encontrado.";
    }

    public function changeStatus(Request $request, $id)
    {
        $product = Product::find( $id );

        if($product) 
        {
            $product->status = $request->product['status'] ? true : false;
            $product->save();

            return $product;
        }

        return "Produto não encontrado.";
    }

    public function changeAvailableStatus(Request $request, $id)
    {
        $product = Product::find( $id );

        if($product) 
        {
            $product->available = $request->product['available'] ? true : false;
            $product->save();

            return $product;
        }

        return "Produto não encontrado.";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find( $id );

        if($product) 
        {
            $product->delete();
            return "Produto excluído com sucesso.";
        }

        return "Produto não encontrado.";
    }
}
