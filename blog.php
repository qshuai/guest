<?php
/**TestGuest Version1.0
 *===================================================
 *Copy 2016-08-18 qs
 *Wed:www.baidu.com
 *===================================================
 *Author:Andy
 *Date:${date}
 */
define('INC',100);            //防止恶意调用
define('SCRIPT',blog);
require dirname(__FILE__).'\includes\common-inc.php';

pagingParam(10,'user');        //设置分页参数

//WHERE 将登陆的本人信息从博友中剔除，比较符合逻辑
$result = mysqli_query($con,"SELECT username,sex,face FROM user WHERE username !='{$_COOKIE['username']}' ORDER BY reg_time DESC LIMIT $cite,$pagesize");


?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
      <meta charset="UTF-8">
      <title>博友交流</title>
      <script type="text/javascript" src="js/blog.js"></script>
      <?php
      require ROOT_PATH.'includes/style-inc.php';
      ?>
</head>
<body>
      <?php
      require ROOT_PATH.'includes/header-inc.php';
      ?>
      <h2>博友中心</h2>
      <div id="blog">
            <?php while($query = mysqli_fetch_array($result,MYSQLI_ASSOC)){?>
            <dl>
                  <dd class="name"><?php echo $query['username'];?></dd>
                  <dt><img src="<?php echo $query['face'];?>" alt=""></dt>
                  <!--href= "javascript:;"表示不执行任何javascript代码，和href="javascript:void(0);这样做本身没有任何作用，但是在网址栏不会显示任何后缀，比较好-->
                  <dd class="message"><a href="javascript:;" name="message" title="<?php echo $query['username'];?>">消息</a></dd>
                  <dd class="friend"><a href="javascript:;" name="friend" title="<?php echo $query['username'];?>">加好友</a></dd>
                  <dd class="leave"><a href="javascript:;" name="leave" title="<?php echo $query['username'];?>">留言</a></dd>
                  <dd class="flower"><a href="javascript:;" name="flower" title="<?php echo $query['username'];?>">送花朵</a></dd>
            </dl>
            <?php }?>

      <?php
             paging(2,'会员');        //调用分页函数
      ?>

      </div>



      <?php
      require ROOT_PATH.'includes/footer-inc.php';
      ?>
</body>
