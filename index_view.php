<!doctype html>
<html lang="en" class="bglight">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="./cash_register.js" defer></script>
    <link href="./assets/css/style.css" rel="stylesheet">


</head>

<body class="bglight">
    <?php
    ini_set('display_errors', 1);

    //Connect to database
    $db = new SQLite3("./dbMacMedia.db");
    $db->busyTimeout(5000);

    //Create query and execute query
    $query = "SELECT * FROM snacks";
    $result = $db->query($query);
    ?>
    <div class="container-fluid sticky-top bg-success">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none px-2">
                <img src="./assets/img/logo.jpg" alt="" height="32" width="32">
                <span class="fs-4 text-warning px-2">McGLR</span>
                <span class="text-black"><?= $row ?></span>
                <div class="justify-content-end">
                <span class="text-black"><?= $bestelNummer ?></span>
                </div>
            </a>
        </header>
    </div>
    <main class="mb-5 pb-5">
        <div class="container mb-5 pb-5">
        <div class="row gy-5">
    <?php
    //Read results from query and create the button, number and price field for each result
    while ($snack = $result->fetchArray(SQLITE3_ASSOC)) { ?>
        <div class="col-6 d-flex align-items-stretch">
            <div class="card d-flex flex-fill border-0 shadow">
                <div class="card-body d-flex flex-column justify-content-between align-items-center text-center">
                    <div>
                        <img src="./assets/img/<?= $snack['snackName'] ?>.png" alt="" style="max-height: 200px; min-height: 100px; object-fit: contain;" class="img-fluid card-img-top">
                        <h5 class="mb-0"><?php echo $snack['snackName'] ?></h5>
                        <h5 class="mb-0">€<?php echo $snack['snackPrice']; ?></h5>
                        <input type="text" id="howMany<?php echo $snack['ID']?>" disabled hidden>
                        <input type="text" id="totalPrice<?php echo $snack['ID']?>" disabled hidden>
                    </div>
                    <div class="w-100 py-2">
                        <a href="./product.php?snackName=<?php echo $snack['snackName'] ?>&snackPrice=<?php echo $snack['snackPrice'] ?>&snackID=<?php echo $snack['ID'] ?>" class="btn btn-success btn-block w-100">
                            Voeg toe
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php }; ?>
</div>



        </div>
    </main>
    <footer class="mt-5 fixed-bottom text-black bg-success d-flex flex-wrap justify-content-center align-items-center py-3 mt-5 footer">
        <div class="row">
            <div class="col-8">
                <div class="mb-3 row">
                    <label for="itemsAmount" class="col-sm-2 col-form-label fs-4 fw-semibold text-white">ITEMS:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control-plaintext w-50 fs-4 text-white" id="itemsAmount" value="<?= $totaalAantal ?>">
                    </div>
                </div>
            </div>
            <div class="col-4 mb-3">
                <div class="mb-3 row">
                    <label for="itemsAmount" class="col-sm-5 col-form-label fs-4 fw-semibold text-white">TOTAAL:</label>
                    <div class="col-sm-7">
                    <input type="text" id="totalOrderAmount" disabled class="form-control-plaintext w-100 fs-4 text-white" value="€<?= $totaalPrijs ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
        <a href="./afreken.php" class="btn btn-outline-warning w-100 h-100 fw-semibold text-white">AFREKENEN</a>

        </div>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>