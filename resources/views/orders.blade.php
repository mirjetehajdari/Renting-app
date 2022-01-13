<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orders</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <a href="https://getbootstrap.com/docs/4.4/components/card/#grid-cards" target="_blank"></a>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light text-white" style="background-color: #1aae9f;">
        <div class="container">
            <img class="mr-4" src="images/logo.png" width="150px">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/add_bicycle">Add bicycle</a>
                </li>
                @if(!Auth::user())
                    <li class="nav-item float-right">
                        <a class="nav-link text-white float-right" href="/login">Login</a>
                    </li>
                    
                    <li class="nav-item float-right">
                        <a class="nav-link text-white float-right" href="/register">Register</a>
                    </li>
                @else
                    <li class="nav-item float-right">
                        <a class="nav-link text-white float-right" href="/my_posts">My Posts</a>
                    </li>
                    <li class="nav-item float-right">
                        <a class="nav-link text-white float-right" href="/orders">Orders</a>
                    </li>
                    <li class="nav-item float-right">
                    <a class="nav-link text-white float-right" href="/my_orders">My Orders</a>
                    </li>
                    <li class="nav-item float-right">
                            <a class="nav-link text-white float-right" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                Log out!
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                    </li>
                @endif
                    
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <table class="table" >
            <thead class="" style="background-color: #1aae9f;">
                <tr style="color: #ffffff;">
                    <th scope="col">Nr</th>
                    <th scope="col">Name</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">email</th>
                    <th scope="col">Phone Nr</th>
                    <th scope="col">Time Type</th>
                    <th scope="col">Qty Time</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Order Time</th>
                    <th scope="col">Confirm</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rents as $key => $rent)
                    <form action="/confirm_order" method="post">
                        @csrf
                        <tr>
                            <td class="border">{{ ($key+1) }}</td>
                            <td class="border">{{ $rent->first_name }}</td>
                            <td class="border">{{ $rent->last_name }}</td>
                            <td class="border">{{ $rent->email }}</td>
                            <td class="border">{{ $rent->phone_number }}</td>
                            <td class="border">{{ $rent->time_type }}</td>
                            <td class="border">{{ $rent->quantity_time }}</td>
                            <td class="border">{{ $rent->comment }}</td>
                            <td class="border">{{ $rent->created_at }}</td>
                            <input type="hidden" name="bike_id" value="{{ $rent->bike_id }}">
                            <input type="hidden" name="created_at" value="{{ $rent->created_at }}">
                            <td class="border">
                                <button class="btn btn-link {{ $rent->confirmed == 1 ? 'text-danger' : '' }}" type="submit">{{ $rent->confirmed == 1 ? 'Unconfirm' : 'Confirm' }}</button>
                            </td>
                        </tr>
                    </form>
                @endforeach
            </tbody>
        </table>
    </div>
    
</body>
</html>