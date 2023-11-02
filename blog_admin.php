<?php
require_once('header.php');

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare('SELECT text, title, images, date FROM blog WHERE id = :blog_id');
    $stmt->bindParam(':blog_id', $_GET['id']);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    $article_id = $_GET['id'];

    if ($data) {
        $imageUrls = explode(', ', $data['images']);

        if (isset($_POST['edit_submit'])) {
            $stmt = $pdo->prepare("UPDATE blog SET `title`='" . $_POST['edit_title'] . "', `text`='" . $_POST['edit_text'] . "' WHERE id = '$article_id'");
            $stmt->execute();

            // Redirect to admin.php
            header('Location: admin.php');
            exit; // Ensure that no further code execution happens after the redirect
        }
        ?>
        <body>
            <form class="edit" action="" method="POST">
                <?php if (!empty($imageUrls[0])) : ?>
                    <img class="blog_image image1" alt="Failed to load image" src="<?php echo $imageUrls[0]; ?>" />
                <?php endif; ?>

                <input type="text" name="edit_title" class="edit_title" value="<?php echo $data['title']; ?>" />
                <textarea name='edit_text' class="edit_text"><?php echo $data['text']; ?></textarea>
                <input type="submit" name="edit_submit" class="edit_submit" value="Opslaan" />
                <?php if (!empty($imageUrls[1])) : ?>
                    <div><img class="blog_image image2" alt="Failed to load image" src="<?php echo $imageUrls[1]; ?>" /></div>
                <?php endif; ?>
            </form>
        </body>
    <?php
    } else {
        echo "Blog post not found.";
    }
} else {
    echo "Invalid blog post ID.";
}
?>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('edit_text');
</script>
