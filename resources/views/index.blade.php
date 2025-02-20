<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- bootstrap css  --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CUSTOM CSS  -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">    
</head>

<body>    
    <div>
        <div class="row">
            <div class="col-md-12">

                <nav class="navbar navbar-expand-lg bg-body-secondary fixed-top px-5">
                    <div class="container-fluid">
                        <a class="navbar-brand fw-bold" href="#">Admin Dashboard</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                          <div class="collapse navbar-collapse" id="navbarSupportedContent">
                              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                  <li class="nav-item dropdown">
                                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                      </a>
                                      <ul class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"
                                        >
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            {{-- <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to log out?')">Log Out</button> --}}
                                        </form>
                                      </ul>
                                  </li>
                              </ul>
                          </div>
                      </div>
                </nav>

                {{-- SIDE NAVBAR --}}
                <div class="sidenav d-flex flex-column p-3" id="sidenav">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Project</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Category</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Post</a>
                        </li>
                    </ul>                   
                </div>
            
                <!-- Main Content -->
                <div class="main-content" id="mainContent">
                    <div class="container mt-3">
                        <h2 class="mb-4">User Management</h2>
                        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#userModal">Add User</button>
                        
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>EMAIL</th>
                                    <th>MSISDN</th>
                                    <th>COMPANY</th>
                                    <th>ROLE</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->msisdn }}</td>
                                    <td>{{ $user->company }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('users.delete', $user->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>  
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Create Modal -->
                    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="userModalLabel">Add/Edit User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('users.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="userName" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="userEmail" class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="userMsisdn" class="form-label">MSISDN</label>
                                            <input type="text" class="form-control" name="msisdn" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="userCompany" class="form-label">Company</label>
                                            <input type="text" class="form-control" name="company">
                                        </div>
                                        <div class="mb-3">
                                            <label for="userRole" class="form-label">Role</label>
                                            <input type="text" class="form-control" name="role" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- <!-- Edit Modal -->
                    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('users.update', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="userName" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="userEmail" class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="userMsisdn" class="form-label">MSISDN</label>
                                            <input type="text" class="form-control" name="msisdn" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="userCompany" class="form-label">Company</label>
                                            <input type="text" class="form-control" name="company">
                                        </div>
                                        <div class="mb-3">
                                            <label for="userRole" class="form-label">Role</label>
                                            <select class="form-select" name="role" required>
                                                <option selected disabled>Choose...</option>
                                                <option value="admin">Admin</option>
                                                <option value="user">User</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    {{-- bootstrap js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>