<!doctype html>
<html lang="en">

<head>
  <title>Bestelling</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div>
              <div class="col-8">
                <div class="card p-3">
                <?php
                ini_set('display_errors', 1);

                // haal de gegevens van de bestelling op
                $data = json_decode(file_get_contents('php://input'), true);
                if (!isset($data['items']) || !isset($data['total'])) {
                  echo $data;
                  exit;
                }
                $items = $data['items'];
                $total = $data['total'];
                ?>

<h1>Bestellingsoverzicht</h1>
<table>
  <thead>
    <tr>
      <th>Item</th>
      <th>Aantal</th>
      <th>Prijs per stuk</th>
      <th>Totaalprijs</th>
    </tr>
  </thead>
  <tbody>


<?php
foreach ($items as $product) {
  if (!isset($product['name']) || !isset($product['quantity']) || !isset($product['price'])) {
    continue;
  }
  ?>
        <tr>
          <td>
            <?= $product['name'] ?>
          </td>
          <td>
            <?= $product['quantity'] ?>
          </td>
          <td>
            <?= $product['price'] ?>
          </td>
        </tr>
 <?php } ?>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="3"><strong>Totaal:</strong></td>
      <td><?= $total ?></td>
    </tr>
  </tfoot>
</table>
<p>
  <button type="button" onclick="window.location.href='cash_register.php'">Nieuwe bestelling</button>
</p>
</div>
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
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>