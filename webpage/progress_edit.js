$(document).ready(function(){
  $("#progress_form").submit(function() {
    var mabstract = $("#abstract").val();
    if (isNull(mabstract)) {
      $("#msg").text("*摘要不能为空");
      return false;
    }
    
    var title = $("#title").val();
    if (isNull(title)) {
      $("#msg").text("*标题不能为空");
      return false;
    }
    
    var body = $("#body").val();
    if (isNull(body)) {
      $("#msg").text("*正文不能为空");
      return false;
    }
  });
});

function isNull(data){ 
  return (data == "" || data == undefined || data == null) ? true : false; 
}