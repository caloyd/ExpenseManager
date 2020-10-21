@extends('layouts.template')
@section('title', 'Roles')
@section('content')

<div class="container-fluid">
        <h1 class="mt-4">Roles</h1>
        <table class="table">
            <tr>
                <th>Display Name</th>
                <th>Description</th>
                <th>Created at</th>
                
            </tr>
            <tbody>
            @foreach($roles as $role)
            <tr>
                @if($role->id !=1)
                    <td><a href="#" data-toggle="modal" data-target="#updateRole{{$role->id}}">{{$role->role_name}}</a></td>
                @else
                    <td>{{$role->role_name}}</td>
                @endif
                    <td>{{$role->role_description}}</td>
                    <td>{{$role->created_at->format('Y-m-d')}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addRole">Add Role</button>

        <div class="modal" tabindex="-1" id="addRole" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="">Add Role</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/role/create" method="POST">
                        @csrf
                        <div class="modal-body">
                        <label for="displayName">Display Name</label>   
                            <input type="text" name="role_name" class="form-control" required>
                            <label for="description">Description</label>
                            <input type="text" name="role_description" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        @foreach($roles as $role)
        <div class="modal" tabindex="-1" id="updateRole{{$role->id}}" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="">Update Role</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/role/update/{{$role->id}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                            <input type="hidden" name="id" value="{{$role->id}}">
                            <label for="displayName">Display Name</label>   
                            <input type="text" name="role_name" class="form-control" value="{{$role->role_name}}">
                            <label for="description">Description</label>
                            <input type="text" name="role_description" class="form-control" value="{{$role->role_description}}">
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    </div>
                    <div class="modal-footer mr-auto">
                        <form action="/role/delete/{{$role->id}}" method="POST">   
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