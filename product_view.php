<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/23451d210d.js" crossorigin="anonymous"></script>
</head>

<body>
<div class="container-fluid sticky-top bg-success">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none px-2">
                <img src="./assets/img/logo.jpg" alt="" height="32" width="32">
                <span class="fs-4 text-warning px-2">McGLR</span>
            </a>
        </header>
    </div>
  <main>
    <div class="container d-flex flex-wrap justify-content-center items-center text-center pb-5 mb-5">
        <div class="row gy-2 justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <img src="./assets/img/bigtastybacon.png" alt="" class="card-img-top">
                        
                    </div>
                </div>
            </div>
            <div class="w-100"></div>
            <div class="col-md-8">
                <div class="card">
                <div class="card-body">
    <h5 class="fw-bold"><?= $name ?></h5>
    <h5 class="fw-bold">€<?= $price ?></h5>
</div>

                </div>
            </div>
        </div>
        <div class="row gy-3 mt-3 justify-content-center">
            <div class="col-md-9">
                <div class="row justify-content-center items-center text-center">
                    <div class="col-3">
                        <a href="#" class="btn btn-danger" id="minus">
                            <i class="fa-solid fa-minus"></i>
                        </a>
                    </div>
                    <div class="col-6">
                        <input type="number" readonly class="form-control w-100">
                    </div>
                    <div class="col-3">
                        <a href="#" class="btn btn-success" id="plus">
                            <i class="fa-solid fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-100"></div>
            <div class="col-md-3">
              <button class="btn btn-success">Bestel</button>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-3">
              <a href="./afreken.php" class="btn btn-success">Afrekenen</a>
            </div>
        </div>
    </div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>