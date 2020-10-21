<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Expense Manager</title>

  <!-- Bootstrap core CSS -->
 
  <link href="{{asset('/css/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="{{asset('/css/simple-sidebar.css')}}" rel="stylesheet">
</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">{{Auth::user()->name}}</div>
      <div class="list-group list-group-flush">
        <a href="/home" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        @if(Auth::user()->role_id == 1)
        <a href="#" class="list-group-item list-group-item-action bg-light">User Management</a>
        <a href="/role/role_view" class="list-group-item list-group-item-action bg-light"><span style="margin-left: 30px">Roles</span></a>
        <a href="/user/user_view" class="nav-link list-group-item list-group-item-action bg-light"><span style="margin-left: 30px">Users</span></a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Expense Management</a>
        <a href="/expense_category/category_view" class="list-group-item list-group-item-action bg-light"><span style="margin-left: 30px">Expense Categories</span></a>      
        @endif
        <a href="/expense/view" class="list-group-item list-group-item-action bg-light"><span style="margin-left: 30px">Expenses</span></a>
        @if(Auth::user()->role_id != 1)
        <a href="/user/change_password" class="list-group-item list-group-item-action bg-light">Change Password</a>
        @endif
      </div>
    </div>
    <!-- /#sidebar-wrapper -->
    <div id="page-content-wrapper">

    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Welcome to Expense Manager <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>
          </ul>
        </div>
    </nav>
    @yield("content")
    </div>
      
    </div>
    <script src="{{asset('/js/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/js/bootstrap.bundle.min.js')}}"></script>
    </body>
    
</html>