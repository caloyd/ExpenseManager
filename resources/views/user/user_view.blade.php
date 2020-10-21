@extends('layouts.template')
@section('title', 'Users')
@section('content')

<div class="container-fluid">
        <h1 class="mt-4">Users</h1>
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Email Address</th>
                <th>Role</th>
                <th>Created At</th>
                
            </tr>
            <tbody>
            @foreach($users as $user)
            <tr>
            @if($user->role_id !=1)
                <td><a href="#" data-toggle="modal" data-target="#updateUser{{$user->id}}">{{$user->name}}</a></td>
            @else
                <td>{{$user->name}}</td>
            @endif
                <td>{{$user->email}}</td>
                <td>{{$user->role_name}}</td>
                <td>{{$user->time}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addUser">Add User</button>

        <div class="modal" tabindex="-1" id="addUser" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="">Add User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/user/create" method="POST">
                        @csrf
                        <div class="modal-body">
                            
                            <label for="name">Name</label>   
                            <input type="text" name="name" class="form-control" required>
                            <label for="email">Email Address</label>
                            <input type="text" name="email" class="form-control" required>
                            <label for="email">Role</label>
                            <select name="role_id" class="form-control">
                                @foreach(App\Roles::all() as $role)
                                <option value="{{$role->id}}">
                                {{$role->role_name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        @foreach($users as $user)
        <div class="modal" tabindex="-1" id="updateUser{{$user->id}}" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="">Update User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/user/update/{{$user->id}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="modal-body">
                            
                            <label for="name">Name</label>   
                            <input type="text" name="name" class="form-control" value="{{$user->name}}">
                            <label for="email">Email Address</label>
                            <input type="text" name="email" class="form-control" value="{{$user->email}}">
                            <label for="email">Role</label>
                            <select name="role_id" class="form-control">
                                @foreach(App\Roles::all() as $role)
                                    <option value="{{$role->id}}"
                                    {{$role->id == $user->role_id ? "selected" : ""}}>
                                    {{$role->role_name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    </div>
                    <div class="modal-footer mr-auto">
                        <form action="/user/delete/{{$user->id}}" method="POST">   
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
