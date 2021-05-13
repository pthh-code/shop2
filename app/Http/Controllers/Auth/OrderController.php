<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(Request $request)
    {
    	return'Order List';
    }

    public function View(Request $request)
    {
    	return'view order List';
    }
}
