/*
SQLyog Ultimate v11.24 (32 bit)
MySQL - 10.1.9-MariaDB : Database - feedback
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`feedback` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

USE `feedback`;

/*Table structure for table `fbcontent` */

CREATE TABLE `fbcontent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '反馈用户id',
  `admin_id` int(11) DEFAULT '0' COMMENT '管理员id',
  `fblist_id` int(11) DEFAULT NULL COMMENT '关联fblist',
  `content` varchar(500) NOT NULL COMMENT '反馈内容',
  `imgflag` tinyint(1) DEFAULT '0' COMMENT '反馈内容为图片：1',
  `videoflag` tinyint(1) DEFAULT '0' COMMENT '反馈内容视频：1',
  `readflag` tinyint(1) DEFAULT '0' COMMENT '已读：1',
  `delflag` tinyint(1) DEFAULT '0' COMMENT '删除：1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8mb4;

/*Data for the table `fbcontent` */

insert  into `fbcontent`(`id`,`user_id`,`admin_id`,`fblist_id`,`content`,`imgflag`,`videoflag`,`readflag`,`delflag`,`created_at`,`updated_at`) values (1,11,0,11,'Ut quo deleniti et facere debitis quo et. Veniam autem sit dolorem et voluptatibus laborum ut.',0,0,0,0,'2018-07-25 12:03:04','2018-07-25 12:03:04'),(2,1,0,1,'Aperiam rerum sit laboriosam est nisi. Sed qui enim aspernatur officia rem neque.',0,0,0,0,'2018-07-25 12:03:04','2018-07-25 12:03:04'),(3,7,0,7,'Non delectus qui saepe et occaecati. Vel sit est qui. Et nobis hic est expedita.',0,0,0,0,'2018-07-25 12:03:04','2018-07-25 12:03:04'),(4,17,0,17,'Doloribus aspernatur non aperiam libero eaque. Aliquam itaque est sint aut. Ea quo ex alias amet.',0,0,0,0,'2018-07-25 12:03:04','2018-07-25 12:03:04'),(5,18,0,18,'Quibusdam qui quisquam earum delectus officia cum. Facere maxime mollitia veniam ut.',0,0,0,0,'2018-07-25 12:03:04','2018-07-25 12:03:04'),(6,12,0,12,'Eum nostrum cumque veniam consequatur. Sint omnis beatae ut voluptatibus cupiditate excepturi.',0,0,0,0,'2018-07-25 12:03:04','2018-07-25 12:03:04'),(7,17,0,17,'Aut et est repellat id. A impedit odio omnis et natus. Qui magni sint autem nihil sed quas.',0,0,0,0,'2018-07-25 12:03:04','2018-07-25 12:03:04'),(8,4,0,4,'Et nobis aut magni esse. Ut et eum asperiores corrupti accusamus dolorum dolores.',0,0,0,0,'2018-07-25 12:03:04','2018-07-25 12:03:04'),(9,19,0,19,'Dolorem quia minima odit natus quam dolor animi. Nisi est quibusdam pariatur sequi sit animi et.',0,0,0,0,'2018-07-25 12:03:04','2018-07-25 12:03:04'),(10,16,0,16,'Quia commodi quod non unde cupiditate labore qui. Consectetur iusto accusamus sed et placeat qui.',0,0,0,0,'2018-07-25 12:03:04','2018-07-25 12:03:04'),(11,8,0,8,'Soluta ut et amet mollitia dolor facere et. Sunt quidem non earum.',0,0,0,0,'2018-07-25 12:03:04','2018-07-25 12:03:04'),(12,11,0,11,'Nemo sint cumque qui. Aut accusamus placeat hic id aperiam voluptates fuga.',0,0,0,0,'2018-07-25 12:03:04','2018-07-25 12:03:04'),(13,20,0,20,'Pariatur blanditiis voluptates sit assumenda. Eaque laborum accusantium quia iure debitis rerum.',0,0,0,0,'2018-07-25 12:03:04','2018-07-25 12:03:04'),(14,4,0,4,'Dolores sit aut necessitatibus nulla. Rerum voluptas qui tenetur ad ex ducimus ipsam.',0,0,0,0,'2018-07-25 12:03:04','2018-07-25 12:03:04'),(15,2,0,2,'Ipsum laudantium eius sed minus facilis. Ut eveniet iusto velit odio et beatae.',0,0,0,0,'2018-07-25 12:03:04','2018-07-25 12:03:04'),(16,20,0,20,'Quia quia ratione corrupti adipisci. Quos at voluptas amet. Tempore ut qui est.',0,0,0,0,'2018-07-25 12:03:04','2018-07-25 12:03:04'),(17,7,0,7,'Architecto est ducimus dolorem aut. Enim eum reprehenderit possimus nihil.',0,0,0,0,'2018-07-25 12:03:04','2018-07-25 12:03:04'),(18,8,0,8,'Earum et veniam laudantium laborum. Sunt veniam alias aut commodi sit. Aperiam dolor ut ea.',0,0,0,0,'2018-07-25 12:03:04','2018-07-25 12:03:04'),(19,1,0,1,'Ut qui veniam aut dolore porro. Ipsum ut cupiditate beatae. Unde nisi enim harum et sit fugiat.',0,0,0,0,'2018-07-25 12:03:04','2018-07-25 12:03:04'),(20,9,0,9,'Excepturi et quod voluptatem nostrum. Laborum et autem ratione. Dignissimos ea est maiores saepe.',0,0,0,0,'2018-07-25 12:03:04','2018-07-25 12:03:04'),(21,4,0,4,'Recusandae et in blanditiis illo ipsam ipsa. Deserunt non nobis assumenda nobis.',0,0,0,0,'2018-07-25 12:03:04','2018-07-25 12:03:04'),(22,17,0,17,'Nisi minima minima neque excepturi non est. Reiciendis porro alias occaecati recusandae qui.',0,0,0,0,'2018-07-25 12:03:04','2018-07-25 12:03:04'),(23,1,0,1,'Rem quam et voluptas. Blanditiis molestiae a natus in magni at.',0,0,0,0,'2018-07-25 12:03:04','2018-07-25 12:03:04'),(24,6,0,6,'Illum sit ut quia nihil et. In a hic laudantium id.',0,0,0,0,'2018-07-25 12:03:04','2018-07-25 12:03:04'),(25,13,0,13,'Distinctio rerum vitae sunt. Recusandae dignissimos veniam provident et.',0,0,0,0,'2018-07-25 12:03:04','2018-07-25 12:03:04'),(26,14,0,14,'Molestias voluptas inventore culpa ipsam. Autem vel ut quod repellendus deleniti qui.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(27,5,0,5,'Magni ex fugiat neque. Non porro consequatur necessitatibus nulla magni ratione.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(28,19,0,19,'Et non qui rerum aspernatur eligendi praesentium nihil beatae. Omnis non saepe voluptas.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(29,10,0,10,'Placeat sed sed quae asperiores velit. Dolor doloremque eius dolor quia iure rerum dolor.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(30,17,0,17,'Temporibus explicabo occaecati non ut et. Ea et non cum aut quae rerum.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(31,3,0,3,'Cupiditate est repudiandae maiores. Quod voluptates mollitia excepturi.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(32,13,0,13,'Quis minus expedita maxime qui. Qui sit sunt maiores iure ut beatae.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(33,1,0,1,'Et velit nulla sint rerum fugiat. Cum optio commodi aperiam dolores cum omnis.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(34,20,0,20,'Aut facilis consequuntur aut ab similique. At sunt optio quod laudantium fuga ab.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(35,9,0,9,'Tempora iusto rerum qui quia officiis dicta illum. Unde quam ut facere et sint.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(36,17,0,17,'Tenetur aut atque expedita sunt provident laborum. Tempora dignissimos voluptas molestiae.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(37,4,0,4,'Sed reiciendis sint in quia. Minima quidem iste voluptatibus cupiditate beatae corrupti distinctio.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(38,6,0,6,'Similique dolores illum aut consequatur ipsam. Nulla voluptas nihil rerum temporibus.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(39,18,0,18,'Repellat voluptas recusandae dolores ab vel. Veritatis consequatur qui modi voluptatem.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(40,6,0,6,'Similique dolore vitae fugit ullam aut harum. Qui consequatur rerum est in eos.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(41,18,0,18,'Nam dolor aut reiciendis ut dolor. Fuga dolores harum aut sequi consequuntur.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(42,1,0,1,'Incidunt mollitia aut quidem numquam alias. Ipsam omnis et aut.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(43,15,0,15,'Illo illum harum voluptates laboriosam. Hic sit fugit accusamus eum minus.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(44,8,0,8,'Est voluptates itaque magni dolore et et debitis. Mollitia eius in vel iure. Nam qui earum minus.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(45,13,0,13,'Consequatur ex nobis saepe voluptatem placeat dolore. Vero similique ipsam amet ut voluptatum.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(46,8,0,8,'Praesentium accusamus sunt qui natus eum optio. Sed necessitatibus est quis error.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(47,9,0,9,'Provident non nihil architecto et non autem cum. Sit ut quis nemo ex debitis. Rerum et in omnis.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(48,6,0,6,'Fuga nobis iste et. Quo rem est voluptate exercitationem quod optio. Sequi quo quia sunt dolorem.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(49,14,0,14,'Nam omnis aut ab. Veritatis nesciunt necessitatibus mollitia consequatur harum.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(50,14,0,14,'In fugiat eum vero. Officiis aut architecto non qui accusantium.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(51,4,0,4,'Vitae sed dolor assumenda. Et illo magni repudiandae quia voluptatem et.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(52,9,0,9,'Non ut dicta vitae est. Voluptate nostrum numquam et quam vel. Itaque et aut praesentium.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(53,6,0,6,'Placeat nobis rerum illum eum et vero aut. Ea tenetur labore et dicta.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(54,11,0,11,'Sit reprehenderit et sed. Sit vero consequuntur sint sed omnis porro.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(55,7,0,7,'Aut quia autem illum. Consequatur ullam sit quia cupiditate.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(56,1,0,1,'Sunt praesentium vel libero distinctio minima. Aut quia quo sit ea rerum et aliquam.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(57,8,0,8,'Deleniti sed quos sapiente vel magni. Rem est quae voluptates dolores quasi quos eos.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(58,9,0,9,'Ab et magni vel atque qui quo. Ducimus in eaque deleniti. Quae ut sit dolorem et ut.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(59,13,0,13,'Sint harum et dolor earum occaecati. Omnis iste quo asperiores repudiandae.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(60,9,0,9,'Est omnis ab hic et quo dolorem sed. Nam consequatur suscipit vitae adipisci sed voluptatibus.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(61,1,0,20,'Ut quo tenetur quia at. Sit sint sit qui cum ipsum. Ut nulla accusamus similique maxime aut.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(62,9,0,9,'Nihil est nulla sequi odio voluptas est. Nobis quisquam at itaque reprehenderit vero.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(63,19,0,19,'Eius aut earum ut at totam. Amet qui corrupti aut possimus rerum. Ut ducimus ea optio nihil error.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(64,4,0,4,'Sed est et ut. Id quos culpa aut et nostrum quia. Suscipit qui et ad. Quis sit iste quia modi.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(65,18,0,18,'Quia amet et ut et. Quas ipsam repudiandae aut doloremque. Nemo odio quasi inventore quia.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(66,16,0,16,'Dolorem vero nobis quis. Non minus fugit quia sapiente. Sed sapiente dolor maiores et eaque labore.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(67,14,0,14,'In commodi ducimus qui nulla eum. Esse voluptatem laboriosam at quam provident enim ullam.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(68,11,0,11,'Deserunt possimus et dolores. Blanditiis ea totam aut et. Maxime ipsam et tempora harum.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(69,7,0,7,'Pariatur aut neque laborum. Ex repellendus expedita veniam laboriosam natus.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(70,6,0,6,'Odio rerum sed hic deserunt. Ut et consequatur veniam voluptatem quisquam cupiditate accusantium.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(71,14,0,14,'Quasi harum expedita aliquam eveniet. Consequuntur amet occaecati sint molestiae.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(72,19,0,19,'Delectus illo quam quidem est rerum tenetur rerum delectus. Et voluptatibus est voluptatibus.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(73,20,0,20,'Quas rem quasi ut distinctio omnis aut est et. Consequatur qui culpa perspiciatis ratione aliquid.',0,0,0,0,'2018-07-25 12:03:05','2018-07-25 12:03:05'),(74,8,0,8,'Dolor fuga sunt repudiandae rerum libero. Dolorem accusamus velit id velit qui excepturi placeat.',0,0,0,0,'2018-07-25 12:03:06','2018-07-25 12:03:06'),(75,2,0,2,'Corporis asperiores quas qui sed. Non laudantium ullam non temporibus enim.',0,0,0,0,'2018-07-25 12:03:06','2018-07-25 12:03:06'),(76,15,0,15,'Quis possimus totam assumenda odit. Hic vel autem quod.',0,0,0,0,'2018-07-25 12:03:06','2018-07-25 12:03:06'),(77,9,0,9,'Consequatur vel ut sunt ad. Quia aut et quia. Dicta explicabo et et hic.',0,0,0,0,'2018-07-25 12:03:06','2018-07-25 12:03:06'),(78,18,0,18,'Earum nesciunt facilis eius illo hic. Ut iste exercitationem dolor.',0,0,0,0,'2018-07-25 12:03:06','2018-07-25 12:03:06'),(79,20,0,20,'Possimus harum quasi delectus hic pariatur. Accusamus aut aut porro numquam.',0,0,0,0,'2018-07-25 12:03:06','2018-07-25 12:03:06'),(80,6,0,6,'Iure quod ullam autem praesentium ea expedita quasi. Sed cupiditate nemo error porro.',0,0,0,0,'2018-07-25 12:03:06','2018-07-25 12:03:06'),(81,7,0,7,'Praesentium beatae nam nihil qui. Officiis aut minima a eum architecto. Eum sit sint suscipit a.',0,0,0,0,'2018-07-25 12:03:06','2018-07-25 12:03:06'),(82,2,0,2,'Voluptatem similique consequatur sit est consequatur. Ut laborum animi magnam non ab et.',0,0,0,0,'2018-07-25 12:03:06','2018-07-25 12:03:06'),(83,4,0,4,'Sed sit perferendis veniam rerum eos. Alias quia error quod voluptatem.',0,0,0,0,'2018-07-25 12:03:06','2018-07-25 12:03:06'),(84,11,0,11,'Amet sapiente aut aut corrupti ipsam et voluptate. Dolores sint labore ipsa autem error.',0,0,0,0,'2018-07-25 12:03:06','2018-07-25 12:03:06'),(85,16,0,16,'Consequatur maxime qui enim similique ipsum amet veniam. Enim et labore quod.',0,0,0,0,'2018-07-25 12:03:06','2018-07-25 12:03:06'),(86,16,0,16,'Non impedit qui animi distinctio. Voluptatem nam laborum illo tempora et qui sed.',0,0,0,0,'2018-07-25 12:03:06','2018-07-25 12:03:06'),(87,17,0,17,'Dignissimos eveniet et est sapiente. Id dolorem nobis accusamus.',0,0,0,0,'2018-07-25 12:03:06','2018-07-25 12:03:06'),(88,9,0,9,'Est blanditiis praesentium rerum ex voluptate. Recusandae cumque quae architecto distinctio.',0,0,0,0,'2018-07-25 12:03:06','2018-07-25 12:03:06'),(89,13,0,13,'Aut provident est explicabo et dolor aperiam. Non tempora excepturi vel iusto illum ad.',0,0,0,0,'2018-07-25 12:03:06','2018-07-25 12:03:06'),(90,4,0,4,'In explicabo repellendus quaerat. Est rem fuga fugiat. Odit doloremque beatae possimus dolorem.',0,0,0,0,'2018-07-25 12:03:06','2018-07-25 12:03:06'),(91,13,0,13,'Sunt eum dolor aut. Omnis nobis alias adipisci ut. Fugit eveniet ipsam explicabo eius.',0,0,0,0,'2018-07-25 12:03:06','2018-07-25 12:03:06'),(92,11,0,11,'Quibusdam tenetur earum harum. Similique non sunt ea maiores velit.',0,0,0,0,'2018-07-25 12:03:06','2018-07-25 12:03:06'),(93,8,0,8,'Qui et aut vitae eveniet reprehenderit distinctio ut. Ipsa facere facere est sed rerum facilis.',0,0,0,0,'2018-07-25 12:03:06','2018-07-25 12:03:06'),(94,19,0,19,'Quaerat hic quod quia. Facere praesentium eum pariatur non. Asperiores maiores debitis sunt qui.',0,0,0,0,'2018-07-25 12:03:06','2018-07-25 12:03:06'),(95,4,0,4,'Dolorem accusantium voluptatem distinctio officia. Adipisci earum ad fuga fuga sed aut.',0,0,0,0,'2018-07-25 12:03:06','2018-07-25 12:03:06'),(96,12,0,12,'Autem ex explicabo quia qui et natus consequatur. Qui impedit molestias atque quaerat.',0,0,0,0,'2018-07-25 12:03:06','2018-07-25 12:03:06'),(97,5,0,5,'Error qui placeat doloremque repellat totam debitis itaque. Nulla velit error a quisquam.',0,0,0,0,'2018-07-25 12:03:06','2018-07-25 12:03:06'),(98,4,0,4,'Ullam et quo sit quo. Deserunt cumque iste est. Nulla qui in ipsum beatae ab.',0,0,0,0,'2018-07-25 12:03:06','2018-07-25 12:03:06'),(99,3,0,3,'Sed ut quia aut enim. Tempore minima ex qui ut quisquam deleniti.',0,0,0,0,'2018-07-25 12:03:06','2018-07-25 12:03:06'),(100,7,0,7,'Aut nihil error corrupti magnam est. Facere tempore est est incidunt repellat itaque.',0,0,0,0,'2018-07-25 12:03:06','2018-07-25 12:03:06'),(108,1,0,20,'aaaddd',0,0,0,0,'2018-07-25 15:39:44','2018-07-25 15:39:44'),(109,1,0,20,'asdfasf',0,0,0,0,'2018-07-25 15:39:55','2018-07-25 15:39:55'),(110,1,0,20,'asdfasf',0,0,0,0,'2018-07-25 15:43:48','2018-07-25 15:43:48'),(111,1,0,19,'sadahhff',0,0,1,0,'2018-07-25 15:46:42','2018-07-25 15:46:42'),(112,1,0,20,'ddggg',0,0,1,0,'2018-07-25 16:00:08','2018-07-25 16:00:08'),(113,1,0,20,'dddfff',0,0,0,0,'2018-07-25 16:00:53','2018-07-25 16:00:53'),(114,1,0,20,'ddgjjttt',0,0,0,0,'2018-07-25 16:01:58','2018-07-25 16:01:58'),(115,1,1,20,'好好',0,0,0,0,'2018-07-25 16:04:32','2018-07-25 16:04:32'),(116,1,1,17,'对待',0,0,0,0,'2018-07-25 16:09:00','2018-07-25 16:09:00'),(117,7,1,NULL,'啊啊啊',0,0,1,0,'2018-07-27 16:40:07','2018-07-27 16:41:54'),(118,7,1,NULL,'点点滴滴',0,0,1,0,'2018-07-27 16:40:51','2018-07-27 16:41:54'),(119,7,1,NULL,'个个都的',0,0,1,0,'2018-07-27 16:41:53','2018-07-27 16:41:54'),(120,7,1,NULL,'个个都的',0,0,1,0,'2018-07-27 16:45:15','2018-07-27 16:45:15'),(121,7,1,NULL,'个个都的',0,0,1,0,'2018-07-27 16:47:26','2018-07-27 16:47:27');

/*Table structure for table `fblist` */

CREATE TABLE `fblist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '标题',
  `user_id` int(11) DEFAULT NULL,
  `replyflag` tinyint(1) DEFAULT '0' COMMENT '回复标志',
  `delflag` tinyint(1) DEFAULT '0' COMMENT '删除标志',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `fblist` */

insert  into `fblist`(`id`,`title`,`user_id`,`replyflag`,`delflag`,`created_at`,`updated_at`) values (1,'Est fugiat porro.',1,0,0,'2018-07-25 12:00:38','2018-07-25 12:00:38'),(2,'Porro fugiat iure.',2,0,0,'2018-07-25 12:00:38','2018-07-25 12:00:38'),(3,'Saepe sed velit.',3,0,0,'2018-07-25 12:00:38','2018-07-25 12:00:38'),(4,'Ex incidunt.',4,0,0,'2018-07-25 12:00:38','2018-07-25 12:00:38'),(5,'Reprehenderit.',5,0,0,'2018-07-25 12:00:38','2018-07-25 12:00:38'),(6,'Et a eos at eos.',6,0,0,'2018-07-25 12:00:38','2018-07-25 12:00:38'),(7,'Aut et eaque.',7,0,0,'2018-07-25 12:00:38','2018-07-25 12:00:38'),(8,'Dolores ad voluptas.',8,0,0,'2018-07-25 12:00:38','2018-07-25 12:00:38'),(9,'Animi eaque sint.',9,0,0,'2018-07-25 12:00:38','2018-07-25 12:00:38'),(10,'In possimus.',10,0,0,'2018-07-25 12:00:38','2018-07-25 12:00:38'),(11,'Exercitationem.',11,0,0,'2018-07-25 12:00:38','2018-07-25 12:00:38'),(12,'Impedit et est.',12,0,0,'2018-07-25 12:00:38','2018-07-25 12:00:38'),(13,'Ipsum hic odio.',13,0,0,'2018-07-25 12:00:38','2018-07-25 12:00:38'),(14,'Doloremque dolor.',14,0,0,'2018-07-25 12:00:38','2018-07-25 12:00:38'),(15,'Soluta aliquam quod.',15,0,0,'2018-07-25 12:00:38','2018-07-25 12:00:38'),(16,'Necessitatibus.',16,0,0,'2018-07-25 12:00:38','2018-07-25 12:00:38'),(17,'Fuga ut occaecati.',17,1,0,'2018-07-25 16:09:00','2018-07-25 16:09:00'),(18,'Maiores est debitis.',18,0,0,'2018-07-25 12:00:38','2018-07-25 12:00:38'),(19,'Nemo nihil ut sequi.',19,0,0,'2018-07-25 12:00:38','2018-07-25 12:00:38'),(20,'Voluptas aspernatur.',20,1,0,'2018-07-25 16:04:32','2018-07-25 16:04:32');

/*Table structure for table `migrations` */

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_06_01_000001_create_oauth_auth_codes_table',2),(4,'2016_06_01_000002_create_oauth_access_tokens_table',2),(5,'2016_06_01_000003_create_oauth_refresh_tokens_table',2),(6,'2016_06_01_000004_create_oauth_clients_table',2),(7,'2016_06_01_000005_create_oauth_personal_access_clients_table',2);

/*Table structure for table `oauth_access_tokens` */

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_access_tokens` */

/*Table structure for table `oauth_auth_codes` */

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_auth_codes` */

/*Table structure for table `oauth_clients` */

CREATE TABLE `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_clients` */

insert  into `oauth_clients`(`id`,`user_id`,`name`,`secret`,`redirect`,`personal_access_client`,`password_client`,`revoked`,`created_at`,`updated_at`) values (1,NULL,'Laravel Personal Access Client','GFgKQisBsfLdNU4YSfQINyucMTnjU6SPWV49rFlB','http://localhost',1,0,0,'2018-07-12 16:20:13','2018-07-12 16:20:13'),(2,NULL,'Laravel Password Grant Client','b8e0K6QDdrGv7yko6IBrrbGeHEhDDehKtHYtpjXB','http://localhost',0,1,0,'2018-07-12 16:20:13','2018-07-12 16:20:13');

/*Table structure for table `oauth_personal_access_clients` */

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_personal_access_clients` */

insert  into `oauth_personal_access_clients`(`id`,`client_id`,`created_at`,`updated_at`) values (1,1,'2018-07-12 16:20:13','2018-07-12 16:20:13');

/*Table structure for table `oauth_refresh_tokens` */

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `oauth_refresh_tokens` */

/*Table structure for table `password_resets` */

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `policies` */

CREATE TABLE `policies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '策略名称',
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '描述',
  `delflag` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `policies` */

insert  into `policies`(`id`,`name`,`description`,`delflag`,`created_at`,`updated_at`) values (1,'selfFblistsPolicy','get self fblists',0,'2018-07-26 14:46:38','0000-00-00 00:00:00'),(2,'allFblistsPolicy','get all fblists',0,'2018-07-26 14:46:54','0000-00-00 00:00:00'),(3,'operateRolePolicy','operate role',0,'2018-07-26 14:47:06','0000-00-00 00:00:00'),(4,'operateUserPolicy','operate user',0,'2018-07-26 14:47:14','0000-00-00 00:00:00');

/*Table structure for table `role` */

CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delflag` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `role` */

insert  into `role`(`id`,`name`,`description`,`created_at`,`updated_at`,`delflag`) values (1,'super_admin','super administrator','2018-07-11 10:08:07','2018-07-11 10:08:07',0),(2,'admin','nomal-adminstrator','2018-07-13 16:05:23','2018-07-13 16:05:23',0),(3,'useradmin','useradmin','2018-07-13 16:06:03','2018-07-13 16:06:03',0),(4,'user','user','2018-07-26 11:06:19','2018-07-26 11:06:22',0);

/*Table structure for table `role_policies` */

CREATE TABLE `role_policies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `policies_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `role_policies` */

insert  into `role_policies`(`id`,`role_id`,`policies_id`) values (1,2,1),(2,2,2),(3,2,3),(4,2,4),(5,3,1),(6,3,2),(7,4,1);

/*Table structure for table `users` */

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nickname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delflag` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`role_id`,`remember_token`,`nickname`,`avatar`,`created_at`,`updated_at`,`delflag`) values (1,'admin','heaven67@example.net','$2y$10$y04wX75UpKxT6MyML5aw2uoQe3hFbX.xd/j7nvmdxYQhH6TDBItTy',1,'oYpoldb9yU','Anne Toy','https://lorempixel.com/200/200/?82768','2018-07-25 12:00:37','2018-07-25 14:51:07',0),(2,'+1067727153871','crooks.edwina@example.com','$2y$10$6sdcAG4Pm0Ov96PlzRNQfu2Nysp.gBhfi4m5rOAws8FmzWarkjsC.',3,'320BbZkNu6','Mrs. Janis Rogahn II','https://lorempixel.com/200/200/?28545','2018-07-25 12:00:38','2018-07-25 12:00:38',0),(3,'+6978383515426','osinski.cassidy@example.com','$2y$10$6sdcAG4Pm0Ov96PlzRNQfu2Nysp.gBhfi4m5rOAws8FmzWarkjsC.',3,'WtFvMk8yzq','Axel Powlowski','https://lorempixel.com/200/200/?44479','2018-07-25 12:00:38','2018-07-25 12:00:38',0),(4,'+4234968720783','paige.ward@example.net','$2y$10$6sdcAG4Pm0Ov96PlzRNQfu2Nysp.gBhfi4m5rOAws8FmzWarkjsC.',2,'SD68FsL7KO','Annamarie Kuhn','https://lorempixel.com/200/200/?36169','2018-07-25 12:00:38','2018-07-25 12:00:38',0),(5,'+8672170597811','lowe.leta@example.net','$2y$10$6sdcAG4Pm0Ov96PlzRNQfu2Nysp.gBhfi4m5rOAws8FmzWarkjsC.',3,'H0xZjJ8Hma','Kurtis Walker','https://lorempixel.com/200/200/?29304','2018-07-25 12:00:38','2018-07-25 12:00:38',0),(6,'+8416056841451','damore.weston@example.org','$2y$10$6sdcAG4Pm0Ov96PlzRNQfu2Nysp.gBhfi4m5rOAws8FmzWarkjsC.',3,'j56GewVcBe','Rowena Fay','https://lorempixel.com/200/200/?23072','2018-07-25 12:00:38','2018-07-25 12:00:38',0),(7,'+8984745433597','kirlin.jordy@example.net','$2y$10$6sdcAG4Pm0Ov96PlzRNQfu2Nysp.gBhfi4m5rOAws8FmzWarkjsC.',3,'t8A4mm8vJi','Earl Strosin','https://lorempixel.com/200/200/?54180','2018-07-25 12:00:38','2018-07-25 12:00:38',0),(8,'+8233621568201','tkoch@example.org','$2y$10$6sdcAG4Pm0Ov96PlzRNQfu2Nysp.gBhfi4m5rOAws8FmzWarkjsC.',3,'OVUn9lkgji','Veda Ondricka','https://lorempixel.com/200/200/?47361','2018-07-25 12:00:38','2018-07-25 12:00:38',0),(9,'+2341205623448','msmith@example.com','$2y$10$6sdcAG4Pm0Ov96PlzRNQfu2Nysp.gBhfi4m5rOAws8FmzWarkjsC.',2,'yA3OVqrQnl','Prof. Erik O\'Reilly I','https://lorempixel.com/200/200/?93196','2018-07-25 12:00:38','2018-07-25 12:00:38',0),(10,'+1198613805545','miguel.schamberger@example.org','$2y$10$6sdcAG4Pm0Ov96PlzRNQfu2Nysp.gBhfi4m5rOAws8FmzWarkjsC.',2,'ONTaZgufBz','Ms. Rose Aufderhar','https://lorempixel.com/200/200/?76404','2018-07-25 12:00:38','2018-07-25 12:00:38',0),(11,'+2331584243276','cbarrows@example.net','$2y$10$6sdcAG4Pm0Ov96PlzRNQfu2Nysp.gBhfi4m5rOAws8FmzWarkjsC.',2,'hi9rPJevZj','Alexandre Hoeger','https://lorempixel.com/200/200/?69286','2018-07-25 12:00:38','2018-07-25 12:00:38',0),(12,'+9912209589890','imetz@example.org','$2y$10$6sdcAG4Pm0Ov96PlzRNQfu2Nysp.gBhfi4m5rOAws8FmzWarkjsC.',3,'Mz5rfQ78E4','Modesto Abernathy','https://lorempixel.com/200/200/?92390','2018-07-25 12:00:38','2018-07-25 12:00:38',0),(13,'+3637791323508','astrid26@example.com','$2y$10$6sdcAG4Pm0Ov96PlzRNQfu2Nysp.gBhfi4m5rOAws8FmzWarkjsC.',2,'Bt2EXkWd5K','Kobe Gibson','https://lorempixel.com/200/200/?43904','2018-07-25 12:00:38','2018-07-25 12:00:38',0),(14,'+4653984433633','aosinski@example.net','$2y$10$6sdcAG4Pm0Ov96PlzRNQfu2Nysp.gBhfi4m5rOAws8FmzWarkjsC.',2,'fa4HrWGK59','Marisa Haag','https://lorempixel.com/200/200/?75431','2018-07-25 12:00:38','2018-07-25 12:00:38',0),(15,'+3332649093135','christiana.feil@example.com','$2y$10$6sdcAG4Pm0Ov96PlzRNQfu2Nysp.gBhfi4m5rOAws8FmzWarkjsC.',2,'XibZyeLMEx','Miss Vivian West I','https://lorempixel.com/200/200/?20075','2018-07-25 12:00:38','2018-07-25 12:00:38',0),(16,'+2955485267990','boehm.frankie@example.net','$2y$10$6sdcAG4Pm0Ov96PlzRNQfu2Nysp.gBhfi4m5rOAws8FmzWarkjsC.',3,'tveR2iYqtR','Joan Shields','https://lorempixel.com/200/200/?68209','2018-07-25 12:00:38','2018-07-25 12:00:38',0),(17,'+6615087095679','lina18@example.org','$2y$10$6sdcAG4Pm0Ov96PlzRNQfu2Nysp.gBhfi4m5rOAws8FmzWarkjsC.',2,'lQZRWTp6na','Wiley Nicolas','https://lorempixel.com/200/200/?45449','2018-07-25 12:00:38','2018-07-25 12:00:38',0),(18,'+5266545528466','kristin70@example.org','$2y$10$6sdcAG4Pm0Ov96PlzRNQfu2Nysp.gBhfi4m5rOAws8FmzWarkjsC.',2,'2NJPgqohqF','Guy Goldner','https://lorempixel.com/200/200/?52291','2018-07-25 12:00:38','2018-07-25 12:00:38',0),(19,'+8493918461615','marcellus.gibson@example.net','$2y$10$6sdcAG4Pm0Ov96PlzRNQfu2Nysp.gBhfi4m5rOAws8FmzWarkjsC.',3,'OkUAjYWxJ4','Dr. Delphine Casper','https://lorempixel.com/200/200/?73939','2018-07-25 12:00:38','2018-07-25 12:00:38',0),(20,'+2672552803962','jacobs.letha@example.org','$2y$10$6sdcAG4Pm0Ov96PlzRNQfu2Nysp.gBhfi4m5rOAws8FmzWarkjsC.',2,'kCPjx5uQHp','Prof. Mikel Graham Sr.','https://lorempixel.com/200/200/?13411','2018-07-25 12:00:38','2018-07-25 12:00:38',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
