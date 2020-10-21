<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExpenseCategories;

class ExpenseCategoryController extends Controller
{
    public function viewPageExpenseCategory()
    {
        $categories = ExpenseCategories::all();
        return view('expense_category.category_view', compact('categories'));
    }

    public function addExpenseCategory(Request $request)
    {
        $rule = array(
            "expense_category_name" => "required",
            "expense_category_description" => "required"
        );

        $this->validate($request, $rule);

        $category = new ExpenseCategories;
        $category->expense_category_name = $request->expense_category_name;
        $category->expense_category_description = $request->expense_category_description;
        $category->save();

        return redirect('/expense_category/category_view');
    }

    public function updateExpenseCategory($id, Request $request)
    {
        //dd($id);
        $rule = array(
            "expense_category_name" => "required",
            "expense_category_description" => "required"
        );

        $this->validate($request, $rule);
        $categoryUpdate = ExpenseCategories::find($id);
        $categoryUpdate->expense_category_name = $request->expense_category_name;
        $categoryUpdate->expense_category_description = $request->expense_category_description;
        $categoryUpdate->save();
        return redirect('/expense_category/category_view');
    }

    public function deleteExpenseCategory($id)
    {
        //dd($id);
        $categoryDelete = ExpenseCategories::find($id);
        $categoryDelete->delete();
        return redirect('/expense_category/category_view');
    }

}
