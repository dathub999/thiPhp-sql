<?php

namespace  App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Order_product;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepository;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class CartController extends Controller
{



    public function index(Request $request)
    {

        $data = [
            'cart' => $request->session()->get('cart')
        ];
        // echo $data['cart'][0]['product']['name'];
        // dd($data['cart']);
        return view('user.pages.shoppingcart')->with($data);
    }
    public function savecart(Request $request)
    {

        $user_id = DB::table('users')->where('account_id', '=', session('account_id'))->value('id');
        $order_id = DB::table('orders')->where('user_id', '=', $user_id)->value('id');
        $cart = $request->session()->get('cart');

        foreach ($cart as $item) {
            $id_order_product = Order_product::where('product_id', '=', $item['product']->id)->where('order_id', '=', $order_id)->value('id');
            if ($id_order_product != null) {
                $data = [
                    'order_id' => $order_id,
                    'product_id' => $item['product']->id,
                    'quantity_product_order' => $item['quantity'],
                ];
                Order_product::find($id_order_product)->update($data);
                $request->session()->forget('cart');
            } else {
                $data = [
                    'order_id' => $order_id,
                    'product_id' => $item['product']->id,
                    'quantity_product_order' => $item['quantity'],
                ];
                Order_product::create($data);
                $request->session()->forget('cart');
            };
        };
        $data = [
            // 'cart' => $request->session()->get('cart')
        ];
        return view('user.pages.shoppingcart')->with($data);
    }
    public function layoutpaidcart()
    {
        $user_id = DB::table('users')->where('account_id', '=', session('account_id'))->value('id');
        $order_id = DB::table('orders')->where('user_id', '=', $user_id)->where('status', '=', 1)->orderBy('id','desc')->first();
        // dd($order_product);
        if ($order_id == null) {
           
             return view('user.dashboard.cart.cartsaved');
        } else {
            $order_id= $order_id->id; 
            $order_product = DB::table('order_product')->where('order_id', '=', $order_id)->get();
            $product = [[]];
            $id = 0;
            foreach ($order_product as $item) {
                
                if ($id > 0) {
                    foreach ($product as $x) {
                        if ($x['id'] == $item->product_id) {
                            continue;
                        };
                    }
                }
                $product[$id] = [
                    'id' => DB::table('products')->where('id', '=', $item->product_id)->value('id'),
                    'name' => DB::table('products')->where('id', '=', $item->product_id)->value('name'),
                    'price' => DB::table('products')->where('id', '=', $item->product_id)->value('price'),
                    'quantity' => $item->quantity_product_order,
                    'photo' => DB::table('products')->where('id', '=', $item->product_id)->value('photo'),
                ];
                $id++;
            };
            $data = [
                'cart' => $product,
            ];
            //    dd($data['cart']);
            return view('user.dashboard.cart.cartsaved')->with($data);
        }
    }
    public function addorder(Request $request)
    {
        if (!$request->session()->has('cart')) {
            $cart = array();
            array_push($cart, [
                'product' => Products::find($request->id),
                'quantity' => 1
            ]);
            $request->session()->put('cart', $cart);
        } else {
            $cart = $request->session()->get('cart');
            $index = $this->exists($request->id, $cart);
            if ($index == -1) {
                array_push($cart, [
                    'product' => Products::find($request->id),
                    'quantity' => 1
                ]);
            } else {
                $cart[$index]['quantity']++;
            }
            $request->session()->put('cart', $cart);
        }
        return response()->json( ['code' => 200], status: 200);
    }
    public function remove($id, Request $request)
    {
        $cart = $request->session()->get('cart');
        $index = $this->exists($id, $cart);
        unset($cart[$index]);
        $request->session()->put('cart', array_values($cart));
        return redirect('pages/shoppingcart');
    }
    private function exists($id, $cart)
    {
        for ($i = 0; $i < count($cart); $i++) {
            if ($cart[$i]['product']->id == $id) {
                return $i;
            }
        }
        return -1;
    }
    public function buy($id, Request $request)
    {
        $data = [
            'product' => Products::find($id),
        ];
        return view('user/dashboard/test')->with($data);
    }
    public function updatecart(Request $request)
    {
        $cart = $request->session()->get('cart');
        $cart[$request->id]['quantity'] = $request->quantity;
        $request->session()->put('cart', $cart);
        $data = [
            'cart' => $request->session()->get('cart')
        ];
        $cartcpn = view('user.pages.shoppingcart')->with($data)->render();
        return response()->json(['cart_component' => $cartcpn, 'code' => 200], status: 200);
    }
    public function payment(Request $request)
    {  
        
        $user_id = DB::table('users')->where('account_id', '=', session('account_id'))->value('id');
        $order_id = DB::table('orders')->where('user_id', '=', $user_id)->where('status', '=', 0)->value('id');
        $currentDate = Carbon::now()->toDateString();
        $cart = $request->session()->get('cart');
        foreach ($cart as $item) {
            $id_order_product = Order_product::where('product_id', '=', $item['product']->id)->where('order_id', '=', $order_id)->value('id');
            $data = [
                    'order_id' => $order_id,
                    'product_id' => $item['product']->id,
                    'quantity_product_order' => $item['quantity'],
                ];
                Order_product::create($data);
        }
        $data=[
        'status'=>1,
        'update_at'=>$currentDate,
        ];
        Orders::find($order_id)->update($data);
        
        $data=[
           'user_id'=> $user_id,
           'status'=>0,
            'created_at'=>$currentDate,
        ];
        Orders::create($data);
        $request->session()->forget('cart');
             return redirect('pages/shoppingcart');
    }

}
