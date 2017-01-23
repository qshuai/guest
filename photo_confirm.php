<?php
define('INC',100);            //防止恶意调用
define('SCRIPT',photo_confirm);
require dirname(__FILE__).'\includes\common-inc.php';
?>



<html lang="zh-cn">
<head>
      <meta charset="utf-8">
      <title>相册中心</title>
      <?php
      require ROOT_PATH.'includes/style-inc.php';
      ?>
</head>
<body>
      <?php
      require ROOT_PATH.'includes/header-inc.php';
      ?>
	  
	<form action="photo_view.php?album=<?php echo $_GET['album']?>" method="post">
		<dl>
			<dt>请输入密码</dt>
			<dd><input type="password" name="confirm" class="pas" /><input type="submit" value="提交" /></dd>
		</dl>
	</form>

	  <?php
      require ROOT_PATH.'includes/footer-inc.php';
      ?>
</body>
</html>