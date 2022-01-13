<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon1.ico">
    <title>DETAILS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <a href="https://getbootstrap.com/docs/4.4/components/card/#grid-cards" target="_blank"></a>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <style>
        .checked {
            color: orange;
        }
    </style>
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
              <!-- <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form> -->
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-2"> </div>
            @foreach ($datas as $data)
              <div class="col-md-8 mb-5">
                  <div class="card">
                      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                          <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                          </ol>
                          <div class="carousel-inner">
                            <div class="carousel-item active">
                              <img class="d-block w-100" src="images/{{$data->main_photo}}" alt="First slide">
                            </div>
                            <div class="carousel-item">
                              <img class="d-block w-100" src="images/{{$data->second_photo}}" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                              <img class="d-block w-100" src="images/{{$data->third_photo}}" alt="Third slide">
                            </div>
                          </div>
                          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
                      <div class="card-body">
                          <div class="d-flex justify-content-between my-4">
                              <h5 class="card-title">{{$data->bike_type}}</h5>
                                @if ($data->email != Auth::user()->email)
                                  <a class="btn btn-sm" style="background-color: #1aae9f; color: white;" href="{{ route('rent',[$data->id]) }}">RENT THIS BIKE</a>
                                @endif
                          </div>
                          <h5 class="card-title"><i class="fas fa-map-marker-alt text-primary"></i> {{$data->city_location}}</h5>
                          <div class="my-2">
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star checked"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                          </div>
                          <p class="card-text"> 
                            {{$data->description}}
                          </p>
                          
                      </div>
                  </div>
              </div>
            @endforeach
            <div class="col-md-2"> </div>
        </div>
    </div>

</body>
</html>