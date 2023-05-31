<?php

namespace App\Http\Controllers\FOU;

use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogController extends Controller
{
    public function index(): View
    {
        return view('FOU/login');
    }
    public function sign(): View
    {
        return view('FOU/sign');
    }
}

?>
