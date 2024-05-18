<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sale;
use App\Models\Product;
use App\Models\Category;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $title = 'Tổng quan';
        $total_purchases = Purchase::where('expiry_date','!=',Carbon::now())->count();
        $total_categories = Category::count();
        $total_suppliers = Supplier::count();
        $total_sales = Sale::count();
        
        $pieChart = app()->chartjs
                ->name('pieChart')
                ->type('pie')
                ->size(['width' => 400, 'height' => 200])
                ->labels(['Số lượng mua hàng', 'Số lượng nhà cung cấp','Số lượng bán hàng'])
                ->datasets([
                    [
                        'backgroundColor' => ['#FF6384', '#36A2EB','#7bb13c'],
                        'hoverBackgroundColor' => ['#FF6384', '#36A2EB','#7bb13c'],
                        'data' => [$total_purchases, $total_suppliers,$total_sales]
                    ]
                ])
                ->options([]);
        
        $total_expired_products = Purchase::whereDate('expiry_date', '<', Carbon::now())->count();
        $latest_sales = Sale::whereDate('created_at','=',Carbon::now())->get();
        $today_sales = Sale::whereDate('created_at','=',Carbon::now())->sum('total_price');
        $weekly_sales = Sale::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('total_price');
        $monthly_sales = Sale::whereMonth('created_at', Carbon::now()->month)->sum('total_price');
        $yearly_sales = Sale::whereYear('created_at', Carbon::now()->year)->sum('total_price');
        $best_selling_product = Purchase::select('product', DB::raw('SUM(quantity) as total_quantity'))
        ->groupBy('product')
        ->orderByDesc('total_quantity')
        ->first();
        $best_selling_product_name = $best_selling_product->product;
        $best_selling_product_quantity = $best_selling_product->total_quantity;
        // dd($best_selling_product_name);

        return view('admin.dashboard',compact(
            'title','pieChart','total_expired_products',
            'latest_sales','today_sales', 'total_categories','weekly_sales', 'monthly_sales', 'yearly_sales', 'best_selling_product_name'
        ));
    }
}
