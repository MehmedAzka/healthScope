<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="css/contact.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
  <div class="back">
    <button onclick="goBack()">
      < Back</button>
  </div>
  <div class="container mt-5 shadow ">
    <div class="row ">
      <div class="col-md-4 bg-primary p-5 text-white order-sm-first order-last">
        <h2>Let's get in touch</h2>
        <p>We're open for any suggestion or just to have a chat</p>
        <div class="d-flex mt-2">
          <i class="bi bi-geo-alt"></i>
          <p class="mt-3 ms-3">Address :8MVW+FRV, Kampung Ciangsana, RT.02/RW.04, Tapos I, Kec. Tenjolaya, Kabupaten
            Bogor, Jawa Barat 16371</p>
        </div>
        <div class="d-flex mt-2">
          <i class="bi bi-telephone-forward"></i>
          <p class="mt-4 ms-3">Phone : +62 858-8687-7910</p>
        </div>
        <div class="d-flex mt-2">
          <i class="bi bi-envelope"></i>
          <p class="mt-4 ms-3">Email : azzammustafidh@gmail.com</p>
        </div>
      </div>
      <div class="col-md-8 p-5 ">
        <h2>Get in touch</h2>
        <form class="row g-3 contactForm mt-4" method="post" action="send.php">
          <div class="col-md-6">
            <label for="inputEmail4" class="form-label" name="recipient">First Name</label>
            <input type="" class="form-control" id="inputEmail4" required>
          </div>
          <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Last Name</label>
            <input type="password" class="form-control" id="inputPassword4" required>
          </div>
          <div class="col-12">
            <label for="inputAddress" class="form-label" name="subject">Subject</label>
            <input type="text" class="form-control" id="inputAddress" required>
          </div>
          <div class="col-12">
            <label for="inputAddress" class="form-label">Email </label>
            <input type="email" class="form-control" id="inputAddress" required>
          </div>
          <div class="col-md-6">
            <label for="inputCity" class="form-label">Contact Number</label>
            <input type="number" class="form-control" id="inputCity" required>
          </div>
          <div class="col-12">
            <button type="submit" value="send" class="btn btn-primary mt-3">Sign in</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="js/contact.js"></script>
</body>

</html>