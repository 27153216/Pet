<html>
<head>
  <meta charset="utf-8">
  <title>Pet</title>
  <link rel="Shortcut Icon" type="image/x-icon" href="icon.png">
</head>
<body style="background-image: url(image/wood3.jpg)">
  <form action="process.php" method="get">
    幫你的寵物取個名字吧:<input type="text" name="name">
    <img src="icon.png" width="50px">
    <input type="submit">
  </form>
</body>
</html>

<?php
  $con = mysqli_connect("localhost","root","123");
  mysqli_query($con, "create database if not exists mypet");
  mysqli_select_db($con,"mypet");
  mysqli_query($con, "set name utf8");
  mysqli_query($con, "create table if not exists pet (name char(50),love int default 0,info text,text text,face text)");
?>
