<?php
ini_set('date.timezone','Asia/Shanghai');
$conn_hostname = 'localhost';
$conn_database = '...';//!!!
$conn_username = 'root';
$conn_password = '';
try{
  $pdo = new PDO('mysql:host='.$conn_hostname.';dbname='.$conn_database,$conn_username, $conn_password);
  $pdo->exec('SET NAMES UTF8');
}
catch(Exception $e){
  echo '<h1>Error of database-link!</h1>';
  return;
}
if(isset($_POST['action'])){
  if($_POST['action']==='login'){
    if($_POST['user_name']!=""&&$_POST['user_password']!=""){  
      $user_name=$_POST['user_name'];
      $user_password=$_POST['user_password'];
      $sql=$pdo->prepare('SELECT * FROM list_user WHERE `user_name`=BINARY :user_name');
      $sql->bindValue(':user_name',$user_name);
      $sql->execute();
      $info=$sql->fetch(PDO::FETCH_ASSOC);
      
      if($info === false&&$user_name!="") {
        $flag=3;
      }
      else
      {
        $real_user_password=$info['user_password'];
      
      if($real_user_password===$user_password) {
        $flag=1;
        session_start();
        $_SESSION['user_name']=$user_name;
        $_SESSION['user_id']=$info['id'];
      }
      else{
        $flag=2;
      }

     }
  }
}

}
    ?>

<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            
        <link href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
        <title>备忘录</title>
	      <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <style type="text/css">
    body {background-image:url("./picture1.jpg"); 
          background-size:1230px  600px;}</style>
          <body>
          <style type="text/css">

    form.posi1
    {
    position:absolute;
    left:515px;
    top:290px;
    }
    </style>
    </head>

    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	      <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script>

            var flag=0;
            flag=<?php echo $flag ?>;
            if (flag==1){
              alert("登录成功！");
              window.location.href="page2.php?id=<?php echo $info['id']; ?>";}
            if (flag==2){
              alert("密码或用户名错误！");
            flag=0;}
            if (flag==3){
              alert("该用户名不存在！");
            flag=0;}
            </script>
            <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	          <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

        
               
    <body>

    <form action="detail2.php" method="post" class="posi1">
    <font color="#FFFFFF">User:</font> <br>
    <input type="text" name="user_name">
    <br>
    <font color="#FFFFFF">Password:</font><br>
    <input type="password" name="user_password">
    <br>
    

    <button type="submit" id="fat-btn" class="btn btn-primary" data-loading-text="Loading..."  name="action" value="detail2"> log in！</button>
    &nbsp


    <a href="./detail.php" target="_parent">
    <button id="fat-btn" class="btn btn-primary" data-loading-text="Loading..." type="button"> registe！ </button>
    </a>
    </button>
    </form>
    <script>
    $(function() {
    $(".btn").click(function(){
    $(this).button('loading').delay(1000).queue(function() {
    // $(this).button('reset');
    // $(this).dequeue(); 
    });
    });
    });  
    </script>




    </body>
    </html>

        