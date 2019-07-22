


function post(){
    document.getElementById("post").style.display="block";/*把none类型换成block使之能够显示*/
    window.addEventListener("click", function(){
      // document.getElementById("post").style.display = "none";
    })
}
function change() {  
  if(flag==1){
  document.body.style.background = "url('background2.jpg')";
  flag=2;
  }
  else if(flag==2){
    document.body.style.background = "url('background3.jpg')";
    flag=3;
  } 
  else if(flag==3){
    document.body.style.background = "url('background1.jpg')";
    flag=1;
  }
}

var tou=new Array("11.jpg","22.jpg","33.jpg","44.jpg");
function postSuccess(){

  
    var Title=document.getElementById("title").value;
    var Content=document.getElementById("content").value;
    if(Title==""||Content==""){
      alert("标题和内容不能为空");  
    }
    else{
  var newLi=document.createElement("li");
  var inumber=Math.floor(Math.random()*4);
  var touDiv=document.createElement("div");
  var touImg=document.createElement("img");
  touImg.setAttribute("src",tou[inumber]);/*改变路径*/
  touDiv.appendChild(touImg);

  var titleH1=document.createElement("h1");
  var title=document.getElementById("title").value;
  titleH1.innerHTML=title;

  var newP=document.createElement("p");
  var secName=document.createElement("span");
  var secSelect=document.getElementById("sec").value;
  secName.innerHTML="类型： "+secSelect;
  var myDate=new Date();
  var currentDate=myDate.getFullYear()+"-"+parseInt(myDate.getMonth()+1)+"-"+myDate.getDate()+" "+myDate.getHours()+":"+myDate.getMinutes();
  /*month+1*/
  var timeSpan=document.createElement("span");
  timeSpan.innerHTML="发布时间："+currentDate;
  newP.appendChild(secName);
  newP.appendChild(timeSpan);

  newLi.appendChild(touDiv);
  newLi.appendChild(titleH1);
  newLi.appendChild(newP);
  var postList=document.getElementById("postList");
  postList.insertBefore(newLi,postList.firstChild);

  document.getElementById("title").value="";
  document.getElementById("content").value="";
  document.getElementById("post").style.display="none";
      return true;

  }
}
