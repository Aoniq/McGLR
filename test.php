<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="./cash_register.js" defer></script>


</head>

<body>
    <?php
    ini_set('display_errors', 1);

    //Connect to database
    $db = new SQLite3("./dbMacMedia.db");
    $db->busyTimeout(5000);

    //Create query and execute query
    $query = "SELECT * FROM snacks";
    $result = $db->query($query);
    ?>
    <div class="container sticky-top bg-white">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none px-2">
                <img src="./assets/img/logo.jpg" alt="" height="32" width="32">
                <span class="fs-4 text-warning">McGLR</span>
            </a>
        </header>
    </div>
    <main>
        <div class="container mb-5 pb-5">
            <div class="row gy-5">

                <?php
                //Read results from query and create the button, number and price field for each result
                while ($snack = $result->fetchArray(SQLITE3_ASSOC)) { ?>
                    <div class="col-6 d-flex align-items-stretch">
                        <div class="card">
                            <div class="card-body text-center align-items-center">
                                <img src="./assets/img/hamburger.webp" alt="" class="img-fluid card-img-top">
                                <h5><?php echo $snack['snackName'] ?></h5>
                                <h5>€<?php echo $snack['snackPrice']; ?></h5>
                                <input type="text" id="howMany<?php echo $snack['ID']?>" disabled hidden>
                                <input type="text" id="totalPrice<?php echo $snack['ID']?>" disabled hidden>
                                <a href="./product.php?snackName=<?php echo $snack['snackName'] ?>&snackPrice=<?php echo $snack['snackPrice'] ?>&snackID=<?php echo $snack['ID'] ?>" class="btn btn-success w-100">
                            Voeg toe</a>
                        </div>
                        </div>
                    </div>
                <?php }; ?>
            </div>
        </div>
    </main>
    <footer class="fixed-bottom text-black bg-white border d-flex flex-wrap justify-content-center align-items-center py-3 mt-5 footer">
        <div class="row">
            <div class="col-8">
                <div class="mb-3 row">
                    <label for="itemsAmount" class="col-sm-3 col-form-label">Items</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control-plaintext" id="itemsAmount">
                    </div>
                </div>
            </div>
            <div class="col-4 mb-3">
                <div class="mb-3 row">
                    <label for="itemsAmount" class="col-sm-3 col-form-label">Totaal</label>
                    <div class="col-sm-9">
                    <input type="text" id="totalOrderAmount" disabled class="form-control-plaintext w-50">
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>