<?php

namespace  App\Http\Controllers\user;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Images_product;
use App\Models\Products;
use App\Models\Account;
use App\Models\Contacts;
use App\Models\Order_product;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use App\Repositories\Product\ProductRepository;
use App\Models\Role;
use App\Models\User;
use App\Models\Users;
use GuzzleHttp\Psr7\Response;
use Mail;
class DashBoardController extends Controller
{
    public function send(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $mess = $request->input('mess');
        $phone = $request->input('phone');
        $data = [
            'email' => $email,
            'phone' => $phone,
        ];
        $dete = [
            'mess' => $mess,
            'account_id' => session('account_id'),
        ];
        Contacts::create($dete);


        Users::where('account_id', session('account_id'))->update($data);



        return redirect('/success');
    }
    public function success()
    {
        return view('/user/dashboard/success');
    }

    public function index()
    {
        $data = [
            'category' => Category::get(),
            'products' => Products::get()
        ];
        $data = [
            'products' =>
            DB::table('products')->orderBy('update_at', 'desc')->take(12)->get(),

        ];
        if (session()->has('user')) {
            Auth::login(session('user'));
        } elseif (session()->has('account2')) {
            Auth::login(session('account2'));
        }
        if(Auth::check()){
            $user=Auth::user();
            $name=$user->name;
            return view('user/dashboard/index',compact('name'))->with($data);
        }else{
            return view('user/dashboard/index')->with($data);
        }
    }

    //public function search(Request $request)
    //{
    //  $keyword = $request->get('search');
    //  $data = [
    //      'category' => Category::get(),
    //      'products' => Products::where('name', 'like', '%' . $keyword . '%')->get()
    //  ];
    //   view('user/dashboard/shop/layout')->with($data);
    //    return view('user/dashboard/shop/shop')->with($data);
    //}
    public function blog()
    {
        if (session()->has('user')) {
            Auth::login(session('user'));
        } elseif (session()->has('account2')) {
            Auth::login(session('account2'));
        }
        if(Auth::check()){
            $user=Auth::user();
            $name=$user->name;
            return view('user/dashboard/blog',compact('name'));
        }else{
            return view('user/dashboard/blog');
        }

    }
    public function blogrm()
    {
        if (session()->has('user')) {
            Auth::login(session('user'));
        } elseif (session()->has('account2')) {
            Auth::login(session('account2'));
        }
        if(Auth::check()){
            $user=Auth::user();
            $name=$user->name;
            return view('user/dashboard/blogrm',compact('name'));
        }else{
            return view('user/dashboard/blogrm');
        }
    }
    public function blogrm1()
    {
        if (session()->has('user')) {
            Auth::login(session('user'));
        } elseif (session()->has('account2')) {
            Auth::login(session('account2'));
        }
        if(Auth::check()){
            $user=Auth::user();
            $name=$user->name;
            return view('user/dashboard/blogrm1',compact('name'));
        }else{
        return view('user/dashboard/blogrm1');
        }
    }
    public function blogrm2()
    {
        if (session()->has('user')) {
            Auth::login(session('user'));
        } elseif (session()->has('account2')) {
            Auth::login(session('account2'));
        }
        if(Auth::check()){
            $user=Auth::user();
            $name=$user->name;
            return view('user/dashboard/blogrm2',compact('name'));
        }else{
        return view('user/dashboard/blogrm2');
        }
    }
    public function contacts()
    {
        if (session()->has('user')) {
            Auth::login(session('user'));
        } elseif (session()->has('account2')) {
            Auth::login(session('account2'));
        }
        if(Auth::check()){
            $user=Auth::user();
            $name=$user->name;
            return view('user/dashboard/contacts',compact('name'));
        }else{
        return view('user/dashboard/contacts');
        }
    }    
    public function aboutus()
    {
        if (session()->has('user')) {
            Auth::login(session('user'));
        } elseif (session()->has('account2')) {
            Auth::login(session('account2'));
        }
        if(Auth::check()){
            $user=Auth::user();
            $name=$user->name;
            return view('user/pages/aboutus',compact('name'));
        }else{
            return view('user/pages/aboutus');
        }
    }
    public function shoppingcart()
    {
        if (session()->has('user')) {
            Auth::login(session('user'));
        } elseif (session()->has('account2')) {
            Auth::login(session('account2'));
        }
        if(Auth::check()){
            $user=Auth::user();
            $name=$user->name;
            return view('user/pages/shoppingcart',compact('name'));
        }else{
            return view('user/pages/shoppingcart');
        }
    }
    public function details($id)
    {
        $products_categogy_id = DB::table('products')->where('id', $id)->value('categogy_id');

        $data = [
            'category' => Category::all(),
            'product' => Products::find($id),
            'imgs' => Images_product::where('product_id', '=', $id)->get(),
            'products_c' => DB::table('products')->where('categogy_id', $products_categogy_id)->get(),

        ];
        view('user/dashboard/shop/layout')->with($data);
        if (session()->has('user')) {
            Auth::login(session('user'));
        } elseif (session()->has('account2')) {
            Auth::login(session('account2'));
        }
        if(Auth::check()){
            $user=Auth::user();
            $name=$user->name;
            return view('user/dashboard/shop/shopdetails',compact('name'))->with($data);
        }else{
            return view('user/dashboard/shop/shopdetails')->with($data);
        }
    }
    public function product_categogy($id)
    {
        $data = [
            'category' => Category::all(),
            'imgs' => Images_product::where('product_id', '=', $id)->get(),
            'products' => DB::table('products')
                ->join('category', 'products.categogy_id', '=', 'category.id')
                ->where('category.id', $id)
                ->select('products.id', 'products.name', 'products.quantity', 'products.price', 'products.photo')
                ->get(),
        ];
        //   print_r($data['products']->toArray());
        view('user/dashboard/shop/layout')->with($data);
        if (session()->has('user')) {
            Auth::login(session('user'));
        } elseif (session()->has('account2')) {
            Auth::login(session('account2'));
        }
        if(Auth::check()){
            $user=Auth::user();
            $name=$user->name;
            return view('user/dashboard/shop/shop',compact('name'))->with($data);
        }else{
            return view('user/dashboard/shop/shop')->with($data);
        }
    }

    public function signin()
    {
        return view('user/dashboard/login/signin');
    }

    public function logout(Request $request)
    {
        if (session()->has('user')) {
            Auth::logout($request->session()->forget('user'));
        } elseif (session()->has('account2')) {
            Auth::logout($request->session()->forget('account2'));
        }
        $data = [
            'category' => Category::get(),
            'products' => Products::get()
        ];
        $data = [
            'products' =>
            DB::table('products')->orderBy('update_at', 'desc')->take(12)->get(),

        ];
        return view('user/dashboard/index')->with($data);
    }
    public function signincheck(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');

        $account = Account::where('username','=',$username)->first();
        if ($account && Hash::check($password, $account->password) && $account->role_id == 2) {
            Auth::login($account);
            if(Auth::check()){
                $user=Auth::user();
                $username=$user->username;
                $password=$user->password;
                $photo=$user->photo;
                $email=$user->email;
                $name=$user->name;
               session(['user'=>$account]);
                $data = [
                    'category' => Category::get(),
                    'products' => Products::get()
                ];
                $data = [
                    'products' =>
                    DB::table('products')->orderBy('update_at', 'desc')->take(12)->get(),
        
                ];
               return view('user/dashboard/index',compact('name'))->with($data)->with(session(['user'=>$account]));
            }else{
                return redirect()->back()->with('error', 'Invalid Username or Password');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }
    // public function signiancheck(Request $request)
    // {
    //     $username = trim($request->input('name'));
    //     $password = trim($request->input('password'));

    //     $account = Account::where('name', '=', $username)->first();
    //     if ($account) {
    //         if (password_verify($password, $account->password) || ($account->password == $password)) {
    //             $request->session()->put('role_id', $account->role_id);
    //             $request->session()->put('account_id', $account->id);
    //             $request->session()->put('username', $account->name);

    //             if (password_verify($password, $account->password)) {
    //                 $user = Auth::user();
    //                 session(['user' => $user]);
    //                 return redirect('/')->route('index');
    //             } else {
    //                 return redirect()->back()->with('error', 'Invalid Username or Password');
    //             }
    //         } else {
    //             return redirect()->back()->with('error', 'Invalid credentials');
    //         }
    //     }
    // }

    public function account()
    {
        $data = [
            'user' => DB::table('users')->where('account_id', session('account_id'))->get(),
        ];
        // print_r($data['user']);
        // echo  session('account_id');
        if (session()->has('user')) {
            Auth::login(session('user'));
        } elseif (session()->has('account2')) {
            Auth::login(session('account2'));
        }
        if(Auth::check()){
            $user=Auth::user();
            $name=$user->name;
            return view('user/dashboard/info',compact('name'))->with($data);
        }else{
            return view('user/dashboard/info')->with($data);
        }

    }


    public function shop_cart()
    {
        $user_id = DB::table('users')->where('account_id', '=', session('user_id'))->value('id');
        $order_id = DB::table('orders')->where('user_id', '=', $user_id)->value('id');
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

        echo print_r($product);
        // $idd= $order_products[2]['product_id'];
        // return view('/user/pages/shoppingcart',compact('product'));
    }


    public function test($id)
    {
        $data = [
            'product' => Products::find($id)
        ];
        if (session()->has('user')) {
            Auth::login(session('user'));
        } elseif (session()->has('account2')) {
            Auth::login(session('account2'));
        }
        if(Auth::check()){
            $user=Auth::user();
            $name=$user->name;
            return view('user/dashboard/test',compact('name'))->with($data);
        }else{
            return view('user/dashboard/test')->with($data);
        }
    }
    public function testt($id)
    {
        $data = [
            'product' => Products::find($id)
        ];
        if (session()->has('user')) {
            Auth::login(session('user'));
        } elseif (session()->has('account2')) {
            Auth::login(session('account2'));
        }
        if(Auth::check()){
            $user=Auth::user();
            $name=$user->name;
            return view('user/dashboard/testt',compact('name'))->with($data);
        }else{
            return view('user/dashboard/testt')->with($data);
        }
    }
    public function signup()
    {
        return view('user/dashboard/login/signup');
    }

    public function add(Request $request){
        $request->session()->forget('user');
        $role=Role::where('permission','User')->value('id');
        $user = [
            'username'=>$request->input('username'),
            'password'=>Hash::make($request->input('password')),
            'role_id'=>$role,
            'name'=>'User@'.substr(uniqid(),0,6),
            'email' => $request->input('email'),
            'created'=> now()->format('Y-m-d'),
            'update'=>now()->format('Y-m-d'),
        ];
        if($user){
            $userCreated=Account::create($user);
            if($userCreated){
                $username=$user['username'];
                Auth::login($userCreated);
                $account2 = Account::where('username','=',$username)->first();
                session(['account2'=>$account2]);
                if(Auth::check()){
                    Auth::login($userCreated);
                    $user = Auth::user();
                    $name = $user->name;
                    $password =$user->password;
                    $username=$user->username;
                    $email=$user->email;
                    $data = [
                        'category' => Category::get(),
                        'products' => Products::get()
                    ];
                    $data = [
                        'products' =>
                        DB::table('products')->orderBy('update_at', 'desc')->take(12)->get(),          
                    ];
                    return view('user/dashboard/index', compact('name','username','password','email'))->with($data)->with( session(['account2'=>$account2]));
                }
            }
        }
        $id_acc = Account::orderBy('id', 'desc')->take(1)->value('id');
        $user = [
            'account_id' => $id_acc,
            'email' => $request->input('email'),
        ];
        Users::create($user);

        // // $contacts = [
        // //     'account_id' => $id_acc,
        // //     'mess' => '',    
        // // ];
        // // Contacts::create($contacts);



        $id_user = Users::orderBy('id', 'desc')->take(1)->value('id');
        $order = [
            'user_id' => $id_user,
            'status' => 0,
        ];

        Orders::create($order);

        return redirect('/');
    }
    public function update(Request $request)
    {
        $user1 = [
            'name' => $request->input('name'),
            'password' => Hash::make($request->input('password')),
            'role_id' => 'User',
            'email' => $request->input('email'),
            'created' => now()->format('Y-m-d'),
            'update' => now()->format('Y-m-d'),
        ];
        $id = $request->input('id');
        Account::find($id)->update($user1);
        return redirect('user/userprofile');
    }
    public function new()
    {
        $data = [
            'products' =>
            DB::table('products')->orderBy('update_at', 'desc')->get()
        ];
        print_r($data['products']->toArray());
        if (session()->has('user')) {
            Auth::login(session('user'));
        } elseif (session()->has('account2')) {
            Auth::login(session('account2'));
        }
        if(Auth::check()){
            $user=Auth::user();
            $name=$user->name;
            return view('/',compact('name'))->with($data);
        }else{
            return view('/')->with($data);
        }
    }

/* QuocDat Comment hehe*/
/* Check lai xem */
/* khong thay gi het */
/* Thanh tUna Comment hehe*/
/* QuocDat Comment hehe*/
/* Check lai xem */
/* khong thay gi het */
/* Thanh tUna Comment hehe*/
public function shop(Request $request)
    {
        $perPage = 8; // Số sản phẩm hiển thị trên mỗi trang
        $query = Products::query();
        // Sắp xếp sản phẩm theo ngày tạo
        $query->orderBy('id', 'desc');
        // Lấy danh sách sản phẩm đã phân trang
        
        $products = $query->paginate($perPage);   
        $data = [
                 'category' => Category::get(),
                 //'products' => Products::where('name', 'like', '%' . $keyword . '%')->get()
              ];
        
        
        view('user/dashboard/shop/layout');
        //Truyền danh sách sản phẩm và các tham số phân trang tới view
        if (session()->has('user')) {
            Auth::login(session('user'));
        } elseif (session()->has('account2')) {
            Auth::login(session('account2'));
        }
        if(Auth::check()){
            $user=Auth::user();
            $name=$user->name;
            return view('user/dashboard/shop/shop',['products' => $products,],compact('name'))->with($data);
        }else{
            return view('user/dashboard/shop/shop', [
                'products' => $products,
            ])->with($data);
        }
    }
    public function search(Request $request)
    {   $keyword = $request->get('search');
        $perPage = 8; // Số sản phẩm hiển thị trên mỗi trang
        $query = Products::query();
        // Sắp xếp sản phẩm theo ngày tạo
        $query->where('name', 'like', '%' . $keyword . '%')->get();
        // Lấy danh sách sản phẩm đã phân trang
        
        $products = $query->paginate($perPage);   
        $data = [
                 'category' => Category::get(),
                 //'products' => Products::where('name', 'like', '%' . $keyword . '%')->get()
              ];
        
        
        view('user/dashboard/shop/layout');
        //Truyền danh sách sản phẩm và các tham số phân trang tới view
        
        if (session()->has('user')) {
            Auth::login(session('user'));
        } elseif (session()->has('account2')) {
            Auth::login(session('account2'));
        }
        if(Auth::check()){
            $user=Auth::user();
            $name=$user->name;
            return view('user/dashboard/shop/shop',['products' => $products,],compact('name'))->with($data);
        }else{
            return view('user/dashboard/shop/shop', [
                'products' => $products,
            ])->with($data);
        }
    }
    public function detailsprofile(){
        if (session()->has('user')) {
            Auth::login(session('user'));
        } elseif (session()->has('account2')) {
            Auth::login(session('account2'));
        }
        if(Auth::check()){
            $user=Auth::user();
            $name=$user->name;
            $username=$user->username;
            $password=$user->password;
            $email=$user->password;
            return view('user/profile/details',compact('name','username','email','password'));
        }
    }
}