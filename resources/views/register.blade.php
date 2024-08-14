<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  
  <section class="vh-100" style="background-color: #1c3745;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

            <form action="/simpan" method="POST">
                @csrf
                <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Register</span>
                  </div>
            
                <div class="form-group">
                <label> E-Mail </label>
                <input type="email" name="email" class ="form-control" placeholder="Masukkan E-Mail" Required>
                </div>

                <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class ="form-control" placeholder="Masukkan Nama" Required>
                </div>
          
                <div class="form-group">
                <label> Password </label>
                <input type="password" name="password" class ="form-control" placeholder="Masukkan Password" Required>
                </div>

                <div class="form-group">
                <select name="role" class="form-control">
                    <option value="0">--Pilih Role--</option>
                    <option value="pengguna">Pengguna</option>
                    <option value="petugas">Pengambil Sampah</option>
                    <option value="driver">Bank Sampah</option>
                </select>
            </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Sign-Up
                    </button>
                </div>

            </form>


            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
            

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>