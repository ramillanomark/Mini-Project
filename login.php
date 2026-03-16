<?php
include 'connection.php';
$error = "";
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    $user = mysqli_fetch_assoc($result);
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['logged_in'] = true;
        header("Location: admin.php");
        exit();
    } else {
        $error = "Wrong username or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'DM Sans', sans-serif; background: #0e0e0e; color: #e8e8e8; min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        .box { width: 100%; max-width: 380px; padding: 2.5rem; background: #181818; border: 1px solid #2e2e2e; border-radius: 10px; }
        .logo { font-family: 'Syne', sans-serif; font-weight: 800; font-size: 1.5rem; color: #c8f135; margin-bottom: 0.4rem; }
        .sub { font-size: 0.85rem; color: #888; margin-bottom: 2rem; }
        label { display: block; font-size: 0.8rem; color: #888; margin-bottom: 0.4rem; }
        input { width: 100%; background: #111; border: 1px solid #2e2e2e; color: #e8e8e8; padding: 0.7rem 1rem; border-radius: 4px; font-size: 0.9rem; font-family: 'DM Sans', sans-serif; margin-bottom: 1rem; outline: none; transition: border-color 0.2s; }
        input:focus { border-color: #c8f135; }
        button { width: 100%; background: #c8f135; color: #111; border: none; padding: 0.8rem; border-radius: 4px; font-size: 0.9rem; font-weight: 500; cursor: pointer; font-family: 'DM Sans', sans-serif; }
        button:hover { background: #a8d015; }
        .error { background: #2e1010; border: 1px solid #6b2020; color: #f87171; padding: 0.6rem 0.9rem; border-radius: 4px; font-size: 0.85rem; margin-bottom: 1rem; }
        .back { display: block; text-align: center; margin-top: 1.2rem; font-size: 0.82rem; color: #666; }
        .back:hover { color: #e8e8e8; }
    </style>
</head>
<body>
<div class="box">
    <div class="logo">MHR.</div>
    <div class="sub">Sign in to manage your portfolio</div>
    <?php if ($error): ?><div class="error"><?php echo $error; ?></div><?php endif; ?>
    <form method="POST">
        <label>Username</label>
        <input type="text" name="username" required autofocus>
        <label>Password</label>
        <input type="password" name="password" required>
        <button type="submit" name="login">Login</button>
    </form>
    <a href="index.php" class="back">← Back to Portfolio</a>
</div>
</body>
</html>
