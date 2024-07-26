<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <div class="foreground-image">
        <img src="assets/images/waves.svg" alt="Foreground Image" class="waves">
    </div>
    <div class="container">
        <header>
        <img src="assets/images/logo.svg" alt="cgrd logo" class="logo">
        </header>
        <main>
            <?php if (!empty($message)): ?>
                <div class="alert alert-success">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($entries)): ?>
                <section class="news-section">
                    <h2>All News</h2>
                    <?php foreach($entries as $entry): ?>
                        <div class="news-item">
                            <span class="news-title"><?php echo $entry['title']; ?></span>
                            <span class="news-description"><?php echo $entry['description']; ?></span>
                            <div class="actions">
                                <img src="assets/images/pencil.svg" alt="Edit" class="icon edit-button" data-id="<?php echo $entry['id']; ?>">
                                <form method="POST" action="index.php">
                                    <input type="hidden" name="delete" value="<?php echo $entry['id']; ?>">
                                    <button type="submit" class="symbol-btn">
                                        <img src="assets/images/close.svg" alt="Delete" class="icon">
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </section>
            <?php endif; ?>
            <section class="news-form-section" id="news-form-section">
                <div class="news-form-header">
                    <h2 id="news-form-title">Create News</h2>
                    <img src="assets/images/close.svg" alt="Close" class="icon close-edit-btn" id="close-edit-btn"> 
                </div>
                <form method="POST" action="" id="news-form">
                    <input type="hidden" name="id" id="id-input">
                    <input type="text" name="title" placeholder="Title" class="input" id="title-input">
                    <textarea name="description" placeholder="Description" class="textarea" id="description-input"></textarea>
                    <button type="submit" name="create" class="btn" id="news-form-submit-btn">Create</button>
                </form>
            </section>
            <button class="btn">Logout</button>
        </main>
    </div>
    <script src="assets/js/main.js"></script>
</body>
</html>