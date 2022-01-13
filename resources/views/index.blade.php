<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon1.ico">
    <title>HOME</title>
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
        <div class="d-flex justify-content-between my-2">
            <div>
                <form action="/search">
                    <div class="input-group mb-3 pr-2">
                        <input name="search" type="text" class="form-control form-control-sm" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon2">
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-sm" style="background-color: #1aae9f; color: white;" type="button"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <form action="/sort">
                <div class="dropdown">
                    <button class="btn btn-sm dropdown-toggle px-2 py-1" style="background-color: #1aae9f; color: white;" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-filter"></i> Sort by 
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <button type="submit" name="sort" class="dropdown-item" type="button" value="a-z">A-Z</button>
                    <button type="submit" name="sort" class="dropdown-item" type="button" value="z-a">Z-A</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
            @foreach ($datas as $data)
           
            <div class="col mb-5">
                <div class="card" >
                    <img class="card-img-top" src="images/{{$data->main_photo}}" alt="Card image cap">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">{{$data->bike_type}}</h5>
                            <div>
                            @if(Auth::user() && Auth::user()->email == 'admin@gmail.com')
                                <a href="{{ route('delete',[$data->id]) }}" ><i class="far fa-trash-alt text-danger"></i></a>
                                <a href="{{ route('edit',[$data->id]) }}"><i class="far fa-edit text-primary"></i></a>
                            @elseif (Auth::user())
                                @if ($data->email == Auth::user()->email)
                                    <a href="{{ route('delete',[$data->id]) }}" ><i class="far fa-trash-alt text-danger"></i></a>
                                    <a href="{{ route('edit',[$data->id]) }}"><i class="far fa-edit text-primary"></i></a>
                                @endif
                            @endif
                        </div>
                        </div>
                        <h6 class="card-title"><i class="fas fa-map-marker-alt text-primary"></i> {{$data->city_location}}</h6>
                        <div class="d-flex justify-content-between">
                            <p class="font-italic text-muted " style="font-size: 13px;">{{$data->price_hour}}€/hour</p>
                            <p class="font-italic text-muted " style="font-size: 13px;">{{$data->price_day}}€/day</p>
                            <p class="font-italic text-muted " style="font-size: 13px;">{{$data->price_week}}€/week</p>
                        </div>
                        <div>
                            <p class="font-italic text-muted " style="font-size: 13px;">Posted by: {{$data->first_name}}</p>
                        </div>
                        <p class="card-text">
                            {{substr($data->description,0, 20)}}...
                        </p>
                        <form action="/see_more">
                            <input value="{{$data->id}}" name="id" type="hidden">
                            <div class="float-right">
                                <button type="submit" class="btn btn-sm" style="background-color: #1aae9f; color: white;" type="button">See More...</i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
      </div>
</body>
</html>