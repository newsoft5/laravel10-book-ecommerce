<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy("id", "DESC")->get();
        return view("admin.categories.categories", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.categories.create-category");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "bail|required|min:2|max:255"
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect("/admin/categories")
                ->with("alert_status", "success")
                ->with("alert_message", "Category created");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view("admin.categories.update-category", compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "bail|required|min:2|max:255"
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();

        return redirect("/admin/categories")
                ->with("alert_status", "success")
                ->with("alert_message", "Category updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect("/admin/categories")
                ->with("alert_status", "success")
                ->with("alert_message", "Category deleted");
    }
}
