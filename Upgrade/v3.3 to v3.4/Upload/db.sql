
SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

ALTER TABLE ads ADD smallSEOAd text, ADD smallSEOAd1 text, ADD smallSEOAd2 text;

UPDATE `ads` SET `smallSEOAd`='&lt;br&gt;&lt;img class=&quot;imageres&quot; src=&quot;https://prothemes.biz/image/dummy-xd/720x90.png&quot; /&gt;', `smallSEOAd1`='&lt;br&gt;&lt;img class=&quot;imageres&quot; src=&quot;https://prothemes.biz/image/dummy-xd/720x90.png&quot; /&gt;&lt;br&gt;',	`smallSEOAd2`='&lt;br&gt;&lt;img class=&quot;imageres&quot; src=&quot;https://prothemes.biz/image/dummy-xd/300x250.png&quot; /&gt;&lt;br&gt;';

CREATE TABLE `category` (
                            `id` int(11) NOT NULL AUTO_INCREMENT,
                            `name` text DEFAULT NULL,
                            `des` text DEFAULT NULL,
                            `sort` int(11) DEFAULT NULL,
                            `pattern` int(11) DEFAULT NULL,
                            `enabled` int(11) DEFAULT NULL,
                            `tools` blob DEFAULT NULL,
                            PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `category` (`id`, `name`, `des`, `sort`, `pattern`, `enabled`, `tools`) VALUES
(1,	'Text Content',	'A complete set of text tools is now at your fingertips. Check plagiarism, rewrite an article, run a spell checker, count words or change text case.',	1,	2,	1,	'[\\\"PR02\\\",\\\"PR01\\\",\\\"PR11\\\",\\\"PR39\\\"]'),
(3,	'Keywords',	'For webmasters and SEO professionals, free, powerful and efficient keyword tools that provide you with thorough keyword research and analysis.',	2,	1,	1,	'[\\\"PR06\\\",\\\"PR16\\\",\\\"PR48\\\"]'),
(4,	'Backlink',	'A set of backlink analysis tool to give you a comprehensive inside view of your link profile.',	3,	1,	1,	'[\\\"PR03\\\",\\\"PR09\\\",\\\"PR46\\\",\\\"PR13\\\",\\\"PR37\\\",\\\"PR32\\\"]'),
(5,	'Website Management',	'If you are struggling to get more traffic and enhance your website performance, then use these website management tools and in-depth web analysis.',	4,	1,	1,	'[\\\"PR40\\\",\\\"PR28\\\",\\\"PR08\\\",\\\"PR22\\\",\\\"PR27\\\",\\\"PR25\\\",\\\"US02\\\",\\\"PR31\\\",\\\"PR33\\\",\\\"PR44\\\",\\\"PR07\\\",\\\"PR35\\\",\\\"PR12\\\"]'),
(6,	'Website Tracking',	'A list of free tools in one place to measure, monitor, and keep track of your websites performance.',	6,	1,	1,	'[\\\"PR20\\\",\\\"PR29\\\",\\\"PR26\\\",\\\"PR38\\\",\\\"PR41\\\",\\\"PR10\\\",\\\"PR47\\\",\\\"PR45\\\",\\\"PR19\\\",\\\"PR24\\\",\\\"PR50\\\",\\\"PR49\\\",\\\"PR36\\\",\\\"PR23\\\",\\\"PR17\\\",\\\"PR15\\\",\\\"CS02\\\",\\\"PR43\\\",\\\"SD51\\\"]'),
(7,	'Proxy',	'Use proxy tools to know your IP location or to get a free daily proxy list.',	7,	1,	1,	'[\\\"PR15\\\",\\\"CS02\\\"]'),
(8,	'Meta Tags',	'Create new meta tags or analyze the existing ones to get an in-depth analysis of your meta tags and web pages.',	9,	1,	1,	'[\\\"PR04\\\",\\\"PR05\\\"]'),
(9,	'Domains',	'A range of domain related tools to find out domain age, domain authority, DNS records or expired domains, etc.',	8,	1,	1,	'[\\\"PR18\\\",\\\"PR49\\\",\\\"PR20\\\",\\\"PR34\\\",\\\"PR42\\\",\\\"PR30\\\"]'),
(11,	'Images Editing',	'Create a favicon, compress an image or resize a picture with a single click. All essentials for image editing are available in one place.',	10,	1,	1,	'[\\\"IHT01\\\",\\\"CO001\\\",\\\"AT5130\\\",\\\"AT5129\\\"]'),
(19,	'Other',	'Simply useful tools for various tasks',	11,	NULL,	1,	'[\\\"AT5136\\\",\\\"AT5135\\\",\\\"AT5132\\\",\\\"AT5133\\\",\\\"AT5134\\\",\\\"AT5131\\\"]');

CREATE TABLE `category_option` (
                                   `id` int(11) NOT NULL AUTO_INCREMENT,
                                   `category` int(11) DEFAULT NULL,
                                   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `category_option` (`id`, `category`) VALUES
(1,	1);

ALTER TABLE `themes_data` ADD `defaultext_theme` blob NULL;

UPDATE `themes_data` SET  `defaultext_theme` = '{\"color\":{\"primary\":\"#009dc5\",\"secondary\":\"#3bb2d0\",\"box\":\"#5e5a65\",\"footer1\":\"#506273\",\"footer2\":\"#485a6c\"},\"general\":{\"imgLogo\":\"on\",\"htmlLogo\":\"&lt;i class=&quot;fa fa-cubes iconBig&quot;&gt;&lt;\\/i&gt; {{site_name}}\",\"logo\":\"theme\\/default\\/img\\/logo.png\",\"favicon\":\"theme\\/default\\/img\\/favicon.ico\",\"langSwitch\":true,\"sidebar\":\"right\",\"sSearch\":false,\"iSearch\":true,\"browseBtn\":true,\"topTools\":[\"PR02\",\"PR08\",\"PR19\",\"PR22\",\"PR24\"],\"popTools\":[\"PR01\",\"PR07\",\"PR09\",\"PR15\",\"PR19\",\"PR24\",\"PR42\",\"PR49\"]},\"contact\":{\"about\":\"Our aim to make search engine optimization (SEO) easy. We provide simple, professional-quality SEO analysis and critical SEO monitoring for websites. By making our tools intuitive and easy to understand, we\\\\\'ve helped thousands of small-business owners, webmasters and SEO professionals improve their online presence.\"},\"custom\":{\"css\":\"\"}}';