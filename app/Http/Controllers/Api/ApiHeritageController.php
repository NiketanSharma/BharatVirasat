<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HeritageItem;

class ApiHeritageController extends Controller
{
    /**
     * Return all approved heritage items as JSON.
     */
    public function index()
    {
        $items = HeritageItem::approved()->latest()->get();
        return response()->json([
            'success' => true,
            'data' => $items,
            'count' => $items->count(),
        ]);
    }

    /**
     * Return a single approved heritage item as JSON.
     */
    public function show($id)
    {
        $item = HeritageItem::approved()->find($id);

        if (!$item) {
            return response()->json([
                'success' => false,
                'message' => 'Heritage item not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $item,
        ]);
    }
}
