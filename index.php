<?php
require 'koneksi.php';

// Ambil data dari tabel services
$services = mysqli_query($conn, "SELECT * FROM services");
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Jabrikk Portfolio</title>

  <!-- CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/style.css" />
</head>

<body data-spy="scroll" data-target="#navbar" data-offset="70">

  <!-- Navbar -->
  <nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-sm">
    <div class="container">
      <!-- Navbar Brand with Logo -->
      <a class="navbar-brand d-flex align-items-center font-weight-bold" href="#">
        <img src="https://i.pinimg.com/1200x/29/ec/0d/29ec0d8dbdd014a41f6c6039350ae24c.jpg" alt="Logo"
          style="height: 32px; width: auto; margin-right: 8px;" />
        Jabrikk
      </a>

      <!-- Navbar Toggler (for mobile) -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navContent">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar Links -->
      <div class="collapse navbar-collapse" id="navContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#biography">About</a></li>
          <li class="nav-item"><a class="nav-link" href="#drivers">Featured Skill</a></li>
          <li class="nav-item"><a class="nav-link" href="#statistik-diri">Statistik</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
          
        </ul>
      </div>
    </div>
  </nav>

  <!-- Home -->
  <section id="home" class="text-white text-center d-flex align-items-center" style="height: 100vh;">
    <div class="container">
      <h1 class="display-4 font-weight-bold">Welcome to Jabrikk Portfolio</h1>
      <p class="lead mb-4">Passionate about Engine Development & Design</p>
      <a href="#biography" class="btn btn-danger btn-lg">Meet the Author</a>
    </div>
  </section>

  <!-- Biography -->
  <section id="biography" class="driver-hero py-5 bg-dark text-white">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-5">
          <img src="https://i.pinimg.com/736x/86/a3/8c/86a38c059c1a80ea18d28a4381f59bc6.jpg" class="img-fluid rounded shadow-sm" alt="Driver">
        </div>
        <div class="col-md-7">
          <h2>Jabrikk</h2>
          <p>Deskripsi tentang penulis dan latar belakang.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Featured Skill -->
  <section id="drivers" class="py-5 text-white bg-secondary">
    <div class="container">
      <h2 class="mb-4 text-center font-weight-bold">Featured Skill</h2>
      <div class="d-flex overflow-auto pb-3" style="gap: 1rem;">
      <div class="driver-card shadow-sm border-0 flex-shrink-0 bg-secondary text-white">
          <img src="https://i.pinimg.com/736x/88/fb/dc/88fbdcd65f77414e44a82470fc64d48f.jpg" class="card-img-top"
            alt="2D drafting" />
          <div class="card-body">
            <h5 class="card-title mb-1 font-weight-bold">Design</h5>
            <p class="card-text text-light">AutoCad, Solidwork, Fusion</p>
          </div>
        </div>

        <div class="driver-card shadow-sm border-0 flex-shrink-0 bg-secondary text-white">
          <img src="https://i.pinimg.com/1200x/4a/84/95/4a8495c679000b50b65e239cc41d7076.jpg" class="card-img-top"
            alt="Electric Wiring" />
          <div class="card-body">
            <h5 class="card-title mb-1 font-weight-bold">Electric Wiring</h5>
            <p class="card-text text-light">Solidwork, Protheus, Fritzing</p>
          </div>
        </div>

        <div class="driver-card shadow-sm border-0 flex-shrink-0 bg-secondary text-white">
          <img src="https://i.pinimg.com/1200x/dd/c6/7b/ddc67b999c1bb896f4435d6f3207ed49.jpg" class="card-img-top"
            alt="Schematic PCB" />
          <div class="card-body">
            <h5 class="card-title mb-1 font-weight-bold">Schematic PCB</h5>
            <p class="card-text text-light">Protheus, Sprint-Layout, </p>
          </div>
        </div>

        <div class="driver-card shadow-sm border-0 flex-shrink-0 bg-secondary text-white">
          <img src="https://i.pinimg.com/1200x/da/58/2d/da582db1a46438cfa1846955dd4d6375.jpg" class="card-img-top"
            alt="Machining" />
          <div class="card-body">
            <h5 class="card-title mb-1 font-weight-bold">Machining</h5>
            <p class="card-text text-light">CNC, Conventional</p>
          </div>
        </div>

        <div class="driver-card shadow-sm border-0 flex-shrink-0 bg-secondary text-white">
          <img src="https://i.pinimg.com/736x/52/fe/2d/52fe2dd103f861650afd0c29d71c441e.jpg" class="card-img-top"
            alt="Programing" />
          <div class="card-body">
            <h5 class="card-title mb-1 font-weight-bold">Programing</h5>
            <p class="card-text text-light">C, C++, HTML, G-Code,</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Services (dinamis dari database) -->
  <section id="services" class="py-5 bg-light">
    <div class="container">
      <h2 class="text-center font-weight-bold mb-4">Services</h2>
      <div class="row">
        <?php while ($row = mysqli_fetch_assoc($services)) : ?>
          <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
              <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($row['title']) ?></h5>
                <p class="card-text"><?= htmlspecialchars($row['description']) ?></p>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </section>

  <!-- Statistik Diri -->
  <section id="statistik-diri" class="py-5 bg-dark text-white">
    <div class="container text-center">
      <h2 class="mb-4 font-weight-bold">Statistik Diri</h2>
      <canvas id="radarChart" width="400" height="400"></canvas>
    </div>
  </section>

  <!-- Contact -->
  <section id="contact" class="py-5">
    <div class="container">
      <h2 class="text-center font-weight-bold mb-4">Contact Me</h2>
      <form id="contact-form" action="contact-process.php" method="POST" style="max-width: 600px; margin: auto;">
        <div class="form-row">
          <div class="form-group col-md-6">
            <input name="name" type="text" class="form-control" placeholder="Name" required />
          </div>
          <div class="form-group col-md-6">
            <input name="email" type="email" class="form-control" placeholder="Email" required />
          </div>
        </div>
        <div class="form-group">
          <textarea name="message" class="form-control" rows="5" placeholder="Your message" required></textarea>
        </div>
        <button class="btn btn-danger btn-block" type="submit">Send Message</button>
      </form>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3">
    <small>© 2025 Jabrikk Portfolio</small>
  </footer>

  <!-- JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="css/radar-chart.css" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="js/radar-chart.js"></script>
  <script src="js/radar-chart.js"></script>
</body>
</html>
