<?php
/**TestGuest Version1.0
 *===================================================
 *Copy 2016-08-18 qs
 *Wed:www.baidu.com
 *===================================================
 *Author:Andy
 *Date:${date}
 */

function sqllink(){
      //数据库连接
      $con= @mysqli_connect(DB_HOST,DB_USER,DB_PWD)or die(mysqli_connect_error());
      //选择一个数据库
      $db_selected = mysqli_select_db( $con,"guest");
      return $con;
}


?>