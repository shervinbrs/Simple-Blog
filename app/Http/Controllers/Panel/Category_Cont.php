<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class Category_Cont extends Controller
{
    public function showCreate()
    {
        return view('panel.createCategory');
    }
    public function showEdit(Category $category)
    {
        return view('panel.editCategory')->with(
            [
                'category'=>$category
            ]
        );
    }
    public function create(Request $req)
    {
        $category_data = $req->validate(
            [
                'name'=>'required|string|max:50',
                'slug'=>'required|string|max:50|unique:categories,slug'
            ]
            );
        category::create(
            $category_data
        );
        return redirect()->route('add_category')->withSuccess(__('panel.categoryCreated'));
    }
    public function edit(Category $category,Request $req)
    {
        $category_data = $req->validate(
            [
                'name'=>'required|string|max:50',
                'slug'=>'required|string|max:50|unique:categories,slug,'.$category->id
            ]
            );
            $category->update($category_data);
            return redirect()->route('edit_category',$category['id'])->withSuccess(__('panel.categoryEdited'));
    }
    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('list_category')->withSuccess(__('panel.categoryDeleted'));
    }
    public function list()
    {
        return view('panel.categoryList')->with(
            [
                'categories'=>category::get(['id','name','slug'])
            ]
        );
    }
}
