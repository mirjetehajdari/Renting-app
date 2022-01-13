<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon1.ico">
    <title>EDIT POST</title>
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
          <img class="mr-4" src="{{ asset('images/logo.png') }}" width="150px">
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
    <!-- <div class="container" style="margin-top: 10%;"> -->
            <!-- <div class="col-md-2"> </div> -->
            <div class="mt-4">
                <div class="card mb-3" >
                    <div class="row no-gutters">
                      <div class="col-md-5">
                            <img src="{{ asset('images/addimage.jpg') }}" class="card-img" alt="..." style="margin: auto 0;">
                      </div>
                      <div class="col-md-7">
                        <div class="card-body">
                            <div class="" style="margin-top: 1%;">

                                <h5 class="card-title">ADD BICYCLE</h5>
                                <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                                <form enctype="multipart/form-data" action="/update" method="post" >
                                  @csrf
                                  <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" style="min-width: 150px;">First and last name</span>
                                    </div>
                                    <input name="id" type="hidden" value="{{ $datas->id }}">
                                    <input required name="first_name" type="text" aria-label="First name" class="form-control" value="{{ $datas->first_name }}" >
                                    <input required name="last_name" type="text" aria-label="Last name" class="form-control" value="{{ $datas->last_name }}">
                                  </div>
                                  <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                      <label class="input-group-text" for="inputGroupSelect01" style="min-width: 150px;">Bike type</label>
                                    </div>
                                    <select required name="bike_type" class="custom-select" id="inputGroupSelect01">
                                      <option selected value="{{ $datas->bike_type }}">{{ $datas->bike_type }}</option>
                                      <option value="Road Bike">Road Bike</option>
                                      <option value="Mountain Bike">Mountain Bike</option>
                                      <option value="Touring Bike">Touring Bike</option>
                                      <option value="Folding Bike">Folding Bike</option>
                                      <option value="Track Bike">Track Bike</option>
                                      <option value="BMX">BMX</option>
                                      <option value="Cruiser">Cruiser</option>
                                    </select>
                                  </div>
                                  <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                      <label class="input-group-text" for="inputGroupSelect01" style="min-width: 150px;">City location</label>
                                    </div>
                                    <select required name="location" class="custom-select" id="inputGroupSelect01">
                                      <option selected value="{{ $datas->city_location }}">{{ $datas->city_location }}</option>
                                      <option value="LINZ">LINZ</option>
                                      <option value="VILLACH">VILLACH</option>
                                      <option value="VIENNA">VIENNA</option>
                                      <option value="GRAZ">GRAZ</option>
                                      <option value=" SALSBURG"> SALSBURG</option>
                                      <option value=" BREGENZ"> BREGENZ</option>
                                    </select>
                                  </div>
                                  <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">€</span>
                                      <span class="input-group-text" style="min-width: 125px;">Price per hour</span>
                                    </div>
                                    <input required value="{{ $datas->price_hour }}" name="price_hour" type="number" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                  </div>
                                  <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">€</span>
                                      <span class="input-group-text" style="min-width: 125px;">Price per day</span>
                                    </div>
                                    <input required value="{{ $datas->price_day }}" name="price_day" type="number" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                  </div>
                                  <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">€</span>
                                      <span class="input-group-text" style="min-width: 125px;">Price per week</span>
                                    </div>
                                    <input required value="{{ $datas->price_week }}" name="price_week" type="number" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                  </div>
                                  <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend" >
                                      <span class="input-group-text" style="min-width: 150px;">Description</span>
                                    </div>
                                    <textarea required name="description" class="form-control" aria-label="With textarea">{{ $datas->description }}</textarea>
                                  </div>
                                  <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-sm" style="background-color: #1aae9f; color: white;" type="button">UPDATE POST</button>
                                </div>
                                </form>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            <!-- <div class="col-md-2"> </div> -->
    <!-- </div> -->

</body>
</html>