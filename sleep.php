<html>
<head>
  <meta charset="utf-8">
  <title>Pet</title>
  <link rel="Shortcut Icon" type="image/x-icon" href="icon.png">
  <style>
    @import url(style.css);
  </style>
</head>
<body style="background-color:rgb(148,211,253)">
  <form action="process.php" method="get">
    <input type="image" src="image/sleeping.gif" value="叫醒" name="wake" width="100px">
  </form>
</body>
</html>

<?php
  $con = mysqli_connect("localhost","root","123");
  mysqli_select_db($con,"mypet");
  mysqli_query($con, "set name utf8");
  $sql = "select * from pet";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
  echo '<div id="chat">';
  echo  '<div><img id="face" src='.$row["face"].' width="95px"></div>';
  echo  '<div id="text">'.$row["text"].'</div>';
  echo '</div>';

  echo "寵物名字:".$row["name"],"<br>";
  echo "親密度:".$row["love"],"<br>";
  echo "<br>操作紀錄(新到舊)<br>","<div id='record'>".$row["info"]."</div>";
?>
