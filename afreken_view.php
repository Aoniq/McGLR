<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <script src="https://kit.fontawesome.com/23451d210d.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container-fluid sticky-top bg-success">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="./index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none px-2 gx-5">
        <img src="./assets/img/logo.jpg" alt="" height="32" width="32">
        <span class="fs-4 text-warning px-2">McGLR</span>
      </a>
    </header>
  </div>
  <main>
    <div class="container d-flex flex-wrap justify-content-center items-center text-center pb-5 mb-5">
      <div class="row gy-3 justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-body">
              <h5 class="fw-bold">#<?= $bestelNummer ?></h5>
              <h5 class="fw-bold">€<?= $totaalPrijs ?></h5>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <!-- Some borders are removed -->
              <ul class="list-group list-group-flush">
                <?php
                foreach ($result as $row) {
                  echo "<li class='list-group-item'>" . $row['productnaam'] . " " . $row['aantal'] . "x €" . $row['prijs'] . "</li>";
                }
                ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="w-100 row mt-3 text-center">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <form>
          <input id="pinInput" type="number" class="form-control w-100" placeholder="4-cijferige pincode" min="4" max="4" />
        </form>
      </div>
    </div>
  </div>
</div>
<div class="row mt-3 text-center gy-3">
  <div class="col-md-4" onclick="addToPin(1)">
    <div class="card">
      <div class="card-body">
        <h5 class="fw-bolder" >1</h5>
      </div>
    </div>
  </div>
  <div class="col-md-4" onclick="addToPin(2)">
    <div class="card">
      <div class="card-body">
        <h5 class="fw-bolder">2</h5>
      </div>
    </div>
  </div>
  <div class="col-md-4" onclick="addToPin(3)">
    <div class="card">
      <div class="card-body">
        <h5 class="fw-bolder" >3</h5>
      </div>
    </div>
  </div>
  <div class="col-md-4" onclick="addToPin(4)">
    <div class="card">
      <div class="card-body">
        <h5 class="fw-bolder" >4</h5>
      </div>
    </div>
  </div>
  <div class="col-md-4" onclick="addToPin(5)">
    <div class="card">
      <div class="card-body">
        <h5 class="fw-bolder">5</h5>
      </div>
    </div>
  </div>
  <div class="col-md-4" onclick="addToPin(6)">
    <div class="card">
      <div class="card-body">
        <h5 class="fw-bolder" >6</h5>
      </div>
    </div>
  </div>
  <div class="col-md-4" onclick="addToPin(7)">
    <div class="card">
      <div class="card-body">
        <h5 class="fw-bolder">7</h5>
      </div>
    </div>
  </div>
  <div class="col-md-4" onclick="addToPin(8)">
    <div class="card">
      <div class="card-body">
        <h5 class="fw-bolder">8</h5>
      </div>
    </div>
  </div>
  <div class="col-md-4" onclick="addToPin(9)">
    <div class="card">
      <div class="card-body">
        <h5 class="fw-bolder">9</h5>
      </div>
    </div>
  </div>
  <div class="col-md-4">
  </div>
  <div class="col-md-4" onclick="addToPin(0)">
    <div class="card">
      <div class="card-body">
        <h5 class="fw-bolder">0</h5>
      </div>
    </div>
  </div>
  <div class="col-md-4">
  <div class="card">
    <div class="card-body">
      <form method="POST" action="afreken.php">
        <input hidden id="pinInput" name="pin" type="number" placeholder="4-cijferige pincode" min="1000" max="9999" />
        <button type="submit" class="btn btn-transparent mt-3">OK</button>
      </form>
    </div>
  </div>
</div>
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <h6 id="errorMessage" class="fw-light text-danger"></h6>
      </div>
    </div>
  </div>
</div>
    </div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
    <script src="./assets/js/afreken.js"></script>

</body>

</html>