<?php

namespace App\Http\Controllers;
use App\Models\user;
use App\Models\product;
use App\Models\profile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count = 0;
        $products = product::all();
        foreach ($products as $product) {
            // return ("asd");
            $publish_time = $product->created_at;
            $curren_time = date('y-m-s H:i:s');
            $time = strtotime($publish_time) - strtotime($curren_time);
            // return date('d M Y H:i:s',$time);
            if($time > 86400)
            {
                $count = $products->count()-1;
            }
        }
        // return $count;
        // $users = User::all();
        $users = User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME (created_at) as month_name"))
                    
                    ->groupBy(DB::raw("month_name"))
                    
                    ->pluck('count', 'month_name');

        $Products = product::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME (created_at) as month_name"))
                    
         ->groupBy(DB::raw("month_name"))
                    
        ->pluck('count', 'month_name');
        // return $Products;
        $labels2 = $Products->keys();
        $data2 = $Products->values();
        
        $labels = $users->keys();
        $data = $users->values();
        return view('admin.index',compact('labels', 'data','labels2','data2','count','users'));
    }
}
