

function check(){
  checkUsername();
   if(checkUsername()&&checkPassword()&&checkRepassword()&&checkEmail()){
      alert("恭喜你！注册成功！");
       
  $.ajax({
    type: 'POST',
    url: 'register.php',
    data: {
      user_name: $("#username").val(),
      user_password: $("#password").val(),
      user_email: $("#email").val(),
    },
    success: function(){
      alert("注册中。。。请稍后");
    },
    error: function(){
      alert("抱歉，服务器出现了些许问题。。。");
    }
  })

 }
}


function checkUsername(){
  
  var name=document.getElementById("username").value.trim();/*去除字符串两端的空白字符*/
  console.log(document.getElementById("username"));
  var name1=/^[^@#]{3,16}$/;
    if(!name1.test(name)){      
        document.getElementById("username1").innerHTML="用户名为3~16个字符，且不能包含”@”和”#”字符?";
    }
    else{
        document.getElementById("username1").innerHTML="";
        return true;
    }

}

function checkPassword(){
  var password=document.getElementById("password").value;
  var password1=/^[0-9A-Za-z]\w{7,16}$/;
  if(!password1.test(password)){
    document.getElementById("password1").innerHTML="密码长度必须在8个字符到16个字符之间";    
  }
  else{
      document.getElementById("password1").innerHTML="";
      return true;
  }

}

function checkRepassword(){
  var repassword=document.getElementById("repassword").value;
  if(repassword!==password){
      document.getElementById("repassword1").innerHTML="两次输入的密码不一致";      
  }
  else{
      document.getElementById("repassword1").innerHTML="";
      return true;
  }
}

function checkEmail(){
  var email=document.getElementById("email").value.trim();
  var checkemail=/^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/;
  if(!checkemail.test(email)){
    document.getElementById("email1").innerHTML="输入的邮箱格式不正确";
    
  }
  else{
    document.getElementById("email1").innerHTML="";
      return true;
  }
}


