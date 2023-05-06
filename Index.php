<html>
<head>
  <meta charset="utf-8">
  <title>Pet</title>
  <link rel="Shortcut Icon" type="image/x-icon" href="icon.png">
  <script>
    function hover(element) {
      test1.setAttribute('src', 'image/stand1.png');
      test2.setAttribute('src', 'image/stand1.png');
      cat1.style.webkitAnimationPlayState = "paused";
      cat2.style.webkitAnimationPlayState = "paused";
    }
    function unhover(element) {
      test1.setAttribute('src', 'image/movingr.gif');
      test2.setAttribute('src', 'image/movingl.gif');
      cat1.style.webkitAnimationPlayState = "running";
      cat2.style.webkitAnimationPlayState = "running";
    }
  </script>
  <style>
    @import url(style.css);
  </style>
</head>
<body>
  <form action="process.php" method="get">
    <article id="cat">
      <div id="cat1">
        <input id="test1" type="image" src="image/movingr.gif" width="100px" name="touch" value="1">
      </div>
      <div id="cat2">
        <input id="test2" type="image" src="image/movingl.gif" width="100px" name="touch" value="1"  onmouseover="hover(this);" onmouseout="unhover(this);">
      </div>
    </article>
    <input type="submit" value="餵食" name="feed">
    <input type="submit" value="睡覺" name="sleep">
    <input type="submit" value="打她" name="hit">
    <br><br>
    <input type="submit" value="清空紀錄" name="reset">
    <input type="submit" value="重置親密" name="resetlove">
    <input type="submit" value="全部重置" name="resetall">
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
  if(empty($row["name"])){
    header("location:name.php");
  }
  echo '<div id="chat">';
  echo  '<div><img id="face" src='.$row["face"].' width="95px"></div>';
  echo  '<div id="text">'.$row["text"].'</div>';
  echo '</div>';
  echo "寵物名字：".$row["name"],"<br>";
  echo '親密度：<meter value="'.$row['love'].'" max="100" min="0" optimum="100" low="30" high="70"></meter>('.$row["love"]."/100)<br>";

  if($row["love"] >= 100){
    echo '<a href="love100.html">親密度達100，解鎖R18劇情ฅ(=^●ω●^=)ฅ❤</a><br>';
  }

  echo "<br>操作紀錄(新到舊)<br>","<div id='record'>".$row["info"]."</div>";
?>
