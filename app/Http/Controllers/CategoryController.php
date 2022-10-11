<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private string $name;
    private string $description;
    public string $error = '';

    public function __construct() {
        $this->middleware('auth');
        // $this->middleware('auth', ['except' => ['index']]);
    }

    private function validateForm(Request $request) : bool{
        if (!$request->input('name')) {
            $this->error = 'Name is mandatory !';
            return false;
        }
        $this->name = $request->input('name');
        if (!$request->input('description')) $this->description = '';
        else $this->description = $request->input('description');
        return true;
    }

    public function getAllToAdmin() {
        $categories = category::orderBy('created_at')->get();
        return view('admin.categories', ['categories' => $categories, 'error' => $this->error]);
    }

    public function getByIdToAdmin($id) {
        $category = category::find($id);
        if (!$category) return abort(404);
        return view('admin.getCategory', ['category' => $category]);
    }

    public function create(Request $request) {
        $category = new category();
        if ($this->validateForm($request)) {
            $category->name = $this->name;
            $category->description = $this->description;
            $category->save();
        }
        return redirect()->route('categoriesToAdmin');
    }

    public function update(Request $request, $id) {
        $category = category::find($id);
        if (!$category) return abort(404);
        $this->validateForm($request);
        $category->name = $this->name;
        $category->description = $this->description;
        $category->save();
        return redirect()->route('categoriesToAdmin');
    }

    public function destroy($id) {
        $category = category::find($id);
        if (!$category) return abort(404);
        $category->delete();
        return redirect()->route('categoriesToAdmin');
    }
}
