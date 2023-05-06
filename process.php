<?php
  $con = mysqli_connect("localhost","root","123");
  mysqli_select_db($con,"mypet");
  mysqli_query($con, "set name utf8");
  $sql = "select * from pet";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
  $lover = (int)rand(10,21);
  $lovem = (int)rand(10,21);
  if($row["love"]+$lover > 100){
    $lover = 100 - $row["love"];
  }
  if($row["love"]-$lovem < 0){
    $lovem = $row["love"];
  }
  if(!empty($_GET["name"])){
    $name=$_GET["name"];
    mysqli_query($con, "insert into pet(name) values('$name')");
    mysqli_query($con, "update pet set info='撿到了一隻貓娘,取名為$name<br>'");
    mysqli_query($con, "update pet set text='你就是我的主人嗎?哼!'");
    mysqli_query($con, "update pet set face='image/face1.png'");
    // $re = 0;
  }
  if(!empty($_GET["feed"])){
    $name = $row["name"];
    mysqli_query($con, "update pet set info = concat('餵食了$name\,親密度+$lover\<br>',info)");
    mysqli_query($con, "update pet set love = love + '$lover'");
    if($row["love"]<30){
      mysqli_query($con, "update pet set text='食物?哼!我就勉為其難的吃一點吧!'");
      mysqli_query($con, "update pet set face='image/face6.png'");
    }
    elseif($row["love"]<70){
      mysqli_query($con, "update pet set text='恩..還算不錯吃啦...'");
      mysqli_query($con, "update pet set face='image/face5.png'");
    }
    else{
      mysqli_query($con, "update pet set text='下次還想再吃~'");
      mysqli_query($con, "update pet set face='image/face7.png'");
    }
    // $re = 0;
  }

  if(!empty($_GET["sleep"])){
    $name = $row["name"];
    mysqli_query($con, "update pet set info = concat('$name\睡著了<br>',info)");
    mysqli_query($con, "update pet set text='呼喵~'");
    mysqli_query($con, "update pet set face='image/face8.png'");
    header("location:sleep.php");
  }

  if(!empty($_GET["wake"])){
    $name = $row["name"];
    mysqli_query($con, "update pet set info = concat('$name\醒來了<br>',info)");
    if( $row["love"] < 50){
      mysqli_query($con, "update pet set text='幹嘛叫醒我啦~'");
      mysqli_query($con, "update pet set face='image/face10.png'");
    }
    else{
      mysqli_query($con, "update pet set text='嗯?早上了嗎?'");
      mysqli_query($con, "update pet set face='image/face9.png'");
    }
    header("location:sleep.php");
  }

  if(!empty($_GET["hit"])){
    $name = $row["name"];
    mysqli_query($con, "update pet set info = concat('打了$name\一下,親密度-$lovem\<br>',info)");
    mysqli_query($con, "update pet set love = love - '$lovem'");
    if( $row["love"] < 70){
      mysqli_query($con, "update pet set text='幹嘛打我!'");
      mysqli_query($con, "update pet set face='image/face12.png'");
    }
    else{
      mysqli_query($con, "update pet set text='我做錯了什麼?'");
      mysqli_query($con, "update pet set face='image/face13.png'");
    }
    header("location:sleep.php");
  }

  if(!empty($_GET["reset"])){
    mysqli_query($con, "update pet set info = ''");
    // $re = 0;
  }

  if(!empty($_GET["resetlove"])){
    mysqli_query($con, "update pet set love = 0");
    // $re = 0;
  }

  if(!empty($_GET["resetall"])){
    mysqli_query($con, "delete from pet");
    // $re = 0;
  }

  if(!empty($_GET["touch"])){
    $name = $row["name"];
    mysqli_query($con, "update pet set info= concat('摸了$name\一下,親密度+$lover\<br>',info)");
    mysqli_query($con, "update pet set love = love + '$lover'");
    if($row["love"] < 30){
      mysqli_query($con, "update pet set text='幹嘛亂碰我啦!'");
      mysqli_query($con, "update pet set face='image/face2.png'");
    }
    elseif ($row["love"] < 70){
      mysqli_query($con, "update pet set text='喵嗚~'");
      mysqli_query($con, "update pet set face='image/face3.png'");
    }
    else{
      mysqli_query($con, "update pet set text='你是不是想幹人家喵~'");
      mysqli_query($con, "update pet set face='image/face4.png'");
    }
    // $re = 0;
  }
  if(empty($_GET["sleep"]) ){
    header("location:Index.php");
  }
?>
