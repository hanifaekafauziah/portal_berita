<?php
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f6fa;
        }

        .card-dashboard {
            border-radius: 15px;
            background: #fff; /* tetap putih */
        }

        /* Navbar gradasi */
        .navbar {
            background: linear-gradient(90deg, #1f1f1f, #343a40);
        }

        /* Logo navbar */
        .logo-navbar {
            height: 45px;
            transition: 0.3s;
        }

        .logo-navbar:hover {
            transform: scale(1.05);
        }

        /* Responsive */
        @media (max-width: 576px) {
            .logo-navbar {
                height: 35px;
            }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">

        <!-- Logo -->
        <a class="navbar-brand fw-bold text-white" href="index.php">
			SSC INSIGHT
		</a>

        <!-- Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="index.php">Dashboard</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.php?menu=artikel">Artikel Berita</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.php?menu=kategori">Kategori Berita</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="index.php?menu=trending">Trending / Popular</a>
                </li>

                <?php if(isset($_SESSION['login'])): ?>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="logout.php">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Daftar</a>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>

<!-- Content -->
<div class="container mt-4">
<?php include "menu.php"; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<?php include "footer.php"; ?>

</body>
</html>