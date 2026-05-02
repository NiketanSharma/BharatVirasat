<?php

namespace App\Http\Controllers;

use App\Models\HeritageItem;
use App\Models\TriviaQuestion;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Admin dashboard — list pending and approved items.
     */
    public function index()
    {
        $pending = HeritageItem::pending()->latest()->get();
        $approved = HeritageItem::approved()->latest()->get();
        $trivia = TriviaQuestion::latest()->get();

        return view('admin.index', compact('pending', 'approved', 'trivia'));
    }

    /**
     * Approve a pending heritage item.
     */
    public function approve($id)
    {
        $item = HeritageItem::findOrFail($id);
        $item->update(['status' => 'approved']);

        return redirect()->route('admin.index')
            ->with('success', __('ui.admin_approved_msg'));
    }

    /**
     * Delete a heritage item.
     */
    public function destroy($id)
    {
        $item = HeritageItem::findOrFail($id);

        // Delete associated image if exists
        if ($item->image_path && \Storage::disk('public')->exists($item->image_path)) {
            \Storage::disk('public')->delete($item->image_path);
        }

        $item->delete();

        return redirect()->route('admin.index')
            ->with('success', __('ui.admin_deleted_msg'));
    }

    /**
     * Show edit form for a heritage item.
     */
    public function edit($id)
    {
        $item = HeritageItem::findOrFail($id);
        $categories = HeritageItem::CATEGORIES;
        $pending = HeritageItem::pending()->latest()->get();
        $approved = HeritageItem::approved()->latest()->get();
        $trivia = TriviaQuestion::latest()->get();

        return view('admin.index', compact('item', 'categories', 'pending', 'approved', 'trivia'));
    }

    /**
     * Update a heritage item.
     */
    public function update(Request $request, $id)
    {
        $item = HeritageItem::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|in:festival,dance,art,cuisine,monument,music',
            'state' => 'required|string|max:100',
            'short_desc' => 'required|string|max:500',
            'long_desc' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($item->image_path && \Storage::disk('public')->exists($item->image_path)) {
                \Storage::disk('public')->delete($item->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('heritage', 'public');
        }

        unset($validated['image']);
        $item->update($validated);

        return redirect()->route('admin.index')
            ->with('success', __('ui.admin_updated_msg'));
    }

    /**
     * Store a new trivia question.
     */
    public function storeTrivia(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'correct_option' => 'required|in:a,b,c,d',
            'explanation' => 'nullable|string',
        ]);

        TriviaQuestion::create($validated);

        return redirect()->route('admin.index')
            ->with('success', 'Trivia question added successfully!');
    }

    /**
     * Update an existing trivia question.
     */
    public function updateTrivia(Request $request, $id)
    {
        $question = TriviaQuestion::findOrFail($id);

        $validated = $request->validate([
            'question' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'correct_option' => 'required|in:a,b,c,d',
            'explanation' => 'nullable|string',
        ]);

        $question->update($validated);

        return redirect()->route('admin.index')
            ->with('success', 'Trivia question updated successfully!');
    }

    /**
     * Delete a trivia question.
     */
    public function destroyTrivia($id)
    {
        $question = TriviaQuestion::findOrFail($id);
        $question->delete();

        return redirect()->route('admin.index')
            ->with('success', 'Trivia question deleted successfully!');
    }
}
