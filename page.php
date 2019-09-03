<!DOCTYPE html>
<html>
<head>
  <title>Page</title>
  <style>
    body
    {
      color:white;
      font-size: 20px;
      font-style: bold;
      text-align:center;
    }
div.gallery {
  margin: 5px;
  border: 1px solid #ccc;
  float: left;
  width: 300px;
}

div.gallery:hover {
  border: 1px solid #ccc;
}

div.gallery img {
  width: 100%;
  height: 200px;
}

div.desc {
  padding: 15px;
  text-align: center;
  color:white;
}
div.footer{
  display: flex;
}
.footer a{
  color: #ccc;
}
</style>
</head>
<body>
  <?php
  include 'navbar.php';
  require 'conn.php';

/*select all post according to the user id
  $select= mysqli_query($conn,"SELECT * FROM publish");
  $n_post=mysqli_num_rows($select);
    if ($n_post==1)
        {//if there are somes results do this
           while ($your_news=mysqli_fetch_assoc($select))
            {
              $id=$your_news['id'];
              $title=$your_news['title'];
              $image=$your_news['image'];
              $content=$your_news['content'];
              $datep=$your_news['datep'];
              $content = substr($content,0,2000).'...';
              $link="editn.php?id=".$id;
              $link2="deleten.php?id=".$id;
              ?>
              <h1><?php echo $title;?></h1>
             <!--div class="gallery">';
              /*    echo' <div class="desc"><h3>'.$title.'</h3></div>';
                 echo "<img src= data:image/jpg;base64,$image width='5%' height='5%'>";
               echo' <div class="desc">'.$content.'</div>';
               echo"<br>";
               echo "<div class='footer'>";
               echo'<a href="'.$link.'">Edit</a>';
               echo'<a href="'.$link2.'">Delete</a>';
              echo '</div></div-->
              <?php
            }
        }
        else
         {
            echo $conn->error;   # code...
         } */
  


  $select=mysqli_query($conn,"SELECT * FROM publish");
  $number=mysqli_num_rows($select);
  if($number==1)
  {
      while ($r=mysqli_fetch_assoc($select))
       {
        $id=$r['id'];
        $title=$r['title'];
       // $email=$r['email'];
        //$password=$r['password'];
        //$dob=$r['dob'];

          echo $id;
        
      }
  }     
  ?>

    
  </body>
</html>