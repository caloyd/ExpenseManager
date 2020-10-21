@extends('layouts.template')
@section('title', 'Expenses')
@section('content')

<div class="container-fluid">
        <h1 class="mt-4">Expenses</h1>
        <table class="table">
            <tr>
                <th>Expense Category</th>
                <th>Amount</th>
                <th>Entry Date</th>
                <th>Created at</th>
                
            </tr>
            <tbody>
            @foreach($expenses as $expense)
            <tr>
                <td><a href="#" data-toggle="modal" data-target="#updateExpense{{$expense->id}}">{{$expense->expense_category_name}}</a></td>
                <td>{{$expense->amount}}</td>
                <td>{{$expense->entry_date}}</td>
                <td>{{$expense->time}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addExpense">Add Expense</button>


        <div class="modal" tabindex="-1" id="addExpense" role="dialog" aria-labelledby="exprenseModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exprenseModalLabel">Add Expense</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/expense/create" method="POST">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                            <label for="expensecategory">Expense Category</label>   
                            <select name="expense_category_id" id="expense_category_id" class="form-control">
                                @foreach(App\ExpenseCategories::all() as $category)
                                <option value="{{$category->id}}">
                                {{$category->expense_category_name}}
                                </option>
                                @endforeach
                            </select>
                            <label for="amount">Amount</label> 
                            <input type="number" name="amount" class="form-control">
                            <label for="entrydate">Entry Date</label>
                            <input type="date" name="entry_date" class="form-control">
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        @foreach($expenses as $expense)
        <div class="modal" tabindex="-1" id="updateExpense{{$expense->id}}" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="">Update Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/expense/update/{{$expense->id}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                    <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                            <label for="expensecategory">Expense Category</label>   
                            <select name="expense_category_id" id="expense_category_id" class="form-control">
                                @foreach(App\ExpenseCategories::all() as $category)
                                <option value="{{$category->id}}"
                                {{$category->id == $expense->expense_category_id ? "selected" : ""}}>
                                {{$category->expense_category_name}}
                                </option>
                                @endforeach
                            </select>
                            <label for="amount">Amount</label> 
                            <input type="number" name="amount" class="form-control" value="{{$expense->amount}}">
                            <label for="entrydate">Entry Date</label>
                            <input type="date" name="entry_date" class="form-control" value="{{$expense->entry_date}}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    </div>
                    <div class="modal-footer mr-auto">
                        <form action="/expense/delete/{{$expense->id}}" method="POST">   
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                     </div>  
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection