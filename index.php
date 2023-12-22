<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Produk Toko Online</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <style>
    html, body {
      height: 100%;
    }

    .card {
      border-radius: 0;
      border: 1px solid #343a40; /* Set the border color to dark */
    }

    .card img {
      border-radius: 0; /* Remove border radius from images */
    }

    .card-title,
    .card-text {
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      max-width: 100%; /* Adjust this value based on your design */
    }

    .max-width-input {
      max-width: 50px;
    }
  </style>
</head>
<body class="container d-flex flex-column h-100">

  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
      <div class="container">
        <a class="navbar-brand" href="#">Pemrograman Web: 2101020026_Baskara</a>
      </div>
    </nav>
  </header>

  <div class="container flex-grow-1" id="content">
    <div class="row row-cols-1 row-cols-md-4 g-3 p-3">

      <?php
      include "admin/sql.php";
      $query    = "SELECT * FROM produk INNER JOIN kategori ON produk.id_kategori=kategori.id_kategori ORDER BY id_produk";
      $result = mysqli_query($con, $query);

      while ($data = mysqli_fetch_array($result)) {
      ?>
        <div class="col">
          <div class="card h-100">
            <img src="images/<?php echo $data['gambar']; ?>" class="card-img-top" alt="..." width="300" height="200">
            <div class="card-body">
              <h5 class="card-title"><?php echo $data['nama_produk']; ?></h5>
              <p class="card-text"><?php echo $data['nama_kategori']; ?></p>
              <hr>
              <form action="pesanan-add.php" method="post">
                <input type="hidden" name="id_produk" value="<?php echo $data['id_produk']; ?>">
                <input type="hidden" name="tanggal" value="<?php echo date('Y-m-d'); ?>">
                <div class="form-group d-flex">
                  <input class="form-control form-control-sm max-width-input" type="number" name="jumlah" required>&nbsp;
                  <input class="btn btn-dark btn-sm ml-2" type="submit" name="submit" value="Beli">
                </div>
              </form>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
  </div>

  <footer class="bg-dark text-white p-3" >
    <div class="container">
      <p>&copy; 2023</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
