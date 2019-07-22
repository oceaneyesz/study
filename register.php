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
  echo $e;
  return;
}
if(isset($_POST['action'])){
  if($_post['action']==='register'){

      $user_name=$_POST['user_name'];
      $user_email=$_POST['user_email'];
      $user_password=$_POST['user_password'];
      $user_repassword =$_POST['user_password'];
      $user_password =password_hash($_POST['user_password'], PASSWORD_DEFAULT);/*加密*/
      $sql="SELECT * FROM users WHERE `user_name`='".$_POST['user_name']."'";
    
    $res=$pdo->query($sql);
    $rowCount=$res->rowCount();
    if ($rowCount==0){
      $sql=$pdo->prepare('INSERT INTO users(`user_email`,`user_name`,`user_password`) VALUES(:user_email ,:user_name ,:user_password);');
      $sql->bindValue(':user_email',$_POST['user_email']);
      $sql->bindValue(':user_name',$_POST['user_name']);
      $sql->bindValue(':user_password',$_POST['user_password']);
      $execute_res=$sql->execute();
      if ($execute_res==true){
        $judge=1;
        $_SESSION['user_name']=$user_name;
        $sql=$pdo->prepare('SELECT * FROM users WHERE `user_name`=BINARY :user_name');
        $sql->bindValue(':user_name',$user_name);
        $sql->execute();
        $info=$sql->fetch(PDO::FETCH_ASSOC);
                  if($info === false) {
                          echo '<h1>404</h1>';
                          return;
                      }
                      else {
                          $_SESSION['user_id']=$info['id'];
                      }
                  }
              else{
                      $judge=3;
                  }
          }
          else{
              $judge=2;
          }
      }
      else $judge=-1;
  }



var $judgement=0;
    $judgement= $judge ;
        if ($judgement==1){
            alert("恭喜，注册成功！");
            $judgement=0;
            header('Location: user_index.php?id= $info['id'];'); 
        }
        if($judgement==2){
            alert("该用户名已经被注册！");
            $judgement=0;
        }
        if($judgement==3){
            alert("抱歉，注册失败");
            $judgement=0;
        }
?>





