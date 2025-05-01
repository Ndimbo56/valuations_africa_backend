<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request)
{
    $query = \App\Models\Property::with(['location', 'coverPhoto']);

    if ($request->filled('district')) {
     $query->whereHas('location', function ($q) use ($request) {
               $q->where('district', 'like', '%' . $request->district . '%');
        });
    }

    if ($request->filled('min_price')) {
          $query->where('price', '>=', $request->min_price);
    }

    if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
    }

 return response()->json($query->get());
}

}
