<?php
	$htmlData = '';
	if (!empty($_POST['content1'])) {
		if (get_magic_quotes_gpc()) {
			$htmlData = stripslashes($_POST['content1']);
		} else {
			$htmlData = $_POST['content1'];
		}
	}
	$titleData = '';
    	if (!empty($_POST['title'])) {
    		if (get_magic_quotes_gpc()) {
    			$titleData = stripslashes($_POST['title']);
    		} else {
    			$titleData = $_POST['title'];
    		}
    	}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<title>KindEditor PHP</title>
	<link rel="stylesheet" href="./editor/simple.css" />
	<link rel="stylesheet" href="./editor/plugins/code/prettify.css" />
	<script charset="utf-8" src="./editor/kindeditor.js"></script>
	<script charset="utf-8" src="./editor/lang/zh_CN.js"></script>
	<script charset="utf-8" src="./editor/plugins/code/prettify.js"></script>
	<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content1"]', {
				cssPath : './editor/plugins/code/prettify.css',
				uploadJson : './editor/php/upload_json.php',
				fileManagerJson : './editor/php/file_manager_json.php',
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
	</script>
</head>
</head>
<body>
    <div style="width:100%;text-align:center">
	<form name="example" method="post" action="http://172.18.217.250:5000/set_papers">
	    文章标题： <br /><input type="text" name="title" style="width:800px;height:100px";/><?php echo htmlspecialchars($titleData);?>
	    <br /><br />
		年份： <br /><input type="text" name="year" style="width:800px;height:100px";/><?php echo htmlspecialchars($titleData);?>
	    <br /><br />
		链接： <br /><input type="text" name="link" style="width:800px;height:100px";/><?php echo htmlspecialchars($titleData);?>
	    <br /><br />
		作者和单位： <br /><textarea name="author"style="width:800px;height:100px"><?php echo htmlspecialchars($htmlData);?>
        </textarea>
		<br />
		<input type="submit" name="button" value="发表文章" /> (提交快捷键: Ctrl + Enter)
	</form>
	</div>
</body>
</html>
<?php
 json_encode(array(
               "titleData"=>$titleData,
              "htmlData"=>$htmlData
          ));
        ?>