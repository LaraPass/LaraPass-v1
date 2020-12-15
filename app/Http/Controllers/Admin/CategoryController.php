<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Adding auth & 2FA middleware to this controller.
     *
     */
    public function __construct()
	{
		$this->middleware(['auth','verified','2fa','is_admin']);
	}

	/* Display Admin the list of categories active or otherwise */
	public function showCategories()
	{
		$categories = Category::all();

		return view('ui.admin.settings.categories')->with(compact('categories'));
	}

	/* Add a new category for accounts */
	public function addCategory(Request $request)
	{
		$messages = [
        'name.required' => 'Category Name is required.',
        'name.min' => 'Category Name must be at-least 3 characters long.'
        ];

        $this->validate($request, [
        	'name' => 'required|min:3',
        ], $messages);

        $category = New Category();

        $category->name = $request->name;

        $category->save();

        return back()->with('success', 'New Category Added Successfully');
	}

	/* Deactivate a Category from the list */
	public function deactivateCategory(Category $category)
	{
		$category->active = 0;
		$category->save();

		return back()->with('success', 'Category Deactivated Successfully');
	}

	/* Activate a Category in the list */
	public function activateCategory(Category $category)
	{
		$category->active = 1;
		$category->save();

		return back()->with('success', 'Category Activated Successfully');
	}

	/* Delete a category from the system */
	public function deleteCategory(Category $category)
	{
		if($category->accounts->count() >0)
			return back()->with('danger', 'Cannot Delete a Category with linked Accounts');
		else
		{
			$category->delete();
			return back()->with('success', 'Category Deleted Successfully');
		}
	}
}
