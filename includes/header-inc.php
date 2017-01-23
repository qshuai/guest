<?php
/**TestGuest Version1.0
 *===================================================
 *Copy 2016-08-18 qs
 *Wed:www.baidu.com
 *===================================================
 *Author:Andy
 *Date:${date}
 */
if(!defined('INC')){                            //防止恶意调用
      exit('1191 Access rejected!');
}
$c = sqllink();
$queryNum = mysqli_query($c, "SELECT count('id') FROM message WHERE user_to = '{$_COOKIE['username']}' AND status = 0");
$resultNum = mysqli_fetch_array($queryNum, MYSQLI_NUM);
if ($resultNum[0] == NULL){
    $count = 0;
}else{
    $count = $resultNum[0];
}

?>
<div id="header">
      <h1><a href="index.php">Andy多用户留言系统</a></h1>
      <ul>
            <li><a href="index.php">首页</a></li>
            <li><a href="blog.php">博友</a></li>
            <li><a href="photo.php">相册</a></li>
            <?php
            if (isset($_COOKIE['username'])){
                  echo '<li><a href="member.php?action=information" style="color: red;">'.$_COOKIE['username'].'</a></a></li>';
                  echo '<div id="news"><a href="message_view.php"><img src="images/meg.gif">'.$count.'条消息</div>';
            }else{
                  echo '<li><a href="register.php">注册</a></li>
                        <li><a href="login.php">登陆</a></li>
                        <li><a href="member.php">会员中心</a></li>';
            }
            ?>
            <?php
            if (isset($_COOKIE['username'])){
                  echo '<li><a href="logout.php">退出</a></li>';
            }
            ?>
      </ul>
</div>
