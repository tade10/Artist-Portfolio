<?php 

 $item_image = $_FILES["image"]["name"];

echo $item_image;
$connection = mysqli_connect("localhost", "root", "","portfolio");

if (mysqli_connect_errno()) {
echo "<h1>Failed to connect to MySQL: " . mysqli_connect_error() . "</h1>";
}

$query = "INSERT INTO gallery (id, image) VALUES (NULL,'".$item_image."')";
if (mysqli_query($connection, $query)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $query . "<br>" . mysqli_error($connection);
}

mysqli_close($connection);

$target_dir = "images/gallery/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

header("Location: gallery.php");

?>