<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index(Request $request)
    {
    	return'Book List';
    }

    public function View(Request $request)
    {
    	return'View Book List';
    }
}
