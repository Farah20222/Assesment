<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
class OrdersController extends Controller
{
    public function firstCustomerBySpentAmount()
    {
        $customer = Customer::select('customers.customerName', DB::raw('SUM(orderdetails.quantityOrdered * orderdetails.priceEach) as total_spent'))
            ->join('orders', 'customers.customerNumber', '=', 'orders.customerNumber')
            ->join('orderdetails', 'orders.orderNumber', '=', 'orderdetails.orderNumber')
            ->groupBy('customers.customerNumber')
            ->orderByDesc('total_spent')
            ->first();

        return response()->json([
            'customer' => $customer
        ]);
    }

    /**
     * Find the first customer who has the highest number of orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function firstCustomerByOrders()
    {
        $customer = Customer::select('customers.customerName', DB::raw('COUNT(orders.orderNumber) as total_orders'))
            ->join('orders', 'customers.customerNumber', '=', 'orders.customerNumber')
            ->groupBy('customers.customerNumber')
            ->orderByDesc('total_orders')
            ->first();

        return response()->json([
            'customer' => $customer
        ]);
    }
}
