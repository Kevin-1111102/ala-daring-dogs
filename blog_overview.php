
<?php
// Include the header.php file
require_once('header.php');

$sql = 'SELECT text, title, images, date, id FROM blog';
$stmt = $pdo->query($sql);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html>
<head>
    <title>blog overview</title>
</head>
<body>

<?php
foreach ($data as $key){

$pieces = explode(', ', $key['images']);
$image1 = $pieces[0];
?>
    <div class="blog">
        <img class="image" src="<?php echo $image1;  ?>"/>
        <div>
        <h1 class="titel"><?php echo $key['title']; ?></h1> 
        <span class="datum"><?php echo $key['date']; ?></span>
        <p class="tekst"><?php echo $key['text']; ?></p>
        <a href="blog.php?id=<?php echo $key['id']; ?>">Read more</a>
        <br>
</div>
    </div>
<?php

}
?>
    
</body>
</html>
