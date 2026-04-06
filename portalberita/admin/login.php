<?php 
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: linear-gradient(135deg, #0f0f0f, #1a1a2e, #16213e);
    height: 100vh;
}

/* CARD BIRU DONGKER */
.card {
    border: none;
    background: linear-gradient(145deg, #0b1f3a, #102c57);
    color: #fff;
    border-radius: 15px;
    
    /* glow effect */
    box-shadow: 0 0 25px rgba(0,0,0,0.6);
    
    /* animasi masuk */
    animation: fadeIn 0.8s ease;
}

/* ANIMASI */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* INPUT */
.form-control {
    background: #ffffff;
    color: #000;
    border-radius: 8px;
}

.form-control:focus {
    box-shadow: 0 0 8px rgba(30,144,255,0.8);
    border-color: #1e90ff;
}

/* LABEL */
.form-label {
    color: #fff;
}

/* BUTTON */
.btn-primary {
    background: #1e90ff;
    border: none;
    border-radius: 8px;
    transition: 0.3s;
}

.btn-primary:hover {
    background: #187bcd;
    transform: scale(1.03);
}

/* ICON EYE */
.btn-outline-secondary {
    border-radius: 8px;
}

/* CAPTCHA */
.captcha-img {
    cursor: pointer;
    border-radius: 8px;
    transition: 0.3s;
}

.captcha-img:hover {
    transform: scale(1.05);
}

/* JUDUL */
h3 {
    font-weight: bold;
}

/* RESPONSIVE */
@media (max-width: 576px) {
    .card {
        padding: 10px;
    }
}
</style>
</head>

<body>

<div class="container">
<div class="row justify-content-center align-items-center vh-100">

<div class="col-md-4">
<div class="card shadow-lg">

<div class="card-body p-4">

<h3 class="text-center mb-3">📰 SSC INSIGHT</h3>
<p class="text-center text-light mb-4">Login Admin</p>

<?php if(isset($_SESSION['error'])) { ?>
<div class="alert alert-danger text-center">
    <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
</div>
<?php } ?>

<form action="proses_login.php" method="POST">

<div class="mb-3">
    <label class="form-label">Username</label>
    <input type="text" name="username" class="form-control" required>
</div>

<div class="mb-3">
    <label class="form-label">Password</label>
    <div class="input-group">
        <input type="password" name="password" id="password" class="form-control" required>
        <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">👁</button>
    </div>
</div>

<div class="mb-3 text-center">
    <label class="form-label">Captcha</label><br>

    <img src="captcha.php" id="captcha" class="captcha-img mb-2" width="120"
         onclick="refreshCaptcha()" title="Klik untuk refresh">

    <input type="text" name="captcha" class="form-control mt-2" placeholder="Masukkan captcha" required>
</div>

<button type="submit" class="btn btn-primary w-100">Login</button>

</form>

</div>
</div>
</div>

</div>
</div>

<script>
function togglePassword() {
    let pass = document.getElementById("password");
    pass.type = pass.type === "password" ? "text" : "password";
}

function refreshCaptcha() {
    document.getElementById('captcha').src = 'captcha.php?' + Date.now();
}
</script>

</body>
</html>