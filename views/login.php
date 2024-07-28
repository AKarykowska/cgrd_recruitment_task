<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <div class="foreground-image"></div>
    <div class="container">
        <header>
        <img src="assets/images/logo.svg" alt="cgrd logo" class="logo">
        </header>
        <main>
            <?php if (!empty($message)): ?>
                <div class="alert alert-danger">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <section class="form-section">
                <form method="POST" action="login.php">
                    <input type="text" name="username" placeholder="Username" class="input">
                    <input type="password" name="password" placeholder="Password" class="input">
                    <button type="submit" name="create" class="btn" id="login-form-submit-btn">Login</button>
                </form>
            </section>
        </main>
    </div>
</body>
</html>