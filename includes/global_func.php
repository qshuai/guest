<?php
/**TestGuest Version1.0
 *===================================================
 *Copy 2016-08-18 qs
 *Wed:www.baidu.com
 *===================================================
 *Author:Andy
 *Date:${date}
 */


//---------------转义字符串，防止SQL恶意注入
//function mysqlString($str){
//      $link = mysqli_init();
//      $con = mysqli_real_connect($link,"localhost","root","64668990","school");
//      mysqli_real_escape_string($con,$str);
//}

//----------------得到运行此代码时的时间戳
/**
 * @return mixed 返回函数调用时的时间戳，是秒数和微妙数的和
 */
function runtime(){
      $time=explode(' ',microtime());
      return $time[0] + $time[1];
}
define('START_TIME',runtime());

//----------------弹窗功能（js=>alert）
/**
 * @param $info 弹窗功能，Note:再调用函数，传参的时候需要用单引号
 */
function _callBack($info){
      echo "<script type='text/javascript'>alert('$info');history.back();</script>";
      exit();
}
function _callClose($info){
      echo "<script type='text/javascript'>alert('$info');window.close();</script>";
      exit();
}
function _call($info,$url){
      echo "<script type='text/javascript'>alert('$info');window.location.href='$url'</script>";
}


//--------------格式化用户名，并验证其合法性
function username($string,$minlen,$maxlen){
      $string=trim($string);
      if(mb_strlen($string)<$minlen || mb_strlen($string)> $maxlen){
            _callBack('错误提示：字符不能少于'.$minlen.'位或者大于'.$maxlen.'位！');
      }
      $model= '/[<>\'\"\/\\ ]/';
      if(preg_match($model,$string)){
            _callBack('请输入合法字符！');
      }
      $model1= '/百度|淘宝|马云|root/';
      if(preg_match($model1,$string)){
            _callBack('被占用的用户名，请输入其他的字符！');
      }
//      return mysqli_real_escape_string($string);
      return $string;
}

//--------------判断密码的合法性
function password($password,$repassword,$minlen){
      if(strlen($password)<6){
            _callBack('错误提示：密码长度不能小于'.$minlen.'位');
      }
      if($password!=$repassword){
            _callBack('注意：两次输入的密码不一致，请重新输入！');
      }
      return sha1($password);
}

//--------------检验密码提示的规范
function tip($tip,$minlen,$maxlen){
      $tip=trim($tip);
      if(mb_strlen($tip)<$minlen || mb_strlen($tip)> $maxlen){
            _callBack('错误提示：密码提示字符不能少于'.$minlen.'位或者大于'.$maxlen.'位！');
      }
     return addslashes($tip);
}

//--------------检验密码提示答案
function ans($tip,$ans,$minlen,$maxlen){
      if(mb_strlen($tip)<$minlen || mb_strlen($tip)> $maxlen){
            _callBack('错误提示：提示答案字符不能少于'.$minlen.'位或者大于'.$maxlen.'位！');
      }
      if($ans==$tip){
            _callBack('为了您的账号安全，密码提示不能和提示答案相同！');
      }
      return sha1($ans);
}

//--------------验证邮箱的合法性
function email($email){

            $model = '/^([\w-\.]{2,20})@([\w]{2,6})\.([\w\.]{2,10})$/';
            if (!preg_match($model, $email)) {
                  _callBack('请输入有效的电子邮箱！');
            }
            return addslashes($email);
      }

//--------------验证QQ的合法性
function qq($qq){
      if(!empty($qq)) {
            $model = '/^[1-9][\d]{4,12}$/';
            if (!preg_match($model, $qq)) {
                  _callBack('请输入有效的qq号码！');
            }
            return $qq;
      }else{
            return null;
      }
}

//--------------验证网址的合法性
function url($url){
      if((!empty($url))&& $url!='http://'){
            $model='/^(http[s]?:\/\/)?[\w\.-]+\.[\w]+$/';
            if(!preg_match($model,$url)){
                  _callBack('请输入合法的网址');
            }
            return addslashes($url);
      }else{
            return null;
      }
}

//---------------生成验证码
/**
 * @param int $width    定义验证码框的宽度，默认为75
 * @param int $height   定义验证码框的高度，默认为25
 * @param int $len      定义验证码内字符的位数，默认为4
 * @param bool $flag    定义验证码框的边框，默认为false
 */
function code($width=75,$height=25,$len=4,$flag=false){
      header('Content-Type:image/png');
      session_start();
      for($i=0;$i<$len;$i++){
            $valid.=dechex(mt_rand(0,15));
      }
      $_SESSION['code']=$valid;

      $img=imagecreatetruecolor($width,$height);
      $backgroundcolor=imagecolorallocate($img,255,255,255);
      $ranColor1=imagecolorallocate($img,mt_rand(150,255),mt_rand(150,255),mt_rand(150,255));
      imagefill($img,0,0,$backgroundcolor);
      imageline($img,mt_rand(0,$width-1),mt_rand(0,$height-1),mt_rand(0,$width-1),mt_rand(0,$height-1),$ranColor1);
      imageline($img,mt_rand(0,$width-1),mt_rand(0,$height-1),mt_rand(0,$width-1),mt_rand(0,$height-1),$ranColor1);
      imageline($img,mt_rand(0,$width-1),mt_rand(0,$height-1),mt_rand(0,$width-1),mt_rand(0,$height-1),$ranColor1);
      imageline($img,mt_rand(0,$width-1),mt_rand(0,$height-1),mt_rand(0,$width-1),mt_rand(0,$height-1),$ranColor1);
//    边框
      if($flag){
            $black=imagecolorallocate($img,0,0,0);
            imagerectangle($img,0,0,$width-1,$height-1,$black);
      }
      for($i=0;$i<100;$i++){
            $ranColor0=imagecolorallocate($img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
            imagestring($img,1,mt_rand(1,$width-5),mt_rand(1,$height-7),'*',$ranColor0);
      }
      for($i=0;$i<$len;$i++){
            $ranColor2=imagecolorallocate($img,mt_rand(0,100),mt_rand(0,100),mt_rand(0,100));
            imagestring($img,5,mt_rand($i*($width-5)/$len,($i+1)*($width-10)/$len),mt_rand(0,10),$_SESSION['code'][$i],$ranColor2);
      }
      imagepng($img);
      imagedestroy($img);
}

//--------------验证验证码是否正确
function checkcode($input,$session){
      if($input!=$session){
            _callBack('验证码不正确');
      }
}

//--------------唯一标示符
function sha1Uniqid(){
      return sha1(uniqid(rand(),true));
}

//--------------验证唯一标识符
function checkUniqid($input,$session){
      if((strlen($input)!= 40) || ($input!= $session)){
            _callBack('亲，请不要恶意攻击哦！');
      }else{
            return $input;
      }
}

/**
 * @param $username     //用户名
 * @param $uniqid       //唯一识别码
 * @param $time         //保留时间
 */
function _setCookie($username,$uniqid,$time){
      switch($time){
            case 0:
                  setcookie('username',$username);
                  setcookie('uniqid',$uniqid);
                  break;
            case 1:
                  setcookie('username',$username,time()+86400);
                  setcookie('uniqid',$uniqid,time()+86400);
                  break;
            case 2:
                  setcookie('username',$username,time()+604800);
                  setcookie('uniqid',$uniqid,time()+604800);
                  break;
            case 3:
                  setcookie('username',$username,time()+2592000);
                  setcookie('uniqid',$uniqid,time()+2592000);
            break;
      }
}

/**
 * @param $param //参数为分页的每页显示的内容条数pagesize
 */
function pagingParam($param,$str){
      global $num,$pagenum,$pagesize,$page,$cite,$con;
      $con = sqllink();
      $collection = mysqli_query($con,"SELECT id FROM $str");
      $num = mysqli_num_rows($collection);
      $pagesize = $param;
      $pagenum = ceil($num/$pagesize);                      //ceil对于浮点型往前进一位
      if (isset($_GET['page'])){
            $page = $_GET['page'];
            if($page<0 || $page>$pagenum || !is_numeric($page)){
                  $page = 1;
            }
      }else{
            $page = 1;
      }
      $cite = ($page-1) * $pagesize;
}

/**
 * @param $type  //参数$type为1时代表数字分页，为2时代表文本分页
 */
function paging($type,$str,$id=NULL){
      global $pagenum,$page,$num;
      if ($type == 1){
            echo '<div id="page">';
            echo '<ul>';
            for($i=0;$i<$pagenum;$i++){
                  echo '<li><a href="'.SCRIPT.'.php?page='.($i+1).'">'.($i+1).'</a></li>';
            }
            echo '</ul>';
            echo '</div>';
      }

      if ($type == 2){
            echo '<div id="text">';
            echo '<ul>';
            echo '<li> '.$page.'/'.$pagenum.'页 |</li>';
            echo ' <li> 共有'.$num.'个'.$str.' |</li>';
            if($page == 1){
                  echo '<li> 首页 |</li>';
                  echo '<li> 上一页 |</li>';
            }
            if($page > 1){
                  echo '<li><a href="'.SCRIPT.'.php?page='.(1).'&id='.$id.'"> 首页 |</a></li>';
                  echo '<li><a href="'.SCRIPT.'.php?page='.($page-1).'&id='.$id.'"> 上一页 |</a></li>';
            }
            if($page < $pagenum){
                  echo '<li><a href="'.SCRIPT.'.php?page='.($page+1).'&id='.$id.'"> 下一页 |</a></li>';
                  echo '<li><a href="'.SCRIPT.'.php?page='.$pagenum.'&id='.$id.'"> 尾页 </a></li>';
            }
            if($page == $pagenum){
                  echo '<li> 下一页 |</li>';
                  echo '<li> 尾页 </li>';
            }
            echo '</ul>';
            echo '</div>';
      }
}


function strsplic($str,$len){
      if(mb_strlen($str)>$len){
            $str = mb_substr($str,0,$len);
            return $str.'...';
      }
      return $str;
}

/**
 * @param $xmlname       //文件名
 * @param $coll         //数组
 */
function writeXML($xmlname,$coll){
      $file = fopen($xmlname,'w');
      if (!$file){
            exit('文件不存在');
      }
      flock($file,LOCK_EX);
      $str = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\r\n";
      fwrite($file,$str);
      $str = "<vip>\r\n";
      fwrite($file,$str);
      $str = "\t<id>{$coll['id']}</id>\r\n";
      fwrite($file,$str);
      $str = "\t<username>{$coll['username']}</username>\r\n";
      fwrite($file,$str);
      $str = "\t<face>{$coll['face']}</face>\r\n";
      fwrite($file,$str);
      $str = "\t<email>{$coll['email']}</email>\r\n";
      fwrite($file,$str);
      $str = "\t<url>{$coll['url']}</url>\r\n";
      fwrite($file,$str);
      $str = "</vip>";
      fwrite($file,$str);
      flock($file,LOCK_UN);
      fclose($file);
}

/**
 * @param $xmlname  //参数为同目录下的xml名称
 * @return array    //返回符合正则表达式下的数组
 */
function readXML($xmlname){
      if (file_exists($xmlname)){
            $file = file_get_contents($xmlname);
            preg_match_all('/<vip>(.*)<\/vip>/s',$file,$content);
            foreach($content[1] as $value){
                  preg_match_all('/<id>(.*)<\/id>/s',$value,$id);
                  preg_match_all('/<username>(.*)<\/username>/s',$value,$username);
                  preg_match_all('/<face>(.*)<\/face>/s',$value,$face);
                  preg_match_all('/<email>(.*)<\/email>/s',$value,$email);
                  preg_match_all('/<url>(.*)<\/url>/s',$value,$url);
                  $user[] = $id[1][0];
                  $user[] = $username[1][0];
                  $user[] = $face[1][0];
                  $user[] = $email[1][0];
                  $user[] = $url[1][0];
            }
            return $user;
      }
}

/**
 * @param $source_path              // 原文件路径
 * @param $target_width
 * @param $target_height
 * @return bool                     //缩略图
 */
function imagecropper($source_path, $target_width, $target_height){
      $source_info   = getimagesize($source_path);
      $source_width  = $source_info[0];
      $source_height = $source_info[1];
      $source_mime   = $source_info['mime'];
      $source_ratio  = $source_height / $source_width;
      $target_ratio  = $target_height / $target_width;

      // 源图过高
      if ($source_ratio > $target_ratio) {
            $cropped_width  = $source_width;
            $cropped_height = $source_width * $target_ratio;
            $source_x = 0;
            $source_y = ($source_height - $cropped_height) / 2;
      }
      // 源图过宽
      elseif ($source_ratio < $target_ratio) {
            $cropped_width  = $source_height / $target_ratio;
            $cropped_height = $source_height;
            $source_x = ($source_width - $cropped_width) / 2;
            $source_y = 0;
      }
      // 源图适中
      else {
            $cropped_width  = $source_width;
            $cropped_height = $source_height;
            $source_x = 0;
            $source_y = 0;
      }

      switch ($source_mime) {
            case 'image/gif':
                  $source_image = imagecreatefromgif($source_path);
                  break;

            case 'image/jpeg':
                  $source_image = imagecreatefromjpeg($source_path);
                  break;

            case 'image/png':
                  $source_image = imagecreatefrompng($source_path);
                  break;

            default:
                  return false;
                  break;
      }

      $target_image  = imagecreatetruecolor($target_width, $target_height);
      $cropped_image = imagecreatetruecolor($cropped_width, $cropped_height);

      // 裁剪
      imagecopy($cropped_image, $source_image, 0, 0, $source_x, $source_y, $cropped_width, $cropped_height);
      // 缩放
      imagecopyresampled($target_image, $cropped_image, 0, 0, 0, 0, $target_width, $target_height, $cropped_width, $cropped_height);

      header('Content-Type: image/jpeg');
      imagejpeg($target_image);
      imagedestroy($source_image);
      imagedestroy($target_image);
      imagedestroy($cropped_image);
}

//定义删除文件函数
function deleteFile($dirName) {
    // 判断是否为有效句柄
    if ($handle = opendir( $dirName )) {
        // 循环打开的句柄条目（打开成功，则返回文件名；打开失败，则返回false）
        while ( false !== ($item = readdir ($handle))) {
            if ($item != "." && $item != "..") {
                // 判断是否为目录
                if (is_dir($dirName . "/" . $item )) {
                    // 递归删除
                    deleteFile($dirName . "/" . $item);
                } else {
					unlink($dirName . "/" . $item);
                }
            }
        }
		rmdir($dirName);
        // 关闭打开的句柄
        closedir( $handle );
		return true;
    }else{
		return false;
	}
}
?>