<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public function showHome(Request $request)
    {
    	$banner = DB::table('slide')->get();
    	$newest = DB::table('products')
    		->where('new',1)
    		->orderBy('updated_at', 'desc')
    		->take(4)
    		->get();
    	$best_seller = DB::table('products')
    	    ->leftJoin('bill_detail', 'bill_detail.id', '=', 'products.id')
    	    ->select('products.*', 'bill_detail.quantity')
    	    ->orderBy('bill_detail.quantity','desc')
    	    ->take(12)
    	    ->get();
    	return view('index')->with([
    		'banner' 	 =>$banner,
    		'newest' 	 =>$newest,
    		'best_seller'=>$best_seller
    	]);

    }
    public function showProduct(Request $request)
    {
    	$products = DB::table('products');
    	if($request->id && $request->id > 0)
    	{ 
    		$products = $products->where('id_type', $request->id);
    	}
    	$products = $products->orderBy('updated_at', 'desc')
   	                         ->paginate(16);
   	                         
    	return view('products')->with([
    		'products'=>$products
    	]);

    }

    public function showProductDetail(Request $request, $id)
    {
    	$detail = DB::table('products')
    	          ->where('id', $id)
    	          ->get();
    	    if($detail != null && count($detail)>0)
    	    {
    	    	$detail = $detail[0];
    	    }

        $best_seller = DB::table('products')
            ->leftJoin('bill_detail', 'bill_detail.id', '=', 'products.id')
            ->select('products.*', 'bill_detail.quantity')
            ->orderBy('bill_detail.quantity','desc')
            ->take(4)
            ->get();

            $newest = DB::table('products')
            ->where('new',1)
            ->orderBy('updated_at', 'desc')
            ->take(4)
            ->get();
            
            $id_type  = $detail->id_type;
            $products = DB::table('products')
                        ->where('id_type', $id_type)
                        ->orderBy('updated_at', 'desc')
                        ->take(3)
                        ->get();

    	    return view('detail')->with([
    		'detail'      =>$detail,
            'best_seller' =>$best_seller,
            'newest'      =>$newest,
            'products'    =>$products
    	]);
    }

    public function showProductCart(Request $request)
    {
        //take value in cart
        $cart = [];
        if(isset($_COOKIE['cart']))
        {
            $json = $_COOKIE['cart'];
            //MAKE OBJECT
                $arr = json_decode($json);
                $ids = [];
                //look which ids not exist then add into $ids
                foreach ($arr as $item)
                {
                    if(!in_array($item->id,$ids))
                    {
                        $ids[] = $item->id;
                    }
                }
                $products = DB::table('products')
                            ->whereIn('id', $ids)
                            ->select('id','name', 'unit_price', 'promotion_price')
                            ->get();
                    foreach($arr as $item)
                    {
                        foreach($products as $pro)
                        {
                            if($item->id == $pro->id)
                            {
                                $item->name = $pro->name;
                                $item->price = $pro->promotion_price;
                                if($pro->promotion_price==0)
                                {
                                    $item->price = $pro->unit_price;
                                }

                                break;
                            }
                        }
                    }
        }
        return view('cart')->with(['carts'=>$arr 
        ]);
    }

    public function showCheckout(Request $request)
    {
        $cart = [];
        if(isset($_COOKIE['cart']))
        {
            $json = $_COOKIE['cart'];
            //MAKE OBJECT
                $arr = json_decode($json);
                $ids = [];
                //look which ids not exist then add into $ids
                foreach ($arr as $item)
                {
                    if(!in_array($item->id,$ids))
                    {
                        $ids[] = $item->id;
                    }
                }
                $products = DB::table('products')
                            ->whereIn('id', $ids)
                            ->select('id','name', 'unit_price', 'promotion_price')
                            ->get();
                    foreach($arr as $item)
                    {
                        foreach($products as $pro)
                        {
                            if($item->id == $pro->id)
                            {
                                $item->name = $pro->name;
                                $item->price = $pro->promotion_price;
                                if($pro->promotion_price==0)
                                {
                                    $item->price = $pro->unit_price;
                                }

                                break;
                            }
                        }
                    }
        }
        return view('checkout')->with(['carts'=>$arr 
        ]);
    }


}
