
<?php
// Include the header.php file
require_once('header.php');

$sql = 'SELECT text, title, images, date, id FROM blog ORDER BY id DESC';
$stmt = $pdo->query($sql);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['edit_submit'])){
    $blogID = $_POST['blog_id'];
    $stmt = $pdo->prepare("DELETE FROM `blog` WHERE id=:blog_id");
    $stmt->bindParam(':blog_id', $blogID, PDO::PARAM_INT);
    $stmt->execute();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>index</title>
   
</head>
<body>

<a href="create.php">nieuwe blog</a>

<?php
foreach ($data as $key){

$pieces = explode(', ', $key['images']);
$image1 = $pieces[0];
?>

<form class="blog" action="" method="POST">
    <img class="image" alt="Failed to load image" src="<?php echo $image1;  ?>"/>
    <div>
    <h1 class="titel"><?php echo $key['title']; ?></h1> 
    <span class="datum"><?php echo $key['date']; ?></span>
    <p class="tekst"><?php echo $key['text']; ?></p>
    <input style="display: none" name="blog_id" value="<?php echo $key['id']; ?>" />
    <a href="blog_admin.php?id=<?php echo $key['id']; ?>">Bewerk</a>
    <input type="submit" name="edit_submit"  value="Verwijder" />
    <br>
</div>
</form>
<?php

}
?>
    
</body>
</html>
