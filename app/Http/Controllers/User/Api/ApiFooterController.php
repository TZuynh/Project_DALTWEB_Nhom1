<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class ApiFooterController extends Controller
{
    public function index()
    {
        $footer = Footer::first();

        if ($footer) {
            return response()->json($footer);
        }

        return response()->json(['message' => 'No footer found'], 404);
    }
}
