<?php
// Include the header.php file
require_once('header.php');

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT user_id, text, title, images, date FROM blog WHERE id = :blog_id');
    $stmt->bindParam(':blog_id', $_GET['id']);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($data) {
        // Separate the image URLs
        $imageUrls = explode(', ', $data['images']);

        $user_id = $data['user_id'];

        $user_sql = 'SELECT username FROM user WHERE id = ' . $user_id;
        $user_stmt = $pdo->query($user_sql);
        $username = $user_stmt->fetch(PDO::FETCH_ASSOC);

        // Output HTML for displaying the blog post
        ?>
        <body class>
            <?php if (!empty($imageUrls[0])) : ?>
                <img class="blog_image image1" alt="Failed to load image" src="<?php echo $imageUrls[0]; ?>"/>
            <?php endif; ?>

            <h1 class="title"><?php echo $data['title']; ?></h1>
            <span class="date"><?php echo $data['date']; ?></span>
            <p class="text"><?php echo $data['text']; ?></p>

            <?php if (!empty($imageUrls[1])) : ?>
                <div><img class="blog_image image2" alt="Failed to load image"  src="<?php echo $imageUrls[1]; ?>"/></div>
            <?php endif; ?>

            <span class="author">Auteur: <?php echo $username['username']; ?></span>
        </body>
    <?php
    } else {
        // Handle the case where no blog post with the specified ID was found
        echo "Blog post not found.";
    }
} else {
    // Handle the case where 'id' parameter is not set
    echo "Invalid blog post ID.";
}
?>
