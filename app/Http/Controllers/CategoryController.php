<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories', compact(['categories']));
    }

    public function create()
    {
        return view('categories-create');
    }

    public function store(Request $request): RedirectResponse
    {
        $v = Validator::make($request->all(), [
            'name' => 'required|string',
        ]);

        if ($v->fails()) {
            return redirect()
                ->back()
                ->withErrors($v->errors())
                ->withInput();
        }

        Category::query()->create($request->all());


        return redirect()->route('categories.index');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return redirect()->back();
    }
}
