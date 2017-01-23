-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-01-23 08:20:06
-- 服务器版本： 5.7.15-log
-- PHP Version: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guest`
--

-- --------------------------------------------------------

--
-- 表的结构 `album`
--

CREATE TABLE `album` (
  `id` smallint(5) NOT NULL,
  `owner` varchar(20) NOT NULL,
  `title` varchar(30) NOT NULL,
  `type` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `brief` varchar(100) NOT NULL,
  `cover` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `album`
--

INSERT INTO `album` (`id`, `owner`, `title`, `type`, `password`, `brief`, `cover`, `date`) VALUES
(1, 'qishuai231', '程序猿', '0', '', '我要做程序猿！', '1485145972.jpg', '2017-01-23 04:43:40'),
(2, 'qishuai231', '微微一笑很倾城', '0', '', '微微一笑很倾城', '1485146717.jpg', '2017-01-23 05:02:21'),
(3, 'qishuai231', '魔兽世界', '0', '', '魔兽世界', '1485146777.jpg', '2017-01-23 05:02:06'),
(4, 'qishuai231', '魅力大理', '0', '', '魅力大理', '1485146825.jpg', '2017-01-23 05:01:54'),
(5, 'qishuai231', '阿凡达', '0', '', '阿凡达', '1485146892.jpg', '2017-01-23 05:01:40'),
(6, 'qishuai231', 'ChinaJoy', '0', '', 'ChinaJoy', '1485146951.jpg', '2017-01-23 05:01:27');

-- --------------------------------------------------------

--
-- 表的结构 `artical`
--

CREATE TABLE `artical` (
  `id` smallint(11) NOT NULL,
  `re_id` smallint(6) NOT NULL,
  `username` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `read_num` smallint(6) NOT NULL,
  `comment_num` smallint(6) NOT NULL,
  `edit_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `artical`
--

INSERT INTO `artical` (`id`, `re_id`, `username`, `type`, `title`, `content`, `read_num`, `comment_num`, `edit_date`, `date`) VALUES
(1, 0, 'qishuai231', '资源帖', '词里浮刹，梦里烟花', '那是谁的梦笔生花，<br />\r\n　　书写我四海为家，念你天涯。<br />\r\n　　我为你写下诗里蒹葭，<br />\r\n　　词里浮刹，梦里烟花，<br />\r\n　　你可许我一世牵挂？<br />\r\n　　<br />\r\n　　你轻弹我为你写下的别国他话，<br />\r\n　　我静听你千古绝唱，<br />\r\n　　只为你译做琴上弦音，<br />\r\n　　唱尽韶华。<br />\r\n　　<br />\r\n　　我轻写你我花前月下，<br />\r\n　　付剑天涯，陪你共观四海之光。<br />\r\n　　你舍尽<a href="http://www.jj59.com/zti/fanhua/" class="keywordlink">繁华</a>，白了苍颜，<br />\r\n　　只为陪我守护这清风明瓦。<br />\r\n　　<br />\r\n　　那是谁的轻轻耳语，<br />\r\n　　你可会许我相思放下？<br />\r\n　　只为你一笑荣华。<br />\r\n　　<br />\r\n　　江山崩塌，枯骨成沙。<br />\r\n　　是谁为你敌对天下？<br />\r\n　　风卷残云，梦里烟花，<br />\r\n　　只为红颜一笑，<br />\r\n　　我甘堕轮回……', 2, 0, '2017-01-23 03:31:21', '2017-01-23 03:31:21'),
(2, 0, 'qishuai231', '资源帖', '总有人会成功，那为什么不能是你呢？', '<p>\r\n	　小学同学A，当年是那种不调皮成绩中等永远被<a href="http://www.jj59.com/zti/laoshi/" class="keywordlink">老师</a>和同学忽略的类型。上普通的初中、险上重点高中，高考没考好还复读过一年，第二年去了一所普通重点大学念计算机。直到此时，他所有的经历依旧是那种中规中矩普普通通的<a href="http://www.jj59.com/zheliwenzhang/" class="keywordlink">人生</a>。然而，四年过后，因大学的期间参加全国程序设计大赛和数学建模比赛，先后拿了两个一等奖，后被保送到一所名校读研。毕业之后在深圳一家研究所工作，领着30万的年薪。着实给了我们这些曾经自以为良好的人一记响亮的耳光，那些曾经不入你眼的人，兴许早已令你望尘莫及。<br />\r\n　　对于我这种跨过高三就再也没有上过早晚自习、没有完完整整啃完一本专业书、更没有过挑灯夜战经历的人而言，是无法体会这些年，我的这位同学到底经历了些什么的。我曾经也写过一段<a href="http://www.jj59.com/zti/time/" class="keywordlink">时间</a>的程序，我知道那加班有多苦；盯着几千几万行代码，有多艰难；我也知道要精通一门技术，看难懂的英文资料需要多有耐心。后来我就“聪明”的转行了，我们周围的聪明人很多，总能给自己找很多合理的借口。“今天天气不好，不跑步了吧！”、“今天肚子不舒服，看会儿电视，就不学习了。”、“明天再开始吧。”体内的懒惰小孩把勤奋小孩伤的体无完肤。而恰恰是那些中规中矩踏踏实实一步一个脚印的笨小孩儿，远远地把你甩在了身后。<br />\r\n　　<br />\r\n　　大学同学B。B跟我的关系很好，曾经他月薪两千的时候还管我借过房租。毕业的时候他做培训那会儿，每天晚上拉着我，要跟我对演，然后让我提意见。我说除非你洗碗，他就傻乎乎地真的洗了好长一段时间的碗；做电话销售的时候，别人每天打三十个电话，他打一百五十通，边打边记录客户的反馈情况；雷打不动地每天晚上跑步五公里；每天看书两个小时；周末参加读书会……半年过后，他月薪是我的好多倍。曾经一份盐煎肉要吃两顿的他，拉着我，要请我吃火锅。\r\n</p>', 2, 1, '2017-01-23 05:05:51', '2017-01-23 05:05:51'),
(3, 2, 'qishuai231', '', 'RE: 总有人会成功，那为什么不能是你呢？', '辛苦了', 0, 0, '2017-01-23 05:05:49', '2017-01-23 05:05:49'),
(4, 0, 'qishuai231', '经验贴', '分享一个作为一个5年经验的PHPer的吐槽', '<span style="background-color:#FFFFFF;">做了5年php，回想起来一切都是坑啊，从地坑到天坑。<br />\r\n开始接触PHP呢，是通过培训机构了解的， 当然5年前的培训机构没有像现在的兄弟连啊或者其他培训老师那么专业。也就是点到为止。<br />\r\n当初考虑从事这行呢，首先肯定是我对程序还是有一定兴趣的，其次呢觉得做程序是一个不需要靠父母靠技术就能走天下的东西，然后就义无反顾的进来了，进来之后呢，发现自己对程序这块还是挺有天赋的，但做为了年轻人，作为一个刚从学校混出来的年轻人来说，身上有着一股抹不掉的懒劲，所以无论还是在培训、在开始的工作中，都没有全心全意、尽心尽意的在学、在做。<br />\r\n开始在网建公司，去过网建公司的人应该都清楚，网建公司的程序员做网站，一般就是套模板、二次开发之类的，当时我还好，老板基本不让我做那些事， \r\n都是挑难的、挑复杂的给我做，半年时间，我从一个没什么经验的初学者走到了可以独立开发商城、ERP、OA等一系列系统并且也自学了THINKPHP、Zend\r\n Framework之类的<a href="http://www.php1.cn/category/97.html">框架</a>的小phper。从而褪去了初学者的光环。<br />\r\n后面呢，又去了一家集团公司，在公司两年时间，基本就是在混，上班聊聊天打打游戏，在那呢，学到的就两点：<br />\r\n1.了解了服务器的基本管理，以及做私单、外包要注意的事项。<br />\r\n2.做技术牛不能代表什么，仅表示你在你这块有特长有突出，写程序做事都是在做人，如何做人？ 如何适应社会的潮流？ 这应该才是初入社会的年轻人要了解的重要点。<br />\r\n<br />\r\n于是乎，我又跳槽了，说是跳槽吧，也可以说是想做事业吧，回到故里，找了一份还算挺好的工作。<br />\r\n在新公司里吧，从入职的普通程序员到现在的技术主管，两年的时间里，成长了许多，这些也就是我现在要吐槽的东西。<br />\r\n<u>1.学海无涯，只有不断提升自身的能力，才能得到他人的信服。（作为一个中层的技术员，在看了一些新东西、其他大牛的书籍看法之后，觉得以前的东西太基础了，编程的这条路我才起步）。<br />\r\n<br />\r\n2.PHPer真的不是很靠php本身，有很多其他的东西，也就是论坛里经常吐槽的“算法、OOP、逻辑”等等。。<br />\r\n<br />\r\n3.程序员的文凭真的不重要？昨天看了论坛的一个帖子，表示文凭挺重要的。 \r\n我的看法是，如果你只想把程序员做一份工作，文凭确实不重要，作为比较简单的PHP来说，不需要太多专业知识就可上手， 用上一小段时间学习 \r\n就可胜任php程序开发的工作。但如果是做一份事业，我认为这个人的文凭还是很能体现事情的，因为不是每个人都是大牛，每个人都能创造奇迹，那些大牛大学里就辍学了，我们可比不上，我相信也没什么人愿意去跟他们比。在公司里大部分都是研究生，研究生导师之类的高端人群，虽然现在是国家教育体制是比较坑，但也不能否认对这些高端人群的技术素质。<br />\r\n<br />\r\n4.做人？生活交际、社会应酬、朋友交心、做事态度等方面才是真正要锻炼的，做程序不只是敲代码。<br />\r\n<br />\r\n5.上班时间写帖子，是不对的。还被领导看到了，要死啊。。好吧， 写好了发给领导看看。</u><br />\r\n<br />\r\n反正最终要吐槽的就是：无论你从事什么开发，都不该只有技术提升，应该要对“做人”有深的了解，不要迷茫在技术的大海里，因为技术只是一个生活工作，一个兴趣爱好，不是你人生的全部，人生还有朋友、家庭、房子、女人、孩子、车子一系列的东西。</span> 转载请注明来源：<a href="http://www.php1.cn/Content/FenXiangYiGeZuoWeiYiGe_5_NianJingYanDe_PHPer_DeTuCao.html">分享一个作为一个5年经验的PHPer的吐槽</a><br />\r\n<p>\r\n	<a href="http://www.php1.cn/Content/FenXiangYiGeZuoWeiYiGe_5_NianJingYanDe_PHPer_DeTuCao.html">http://www.php1.cn/Content/FenXiangYiGeZuoWeiYiGe_5_NianJingYanDe_PHPer_DeTuCao.html</a>\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>', 2, 0, '2017-01-23 05:08:46', '2017-01-23 05:08:46'),
(5, 0, 'qishuai231', '经验贴', '毕业一年总结分享一些工作经验[PHP开发]', '<p>\r\n	本人是PHP开发一枚，去年6月底正式大学毕业，到现在快一年了。工作时间从去年2月份开始来实习，算下来有一年多了。\r\n</p>\r\n<p>\r\n	在进入现在的公司之前，自己有在读大学的时候学习过PHP并做过一些个拿不出手的项目，大概是在大二下学期开始接触网页设计，当时从Dreamweaver傻瓜式的拖DIV块来做简单的网页，再后来陆续学习了PHP，MySQL等必备知识。\r\n</p>\r\n<p>\r\n	大四前的暑假有家网站外包性质公司要我去实习，没去，外包太累，做过外包的挨踢男们都懂。\r\n</p>\r\n<p>\r\n	2012年2月进入现在的公司实习，是家互联网公司，也是自己向往类型的公司，公司在前几年名声有点大，但现在并不景气。可能正是对这个好奇吧，我决定亲身来体会下这个公司的现状，看看到底在做些什么，就这样开始了挨踢男都经历过的前奏。\r\n</p>\r\n<p>\r\n	和大家一样，刚进公司先熟悉业务，没有大家羡慕的1~2个月培训，这批校招的都是直接上岗。找到自己的位置，搭建各种环境，拉去各种代码，开通各种权限，熟悉代码，没个一星期这些基本的东西都搞不定（没经验，老大们也都能体谅）。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	略过过程式的经历，重点分享下在PHP开发路上的总结：\r\n</p>\r\n<p>\r\n	1、永远不要小看PHP\r\n</p>\r\n<p>\r\n	我身边的同事、朋友有些觉得PHP开发没搞头，因此，有些在开始回归C++，也有些在尝试无线开发，IOS开发、安卓开发等等，都有。但是，我想说的是：PHP其实没有大家想的那么简单！看过一些转其他语言的同事的代码，那叫一个惨烈，一个简单的例子：在统计后台展示某个游戏某天的登录人数。同事的做法：从数据库里边把该天该游戏登录的所有用户名单select出来保存到一个PHP数组变量里边，然后再用PHP函数count()一下得出结果！相信很多朋友会直接从数据库里select\r\n count....出结果，并不是像我同事这样吧！\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	2、不要过分依赖PHP\r\n</p>\r\n<p>\r\n	PHP只是一种开发工具之一，还有很多其他的编程语言可供你实现需求，请不要过分依赖PHP来做你所有的需求。举个例子：假如要你备份PostgreSQL数据库的一张表数据到MySQL同样表类型的数据表，并且表数据量上百万，上千万你会怎么弄？难道写个PHP脚本，从PG数据库一段一段的取数据再保存到MySQL吗？其实，还有更好的办法。先将PG整个表导出为CSV格式文件，然后用Linux\r\n awk命令生成Insert插入命令，直接在Linux上执行这个sql文件，从而实现数据表备份（这可能不是最好的办法，DBA的备份方法更快）。\r\n</p>\r\n<p>\r\n	说到这个例子，我想分享的是：PHP攻城师不要仅仅会用PHP，我们要需要会点其它实用的语言，Linux shell就是一个非常不错的语言。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<strong>说在最后：</strong>第一份工作对刚毕业的挨踢开发来说非常重要，多了解下行业环境，别轻易听别人的评价，要自己去查阅相关信息。本人PHP开发一枚，分配的是PHP开发工程师，实际上用PHP的时间少，多半是在写SQL，shell多，毕业快一年了，没啥拿的出手的项目，唯一大家也能看得见的就是这个推书吧codejia.net大学快毕业那会做的，做这博客的原因很简单：自己喜欢买书，<a href="http://codejia.net" target="_blank">编程教程</a>方面的书。所以也就建了这么个博客分享一些好的编程书。以后的IT开发路还很长，希望能跟将要踏入社会的学弟们有所启示吧！\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>', 1, 0, '2017-01-23 05:11:39', '2017-01-23 05:11:39'),
(7, 0, 'qishuai231', '投票贴', 'PHP入门经历和学习过程分享', '经常在某些论坛和QQ群里看到一些朋友会问“怎样才能学好PHP，怎样才能学好***语言 ”，但别人回答最多的是：从最“简单”的开始。<br />\r\n<br />\r\n这个简单也许真的不简单，呵呵。下面我想分享一下自己学习的一些过程。先说些费话，语言组织能力差，说了不少费话，愿意看的就看，不要骂我就行。<br />\r\n<br />\r\n其实学习一门新语言并不是太难，重要的是你有没有准备好去学好它，时间的长短和个人的能力和决心有关。黑客界也流行一句话就是“没有入侵不了的计算机”，这句话大概的意思是说：如果你的技术比维护这台计算机的管理员更胜一筹，那么就能拿下这台计算机甚至能拿下这个管理员管理的所有计算机，如果技不如人，只能继续学习超过对方。我说这些话的意思就是让准备学习陌生语言朋友一定要下决心去学习，只要你下了决心去学了，就一定能学好，千万不要半途而废。（退一万步来说，即使是没学好，但你懂的必然比别人多）<br />\r\n<br />\r\n了解什么是最简单:<br />\r\n1、网页的基本构成就是html代码,所以必须熟悉HTML/CSS/JS等基本元素<br />\r\n2、熟悉PHP语法，了解PHP和HTML的运行方式，学习将PHP与HTML结合完成简单页面<br />\r\n<br />\r\nPHP手册是比较好的入门老师<br />\r\n<br />\r\n影响学习进度和程序强大是否的几个可能因素：<br />\r\n<br />\r\n<strong>1、记忆力<br />\r\n<br />\r\n</strong>一门语言的强大是否，应该看它的函数库和代码执行效率。<br />\r\n每门语言都是有自己强大的函数库，要学好它，就必须得花很多的时间去记忆，良好的记忆力能使学习达到事半功倍的效果。<br />\r\n<br />\r\n<strong>2、数学和逻辑思维<br />\r\n<br />\r\n</strong>这个当然不是绝对影响，因为看开发项目的复杂程度。小的项目不需要太多的数学和逻辑思维能力，但如果是开发类似于财务或大量运算相关项目，这一点就是非常重要了。<br />\r\n<br />\r\n<strong>3、有其它语言的基础<br />\r\n<br />\r\n</strong>“一通百通”，这句话的道理也是不容置疑。都说有C语言基础的人，学习PHP比较容易，我没学过C语言，所以不知道这句话的效果<br />\r\n<br />\r\n<strong>4、多看别人写的代码<br />\r\n<br />\r\n</strong>学习别人的长处，补自己的不足，当然不完全为这个。我始终相信：一个有组织的团队写出来的程序不会比个人差。<br />\r\n我PHP入门就是从看代码开始的，我喜欢看别人写的代码(入门是从disucz,PHPWind和国外的phpbb看起，还有就是目前最流行的开源\r\nBLOG程序)，我尽可能的收集网络上的PHP开源程序，到目前为止，我收集并下载的PHP开源程序有2GB大小,包括BBS，BLOG，CMS等。我下载并不是为了收藏他们，是学习他们的编程方式和实现方法,如果自己想实现的功能不知道怎么去实现，我就会学习他们的实现方法，并不是抄袭代码，最终结果是想通过学习，将技术变成属于自己的。ASP我也是以同样的方式学习的(动易和讯的程序及其它ASP开源程序)<br />\r\n<strong><br />\r\n5、实践<br />\r\n<br />\r\n</strong>理论固然重要，但实践必不可少。你理论知识再好，如果不实践，就不能看到理论所产生的结果或效果，并不能使你的记忆深刻，所以不能纸上谈兵<br />\r\n<br />\r\n<strong>6、恒心<br />\r\n<br />\r\n</strong>广告不是有句话是这样说的么：“世界上最高的山是自己”，这句话相信朋友们都能理解自己这关，其它的都好办<br />\r\n<br />\r\n<strong>7、找对自己有用的学习方式<br />\r\n<br />\r\n</strong>这条可以参照4，我的入门是从看代码开始<br />\r\n可能有朋友会问：“一开始看那些强大的代码，你能看懂么？”<br />\r\n我的学习方式是从“使用”找“学函数”：PHP的函数太多，短时间不可能记住所有的函数，因为我相信，一个大的项目肯定会使用常见和必须的函数，找到这些函数，才会有重点的学习这些函数，难道你能说写BBS的函数会比写BLOG用的函数少么？难道会写BBS还不会写BLOG么？<br />\r\n找对学习方式是要经过多种学习方式的尝试，所以这个只有自己把握，毕竟每个人的学习方式不一样<br />\r\n<br />\r\n<strong>8、尽可能的找视屏教程看<br />\r\n<br />\r\n</strong>别人说十句，还不如一个操作看的明白，这个相信朋友们都有体会吧<br />\r\n<br />\r\n<strong>9、从项目开始<br />\r\n<br />\r\n</strong>一定要"逼"自己从写项目开始。<br />\r\n任何一个高手的“成长”都是要经历一个过程，这个过程是一步步走过来的，来之不易<br />\r\n很多朋友学习PHP的第一个作品几乎都是“留言簿”，因为是最简单的程序了<br />\r\n会写留言簿，也并不能完全代表你已经入门了，也并不代表就会了PHP，我自己开始想以一个“网络书签”作为自己的第一个作品，但写了基本功能后就没继续了，感觉没多大意思。现在写一个完全正确针对企业的CMS系统，包括针对企业的一些常用功能，我想以这个作为自己PHP入门的第一个作品<br />\r\n<strong><br />\r\n10、了解并学习和PHP有关的技术<br />\r\n<br />\r\n</strong>真正的高手必须得学习和PHP关联的技术，要想学好PHP，就必须得学习数据库，PHP+MYSQL被认为是“黄金搭档”。所以你必须得接触MYSQL或你认为比较好的数据库，开始设计比较"合理"的数据库，这里的合理就比较广泛了，包括数据库优化和查询优化等等。<br />\r\n<br />\r\n最后想说的是：“不要依靠别人”没人愿意理会一个新手的提问，因为新手提问的在他们眼里太简单，不想去解释。女性朋友很流行一句话是“男人靠的住，母猪会上树” 引用这句话没别的意思，只是让朋友们知道这句话的意思。<br />\r\n<br />\r\n还想说的是：“珍惜别人回答的次数”人的忍耐都是有限度的，一定要珍惜这个限度，不要什么问题都去问，有些问题自己花点时间能找到答案的也去问，每问一次，别人的耐心就减去一次，等你真正需要帮助的时候，正好是别人不愿意回答你的时候，可以想像一下，你失去的太多了。<br />\r\n<br />\r\n建议的是：“有问题？baidu一下”相信朋友们都已经注意到了，你问的问题，在搜索引擎里都能找到相关的提问，并且有详细的解决方案，你可以使用搜索引擎来找到自己的答案，何必去问别人呢<br />\r\n<p>\r\n	目前最大的中文搜索引擎是 baidu.com ,全球的google,当然还有其它的搜索引擎，一个找不到，多试几个，除非你的问题是第一个提问的 ，那么你是幸运的，也可能是你“长相”问题，呵呵，说笑的，不要介意，不过这句话倒是挺流行\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>', 1, 0, '2017-01-23 05:15:55', '2017-01-23 05:15:55'),
(8, 0, 'qishuai231', '经验贴', '分享一些PHP项目开发的管理经验', '<p>\r\n	以下几条，是我的一些项目管理经验分享。针对具体项目还有很多需要补充的。\r\n</p>\r\n<p>\r\n	员工注意方面：<br />\r\n1) 第一要派可靠的人，负责的人负责项目整体。<br />\r\n2) 定岗不定人，永远要保证项目上岗位的稳定性。不要将项目依赖某个点甚至面。<br />\r\n3) 建立完善的奖励机制。这个要根据公司情况来确定。<br />\r\n4) 项目组中必须有一个善于语言沟通及善于书面表达的。<br />\r\n5) 给予员工充分的体贴与关怀，尤其对于外派驻点开发的。\r\n</p>\r\n<div class="adsense adsense-midtext" style="text-align:center;margin:12px;">\r\n</div>\r\n<p>\r\n	工程方面：<br />\r\n1)建立版本库，并提供公网的SVN或者CVS<br />\r\n2)使用框架开发，尽量明确模块归属开发者，不用万金油的程序员贯穿在项目编码中。<br />\r\n3)具备完善的编码规范手册，并在整体项目中严格执行。<br />\r\n4)总体进度以甘视图方式表现出来，并严格按照既定工期完成既定任务。<br />\r\n5)建立完善的测试机制，对于代码的安全性、易用性进行客观的评测，并出具评测报告。\r\n</p>\r\n<p>\r\n	甲方方面：<br />\r\n1)建立和谐、友好、亲密、互惠、互信、平等的关系及合同。<br />\r\n2)与主要负责人及甲方出资人要建立深刻的互动，并建立足够的社交友谊。<br />\r\n3)项目进度及功能实现一定要最大化满足用户需求，但是对于非分的技术需求，一定要坚决抵制，并陈恳阐述其难度或周期资金问题的重要性。<br />\r\n4)深刻认识互利互惠的含义，并深刻理解做事先做人的处世哲学。说出的话，做出的事情，一定要够MEN。<br />\r\n5)建立可以持续交往的契机，任何项目的发展都是其延续性，成长性的。同时用户口碑的重要性往往比那些开发费用更具备意义。一个企业要发展，口碑好是第一要做到的。\r\n</p>\r\n<p>\r\n	合同及开发需求注意方面：<br />\r\n1)项目管理中，必须文档先行，然后签署详细的需求书，并让甲方确认，网络营销师签字。这样为了杜绝甲方在项目开展后无理的额外要求。并在合同中严重说明严格根据开发合同执行。<br />\r\n2)大项目要分期，针对第一条，个别项目签署开发合同的时候，对于那些已经编码开始后，并已经初具规模的情况下，用户需要增加的，或者认为很有必要修改的。必须放到2期开发中。第一能保证在既定周期内可以完成开发，收回款项，第二也能明确开发条理性并能少一些纠纷，多一个收入。<br />\r\n3)项目结束后不要签署过长的维护期。如果用户要求，那建议签署服务合同及培训合同。否则尾款不好收尾，而且带来的服务压力也会很大。<br />\r\n4)合同部分签署的要实事求是，不能为了项目的签署下来，而胡乱承诺。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>', 1, 0, '2017-01-23 05:17:33', '2017-01-23 05:17:33'),
(9, 0, 'qishuai231', '求助帖', '简单说说PHP优化那些事', '<p>\r\n	我们在编写程序时，总是想要使自己的程序占用资源最小，运行速度更快，代码量更少。往往我们在追求这些的同时却失去了很多东西。下面我想讲讲我对PHP优化的理解。优化的目的是花最少的代价换来最快的运行速度与最容易维护的代码。\r\n</p>\r\n<p>\r\n	<strong>　　进行大范围的优化，而不是死啃某些程序代码</strong>\r\n</p>\r\n<p>\r\n	　　我这里所说的优化，基本上都是从服务器，Apache,数据库这些方面来进行的优化，而并不是对你的PHP代码加以改进从而提高程序的运行速度，因为比起你将程序中的正则优化为字符串处理函数从而提升程序速度来说，在大范围内进行的优化所需要的代价要比这个小的多，而获得报酬却要丰厚的多。\r\n</p>\r\n<p>\r\n	　　在非代码处进行优化有以下好处：\r\n</p>\r\n<p>\r\n	<strong>　　1、通常情况下能够大大提高效率</strong>\r\n</p>\r\n<p>\r\n	<strong>　　2、不会危及到代码的完整性</strong>\r\n</p>\r\n<p>\r\n	<strong>　　3、能够快速部署</strong>\r\n</p>\r\n<p>\r\n	　　<strong>缓存技术</strong>\r\n</p>\r\n<p>\r\n	　　下面来说说常用的缓存技术，通过这些缓存技术能够大大的提高效率\r\n</p>\r\n<p>\r\n	　　在说到缓存技术的时候不得不提到memcached ，memcached是高效、快速的分布式内存对象缓存系统，主要用于加速 WEB 动态应用程序。\r\n</p>\r\n<p>\r\n	　　<strong>Memcached的原理</strong>\r\n</p>\r\n<p>\r\n	　　memcached 是以守护程序方式运行于一个或多个服务器中，等待接收客户端的连接操作，客户端可以由各种语言编写(例如PHP)。PHP\r\n 等客户端在与 memcached 服务建立连接之后，接下来的事情就是存取对象了，每个被存取的对象都有一个唯一的标识符 \r\nkey，存取操作均通过这个 key 进行，保存到 memcached 中的对象实际上是放置内存中的，并不是保存在 cache \r\n文件中的，这也是为什么 memcached 能够如此高效快速的原因。\r\n</p>\r\n<p>\r\n	　　说完memcached，下面来说说常用的<strong>缓存方法</strong>\r\n</p>\r\n<p>\r\n	　　<strong>1、编译与OPCODE缓存</strong>\r\n</p>\r\n<p>\r\n	　　因为PHP是解释型的语言，所以每个PHP文件在运行的时候都需要编译后再执行，同一个文件，不同的用户访问，或者同一个用户不同时间访问同一个文件，每次都需要重新编译然后运行，这样就耗费了大量时间。\r\n</p>\r\n<p>\r\n	　　通过编译缓存每个文件在修改之后只编译一次这样就减少了文件IO操作，用户访问后机器指令直接从内存中取出并执行而不是硬盘中读出。\r\n</p>\r\n<p>\r\n	　　最常见的PHP编译缓存工具有：APC，Accelerator，xcache\r\n</p>\r\n<p>\r\n	　　<strong>2、全局页面缓存– Squid Cache</strong>\r\n</p>\r\n<p>\r\n	　　Squid Cache(简称为Squid)是一个流行的自由软件(GNU通用公共许可证)的代理服务器和Web缓存服务器，Squid作为网页服务器的前置cache服务器通过缓存相关请求来提高Web服务器的速度。\r\n</p>\r\n<p>\r\n	　　<strong>3、局部缓存之SQL缓存</strong>\r\n</p>\r\n<p>\r\n	　　在大多数应用程序中主要的瓶颈往往可以追溯到数据库的操作中，一般都是因为复杂的数据库查询而耗费了大量时间，而SQL缓存可以大大降低复杂查询造成的负荷。\r\n</p>\r\n<p>\r\n	　　SQL缓存的例子(使用了memcached扩展)\r\n</p>\r\n<p>\r\n	　　代码片段：\r\n</p>\r\n<div class="jb51code">\r\n	<div>\r\n		<div id="highlighter_363798" class="syntaxhighlighter  php">\r\n			<div class="toolbar">\r\n				<span><a href="http://www.jb51.net/article/57908.htm#" class="toolbar_item command_help help">?</a></span>\r\n			</div>\r\n			<table class="ke-zeroborder" cellspacing="0" cellpadding="0" border="0">\r\n				<tbody>\r\n					<tr>\r\n						<td class="gutter">\r\n							<div class="line number1 index0 alt2">\r\n								1\r\n							</div>\r\n							<div class="line number2 index1 alt1">\r\n								2\r\n							</div>\r\n							<div class="line number3 index2 alt2">\r\n								3\r\n							</div>\r\n							<div class="line number4 index3 alt1">\r\n								4\r\n							</div>\r\n							<div class="line number5 index4 alt2">\r\n								5\r\n							</div>\r\n							<div class="line number6 index5 alt1">\r\n								6\r\n							</div>\r\n						</td>\r\n						<td class="code">\r\n							<div class="container">\r\n								<div class="line number1 index0 alt2">\r\n									$key= md5(“some sort of sql query”);\r\n								</div>\r\n								<div class="line number2 index1 alt1">\r\n									　　if(!($result= memcache_get($key))) {\r\n								</div>\r\n								<div class="line number3 index2 alt2">\r\n									　　$result=$pdo-&gt;query($qry)-&gt;fetchAll();\r\n								</div>\r\n								<div class="line number4 index3 alt1">\r\n									　　// 缓存查询结果一小时\r\n								</div>\r\n								<div class="line number5 index4 alt2">\r\n									　　memcache_set($key,$result, NULL, 3600);\r\n								</div>\r\n								<div class="line number6 index5 alt1">\r\n									　　}\r\n								</div>\r\n							</div>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n		</div>\r\n	</div>\r\n</div>\r\n<p>\r\n	　　　　<strong>4、局部缓存之代码块缓存</strong>\r\n</p>\r\n<p>\r\n	　　为了优化PHP程序，有时候我们不得不优化一个个代码段来减少那么一点点的执行的时间，但是比起优化复杂的不同的PHP代码段还不如通过缓存来直接忽略这些代码段的优化，这样做的好处是：\r\n</p>\r\n<p>\r\n	<strong>　　1、能够很快的看到效果</strong>\r\n</p>\r\n<p>\r\n	<strong>　　2、不会破坏以前的代码</strong>\r\n</p>\r\n<p>\r\n	<strong>　　3、速度要比优化代码要快得多</strong>\r\n</p>\r\n<p>\r\n	　　代码块缓存的列子(同样使用了memcached扩展)\r\n</p>\r\n<div class="jb51code">\r\n	<div>\r\n		<div id="highlighter_608772" class="syntaxhighlighter  php">\r\n			<div class="toolbar">\r\n				<span><a href="http://www.jb51.net/article/57908.htm#" class="toolbar_item command_help help">?</a></span>\r\n			</div>\r\n			<table class="ke-zeroborder" cellspacing="0" cellpadding="0" border="0">\r\n				<tbody>\r\n					<tr>\r\n						<td class="gutter">\r\n							<div class="line number1 index0 alt2">\r\n								1\r\n							</div>\r\n							<div class="line number2 index1 alt1">\r\n								2\r\n							</div>\r\n							<div class="line number3 index2 alt2">\r\n								3\r\n							</div>\r\n							<div class="line number4 index3 alt1">\r\n								4\r\n							</div>\r\n							<div class="line number5 index4 alt2">\r\n								5\r\n							</div>\r\n							<div class="line number6 index5 alt1">\r\n								6\r\n							</div>\r\n							<div class="line number7 index6 alt2">\r\n								7\r\n							</div>\r\n							<div class="line number8 index7 alt1">\r\n								8\r\n							</div>\r\n							<div class="line number9 index8 alt2">\r\n								9\r\n							</div>\r\n							<div class="line number10 index9 alt1">\r\n								10\r\n							</div>\r\n						</td>\r\n						<td class="code">\r\n							<div class="container">\r\n								<div class="line number1 index0 alt2">\r\n									functioncomplex_function_abc($a,$b,$c) {\r\n								</div>\r\n								<div class="line number2 index1 alt1">\r\n									　　$key=__FUNCTION__. serialize\r\n								</div>\r\n								<div class="line number3 index2 alt2">\r\n									　　(func_get_args());\r\n								</div>\r\n								<div class="line number4 index3 alt1">\r\n									　　if(!($result= memcache_get($key))) {\r\n								</div>\r\n								<div class="line number5 index4 alt2">\r\n									　　$result=//函数代码\r\n								</div>\r\n								<div class="line number6 index5 alt1">\r\n									　　// 储存执行结果1小时\r\n								</div>\r\n								<div class="line number7 index6 alt2">\r\n									　　memcache_set($key,$result, NULL, 3600);\r\n								</div>\r\n								<div class="line number8 index7 alt1">\r\n									　　}\r\n								</div>\r\n								<div class="line number9 index8 alt2">\r\n									　　return$result;\r\n								</div>\r\n								<div class="line number10 index9 alt1">\r\n									　　}\r\n								</div>\r\n							</div>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n		</div>\r\n	</div>\r\n</div>\r\n<p>\r\n	当然除了上述方法外还可以用到文件缓存(将数据库中的数据取出储存在文件中)，还可以生成静态HTML文件等，但是这些方法的缓存还是将文件储存在硬盘上而不是内存中。\r\n</p>\r\n<p>\r\n	　　<strong>输出控制</strong>\r\n</p>\r\n<p>\r\n	　　除了上述缓存技术外还可以通过输出控制来让程序执行的时间更少\r\n</p>\r\n<p>\r\n	　　下面通过PHP与APACHE来说说输出控制\r\n</p>\r\n<p>\r\n	　　<strong>1、PHP输出控制</strong>\r\n</p>\r\n<p>\r\n	　　这里最主要用到ob_start()以及PHP中的OB系列函数，这些函数可以做什么呢?\r\n</p>\r\n<p>\r\n	　　第一就是静态模版技术。所谓静态模版技术就是通过某种方式，使得用户在client端得到的是由PHP产生的html页面。如果这个html页面不会再被更新，那么当另外的用户再次浏览此页面时，程序将不会再调用PHP以及相关的数据库，对于某些信息量比较大的网站，\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>', 1, 0, '2017-01-23 05:18:40', '2017-01-23 05:18:40'),
(10, 0, 'qishuai231', '资源帖', 'BFPRT(线性查找算法)', '<p>\r\n	BFPRT算法解决的问题十分经典，即从某n个元素的序列中选出第k大（第k小）的元素，通过巧妙的分&nbsp;析，BFPRT可以保证在最坏情况下仍为线\r\n 性时间复杂度。该算法的思想与快速排序思想相似，当然，为使得算法在最坏情况下，依然能达到o(n)的时间复杂&nbsp;度，五位算法作者做了精妙的处理。\r\n</p>\r\n<p>\r\n	算法步骤：\r\n</p>\r\n<p>\r\n	1.&nbsp;将n个元素每5个一组，分成n/5(上界)组。\r\n</p>\r\n<p>\r\n	2.&nbsp;取出每一组的中位数，任意排序方法，比如插入排序。\r\n</p>\r\n<p>\r\n	3.&nbsp;递归的调用selection算法查找上一步中所有中位数的中位数，设为x，偶数个中位数的情况下设定为选取中间小的一个。\r\n</p>\r\n<p>\r\n	4.&nbsp;用x来分割数组，设小于等于x的个数为k，大于x的个数即为n-k。\r\n</p>\r\n<p>\r\n	5.&nbsp;若i==k，返回x；若i&lt;k，在小于x的元素中递归查找第i小的元素；若i&gt;k，在大于x的元素中递归查找第i-k小的元素。\r\n</p>\r\n<p>\r\n	终止条件：n=1时，返回的即是i小元素。\r\n</p>', 1, 0, '2017-01-23 05:23:51', '2017-01-23 05:23:51'),
(11, 0, 'qishuai231', '经验贴', 'DFS（深度优先搜索）', '<p>\r\n	深度优先搜索算法（Depth-First-Search），是搜索算法的一种。它沿着树的深度遍历树的节点，尽可能深的搜索树的分&nbsp;支。当节点v\r\n的所有边都己被探寻过，搜索将回溯到发现节点v的那条边的起始节点。这一过程一直进行到已发现从源节点可达的所有节点为止。如果还存在未被发&nbsp;现的节点，\r\n 则选择其中一个作为源节点并重复以上过程，整个进程反复进行直到所有节点都被访问为止。DFS属于盲目搜索。\r\n</p>\r\n<p>\r\n	深度优先搜索是图论中的经典算法，利用深度优先搜索算法可以产生目标图的相应拓扑排序表，利用拓扑排序表可以方便的解决很多相关的图论问题，如最大路径问题等等。一般用堆数据结构来辅助实现DFS算法。\r\n</p>\r\n<p>\r\n	深度优先遍历图算法步骤：\r\n</p>\r\n<p>\r\n	1.&nbsp;访问顶点v；\r\n</p>\r\n<p>\r\n	2.&nbsp;依次从v的未被访问的邻接点出发，对图进行深度优先遍历；直至图中和v有路径相通的顶点都被访问；\r\n</p>\r\n<p>\r\n	3.&nbsp;若此时图中尚有顶点未被访问，则从一个未被访问的顶点出发，重新进行深度优先遍历，直到图中所有顶点均被访问过为止。\r\n</p>\r\n<p>\r\n	上述描述可能比较抽象，举个实例：\r\n</p>\r\n<p>\r\n	DFS&nbsp;在访问图中某一起始顶点&nbsp;v&nbsp;后，由&nbsp;v&nbsp;出发，访问它的任一邻接顶点&nbsp;w1；再从&nbsp;w1&nbsp;出发，访问与&nbsp;w1邻&nbsp;接但还没有访问过的顶点&nbsp;w2；然后再从&nbsp;w2&nbsp;出发，进行类似的访问，…&nbsp;如此进行下去，直至到达所有的邻接顶点都被访问过的顶点&nbsp;u&nbsp;为止。\r\n</p>\r\n<p>\r\n	接着，退回一步，退到前一次刚访问过的顶点，看是否还有其它没有被访问的邻接顶点。如果有，则访问此顶点，之后再从此顶点出发，进行与前述类似的访问；如果没有，就再退回一步进行搜索。重复上述过程，直到连通图中所有顶点都被访问过为止。\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	<br />\r\n</p>', 2, 0, '2017-01-23 05:25:31', '2017-01-23 05:25:31'),
(12, 0, 'qishuai231', '经验贴', 'Dijkstra算法', '<p>\r\n	戴克斯特拉算法（Dijkstra’s&nbsp;algorithm）是由荷兰计算机科学家艾兹赫尔·戴克斯特拉提出。迪科斯彻算法使用了广度优先搜索解决非负权有向图的单源最短路径问题，算法最终得到一个最短路径树。该算法常用于路由算法或者作为其他图算法的一个子模块。\r\n</p>\r\n<p>\r\n	该算法的输入包含了一个有权重的有向图&nbsp;G，以及G中的一个来源顶点&nbsp;S。我们以&nbsp;V&nbsp;表示&nbsp;G&nbsp;中所有顶点的集合。每一个图中的边，都是两个顶点\r\n 所形成的有序元素对。(u,&nbsp;v)&nbsp;表示从顶点&nbsp;u&nbsp;到&nbsp;v&nbsp;有路径相连。我们以&nbsp;E&nbsp;表示G中所有边的集合，而边的权重则由权重函 \r\n数&nbsp;w:&nbsp;E&nbsp;→&nbsp;[0,&nbsp;∞]&nbsp;定义。因此，w(u,&nbsp;v)&nbsp;就是从顶点&nbsp;u&nbsp;到顶点&nbsp;v&nbsp;的非负权重（weight）。边的权重可以想像成两个顶点之\r\n间的距离。任两点间路径的权重，就是该路径上所有边的权重总和。已知有&nbsp;V&nbsp;中有顶点&nbsp;s&nbsp;及&nbsp;t，Dijkstra&nbsp;算法可以找到&nbsp;s&nbsp;到&nbsp;t的最低权\r\n重路径(例如，最短路径)。这个算法也可以在一个图中，找到从一个顶点&nbsp;s&nbsp;到任何其他顶点的最短路径。对于不含负权的有向图，Dijkstra算法是目\r\n 前已知的最快的单源最短路径算法。\r\n</p>\r\n<p>\r\n	算法步骤：\r\n</p>\r\n<p>\r\n	1.&nbsp;初始时令&nbsp;S={V0},T={其余顶点}，T中顶点对应的距离值\r\n</p>\r\n<p>\r\n	若存在&lt;v0,vi&gt;，d(V0,Vi)为&lt;v0,vi&gt;弧上的权值\r\n</p>\r\n<p>\r\n	若不存在&lt;v0,vi&gt;，d(V0,Vi)为∞\r\n</p>\r\n<p>\r\n	2.&nbsp;从T中选取一个其距离值为最小的顶点W且不在S中，加入S\r\n</p>\r\n<p>\r\n	3.&nbsp;对其余T中顶点的距离值进行修改：若加进W作中间顶点，从V0到Vi的距离值缩短，则修改此距离值\r\n</p>\r\n<p>\r\n	重复上述步骤2、3，直到S中包含所有顶点，即W=Vi为止\r\n</p>\r\n<p>\r\n	&nbsp;\r\n</p>\r\n<p>\r\n	<a href="http://www.lupaworld.com/data/attachment/portal/201408/28/161354v6e5yi9ziiyekry8.gif" target="_blank"><img class="fit-image" src="http://www.lupaworld.com/data/attachment/portal/201408/28/161354v6e5yi9ziiyekry8.gif" alt="" height="222" width="283" border="0" /><br />\r\n</a>\r\n</p>\r\n<p>\r\n	<br />\r\n<a href="http://www.lupaworld.com/data/attachment/portal/201408/28/161354v6e5yi9ziiyekry8.gif" target="_blank"></a>\r\n</p>', 3, 1, '2017-01-23 05:25:24', '2017-01-23 05:25:24'),
(13, 12, 'qishuai231', '', 'RE: Dijkstra算法', 'so cool&nbsp;&nbsp;&nbsp;&nbsp;<br />', 0, 0, '2017-01-23 05:25:23', '2017-01-23 05:25:23');

-- --------------------------------------------------------

--
-- 表的结构 `flower`
--

CREATE TABLE `flower` (
  `id` smallint(5) NOT NULL,
  `user_from` varchar(20) NOT NULL,
  `user_to` varchar(20) NOT NULL,
  `num` smallint(5) NOT NULL,
  `content` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `flower`
--

INSERT INTO `flower` (`id`, `user_from`, `user_to`, `num`, `content`, `date`) VALUES
(1, 'qishuai231', 'Java', 88, '非常喜欢您，送给你一些花朵吧！', '2017-01-23 05:26:32'),
(2, 'qishuai231', 'Apache', 88, '非常喜欢您，送给你一些花朵吧！', '2017-01-23 05:26:53'),
(3, 'qishuai231', 'RasmusLerdorf', 88, '非常喜欢您，送给你一些花朵吧！', '2017-01-23 05:27:12'),
(4, 'RasmusLerdorf', 'qishuai231', 99, '感谢您送的花朵，我也表达一下我的心意，望收下哦！', '2017-01-23 05:28:40');

-- --------------------------------------------------------

--
-- 表的结构 `friend`
--

CREATE TABLE `friend` (
  `id` smallint(5) NOT NULL,
  `user_from` varchar(20) NOT NULL,
  `user_to` varchar(20) NOT NULL,
  `content` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `friend`
--

INSERT INTO `friend` (`id`, `user_from`, `user_to`, `content`, `status`, `date`) VALUES
(1, 'qishuai231', 'RasmusLerdorf', '添加理由： 非常欣赏您，希望能够成为您的好朋友！', '1', '2017-01-23 05:28:26'),
(2, 'qishuai231', 'Yii', '添加理由： 非常欣赏您，希望能够成为您的好朋友！', '', '2017-01-23 05:26:22'),
(3, 'qishuai231', 'Java', '添加理由： 非常欣赏您，希望能够成为您的好朋友！', '', '2017-01-23 05:26:39'),
(4, 'qishuai231', 'Linux', '添加理由： 非常欣赏您，希望能够成为您的好朋友！', '', '2017-01-23 05:26:47'),
(5, 'qishuai231', 'golanguage', '添加理由： 非常欣赏您，希望能够成为您的好朋友！', '', '2017-01-23 05:27:03'),
(6, 'qishuai231', 'Thinkphp', '添加理由： 非常欣赏您，希望能够成为您的好朋友！', '', '2017-01-23 05:27:21');

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE `message` (
  `id` smallint(5) NOT NULL,
  `user_from` varchar(20) NOT NULL,
  `user_to` varchar(20) NOT NULL,
  `content` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`id`, `user_from`, `user_to`, `content`, `status`, `date`) VALUES
(1, 'qishuai231', 'RasmusLerdorf', '你是php大神，请收我为徒吧！！！', '1', '2017-01-23 06:18:51'),
(2, 'RasmusLerdorf', 'qishuai231', '我同意了！希望你能好好学习php', '0', '2017-01-23 06:15:45'),
(3, 'Andy', 'RasmusLerdorf', '你是php大神，请收我为徒吧！！！', '0', '2017-01-23 06:15:42'),
(4, 'RasmusLerdorf', 'qishuai231', '谢谢您的支持！欢迎下次再来访问！', '0', '2017-01-23 06:19:54');

-- --------------------------------------------------------

--
-- 表的结构 `msg`
--

CREATE TABLE `msg` (
  `id` smallint(5) NOT NULL,
  `user_from` varchar(20) NOT NULL,
  `user_to` varchar(20) NOT NULL,
  `content` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `msg`
--

INSERT INTO `msg` (`id`, `user_from`, `user_to`, `content`, `status`, `date`) VALUES
(1, 'RasmusLerdorf', 'qishuai231', '下周加班！\r\n注意别迟到！！', '1', '2017-01-23 05:30:33'),
(2, 'qishuai231', 'RasmusLerdorf', '你是php大神\r\n请收我位图吧', '', '2017-01-23 05:32:22');

-- --------------------------------------------------------

--
-- 表的结构 `photo`
--

CREATE TABLE `photo` (
  `id` smallint(5) NOT NULL,
  `owner` varchar(20) NOT NULL,
  `album` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `photo`
--

INSERT INTO `photo` (`id`, `owner`, `album`, `name`, `date`) VALUES
(8, 'qishuai231', '程序猿', '1485145954.jpg', '2017-01-23 04:32:34'),
(9, 'qishuai231', '程序猿', '1485145959.jpg', '2017-01-23 04:32:39'),
(10, 'qishuai231', '程序猿', '1485145963.jpg', '2017-01-23 04:32:43'),
(11, 'qishuai231', '程序猿', '1485145967.jpg', '2017-01-23 04:32:47'),
(12, 'qishuai231', '程序猿', '1485145972.jpg', '2017-01-23 04:32:52'),
(13, 'qishuai231', '程序猿', '1485145980.jpg', '2017-01-23 04:33:00'),
(14, 'qishuai231', '程序猿', '1485145985.jpg', '2017-01-23 04:33:05'),
(15, 'qishuai231', '程序猿', '1485146000.jpg', '2017-01-23 04:33:20'),
(16, 'qishuai231', '微微一笑很倾城', '1485146690.jpg', '2017-01-23 04:44:50'),
(17, 'qishuai231', '微微一笑很倾城', '1485146694.jpg', '2017-01-23 04:44:54'),
(18, 'qishuai231', '微微一笑很倾城', '1485146700.jpg', '2017-01-23 04:45:00'),
(19, 'qishuai231', '微微一笑很倾城', '1485146704.png', '2017-01-23 04:45:04'),
(20, 'qishuai231', '微微一笑很倾城', '1485146707.jpg', '2017-01-23 04:45:07'),
(21, 'qishuai231', '微微一笑很倾城', '1485146709.jpg', '2017-01-23 04:45:09'),
(22, 'qishuai231', '微微一笑很倾城', '1485146712.jpg', '2017-01-23 04:45:12'),
(23, 'qishuai231', '微微一笑很倾城', '1485146714.png', '2017-01-23 04:45:14'),
(24, 'qishuai231', '微微一笑很倾城', '1485146717.jpg', '2017-01-23 04:45:17'),
(25, 'qishuai231', '微微一笑很倾城', '1485146723.png', '2017-01-23 04:45:23'),
(26, 'qishuai231', '魔兽世界', '1485146771.png', '2017-01-23 04:46:11'),
(27, 'qishuai231', '魔兽世界', '1485146775.jpg', '2017-01-23 04:46:15'),
(28, 'qishuai231', '魔兽世界', '1485146777.jpg', '2017-01-23 04:46:17'),
(29, 'qishuai231', '魔兽世界', '1485146779.jpg', '2017-01-23 04:46:19'),
(30, 'qishuai231', '魔兽世界', '1485146781.jpg', '2017-01-23 04:46:21'),
(31, 'qishuai231', '魔兽世界', '1485146784.jpg', '2017-01-23 04:46:24'),
(32, 'qishuai231', '魔兽世界', '1485146787.jpg', '2017-01-23 04:46:27'),
(33, 'qishuai231', '魔兽世界', '1485146796.jpg', '2017-01-23 04:46:36'),
(34, 'qishuai231', '魅力大理', '1485146825.jpg', '2017-01-23 04:47:05'),
(35, 'qishuai231', '魅力大理', '1485146829.jpg', '2017-01-23 04:47:09'),
(36, 'qishuai231', '魅力大理', '1485146832.jpg', '2017-01-23 04:47:12'),
(37, 'qishuai231', '魅力大理', '1485146835.jpg', '2017-01-23 04:47:15'),
(38, 'qishuai231', '魅力大理', '1485146838.jpg', '2017-01-23 04:47:18'),
(39, 'qishuai231', '魅力大理', '1485146840.jpg', '2017-01-23 04:47:20'),
(40, 'qishuai231', '阿凡达', '1485146873.jpg', '2017-01-23 04:47:54'),
(41, 'qishuai231', '阿凡达', '1485146878.jpg', '2017-01-23 04:47:58'),
(42, 'qishuai231', '阿凡达', '1485146883.jpg', '2017-01-23 04:48:03'),
(43, 'qishuai231', '阿凡达', '1485146887.jpg', '2017-01-23 04:48:07'),
(44, 'qishuai231', '阿凡达', '1485146892.jpg', '2017-01-23 04:48:12'),
(45, 'qishuai231', '阿凡达', '1485146899.jpg', '2017-01-23 04:48:19'),
(46, 'qishuai231', '阿凡达', '1485146905.jpg', '2017-01-23 04:48:25'),
(47, 'qishuai231', 'ChinaJoy', '1485146932.jpg', '2017-01-23 04:48:52'),
(48, 'qishuai231', 'ChinaJoy', '1485146935.jpg', '2017-01-23 04:48:55'),
(49, 'qishuai231', 'ChinaJoy', '1485146938.jpg', '2017-01-23 04:48:58'),
(50, 'qishuai231', 'ChinaJoy', '1485146940.jpg', '2017-01-23 04:49:00'),
(51, 'qishuai231', 'ChinaJoy', '1485146943.jpg', '2017-01-23 04:49:03'),
(52, 'qishuai231', 'ChinaJoy', '1485146945.jpg', '2017-01-23 04:49:05'),
(53, 'qishuai231', 'ChinaJoy', '1485146948.jpg', '2017-01-23 04:49:08'),
(54, 'qishuai231', 'ChinaJoy', '1485146951.jpg', '2017-01-23 04:49:11'),
(55, 'qishuai231', 'ChinaJoy', '1485146953.jpg', '2017-01-23 04:49:13');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` smallint(6) NOT NULL,
  `uniqid` varchar(50) NOT NULL,
  `active` varchar(80) NOT NULL,
  `level` varchar(1) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `tip` varchar(20) NOT NULL,
  `ans` varchar(20) NOT NULL,
  `sex` varchar(2) NOT NULL,
  `face` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `qq` varchar(15) NOT NULL,
  `url` varchar(50) NOT NULL,
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_load_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_load_ip` varchar(40) NOT NULL,
  `login_count` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `uniqid`, `active`, `level`, `username`, `password`, `tip`, `ans`, `sex`, `face`, `email`, `qq`, `url`, `reg_time`, `last_load_time`, `last_load_ip`, `login_count`) VALUES
(1, '8e3eaa363f7a5a4dd19828c56a08861060af7ee9', '', '', 'Andy', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 'tip', 'cffa50a32cb13a240d70', 'ma', 'face/m23.gif', '1137291867@gmail.com', '1137291867', 'http://www.qq.com', '2017-01-23 03:39:59', '2017-01-23 03:39:59', '::1', 1),
(2, 'b36f28e48c384c3b04b78d257aafb864f8e0d86b', '', '', 'qishuai231', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 'aa', '5cb138284d431abd6a05', 'fe', 'face/m03.gif', 'qishuai231@qq.com', '82586789', 'http://www.baidu.com', '2017-01-23 06:20:11', '2017-01-23 06:20:11', '::1', 4),
(3, '1d571c64026b791cd3f820f517d95be00ff87be9', '', '', 'Scrapup', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 'soshj', '71521991dbb21b786883', 'ma', 'face/m06.gif', '234898478@qq.com', '56789886', 'http://www.jquery.com', '2017-01-23 04:07:05', '2017-01-23 04:07:03', '::1', 0),
(4, 'f3d8841bb1bfd68515c309ba7a01e8b6515a0bc2', '', '', 'Smith', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 'ss', '0398edba1aae1b0da737', 'fe', 'face/m09.gif', 'qishuai231@qq.com', '3456786543', 'http://www.php.com', '2017-01-23 04:07:51', '2017-01-23 04:07:48', '::1', 0),
(5, 'f976fda87fe0e20d6f158ede3f20c92262bc1cb0', '', '', 'Ruby', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '4543', '81110df80ca4086e306c', 'fe', 'face/m11.gif', 'Ruby@qq.com', '45678765', 'http://www.thinkphp.com', '2017-01-23 04:08:45', '2017-01-23 04:08:43', '::1', 0),
(6, 'aba6de47b4ddcbf5537583b05cfcce7c7a77152c', '', '', 'Python', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '23', 'e77a763321d6cf825534', 'fe', 'face/m09.gif', 'python@gmail.com', '69876523', 'http://www.python.com', '2017-01-23 04:09:41', '2017-01-23 04:09:39', '::1', 0),
(7, '41105b5837378a5b669b43d902ec83fe6fe8b0e6', '', '', 'Linux', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '543', 'aa7f34d2e82c5c77b5cf', 'ma', 'face/m12.gif', 'linux@gmail.com', '99876546789', 'http://www.linux.com', '2017-01-23 04:10:30', '2017-01-23 04:10:28', '::1', 0),
(8, '620be68ee7cdca359fc0597ae400a2160d87901a', '', '', 'Java', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '111', '12c6fc06c99a462375ee', 'fe', 'face/m26.gif', 'java@qq.com', '976456789', 'http://www.java.com', '2017-01-23 04:11:13', '2017-01-23 04:11:10', '::1', 0),
(9, '1e60f0c9fb23c3e2506e210e44be864cb15b6c4f', '', '', 'Javascript', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '98', '39f193cfd7d0955cc821', 'fe', 'face/m33.gif', 'javascript@qq.com', '98756789', 'http://www.javascript.com', '2017-01-23 04:11:58', '2017-01-23 04:11:56', '::1', 0),
(10, '68b196a1dcb9a0ea2c46effec8d3cb0701af4554', '', '', 'Apache', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '3432', '52fdb9f68c503e11d168', 'ma', 'face/m32.gif', 'apache@gmail.com', '876545678', 'http://www.apache.com', '2017-01-23 04:12:45', '2017-01-23 04:12:43', '::1', 0),
(11, 'aaf40b1f78730db0c1180a5da232e21e84bf93bc', '', '', 'golanguage', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '29', 'e3953046e67fc1092cf3', 'fe', 'face/m19.gif', 'golanguage@qq.com', '656789888', 'http://www.go.com', '2017-01-23 04:13:56', '2017-01-23 04:13:53', '::1', 0),
(12, '80c5914b6b95b0216113ada5306531b52e7c3c3b', '', '', 'Thinkphp', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '87', 'cd0bcbc7f5b13e9aa1ca', 'fe', 'face/m30.gif', 'thinkphp@qq.com', '4567899', 'http://www.thinkphp.com', '2017-01-23 04:15:57', '2017-01-23 04:15:56', '::1', 0),
(13, '3e440e501e21fc1760176f1619922ddc2e0e0bad', '', '', 'Laravel', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '323', '82ad38f885211232bd89', 'ma', 'face/m38.gif', 'lavarel@qq.com', '56789765', 'http://www.laravel.com', '2017-01-23 04:17:38', '2017-01-23 04:17:36', '::1', 0),
(14, '737868b552280d13847f829f12c4e47e168277b5', '', '', 'Yii', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '232', 'f1f836cb4ea6efb2a0b1', 'ma', 'face/m39.gif', 'yii@gmail.com', '87567888', 'http://www.yii.com', '2017-01-23 04:18:35', '2017-01-23 04:18:33', '::1', 0),
(15, 'da18a44d0e6c6232b67192c762ea1723a7405ef4', '', '', 'Symfony', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '11111', '913bb4d037213ee74441', 'ma', 'face/m16.gif', 'symfony@qq.com', '86568798', 'http://www.symfony.com', '2017-01-23 04:19:37', '2017-01-23 04:19:34', '::1', 0),
(16, 'bb9c268235c6548479c1a5a03caceebfc7f6dab2', '', '', 'RasmusLerdorf', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '22', 'f1f836cb4ea6efb2a0b1', 'ma', 'face/m55.gif', 'rasmuslerdorf@gmail.', '87568799', 'http://www.rasmusL.com', '2017-01-23 05:56:35', '2017-01-23 05:56:35', '::1', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artical`
--
ALTER TABLE `artical`
  ADD PRIMARY KEY (`id`),
  ADD KEY `re_id` (`re_id`);

--
-- Indexes for table `flower`
--
ALTER TABLE `flower`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `album`
--
ALTER TABLE `album`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `artical`
--
ALTER TABLE `artical`
  MODIFY `id` smallint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- 使用表AUTO_INCREMENT `flower`
--
ALTER TABLE `flower`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `friend`
--
ALTER TABLE `friend`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `message`
--
ALTER TABLE `message`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `msg`
--
ALTER TABLE `msg`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `photo`
--
ALTER TABLE `photo`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
