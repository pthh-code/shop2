<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Products;
use App\Type_products;
use App\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Bills;
use App\Customer;
use App\BillDetail;

class PageController extends Controller
{
  
    public function getIndex()
    {
    	//Get all slides
    	$slide = slide::all();
    	//Get product new product
    	$new_product = products::where('new',1)->get();

    	return view('pages.home',['slide'=>$slide, 'new_product'=>$new_product]);
    }
    public function getProductType($type)
    {
    	$prod_Ftype    = Products::where('id_type',$type)->get();
        $prod_elsetype = Products::where('id_type','<>',$type)->paginate(3);
        $proType = Type_products::where('id',$type)->get();
        $allType = Type_products::all();
        $k_prod  = Type_products::where('id',$type)->first();
    	 return view('pages.product_type',['pro_Type'=>$proType,'prod_Ftype'=>$prod_Ftype,'allType'=>$allType,'prod_elsetype'=>$prod_elsetype, 'k_prod'=>$k_prod]);
    }
    public function getProductDetail(Request $req)
    {
        $product = Products::where('id', $req->id)->first();
        $prod_same = Products::where('id_type',$product->id_type)->paginate(3);
        $new_product_d = Products::where('new',1)->get();
    	return view('pages.product_detail',['product'=>$product,'prod_same'=>$prod_same,'new_product_d'=>$new_product_d]);

      }
    public function getContact()
    {
    	return view('pages.contact');
    }
    public function getAbout()
    {
    	return view('pages.about');
    }
    public function getAddToCart(Request $req, $id)
    {
        $product = Products::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart    = new Cart($oldCart);
        $cart->add($product, $id);
        $req->Session()->put('cart', $cart);
        return redirect()->back();
    }
    public function deleteItemCart($id)
    {
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart    = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items>0))
        {
            Session::put('cart', $cart);
        }
        else
        {
            Session::forget('cart');
        }
        
        return redirect()->back();

    }
    public function getCheckout(){
        return view('pages.order');
    }
    public function postCheckout(Request $req)
    {
        $cart = Session::get('cart');

        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bills;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Success to order');

    }
}
