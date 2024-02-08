<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Sunrise\Slugger\Slugger;

class CategoryController extends Controller
{
    public function index ()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();

        return Inertia::render('Categories/Index', compact('categories'));
    }

    public function store (Request $request)
    {
        $slugger = new Slugger();

        $validated = $request->validate([
            'name' => 'required|string|max:64',
            'parentId' => 'nullable|exists:categories,id',
        ]);
        $newCategoryData = [
            'name' => $validated['name'],
            'slug' => $slugger->slugify($validated['name']),
            'parent_id' => $validated['parentId'],
        ];
        $newCategory = Category::create($newCategoryData);
        return redirect('categories');
    }

    /**
     * @param int $id
     * @return Response
     */
    public function edit (int $id): Response
    {
        $parents = Category::select()->whereNotIn('id', [$id])->whereNull('parent_id')->get();
        $category = Category::with('parent')->where('id', '=', $id)->get()->first();
        $children = Category::with('parent')->where('parent_id', '=', $category->id)->get();
        return Inertia::render('Categories/Edit', [
            'children' => $children,
            'category' => $category,
            'parents' => $parents,
        ]);
    }

    /**
     * @param Request $request
     * @param $category_id
     * @return string
     */
    public function update (Request $request, $category_id)
    {
        $slugger = new Slugger();
        $category = Category::findOrFail($category_id);
        $validated = $request->validate([
           'name' => 'required|max:64',
           'parent_id' => 'nullable'
        ]);
        $validated['parent_id'] = ($validated['parent_id'] === "null") ? null : $validated['parent_id'];

        $categoryData = [
            'name' => $validated['name'],
            'slug' => $slugger->slugify($validated['name']),
            'parent_id' => $validated['parent_id'],
        ];
//        dd($categoryData);
        $category->update($categoryData);
        return $category;
    }

}
