<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\PosProducts;
use Illuminate\Http\Request;
use App\Models\PointOfSaleEqualSalaProduct;

class AddProduct extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $Products =  PointOfSaleEqualSalaProduct::where('client_id', auth()->user()->id)->paginate(10);
        $ProductsIds = $Products->pluck('sala_product_id');
        $BotagatyProductsIds = $Products->pluck('botagate_product_code');
        $SalaProducts = Product::select('product_id', 'name', 'image')->whereIn('product_id', $ProductsIds)->get()->keyBy('product_id');
        $BotagatyProducts = PosProducts::select('product_code', 'name')->whereIn('product_code', $BotagatyProductsIds)->get()->keyBy('product_code');
        foreach ($Products as $Product) {
            $Product['sala_product_image'] = $SalaProducts[$Product->sala_product_id]->image ?? 'No Name';
            $Product['sala_product_name'] = $SalaProducts[$Product->sala_product_id]->name ?? 'No Name';
            $Product['botagaty_product_name'] =  $BotagatyProducts[$Product->botagate_product_code]->name->ar ?? 'No Name';
        }

        $BotagatyProducty = PosProducts::select('product_code', 'name')->whereIn('product_code', $Products)->get()->keyBy('product_code');

        // dd($Product);
        return view('admin.sallaproduct.add new.add', compact('Products', 'BotagatyProducty'));
    }


    // public function LinkWithAjax(Request $request)
    // {
    //     try {
    //         PosProducts::create([
    //             'client_id' => $request->client_id,
    //             'product_code' => $request->product_code,
    //             'name' => $request->name,
    //             'product_price' => $request->product_price,
    //             'product_currency' => $request->product_currency,
    //             'pos_price' => $request->product_currency,
    //             'product_currency' => $request->product_currency,
    //             'product_currency' => $request->product_currency,
    //             'quantitiy' => $request->qunatity,
    //             'client_id' => $request->client_id,
    //         ]);

    //         return response()->json([
    //             'message' => 'the Product Was Realte Successfuley',
    //             'code' => 1,
    //         ]);
    //     } catch (Exception $e) {
    //         return $e;
    //         return response()->json([
    //             'message' => 'Some Thing Went Wrong',
    //             'code' => 2,
    //         ]);
    //     }
    // }
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
