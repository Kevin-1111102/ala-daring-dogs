<?php
    // Include the header.php file
    require_once('header.php');

    if(isset($_POST['edit_submit'])){
        $images = $_POST['edit_image1'] . ", " . $_POST['edit_image2'];
        $stmt = $pdo->prepare("INSERT INTO `blog`(`id`, `user_id`, `title`, `text`, `images`) VALUES (NULL, :user_id, :edit_title, :edit_text, :images)");

        $stmt->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
        $stmt->bindParam(':edit_title', $_POST['edit_title'], PDO::PARAM_STR);
        $stmt->bindParam(':edit_text', $_POST['edit_text'], PDO::PARAM_STR);
        $stmt->bindParam(':images', $images, PDO::PARAM_STR);

        $stmt->execute();
    }
?>

<body>
    <form class="edit" action="" method="POST">
        <input type="text" name="edit_title" class="edit_title"/>
        <textarea name='edit_text' id="edit_text" class="edit_text"></textarea> <!-- Add an 'id' to the textarea -->
        <input type="text" name="edit_image1" />
        <input type="text" name "edit_image2" />
        <input type="submit" name="edit_submit" class="edit_submit" value="Opslaan" />
    </form>
</body>

<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script> <!-- Include CKEditor from CDN -->

<script>
    // Replace the textarea with CKEditor
    CKEDITOR.replace('edit_text');
</script>
