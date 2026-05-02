<?php

namespace App\Http\Controllers;

use App\Models\HeritageItem;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    /**
     * Show all favourited heritage items.
     */
    public function index()
    {
        $favouriteIds = session('favourites', []);
        $items = HeritageItem::approved()->whereIn('id', $favouriteIds)->get();

        return view('favourites.index', compact('items'));
    }

    /**
     * Add a heritage item to favourites.
     */
    public function add($id)
    {
        $item = HeritageItem::approved()->findOrFail($id);
        $favourites = session('favourites', []);

        if (in_array($id, $favourites)) {
            return redirect()->back()->with('info', __('ui.fav_already'));
        }

        $favourites[] = $id;
        session(['favourites' => $favourites]);

        return redirect()->back()->with('success', __('ui.fav_added'));
    }

    /**
     * Remove a heritage item from favourites.
     */
    public function remove($id)
    {
        $favourites = session('favourites', []);
        $favourites = array_values(array_diff($favourites, [$id]));
        session(['favourites' => $favourites]);

        return redirect()->route('favourites.index')
            ->with('success', __('ui.fav_removed'));
    }
}
