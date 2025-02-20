<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
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
                                        Admin
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
                        <h2 class="mb-4">Edit User</h2>
                        <a href="{{ route('home') }}" class="btn btn-secondary">Back</a>
                        <br><br>
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @elif (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div>
                            <form action="{{ route('users.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="userName" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="userEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                                </div>
                                <div class="mb-3">
                                    <label for="userMsisdn" class="form-label">MSISDN</label>
                                    <input type="text" class="form-control" name="msisdn" value="{{ $user->msisdn }}">
                                </div>
                                <div class="mb-3">
                                    <label for="userCompany" class="form-label">Company</label>
                                    <input type="text" class="form-control" name="company" value="{{ $user->company }}">
                                </div>
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <input type="text" class="form-control" name="role" value="{{ $user->role }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- bootstrap js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
</body>
</html>