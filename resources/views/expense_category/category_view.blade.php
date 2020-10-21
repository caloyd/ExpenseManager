@extends('layouts.template')
@section('title', 'Expense Categories')
@section('content')

<div class="container-fluid">
        <h1 class="mt-4">Expense Categories</h1>
        <table class="table">
            <tr>
                <th>Display Name</th>
                <th>Description</th>
                <th>Created at</th>
                
            </tr>
            <tbody>
            @foreach($categories as $category)
            <tr>
                <td>
                <a href="#" data-toggle="modal" data-target="#updateExpenseCategory{{$category->id}}" >{{$category->expense_category_name}}</a></td>
                <td>{{$category->expense_category_description}}</td>
                <td>{{$category->created_at->format('Y-m-d')}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addExpenseCategory">Add Category</button>


        <div class="modal" tabindex="-1" id="addExpenseCategory" role="dialog" aria-labelledby="expenseCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="expenseCategoryModalLabel">Add Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/expense_category/create" method="POST">
                    @csrf
                    <div class="modal-body">
                            
                            <label for="displayName">Display Name</label>   
                            <input type="text" name="expense_category_name" class="form-control" required>
                            <label for="description">Description</label>
                            <input type="text" name="expense_category_description" class="form-control" required>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        @foreach($categories as $category)
        <div class="modal" tabindex="-1" id="updateExpenseCategory{{$category->id}}" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="">Update Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/expense_category/update/{{$category->id}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                            <input type="hidden" name="id" value="{{$category->id}}">
                            <label for="displayName">Display Name</label>   
                            <input type="text" name="expense_category_name" class="form-control" value="{{$category->expense_category_name}}">
                            <label for="description">Description</label>
                            <input type="text" name="expense_category_description" class="form-control" value="{{$category->expense_category_description}}">
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    </div>
                    <div class="modal-footer mr-auto">
                        <form action="/expense_category/delete/{{$category->id}}" method="POST">   
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