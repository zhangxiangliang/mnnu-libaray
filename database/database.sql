/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50505
 Source Host           : localhost
 Source Database       : library

 Target Server Type    : MySQL
 Target Server Version : 50505
 File Encoding         : utf-8

 Date: 11/28/2016 09:52:50 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `backdatas`
-- ----------------------------
DROP TABLE IF EXISTS `backdatas`;
CREATE TABLE `backdatas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usernumber` int(11) NOT NULL,
  `booknumber` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `backdatas`
-- ----------------------------
BEGIN;
INSERT INTO `backdatas` VALUES ('3', '3', '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('4', '4', '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('5', '4', '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('6', '4', '3', '2015-12-21 22:48:26', '0000-00-00 00:00:00'), ('7', '4', '3', '2016-11-21 20:07:53', '0000-00-00 00:00:00'), ('8', '9', '12', '2016-11-22 01:05:21', '0000-00-00 00:00:00'), ('9', '9', '12', '2016-11-22 09:44:59', '0000-00-00 00:00:00');
COMMIT;

-- ----------------------------
--  Table structure for `book_comment`
-- ----------------------------
DROP TABLE IF EXISTS `book_comment`;
CREATE TABLE `book_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `book_id` int(10) unsigned NOT NULL,
  `comment_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `book_comment_book_id_index` (`book_id`),
  KEY `book_comment_comment_id_index` (`comment_id`),
  CONSTRAINT `book_comment_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  CONSTRAINT `book_comment_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `book_comment`
-- ----------------------------
BEGIN;
INSERT INTO `book_comment` VALUES ('1', '1', '1', '2015-12-11 02:52:51', '2015-12-11 02:52:54'), ('3', '1', '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('4', '2', '4', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('5', '1', '5', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('6', '1', '6', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('7', '3', '7', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('8', '7', '8', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('9', '4', '9', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('10', '1', '10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('11', '10', '11', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('12', '5', '12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('13', '8', '13', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
COMMIT;

-- ----------------------------
--  Table structure for `books`
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `published_company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `published_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `page` int(11) NOT NULL,
  `price` double NOT NULL,
  `ISBN` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `author_intro` text COLLATE utf8_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `borrow` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `books`
-- ----------------------------
BEGIN;
INSERT INTO `books` VALUES ('1', '火星救援', '[美]安迪·威尔', '1.jpg', '译林出版社', '2015-10-10 15:15:44', '428', '38', '9787544757225', '六天前，马克·沃特尼成为了第一批行走在火星上的人。如今，他也将成为第一个葬身火星的人。\n一场突如其来的风暴让阿瑞斯三船员被迫放弃任务。撤离过程中，沃特尼遭遇意外，被孤身一人丢在了这片寸草不生的红色荒漠中，剩余的补给也远不够撑到救援可能抵达的那一天。\n当然，沃特尼也不准备坐以待毙，凭借着他的植物学家和机械工程师背景，他决定跟火星来一场不是你死就是我活的过家家游戏。', '安迪·威尔 (Andy Weir)，从15岁起就被美国国家实验室聘为软件工程师。执着的太空宅男，沉迷于相对论物理、轨道力学和载人飞船。《火星救援》是他的处女作。\n2009年，安迪·威尔陆续将他的小说《火星救援》贴在自己的个人网站上，供人免费阅读。在众多读者的强烈要求下，他在亚马逊平台上发布了作品，收费0.99美金，哪知花钱买他小说的读者比免费阅读的读者更多。2013年3月，兰登书屋以六位数买下小说的版权。仅仅四天后，安迪·威尔又接到了来自20世纪福克斯电影公司的橄榄枝。2015年，由大导演雷德利·斯科特执导、马特·达蒙主演的电影《火星救援》将于10月2日上映，更是激发了这本小说的购买热潮，直接将它推向了《纽约时报》畅销书榜的榜首位置。\n', '10', '2015-12-10 15:17:04', '2016-11-22 01:04:42', '0'), ('2', '浮生六记', '[清]沈复著', '2.jpg', '浙江出版集团数字传媒有限公司', '2014-10-16 16:40:18', '100', '30.5', '9787544757225', '\"《浮生六记》是清代文人沈复的传世名作，作者在嘉庆年间写就此部回忆录。“浮生”二字典出李白诗“夫天地者，万物之逆旅也；光阴者，百代之过客也。而浮生若梦，为欢几何？”该书真纯率真，独抒性灵，其行文晓畅天然，精致中有素朴，不拘匠色。俞平伯《重刊浮生六记序》称赞本书：“虽有雕琢一样的完美，却不见一点斧凿痕。犹之佳山佳水，明明是天开的画图，却彷佛处处吻合人工的意匠……俨如一块纯美的水晶，只见明莹，不见衬露明莹的颜色；只见精微，不见制作精微的痕迹。”\n《浮生六记》以作者夫妇生活为主线，记叙了平凡而又充满情趣的居家生活的浪游各地的所见所闻，伉俪情深，至死不复，始于欢乐，终于忧患，飘零他乡，悲切动人。作品塑造了一位真率纯洁而浪漫的家庭妇女形象陈芸。她聪慧好学，热爱生活，欣赏自然美艺术美，而又勤检持家，恭敬知礼，却因为不世故不设防而经历种种坎坷的生活风波，最终英年早逝。', '暂无详细介绍', '10', '2015-12-10 16:42:26', '2016-11-22 16:28:54', '1'), ('3', '古董局中局', '马伯庸', '3.jpg', '北京联合出版公司', '2015-12-16 00:00:00', '400', '42', '9787550264601', '揭开全部悬念！马伯庸《古董局中局》系列大结局！\r\n青花瓷起源于唐宋，在元明达到鼎盛，其质地绝美，令无数人倾心。然而随着时间的流逝，青花瓷渐渐湮灭于历史长河之中，被人遗忘。直至数百年后，一件 “鬼谷子下山”青花瓷罐横空出世，引得古董界各路人士倾巢出动，不择手段去得到它……\r\n“鬼谷子下山”“刘备三顾茅庐”“周亚夫屯兵细柳营”“西厢记焚香拜月”“尉迟恭单骑救主”——几件看似毫不相干的历史文化事件，却因为同一组青花瓷宝罐而紧密联系在一起，每一件宝罐晶莹闪烁的青蓝背后，都掩埋着一件沉重壮烈的往事，而一段往事的各种细节里，也都隐藏着一个鲜为人知的线索。只有收齐散落天下的数个宝罐，破解其中的线索，才能开启古玩界时隔数百年之久的惊天秘闻……\r\n北京古董店的小老板许愿，又一次卷进了青花瓷宝罐的事件当中，而对他来说，死对头“老朝奉”的真实面目也只剩最后一层薄纱。与此同时，国内外各方势力均对这几件青花瓷宝罐势在必得，纷纷使尽浑身解数，走上了这场最终夺宝的舞台，而那些从数百年前就种下的几代人的恩仇爱恨，也都将在小人物许愿的身上一一兑现', '马伯庸，著名作家，公认的“文字鬼才”，功底扎实，文风多变，作品广为流传。曾获2010年人民文学奖、第二届朱自清散文奖。代表作《古董局中局》入选第四届中国“图书势力榜”文学类年度十大好书。', '10', '2015-12-16 19:53:05', '2016-11-22 17:03:02', '1'), ('4', '信息简史', '[美]詹姆斯·格雷克', '4.jpg', '北京图灵文化发展有限公司', '2013-11-01 00:00:00', '300', '39.9', '9787115331809', '我们是谁，我们来自哪里，我们去向何方？ \n百万畅销书作家詹姆斯七年磨一剑，以风趣之笔，描述信息的前世今生！一段人类与信息遭遇的波澜壮阔史诗，告诉我们如何在信息时代的信息爆炸中生存！ \n小米董事长雷军、《数学之美》作者吴军推荐！ ', '詹姆斯·格雷克（英语：James Gleick英语发音：/ɡliːk/[1]；1954年8月1日－），是一位美国作家、科技史家，也是一位作品被视为对现代科技产生文化冲击的互联网先锋。由于使用叙事非小说技巧介绍陌生复杂概念而广为人知，他被称为“史上最伟大科技作家之一”。', '10', '0000-00-00 00:00:00', '2016-11-22 16:27:56', '1'), ('5', '三国机密', '马伯庸', '5.jpg', '上海读客图书有限公司', '2012-08-01 00:00:00', '300', '66', '9787115331809', '仅“马伯庸”三个字，就已是下载本书的全部理由！ \n从《死在QQ上》到《殷商舰队玛雅征服史》，本书是亲王又一次涉足长篇小说领域。 \n内容和题材是他最熟悉的“三国”，绝妙的情节和人物表现一定能让你拍案叫好！ \n\n谁操纵了三国？汉献帝说，是我！ \n谁杀了汉献帝？刘平说，是我！ \n东汉末年，天下大乱。曹操迎汉献帝至许都，此后，“奉天子以令不臣”，逐渐集军权、政权于一身，开始了自己政治生涯的新篇章。 ', '马伯庸，著名作家，公认的“文字鬼才”，功底扎实，文风多变，作品广为流传。曾获2010年人民文学奖、第二届朱自清散文奖。代表作《古董局中局》入选第四届中国“图书势力榜”文学类年度十大好书。', '2', '0000-00-00 00:00:00', '2016-11-22 15:43:43', '2'), ('6', '质数了不起', '刘巍然', '6.jpg', '北京智者天下科技有限公司', '2016-11-21 22:47:09', '325', '6', '9787544757225', '小学五年级接触除法运算时，我们便学习了质数的概念。但在中学甚至大学后我们就很少再接触质数相关的进一步理论和应用了。 \n但是，对于质数的探索却是贯穿了人类几千年的数学史。质数的研究涉及到数学中的一大分支：“数论”。这一分支在很长时间以来仅涉及数学理论，难以在实际中找到特定的应用。 \n然而，随着现代密码学这一新兴学科在1970年代的建立和发展，现在，数论的相关研究成果被广泛应用于密码学中，成为计算机网络安全通信、安全存储、身份认证等安全机制的核心理论基础。 \n在本书中，作者刘巍然将用通俗易懂的语言，带我们一步步去认识“质数”这样一个我们小学时代就学习过的基本数学概念。 ', '暂无详细介绍', '1', '0000-00-00 00:00:00', '2016-11-22 16:35:10', '0'), ('7', 'Redis设计与实现', '黄健宏', '7.jpg', '北京华章图文信息有限公司', '2016-11-21 22:49:44', '422', '79', '9787544757225', '本书全面而完整地讲解了Redis的内部机制与实现方式，对Redis的大多数单机功能以及所有多机功能的实现原理进行了介绍，展示了这些功能的核心数据结构以及关键的算法思想,图示丰富，描述清晰，并给出大量参考信息。通过阅读本书，读者可以快速、有效地了解Redis的内部构造以及运作机制，更好、更高效地使用Redis。\n本书主要分为四大部分。第一部分“数据结构与对象”介绍了Redis中的各种对象及其数据结构，并说明这些数据结构如何影响对象的功能和性能。第二部分“单机数据库的实现”对Redis实现单机数据库的方法进行了介绍，包括数据库、RDB持久化、AOF持久化、事件等。第三部分“多机数据库的实现”对Redis的Sentinel、复制、集群三个多机功能进行了介绍。第四部分“独立功能的实现”对Redis中各个相对独立的功能模块进行了介绍，涉及发布与订阅、事务、Lua脚本、排序、二进制位数组、慢查询日志、监视器等。本书作者专门维护了www.redisbook.com网站，提供带有详细注释的Redis源代码，以及本书相关的更新内容。', '暂无详细介绍', '5', '0000-00-00 00:00:00', '2016-11-22 16:56:06', '0'), ('8', '七周七语言', '[美]泰特', '8.jpg', '北京图灵文化发展有限公司', '2016-11-21 22:53:15', '320', '80', '9787544757225', '身为一名程序员，你会几门语言？\n它的独特之处在哪？\n你是否还想掌握更多的语言？\n\nBruce A. Tate是软件行业的一名老兵，他有一个宏伟目标：用一本书的篇幅切中要害地探索七种不同的语言。《七周七语言：理解多种编程范型》就是他的成果。书中介绍了Ruby、Io、Prolog、Scala、Erlang、Clojure和Haskell这七种语言，重点关注每一门语言的精髓和特性，突出解决了如下问题：这门语言的类型模型是什么，编程范型是什么，如何与其交互，有哪些决策构造和核心数据结构，有哪些独特的核心特性。', '暂无详细介绍', '6', '0000-00-00 00:00:00', '2016-11-22 16:27:43', '1'), ('9', '机器智能', '[美]约翰·E·凯利', '9.jpg', '中信出版集团股份有限公司', '2016-11-21 23:21:00', '233', '29', '9787550264601', '破解大数据落地瓶颈的重要思维。 \n再造产业与社会结构，不可不知的颠覆式智能机器技术。 \n计算机的未来在哪里，下一轮计算革命——认知计算来了！ \n\n本书探讨了认知计算的当下发展成果以及未来的无限可能。 \nIBM研究院的资深研究专家深入到人工智能领域的最前沿，深入分析了人与机器如何高度配合才能创建一个更美好的世界。 \n认知计算离我们遥远吗？事实上已经有大量的手机应用开始使用认知计算解决难以攻克的大数据难题了。 \n比如，基于认知计算的智慧医疗也已经有了重大的突破，未来或将成为医生的得力助手。在预测重大天气情况，为城市制订更合理的规划等领域，认知计算也有了全新进展…… \n下一代计算机将如何改变我们的生活和工作方式，我们应该为之做哪些准备？两位作者将认知系统带到大众眼前，并打开了一扇展望未来计算的窗户。', '暂无详细介绍', '6', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0'), ('10', 'Docker进阶与实战', '华为Docker实践小组', '10.jpg', '北京华章图文信息有限公司', '2016-11-15 23:23:09', '244', '59', '9787544757225', '作者团队为华为一线开发者和Docker社区活跃的贡献者 \n以功能模块为粒度，对每一个重要的模块单独进行深入的分析和讲解 \n力求将“代码与产品，理论与实践”完美结合 \n\n在计算机技术日新月异的今天，Docker也算是其中异常璀璨的一员了。 \n它的生态圈涉及内核、操作系统、虚拟化、云计算、DevOps等热门领域，受众群体也在不断扩大。 \n本书由一个真正钻研容器技术的团队写作，他们不仅仅是在使用Docker，更多的是在探索容器的未来之路。\n本书内容从Docker的来源、镜像、仓库、安全、网络、卷存储，到生态、测试及社区贡献都有涉猎。 \n无论你是入门级，还是已经有了较深的功底，这本书都会带你踏上新的台阶——正所谓“进阶”。', '暂无详细介绍', '4', '0000-00-00 00:00:00', '2016-11-22 16:51:50', '3'), ('11', 'Objective-C编程', '[美]Aaron Hillegass', '11.jpg', '华中科技大学出版社有限责任公司', '2016-11-21 23:26:29', '300', '58', '9787115331809', '本书讲述Objective-C编程语言和基本的iOS/Mac开发知识。作者首先从基本的编程概念讲起（变量、条件语句、循环结构等），接着用浅显易懂的语言讲解Objective-C和Foundation的知识，包括Objective-C的基本语法、Foundation常用类、内存管理、常用设计模式等，最后手把手教读者编写完整的、基于事件驱动的iOS/Mac应用。书中还介绍了Objetive-C的高级内容，包括属性、范畴和Block对象等知识。全书篇幅精炼，内容清晰，适合无编程经验的读者入门学习。', '暂无详细介绍', '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0'), ('12', '驾驭大数据', '[美]Bill Franks', '12.jpg', '人民邮电出版社', '2016-11-09 23:32:34', '200', '49', '9787544757225', '世界顶级数据仓库公司Teradata首席分析专家BillFranks倾力巨献！\n解密驾驭大数据的技术和方法，诠释大数据专业分析之道！\n抓住大数据！理解大数据！驾驭大数据！在大数据掘金浪潮中脱颖而出！\n\n你是否在大数据面前犹豫、恐惧、不知所措？\n你是否无法说服你的老板投入人力、财力、物力去进行大数据分析？\n你是否已经身处大数据中而依旧茫然？\n你是否在做了很多大数据分析后仍然无法发现新的商业价值和机会？\n答案就在《驾驭大数据》一书中！\n从技术上详细教导驾驭大数据浪潮，以及如何应用大数据。', '暂无详细介绍', '5', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0'), ('13', '神探夏洛克', '[英]盖·亚当斯', '神探夏洛克_13.jpg', '北京儒意欣欣文化发展有限公司', '2016-11-08 00:00:00', '300', '30', '9787539963365', '这本Casebook并不仅仅是一本“《神探夏洛克》大揭秘”，而是以华生医生的办案记录的形式重点更对剧集内容进行延伸，并加以对主创、故事背景、原著相关信息的内容介绍等。 \r\n剧组出这本书是为了更加立体地塑造人物，而不仅仅是为了满足粉丝一探剧中内幕的愿望，故事仍在继续。 \r\n书中包含大量的剧照、图片，文字上既讲述了这部剧的由来及制作过程，还深入分析了前两季内容，每一个小细节都有提及！ \r\n书中有两人以小纸条的形式进行的有趣又暧昧的对话，还有各种在剧中没有表现的媒体报道等等。就好像华生真的编写了这本书一样！', '暂无作者简介', '3', '2016-11-22 09:49:12', '2016-11-22 17:04:04', '1'), ('14', '可能与不可能的边界：P/NP问题趣史', '[美]Lance Fortnow', '1f8a52d99aa1b55f8fb5e5e0d74d7b17_1f8a52d99aa1b55f8fb5e5e0d74d7b17_NP问题趣史_Z.jpg', '北京图灵文化发展有限公司', '2016-11-22 00:00:00', '300', '200', '97871153-35661', 'P/NP问题是计算机科学乃至整个数学领域最重要的开放问题。本书从非技术角度介绍了什么是P/NP问题、它丰富的历史，以及对于人机交互乃至更多问题的数学意义。\r\n在这本趣味十足的书中，世界级计算机科学家Lance Fortnow 首先追溯了P/NP问题是如何产生的，然后给出了这个问题的许多实例，涉及经济学、物理学和生物学在内的多个学科。接下来探讨了涵盖P/NP难题中所有难度等级的问题，从寻找游玩迪士尼乐园所有景点的最短路线，到地图填色问题，再到找出Facebook上互为好友的一群人。', '暂无作者简介', '2', '2016-11-22 11:15:33', '2016-11-22 11:19:29', '0');
COMMIT;

-- ----------------------------
--  Table structure for `comments`
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `comments`
-- ----------------------------
BEGIN;
INSERT INTO `comments` VALUES ('1', '这本书非常不错', '2015-12-11 02:52:06', '2015-12-11 02:52:09'), ('3', '值得再读一次', '2015-12-15 16:20:22', '2015-12-15 16:20:22'), ('4', '这本书值得一看。', '2015-12-15 16:29:20', '2015-12-15 16:29:20'), ('5', '读了这本书后，收获非常多。', '2015-12-15 17:04:37', '2015-12-15 17:04:37'), ('6', '我觉得也不错', '2016-11-21 21:37:31', '2016-11-21 21:37:31'), ('7', '鉴古易，鉴人难。故事开头平淡，但到中间情节开始精彩，一环接一环，紧凑，在看完之后让人回味无穷，不过故事的结尾留下悬念太大，吊足胃口。里面不仅了解到一些鉴古的知识，更重要的是懂得怎样鉴人。喜欢这故事！！', '2016-11-22 00:23:33', '2016-11-22 00:23:33'), ('8', '虽然讲的比较的浅，但是绝对是用心了的，可以作为redis入门参考书。\r\n\r\n为啥说比较浅呢？因为作者只讲了是什么而没有讲为什么，为什么这么设计作者都没有理解，毕竟不是专业搞数据存储的。\r\n\r\n第一章先讲基础数据结构的设计，这个是数据库的基础。\r\n\r\n第二章讲单机数据库的实现。简单的实现过程就是指连接的建立，命令的传输，命令的解析，命令的执行。重点讲了持久化容灾机制，包括数据容灾RDB和命令容灾AOF。\r\n\r\n第三章讲集群的实现。集群最重要的功能包括几个点，：数据的分片，同一分片的主备数据的同步，主节点的选取，集群中数据的查询。\r\n\r\n第四章讲提供的一些云服务。现在不都是提倡saas的理念么，这个就是最好的例子，主要就是发布订阅功能。\r\n\r\n最后我觉得关于redis监控的方面，应该单独拿出来讲，不应该草草了事。', '2016-11-22 00:25:48', '2016-11-22 00:25:48'), ('9', '信息技术发展的动力是让人可以跨越空间的隔阂获取高效获取信息，互联网的本质就是解决了人类协作信息的传递的时效性，从文字，到图片，再到视频…信息密度越来越大，但如今单纯传递二维的信息量已经无法满足人类对信息高保真的需求了，VR成为解决这个问题的一大突破口，人类将重新回归感性的信息认知方式，也许不久后的我们就会开始反思以往用二维的方式去认知世界是多么可笑', '2016-11-22 00:34:34', '2016-11-22 00:34:34'), ('10', '看完电影后才买的这本。更能理解电影和角色的那种感觉。一个人的星球。这位又是植物学家和机械员，食物问题和机械拆装他都能想出对策。试想如果是另外一位遗留在火星上，又会是什么情况！一个人，做什么都是种新的突破！敬佩作者，也敬佩这位主角！！', '2016-11-22 00:43:56', '2016-11-22 00:43:56'), ('11', '深入浅出，可以看到docker涉及的若干技术的发展历程，文笔细腻，清晰易懂，好书！', '2016-11-22 01:00:02', '2016-11-22 01:00:02'), ('12', '谁操纵了三国？汉献帝说，是我！ \r\n谁杀了汉献帝？刘平说，是我！ \r\n东汉建安四年，汉室灭亡的开幕。曹操挟天子以令诸侯格局初成，袁绍于官渡虎视眈眈，诸侯割据，汉室危若累卵……中国历史上,最大的阴谋，在此时悄然无声的成型，以主谋者的死亡为起点，就此启动。 \r\n争夺天下的曹操、袁绍、吕布；以智杀人的郭嘉、荀彧、陈宫，都不过是这个巨大阴谋上，身不由己的棋子', '2016-11-22 01:04:27', '2016-11-22 01:04:27'), ('13', '身为一名程序员，你会几门语言？ 它的独特之处在哪？ 你是否还想掌握更多的语言？ Bruce A. Tate是软件行业的一名老兵，他有一个宏伟目标：用一本书的篇幅切中要害地探索七种不同的语言。《七周七语言：理解多种编程范型》就是他的成果。书中介绍了Ruby、Io、Prolog、Scala、Erlang、Clojure和Haskell这七种语言，重点关注每一门语言的精髓和特性，突出解决了如下问题：这门语言的类型模型是什么，编程范型是什么，如何与其交互，有哪些决策构造和核心数据结构，有哪些独特的核心特性。\r\n', '2016-11-22 17:08:22', '2016-11-22 17:08:22');
COMMIT;

-- ----------------------------
--  Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `migrations`
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1'), ('2014_10_12_100000_create_password_resets_table', '1'), ('2015_01_15_105324_create_roles_table', '1'), ('2015_01_15_114412_create_role_user_table', '1'), ('2015_01_26_115212_create_permissions_table', '1'), ('2015_01_26_115523_create_permission_role_table', '1'), ('2015_02_09_132439_create_permission_user_table', '1'), ('2015_12_10_003659_create_books_table', '1'), ('2015_12_10_004538_create_comments_table', '1'), ('2015_12_10_004709_create_user_book_table', '1'), ('2015_12_10_004746_create_user_comment_table', '1'), ('2015_12_10_004910_create_book_comment_table', '1'), ('2015_12_15_171818_add_borrow_column_to_book', '2'), ('2015_12_17_225409_add_forbin_column_to_users', '3'), ('2015_12_21_214527_create_back_database', '4');
COMMIT;

-- ----------------------------
--  Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `password_resets`
-- ----------------------------
BEGIN;
INSERT INTO `password_resets` VALUES ('xiaoer@taroball.net', '2735ce49262878caf6deb956c34ba95afb76f0806208c7ba87b454c64dd6d358', '2016-11-23 10:33:59');
COMMIT;

-- ----------------------------
--  Table structure for `permission_role`
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `permission_user`
-- ----------------------------
DROP TABLE IF EXISTS `permission_user`;
CREATE TABLE `permission_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `permission_user_permission_id_index` (`permission_id`),
  KEY `permission_user_user_id_index` (`user_id`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `permission_user`
-- ----------------------------
BEGIN;
INSERT INTO `permission_user` VALUES ('3', '1', '1', '2015-12-17 23:39:16', '2015-12-17 23:39:18'), ('5', '1', '3', '2015-12-17 23:40:22', '2015-12-17 23:40:26'), ('9', '1', '2', '2015-12-17 23:49:36', '2015-12-17 23:49:36'), ('11', '1', '4', '2016-11-22 00:43:33', '2016-11-22 00:43:33'), ('12', '1', '10', '2016-11-23 10:34:39', '2016-11-23 10:34:39');
COMMIT;

-- ----------------------------
--  Table structure for `permissions`
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `permissions`
-- ----------------------------
BEGIN;
INSERT INTO `permissions` VALUES ('1', 'Forbin', 'forbin', 'Forbin user comment', null, '2015-12-17 23:11:41', '2015-12-17 23:11:41');
COMMIT;

-- ----------------------------
--  Table structure for `role_user`
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_index` (`role_id`),
  KEY `role_user_user_id_index` (`user_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `role_user`
-- ----------------------------
BEGIN;
INSERT INTO `role_user` VALUES ('1', '1', '1', '2015-12-11 00:16:58', '2015-12-11 00:16:58'), ('2', '3', '2', '2015-12-11 01:17:13', '2015-12-11 01:17:13'), ('3', '2', '3', '2015-12-16 21:11:32', '2015-12-16 21:11:34'), ('8', '2', '4', '2015-12-18 00:31:49', '2015-12-18 00:31:51'), ('10', '2', '5', '2016-11-21 21:14:29', '2016-11-21 21:14:31'), ('11', '2', '6', '2016-11-21 21:18:55', '2016-11-21 21:18:58'), ('12', '3', '7', '2016-11-21 21:35:19', '2016-11-21 21:35:28'), ('13', '3', '8', '2016-11-21 21:35:23', '2016-11-21 21:35:30'), ('14', '3', '9', '2016-11-21 21:35:25', '2016-11-21 21:35:33'), ('15', '2', '10', '2016-11-23 10:34:39', '2016-11-23 10:34:39');
COMMIT;

-- ----------------------------
--  Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `roles`
-- ----------------------------
BEGIN;
INSERT INTO `roles` VALUES ('1', 'Admin', 'admin', '', '1', '2015-12-11 00:13:43', '2015-12-11 00:13:43'), ('2', 'Student', 'student', '', '2', '2015-12-11 00:15:02', '2015-12-11 00:15:02'), ('3', 'Teacher', 'teacher', '', '3', '2015-12-11 00:15:43', '2015-12-11 00:15:43');
COMMIT;

-- ----------------------------
--  Table structure for `user_book`
-- ----------------------------
DROP TABLE IF EXISTS `user_book`;
CREATE TABLE `user_book` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `book_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_book_user_id_index` (`user_id`),
  KEY `user_book_book_id_index` (`book_id`),
  CONSTRAINT `user_book_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_book_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `user_book`
-- ----------------------------
BEGIN;
INSERT INTO `user_book` VALUES ('4', '1', '1', '1', '2015-01-01 00:00:00', '2015-12-22 12:17:01'), ('8', '1', '1', '2', '2015-12-15 19:48:31', '2015-12-16 18:37:07'), ('9', '0', '1', '3', '2015-12-16 20:03:17', '2016-11-22 17:03:02'), ('10', '1', '3', '2', '2015-12-16 20:57:07', '2016-11-22 16:28:54'), ('11', '1', '3', '1', '2015-12-16 20:57:21', '2016-11-21 21:37:47'), ('12', '1', '3', '3', '2016-11-21 21:37:55', '2016-11-22 00:35:23'), ('13', '1', '3', '7', '2016-11-22 00:20:12', '2016-11-22 16:56:06'), ('14', '0', '3', '4', '2016-11-22 00:34:01', '2016-11-22 16:27:56'), ('15', '1', '4', '1', '2016-11-22 00:42:17', '2016-11-22 00:53:32'), ('16', '0', '4', '2', '2016-11-22 00:53:19', '2016-11-22 00:53:19'), ('17', '0', '4', '10', '2016-11-22 00:59:35', '2016-11-22 00:59:35'), ('18', '1', '2', '2', '2016-11-22 01:01:27', '2016-11-22 01:04:46'), ('19', '1', '2', '1', '2016-11-22 01:01:37', '2016-11-22 01:04:42'), ('20', '0', '2', '5', '2016-11-22 01:04:04', '2016-11-22 01:04:04'), ('21', '1', '3', '6', '2016-11-22 09:36:29', '2016-11-22 16:35:10'), ('22', '0', '7', '10', '2016-11-22 09:43:42', '2016-11-22 09:43:42'), ('23', '0', '8', '5', '2016-11-22 15:43:43', '2016-11-22 15:43:43'), ('24', '0', '3', '13', '2016-11-22 16:27:26', '2016-11-22 16:27:26'), ('25', '0', '3', '8', '2016-11-22 16:27:43', '2016-11-22 16:27:43'), ('26', '0', '3', '10', '2016-11-22 16:51:50', '2016-11-22 16:51:50'), ('27', '1', '1', '13', '2016-11-22 17:02:49', '2016-11-22 17:04:04');
COMMIT;

-- ----------------------------
--  Table structure for `user_comment`
-- ----------------------------
DROP TABLE IF EXISTS `user_comment`;
CREATE TABLE `user_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `comment_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_comment_user_id_index` (`user_id`),
  KEY `user_comment_comment_id_index` (`comment_id`),
  CONSTRAINT `user_comment_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_comment_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `user_comment`
-- ----------------------------
BEGIN;
INSERT INTO `user_comment` VALUES ('1', '1', '1', '2015-12-11 02:52:28', '2015-12-11 02:52:30'), ('2', '1', '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('4', '2', '4', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('5', '2', '5', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('6', '3', '6', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('7', '3', '7', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('8', '3', '8', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('9', '3', '9', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('10', '4', '10', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('11', '4', '11', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('12', '2', '12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'), ('13', '1', '13', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
COMMIT;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number` bigint(20) NOT NULL,
  `intro` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `borrow` int(11) NOT NULL DEFAULT '0',
  `levels` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'super@taroball.net', '图书管理员', '1308190120', '闽南师范大学图书管理员', '1_Sakuragi.jpg', '$2y$10$ix.YYMKRHW0OJzcWGFM5luwqH98bmwfQzGPkCYULqVvUBroM0/AvW', 'bCgZWdWDk5VQJb7M1NaTA6caYMYY6xSf0hdbh2FlYwSCbtqR0VjRmd1RAiAY', '2016-11-21 21:13:17', '2016-11-22 17:04:04', '4', '1'), ('2', 'teacher@taroball.net', '老师君', '1308190121', '我是一个老师', '3.jpg', '$2y$10$ix.YYMKRHW0OJzcWGFM5luwqH98bmwfQzGPkCYULqVvUBroM0/AvW', 'rh1AhvBZ4pHVuXrupNJ1mZq3jmTbVWlkyszqyYiUKWIG0iHF4yVf5YpHkfPp', '2016-11-21 21:13:17', '2016-11-22 01:19:13', '3', '1'), ('3', 'xiaoer@taroball.net', '小二君', '1308190125', '我是一个学生', '3_JamHsiao.jpg', '$2y$10$ix.YYMKRHW0OJzcWGFM5luwqH98bmwfQzGPkCYULqVvUBroM0/AvW', 'CFMAILWtd6d4On788k3O8jq7x7NUZataCOcjDWVpayg6zm4WHtxChowM1PsO', '2016-11-21 21:13:17', '2016-11-22 16:57:46', '9', '1'), ('4', 'xiaosi@taroball.net', '小四君', '1308190123', '我是一个学生', '4.jpg', '$2y$10$ix.YYMKRHW0OJzcWGFM5luwqH98bmwfQzGPkCYULqVvUBroM0/AvW', 'Ry7fRiwLzUPTR4ACiPEo3xFUumaXp6bXtFAZvYLNMHfPteUUYIjBkd8MA5sc', '2016-11-21 21:13:17', '2016-11-22 01:00:33', '2', '1'), ('5', 'xiaoqi@taroball.net', '小七君', '1308190124', '我是一个学生', '2.jpg', '$2y$10$ix.YYMKRHW0OJzcWGFM5luwqH98bmwfQzGPkCYULqVvUBroM0/AvW', null, '2016-11-21 21:13:17', '2016-11-21 21:13:20', '0', '1'), ('6', 'xiaosan@taroball.net', '小三君', '1308190126', '我是一个学生', '5.jpg', '$2y$10$ix.YYMKRHW0OJzcWGFM5luwqH98bmwfQzGPkCYULqVvUBroM0/AvW', null, '2016-11-21 21:28:35', '2016-11-21 21:13:20', '0', '1'), ('7', 'teacher1@taroball.net', '老师君1', '1308190127', '我是一个老师', '7_6.jpg', '$2y$10$ix.YYMKRHW0OJzcWGFM5luwqH98bmwfQzGPkCYULqVvUBroM0/AvW', null, '2016-11-21 21:28:30', '2016-11-22 11:12:31', '0', '1'), ('8', 'teacher2@taroball.net', '老师君2', '1308190128', '我是一个老师', '8_7.jpg', '$2y$10$ix.YYMKRHW0OJzcWGFM5luwqH98bmwfQzGPkCYULqVvUBroM0/AvW', 'u3o7g386umA5S3H2jpWHBiuA4jUZPdQElFeSIGB1nux697MT8MMvIWzC9T4K', '2016-11-21 21:33:02', '2016-11-22 16:26:41', '0', '1'), ('9', 'teacher3@taroball.net', '老师君3', '1308190129', '我是一个老师', '1_pengyuyan.jpg', '$2y$10$ix.YYMKRHW0OJzcWGFM5luwqH98bmwfQzGPkCYULqVvUBroM0/AvW', null, '2016-11-21 21:34:41', '2016-11-21 21:34:44', '0', '1'), ('10', '326277403@qq.com', '小二翔', '0', '', '', '$2y$10$MNmhfGy/7NSBarJ87uEhGupj3.DLVMqlcsd/J1smzi0YiA2LvrPO6', 'rD65B7MSccjxddmDQPgRxy0Bp0BzSJs55MePGhPcMcHqm0bOcF4N5AxD8Hd3', '2016-11-23 10:34:39', '2016-11-23 11:06:12', '0', '1');
COMMIT;

-- ----------------------------
--  Procedure structure for `backdatas`
-- ----------------------------
DROP PROCEDURE IF EXISTS `backdatas`;
delimiter ;;
CREATE DEFINER=`root`@`::1` PROCEDURE `backdatas`()
BEGIN
	DECLARE userNumber int;
	DECLARE bookNumber int;
	SELECT COUNT(*) INTO userNumber From users;
	SELECT COUNT(*) INTO bookNumber From books;

	INSERT INTO backdatas (usernumber,booknumber,created_at) VALUES (userNumber, bookNumber, NOW());
END
 ;;
delimiter ;

-- ----------------------------
--  Triggers structure for table users
-- ----------------------------
DROP TRIGGER IF EXISTS `up_user_level`;
delimiter ;;
CREATE TRIGGER `up_user_level` BEFORE UPDATE ON `users` FOR EACH ROW if new.borrow = 10 THEN
set new.borrow = 0 ,new.levels = new.levels + 1;
end if
 ;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
