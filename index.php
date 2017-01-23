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
define('SCRIPT','index');
require dirname(__FILE__).'\includes\common-inc.php';
pagingParam(7,'artical WHERE re_id =0');        //设置分页参数
$link = sqllink();
$collection = mysqli_query($link,"SELECT username,face,email,url FROM user ORDER BY reg_time DESC LIMIT 1");
$list = mysqli_query($link,"SELECT id,username,type,title,date,read_num,comment_num FROM artical WHERE re_id =0 ORDER BY date DESC LIMIT  $cite,$pagesize") or die(mysqli_error($link));
$sum = mysqli_fetch_array($collection,MYSQLI_ASSOC);

//最新图片展示
$query = mysqli_query($link,"SELECT * FROM album ORDER BY date DESC");
$result = mysqli_fetch_array($query,MYSQLI_ASSOC);
$que = mysqli_query($link,"SELECT name,owner FROM photo WHERE album = '{$result['title']}' ORDER BY date DESC");
$resu = mysqli_fetch_array($que,MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="UTF-8">
  <title>Andy多用户留言系统</title>
      <script type="text/javascript" src="js/blog.js"></script>
      <?php
      require ROOT_PATH.'includes/style-inc.php';
      ?>
</head>
<body>
      <?php
       require ROOT_PATH.'includes/header-inc.php';
      ?>

      <div id="forum">
            <h2>帖子列表</h2>
            <span class="hot">这里有你最想看到的热门、精华帖子</span><span class="publish"><a href="artical_publish.php">发表帖子</a></span>
            <span class="line">-------------------------------------------------------------------------------------------------------------------------------------------</span>
            <div id="item">
                  <table>
                        <tr>
                              <th>类型</th><th>作者</th><th>标题</th><th>发表时间</th><th>点击量</th><th>评论</th>
                        </tr>
                        <?php while($res = mysqli_fetch_array($list,MYSQLI_ASSOC)){
                              $tit = strsplic($res['title'],10);
                              echo '<tr>';
                              echo '<td>'.$res['type'].'</td><td>'.$res['username'].'</td><td><a href="artical.php?id='.$res['id'].'">'.$tit.'</a></td><td>'.$res['date'].'</td><td style="text-align: center;">'.$res['read_num'].'</td><td style="text-align: center;">'.$res['comment_num'].'</td>';
                              echo '</tr>';
                        }?>
                  </table>
            </div>
            <?php
            paging(2,'帖子');        //调用分页函数
            ?>
      </div>


      <div id="user">
            <h2>新进会员</h2>
            <dl>
                  <dd class="name"><?php echo $sum['username']?></dd>
                  <dt><img src="<?php echo $sum['face']?>" alt=""></dt>
                  <!--href= "javascript:;"表示不执行任何javascript代码，和href="javascript:void(0);这样做本身没有任何作用，但是在网址栏不会显示任何后缀，比较好-->
                  <dd class="message"><a href="javascript:;" name="message" title="<?php echo $sum['username'];?>">消息</a></dd>
                  <dd class="friend"><a href="javascript:;" name="friend" title="<?php echo $sum['username'];?>">加好友</a></dd>
                  <dd class="leave">留言</dd>
                  <dd class="flower"><a href="javascript:;" name="flower" title="<?php echo $sum['username'];?>">送花朵</a></dd>
                  <dd class="text"><a href="mailto:">邮件：<?php echo $sum['email']?></a></dd>
                  <dd class="text"><a href="<?php echo $sum['url']?>" target="_blank">主页：<?php echo $sum['url']?></a></dd>
            </dl>
      </div>
      <div id="pic">
            <h2>最新图片</h2>
            <div id="show">
                  <dl>
                        <img src="photo_new.php?cover=<?php echo $result['title'].'/'.$resu['name']?>" onclick = location.href="photo_view.php?album=<?php echo $result['title']?>">
                        <dd>作者：<?php echo $resu['owner']?></dd>
                  </dl>
            </div>
      </div>

      <?php
      mysqli_close($link);
      require ROOT_PATH.'includes/footer-inc.php';
      ?>
</body>