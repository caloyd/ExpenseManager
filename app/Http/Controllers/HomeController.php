<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user()->id;
        $totalExpense = DB::table('expenses')
        ->join('expense_categories','expenses.expense_category_id','expense_categories.id')
        ->select('expense_categories.expense_category_name', DB::raw('SUM(expenses.amount) as Total'))
        ->groupBy('expense_categories.expense_category_name')
        ->where('user_id', $user)
        ->get();
        //dd($totalExpense);
        return view('home', compact('totalExpense'));
    }

}
