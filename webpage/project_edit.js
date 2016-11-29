$(document).ready(function(){
  $("#aid").change(function(){
    var aid = $("#aid").val();
    if (aid == -1) {
      $("#atitle").val("");
      $("#alink").val("");
    } else {
      var atitle = $("#title_"+aid).text();
      var tmp = atitle.split("   ");
      $("#atitle").val(tmp[0]);
      $("#alink").val(tmp[1]);
    }
  });
  
  $("#project_form").submit(function() {
    var sname = $("#sname").val();
    if (isNull(sname)) {
      $("#msg").text("*物种名称不能为空");
      return false;
    }
    
    var info = $("#info").val();
    if (isNull(info)) {
      $("#msg").text("*基本信息不能为空");
      return false;
    }
    
    var intro = $("#intro").val();
    if (isNull(intro)) {
      $("#msg").text("*项目介绍不能为空");
      return false;
    }
  });
});

function isNull(data){ 
  return (data == "" || data == undefined || data == null) ? true : false; 
}