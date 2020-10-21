<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Expenses;
use App\User;
use Auth;
class ExpensesController extends Controller
{
    public function viewPageExpenses()
    {
        $user = Auth::user()->id;

        $expenses = DB::table('expenses')
        ->join('expense_categories', 'expenses.expense_category_id', 'expense_categories.id')
        ->join('users', 'expenses.user_id', 'users.id')
        ->select('expense_categories.expense_category_name','expenses.amount','expenses.entry_date','expenses.created_at','expenses.expense_category_id','expenses.id')
        ->where('users.id', $user)
        ->get();
        
        foreach($expenses as $e)
        {
            $newtime = strtotime($e->created_at);
	        $e->time = date('Y-m-d',$newtime);
        }

        return view('expense.view', compact('expenses'));
    }

    public function addExpense(Request $request)
    {
        $rule = array(
           "amount" => "required",
           "entry_date" => "required"
        );

        $this->validate($request, $rule);

        $expense = new Expenses;
        $expense->expense_category_id = $request->expense_category_id;
        $expense->user_id = $request->user_id;
        $expense->amount = $request->amount;
        $expense->entry_date = $request->entry_date;
        $expense->save();

        return redirect('/expense/view');
    }

    public function updateExpense($id, Request $request)
    {
        //dd($id);
        $rule = array(
            "amount" => "required",
            "entry_date" => "required"
        );

        $this->validate($request, $rule);
        $expenseUpdate = Expenses::find($id);
        $expenseUpdate->expense_category_id = $request->expense_category_id;
        $expenseUpdate->user_id = $request->user_id;
        $expenseUpdate->amount = $request->amount;
        $expenseUpdate->entry_date = $request->entry_date;
        $expenseUpdate->save();
        return redirect('/expense/view');
    }

    public function deleteExpense($id)
    {
        $expenseDelete = Expenses::find($id);
        $expenseDelete->delete();
        return redirect('/expense/view');
    }
}
