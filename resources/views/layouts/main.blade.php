<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 bg-primary py-2">
                <div class="dropdown float-right">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-person-circle"></i> User
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">
                        <div class="media">
                            <img class="align-self-center mr-3" src="https://wallpapers.com/images/high/baymax-raising-hands-dnh06ogp0425vbch.webp" width="50" height="60" alt="Generic placeholder image">
                            <div class="media-body">
                              <h5 class="mt-2">{{Auth::user()->name ?? '' }}</h5>
                              <small><i class="bi bi-emoji-smile-fill"></i> Selamat Siang</small>
                            </div>
                          </div>
                      </a>
                      <a class="dropdown-item border-top" href="#"><i class="bi bi-gear"></i> Setting</a>
                      <a class="dropdown-item border-top" href="/logout"><i class="bi bi-box-arrow-left"></i> Logout </a>
                    </div>
                  </div>
            </div>
        </div>
        <div class="row vh-100">
            <div class="col-md-2 border">
                @include('layouts.navigasi')
            </div>
            <div class="col-md-10">
                        @yield('content')
            </div>
          </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>