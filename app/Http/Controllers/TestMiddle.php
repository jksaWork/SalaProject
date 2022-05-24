<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestMiddle extends Controller
{
    public function index()
    {
        echo "<br>Test Controller.";
    }
}
