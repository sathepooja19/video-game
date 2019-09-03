
<?php
include 'navbar.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>First Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/gallery.css">
    <link rel="stylesheet" href="css/pagination.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="s.css">
</head>
<style>
  div.desc {
  padding: 15px;
  text-align: center;
  font-weight: bold;
  float:none;
 }

div.img {

  width: 348px;
  height: 300px;
}   

img{
  float:none;
  margin: 10px;
  width: 350px;
  height: 230px;
}

div .gallery
{
  height: 500px;
  width:400px;
  float:left;
}

/*.mySlides
{
  float: none;
  size: cover;
  width: 99px;
  height: 400px;
}*/
</style>
<body>
   <center><h1> News...</h1></center>
    <div class = "container">
     <div class="log">

<?php
  require 'conn.php';
  $select=mysqli_query($conn,"SELECT * FROM publish");
  $rows = mysqli_num_rows($select);

  if($rows){
    $i=0;

    while($news=mysqli_fetch_assoc($select))
    {
  
      $title=$news['title'];
      $image=$news['image'];
      $content=$news['content'];
      $content = substr($content,0,600).'...';
      $link=$news['link'];
      $datep=$news['datep'];
      //echo' <div class="gallery">';
          echo' <div class="desc"><h3>'.$title.'</h3></div>';
        echo "<center><img src= data:image/jpg;base64,$image  width='4%' height='4%'>'</center>";
        
      echo' <div class="desc">'.$content.'</div>';
      echo '<div class="desc">Date: '.$datep.'</div>';
      echo'<div class="desc"><h3><a href='.$link.'>More Details</a></h3></div>';

    
      
      echo '</div>';
      echo"<br>";

      

    }
    }else{
              echo "<center>";
              echo "<font color = 'red'>";
              echo "NO POST YET !";
              echo "</font>";
              echo "</center>";
          }
  

?>

  

</body>
</html>