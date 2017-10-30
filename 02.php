<?php 
session_start();
if(empty($_SESSION['num']) || empty($_POST['num'])){
  $num=rand(0,100);
  $_SESSION['num']=$num; //  setcookie('num',$num);
} else {
  $count=empty($_SESSION['count'])? 0:$_SESSION['count']; //判断
  if($count<10)  {//＜10 时
    $result=(int)$_POST['num']-(int)$_SESSION['num'];  //(int)$_POST['num']-(int)$_COOKIE['num']
    $_SESSION['user'] = ( empty($_SESSION['user'])? '': $_SESSION['user']) .' '. $_POST['num'];

      if ($result == 0) {
      $message = '猜对了';
      unset($_SESSION['num']);//setcookie('num')
      unset($_SESSION['count']);//setcookie('count')
       unset($_SESSION['user']);
    } elseif ($result > 0) {
      $message = '有点大';
    } else {
      $message = '有点小';
    }

    $_SESSION['count'] = $count + 1;

    } else {
    $message='ggggg';
     unset($_SESSION['num']);  //setcookie('num')
    unset($_SESSION['count']); //setcookie('count')
    unset($_SESSION['user']);
  }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>猜数字</title>
  <style>
    body {
      padding: 100px 0;
      background-color: #2b3b49;
      color: #fff;
      text-align: center;
      font-size: 2.5em;
    }
    input {
      padding: 5px 20px;
      height: 50px;
      background-color: #3b4b59;
      border: 1px solid #c0c0c0;
      box-sizing: border-box;
      color: #fff;
      font-size: 20px;
    }
    button {
      padding: 5px 20px;
      height: 50px;
      font-size: 16px;
    }
  </style>
</head>
<body>
  <h1>猜数字游戏</h1>
  <p>Hi，我已经准备了一个 0 - 100 的数字，你需要在仅有的 10 机会之内猜对它。</p>
    <?php if (isset($message)): ?>
  <p><?php echo $message; ?></p>
  <?php endif ?>
  <form action="02.php" method="post">
    <input type="number" min="0" max="100" name="num" placeholder="随便猜">
    <button type="submit">试一试</button>
    <?php if(isset($_SESSION['user'])):?>
      <div><?php echo $_SESSION['user']?></div>
    <?php endif;?>

  </form>
</body>
</html>