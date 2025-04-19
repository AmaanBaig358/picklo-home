<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PreCategory;

class PreSubCategoryController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $title = 'Manage Pre Sub Categories';
        $preCategories = SubPreCategory::get();
        return view('admin.pre-category.index', compact('title', 'preCategories'));
=======
        $preCategories = SubPreCategory::get();
        return view('admin.pre-category.index', compact( 'preCategories'));
>>>>>>> 721f0e5 (First commit)
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'slug' => 'required',
        ]);
        $data = $request->all();
        PreCategory::create($data);
        return redirect()->route('admin.manage.pre.category')->with('success', 'Pre Category created successfully');
    }

    public function update(Request $request, $PreCategoryId)
    {
        $pre_category = PreCategory::findOrFail($PreCategoryId);
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $pre_category->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
        ]);
        return redirect()->back()->with('success', 'Pre Category updated successfully!');
    }

    public function show($PreCategoryId)
    {
        $preCategory = PreCategory::find($PreCategoryId);

        if (!$preCategory) {
            return response()->json(['error' => 'Pre Category not found'], 404);
        }

        return response()->json($preCategory);
    }

    public function destroy($PreCategoryId)
    {
        try {
            $preCategory = PreCategory::findOrFail($PreCategoryId);
            $preCategory->delete();
            return response()->json(['success' => true, 'message' => 'Pre Category deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => 'Pre Category not found'], 404);
        }
    }
}
