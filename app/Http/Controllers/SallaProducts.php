<?php

namespace App\Http\Controllers;

use App\Models\PointOfSaleEqualSalaProduct;
use App\Models\PosProducts;
use App\Models\Product;
use Illuminate\Http\Request;

class SallaProducts extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Products = Product::paginate(10);
        return view('Admin.SallaProduct.index', compact('Products'));
    }

    public function selectedProduct()
    {
        $Products =  PointOfSaleEqualSalaProduct::where('client_id', auth()->user()->id)->paginate(10);
        $ProductsIds = $Products->pluck('sala_product_id');
        $BotagatyProductsIds = $Products->pluck('botagate_product_code');
        $SalaProducts = Product::select('product_id', 'name', 'image')->whereIn('product_id', $ProductsIds)->get()->keyBy('product_id');
        $BotagatyProducts = PosProducts::select('product_code', 'name')->whereIn('product_code', $BotagatyProductsIds)->get()->keyBy('product_code');
        foreach ($Products as $Product) {
            $Product['sala_product_image'] = $SalaProducts[$Product->sala_product_id]->image ?? 'No Name';
            $Product['sala_product_name'] = $SalaProducts[$Product->sala_product_id]->name ?? 'No Name';
            $Product['botagaty_product_name'] = $BotagatyProducts[$Product->botagate_product_code]->name ?? 'No Name';
        }

        // dd($BotagatyProductsIds, $BotagatyProducts , $Products[0]['botagaty_product_name']->ar);

        // dd($SalaProducts, $ProductsIds[0]);
        return view('Admin.SallaProduct.related', compact('Products'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
