<?php

namespace App\Http\Controllers;

use App\Models\HeritageItem;
use App\Http\Requests\StoreHeritageRequest;
use Illuminate\Http\Request;

class HeritageController extends Controller
{
    /**
     * Home page with featured items and categories.
     */
    public function home(Request $request)
    {
        $query = HeritageItem::approved();

        // Category filter
        if ($request->filled('category')) {
            $query->ofCategory($request->category);
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('short_desc', 'like', "%{$search}%")
                  ->orWhere('state', 'like', "%{$search}%");
            });
        }

        $featured = $query->latest()->take(6)->get();
        $categories = HeritageItem::CATEGORIES;

        return view('home', compact('featured', 'categories'));
    }

    /**
     * Heritage directory with pagination and filters.
     */
    public function index(Request $request)
    {
        $query = HeritageItem::approved();

        if ($request->filled('category')) {
            $query->ofCategory($request->category);
        }

        if ($request->filled('state')) {
            $query->ofState($request->state);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('short_desc', 'like', "%{$search}%")
                  ->orWhere('state', 'like', "%{$search}%");
            });
        }

        $items = $query->latest()->paginate(12)->appends($request->query());
        $states = HeritageItem::approved()->select('state')->distinct()->orderBy('state')->pluck('state');
        $categories = HeritageItem::CATEGORIES;

        return view('heritage.index', compact('items', 'states', 'categories'));
    }

    /**
     * Show single heritage item detail.
     */
    public function show($id)
    {
        $item = HeritageItem::approved()->findOrFail($id);
        $related = HeritageItem::approved()
            ->where('category', $item->category)
            ->where('id', '!=', $item->id)
            ->take(4)
            ->get();

        $favourites = session('favourites', []);

        return view('heritage.show', compact('item', 'related', 'favourites'));
    }

    /**
     * Show the submission form.
     */
    public function create()
    {
        $categories = HeritageItem::CATEGORIES;
        return view('heritage.create', compact('categories'));
    }

    /**
     * Store a new heritage submission.
     */
    public function store(StoreHeritageRequest $request)
    {
        $data = $request->validated();
        $data['status'] = 'pending';

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('heritage', 'public');
        }

        HeritageItem::create($data);

        return redirect()->route('heritage.create')
            ->with('success', __('ui.form_success'));
    }
}
