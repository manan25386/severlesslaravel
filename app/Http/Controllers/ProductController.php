<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Validator;


class ProductController extends Controller
{
    
    public function getProdsByUpc(Request $request)
    {
        $input     = $request->all();
        $validator = Validator::make($input, [
            'username' => 'required',
            'password' => 'required',
            'data.product.*.upc' => ['required'],
        ]);
        if($validator->fails()){
            return $validator->errors();       
        } 
        $finalData = []; 
        if(isset($input['data']) && isset($input['data']['product'])){
            foreach($input['data']['product'] as $upsData){
                if(isset($upsData['upc'])){
                    $tempData = []; 
                    $prodData = Product::leftJoin('Brand', function($join) {
                      $join->on('Product.BrandId', '=', 'Brand.Id');
                    })->select('Product.PartNumber', 'Brand.Name as product_brand')->where('Product.UPC',$upsData['upc'])->first();
                    if($prodData === null){
                        $tempData['upc']            = $upsData['upc'];
                        $tempData['already_exists'] = false;
                    }else{                       
                        $tempData['upc']            = $upsData['upc'];
                        $tempData['already_exists'] = true;
                        $tempData['part_number']    = $prodData->PartNumber;
                        $tempData['product_brand']  = $prodData->product_brand;
                    }
                    $finalData[] = $tempData;  
                }
            }
        }
        $vendor_products = array('result' => $finalData);
        return response()->json(array("status"=> 1, "vendor_products"=> $vendor_products));
        
    }

    public function showOneAuthor($id)
    {
        return response()->json(Product::find($id));
    }

    public function create(Request $request)
    {
        $author = Product::create($request->all());

        return response()->json($author, 201);
    }

    public function update($id, Request $request)
    {
        $author = Product::findOrFail($id);
        $author->update($request->all());

        return response()->json($author, 200);
    }

    public function delete($id)
    {
        Product::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }

}