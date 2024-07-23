<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <section class="news-section">
                <h2>All News</h2>
                <?php foreach($entries as $entry): ?>
                    <div class="news-item">
                        <span class="news-title"><?php echo $entry['title']; ?></span>
                        <span class="news-description"><?php echo $entry['description']; ?></span>
                        <div class="actions">
                            <img src="assets/images/pencil.svg" alt="Edit" class="icon">
                            <img src="assets/images/close.svg" alt="Delete" class="icon">
                        </div>
                    </div>
                <?php endforeach; ?>
            </section>
            <section class="create-news-section">
                <h2>Create News</h2>
                <form>
                    <input type="text" placeholder="Title" class="input">
                    <textarea placeholder="Description" class="textarea"></textarea>
                    <button type="submit" class="btn">Create</button>
                </form>
            </section>
            <button class="btn logout">Logout</button>
        </main>
    </div>
</body>
</html>