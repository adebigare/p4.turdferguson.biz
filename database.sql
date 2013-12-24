-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 23, 2013 at 08:23 PM
-- Server version: 5.5.33
-- PHP Version: 5.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `turdferg_p4_turdferguson_biz`
--

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL,
  `href` varchar(255) CHARACTER SET utf8 NOT NULL,
  `creator_id` int(11) NOT NULL,
  `timeline_id` int(11) NOT NULL,
  PRIMARY KEY (`link_id`),
  UNIQUE KEY `link_id` (`link_id`),
  KEY `creator_id` (`creator_id`),
  KEY `timeline_id` (`timeline_id`),
  KEY `creator_id_2` (`creator_id`),
  KEY `creator_id_3` (`creator_id`,`timeline_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`link_id`, `title`, `created`, `href`, `creator_id`, `timeline_id`) VALUES
(4, 'Trying to replicate Mohegan’s success in Revere', 1387337908, 'http://www.bostonglobe.com/metro/2013/12/22/trying-replicate-mohegan-success-revere/RPgNQCJsgcwtriyEGLWWxO/story.html', 47, 1),
(5, 'Hero Marathon firefighters honored at ceremony at MIT - Metro - The Boston Globe', 1387553189, 'http://www.bostonglobe.com/metro/2013/12/19/hero-marathon-firefighters-honored-ceremony-mit/NhmhDKlUb3k2vMgdfay3EL/story.html', 1, 2),
(6, 'Obama fuels surge in US arms exports ; Raytheon major beneficiary - Nation - The Boston Globe', 1387736601, 'http://www.bostonglobe.com/news/nation/2013/12/22/obama-fuels-surge-arms-exports-raytheon-major-beneficiary/bgCreTbinhTZEQLUM5yDVI/story.html', 1, 13),
(7, 'Congress gets new chance to overhaul surveillance programs - Nation - The Boston Globe', 1387736713, 'http://www.bostonglobe.com/news/nation/2013/12/22/congress-gets-new-chance-overhaul-surveillance-programs/D6HAQzcYTaK4PBDuzrEFQK/story.html', 1, 14),
(8, 'Secrets of a professional Santa: designer beard, fat suit, and Christmas spirit - Business - The Boston Globe', 1387761884, 'http://www.bostonglobe.com/business/2013/12/22/secrets-professional-santa-designer-beard-fat-suit-and-christmas-spirit/3aAzwlMve7tr4PSTFuZ6zH/story.html', 1, 1),
(9, 'Breaking the stress/rudeness cycle at work - Business - The Boston Globe', 1387765444, 'http://www.bostonglobe.com/business/2013/12/22/breaking-stress-rudeness-cycle-work/LaPRsuRXS1A8TQIZ5cjg9K/story.html', 23, 2),
(20, 'Callahan Tunnel to close Friday night until mid-March - Metro - The Boston Globe', 1387843768, '', 1, 2),
(21, 'Callahan Tunnel to close Friday night until mid-March - Metro - The Boston Globe', 1387844290, 'http://www.bostonglobe.com/metro/2013/12/23/callahan-tunnel-close-friday-night-until-mid-march/oXZ5PUzRJVYrTmogsuZazM/story.html', 1, 2),
(22, 'Beware before you click that link - Business - The Boston Globe', 1387844988, 'http://www.bostonglobe.com/business/2013/12/22/beware-before-you-click-that-link/RH8fvPgwwmTlFgLjvVu2OO/story.html', 1, 2),
(23, 'Beware before you click that link - Business - The Boston Globe', 1387845026, 'http://www.bostonglobe.com/business/2013/12/22/beware-before-you-click-that-link/RH8fvPgwwmTlFgLjvVu2OO/story.html', 1, 2),
(24, 'Beware before you click that link - Business - The Boston Globe', 1387845077, 'http://www.bostonglobe.com/business/2013/12/22/beware-before-you-click-that-link/RH8fvPgwwmTlFgLjvVu2OO/story.html', 1, 2),
(25, 'Callahan Tunnel to close Friday night until mid-March - Metro - The Boston Globe', 1387845157, 'http://www.bostonglobe.com/metro/2013/12/23/callahan-tunnel-close-friday-night-until-mid-march/oXZ5PUzRJVYrTmogsuZazM/story.html', 1, 2),
(26, 'Callahan Tunnel to close Friday night until mid-March - Metro - The Boston Globe', 1387845251, 'http://www.bostonglobe.com/metro/2013/12/23/callahan-tunnel-close-friday-night-until-mid-march/oXZ5PUzRJVYrTmogsuZazM/story.html', 1, 2),
(27, 'Callahan Tunnel to close Friday night until mid-March - Metro - The Boston Globe', 1387845271, 'http://www.bostonglobe.com/metro/2013/12/23/callahan-tunnel-close-friday-night-until-mid-march/oXZ5PUzRJVYrTmogsuZazM/story.html', 1, 2),
(28, 'Tragedies, triumphs of 2013 played out on Twitter', 1387845363, 'http://www.bostonglobe.com/magazine/2013/12/22/tragedies-triumphs-played-out-twitter/Un9rrRqkdDgGWoDZYQZ8aL/igraphic.html', 1, 2),
(29, 'Tragedies, triumphs of 2013 played out on Twitter', 1387845425, 'http://www.bostonglobe.com/magazine/2013/12/22/tragedies-triumphs-played-out-twitter/Un9rrRqkdDgGWoDZYQZ8aL/igraphic.html', 1, 2),
(30, 'Could owning a dog protect children from asthma and allergies? - Health &amp; wellness - The Boston Globe', 1387846630, 'http://www.bostonglobe.com/lifestyle/health-wellness/2013/12/23/could-owning-dog-protect-children-from-asthma-and-allergies/7c8TjsJBj7K4NhjmcxgSOM/story.html', 1, 2),
(31, 'Skaters shine in Disney&rsquo;s kid-pleasing &lsquo;Adventure&rsquo; - Theater &amp; art - The Boston Globe', 1387846724, 'http://www.bostonglobe.com/arts/theater-art/2013/12/23/skaters-shine-disney-kid-pleasing-adventure/Bt90nXIQjNqVJnRiLB9XBL/story.html', 1, 2),
(32, 'Skaters shine in Disney&rsquo;s kid-pleasing &lsquo;Adventure&rsquo; - Theater &amp; art - The Boston Globe', 1387847098, 'http://www.bostonglobe.com/arts/theater-art/2013/12/23/skaters-shine-disney-kid-pleasing-adventure/Bt90nXIQjNqVJnRiLB9XBL/story.html', 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `content_title` varchar(255) NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `created`, `modified`, `user_id`, `content`, `content_title`) VALUES
(12, 1383523663, 1383523663, 23, 'http://www.bostonglobe.com/news/politics/2013/11/03/mitt-romney-criticizes-president-obama-for-dishonesty-health-care-pitch/8cxNlMCXjl93n5EIH1pFLJ/story.html?event=event12', '<title>Mitt Romney criticizes President Obama for &lsquo;dishonesty&rsquo; on health care pitch - Politics - The Boston Globe</title>'),
(13, 1383523732, 1383523732, 23, 'http://www.bostonglobe.com/news/politics/2013/11/03/mitt-romney-criticizes-president-obama-for-dishonesty-health-care-pitch/8cxNlMCXjl93n5EIH1pFLJ/story.html?event=event12', 'Title would be here - Politics - Boston Globe'),
(14, 1383523801, 1383523801, 2, 'http://www.bostonglobe.com/news/politics/2013/11/03/mitt-romney-criticizes-president-obama-for-dishonesty-health-care-pitch/8cxNlMCXjl93n5EIH1pFLJ/story.html?event=event12', 'Mitt Romney criticizes President Obama for &lsquo;dishonesty&rsquo; on health care pitch - Politics - The Boston Globe'),
(16, 1383539750, 1383539750, 23, 'http://www.bostonglobe.com/metro/2013/11/03/officials-investigating-early-morning-dorchester-fire-that-displaced/SZQyQDV9odZUmo5Oad5B2K/story.html', 'Officials investigating early morning Dorchester fire that displaced 13 - Metro - The Boston Globe'),
(17, 1383539860, 1383539860, 23, 'http://www.bostonglobe.com/metro/specials/boston-mayoral-race', 'The Boston mayoral race'),
(18, 1383523663, 1383523663, 3, 'http://www.bostonglobe.com/news/politics/2013/11/03/mitt-romney-criticizes-president-obama-for-dishonesty-health-care-pitch/8cxNlMCXjl93n5EIH1pFLJ/story.html?event=event12', 'Title No 2 is the kewwlest'),
(19, 1383539860, 1383539860, 3, 'http://www.bostonglobe.com/metro/specials/boston-mayoral-race', 'Lots more stuff going own'),
(20, 1383603293, 1383603293, 2, 'http://www.bostonglobe.com/metro/2013/11/04/menino-emotional-cuts-ribbon-eve-election-replace-him/CP5XGWvIXIdf0ao2LKV9EM/story.html', 'Menino emotional as he cuts ribbon on eve of election to replace him - Metro - The Boston Globe'),
(21, 1383603421, 1383603421, 3, 'http://www.bostonglobe.com/lifestyle/health-wellness/2013/11/04/despite-workplace-ban-many-blue-collar-workers-still-exposed-secondhand-smoke/0CerkVLSsW6D2d5WVGQYEL/story.html', 'Despite workplace ban, many blue-collar workers still exposed to secondhand smoke - Metro - The Boston Globe'),
(22, 1383603451, 1383603451, 23, 'http://www.bostonglobe.com/business/2013/11/04/power-plants-try-burning-wood-with-coal-cut-emissions/kszJSmUVAl4pO6oYmfsUBM/story.html', 'Power plants try burning wood with coal to cut emissions - Business - The Boston Globe'),
(23, 1383603749, 1383603749, 3, 'http://www.bostonglobe.com/sports/2013/11/04/red-sox-make-offers-ellsbury-napoli-drew/en61Oq7wuJFb6nyQ0RcBpO/story.html', 'Red Sox make $14M offers to Ellsbury, Napoli, Drew - Sports - The Boston Globe'),
(24, 1383793192, 1383793192, 39, 'http://php.net/manual/en/function.move-uploaded-file.php', 'PHP: move_uploaded_file - Manual'),
(30, 1383846269, 1383846269, 23, 'http://stackoverflow.com/questions/60174/how-can-i-prevent-sql-injection-in-php', ''),
(31, 1383846705, 1383846705, 23, 'http://php.net/manual/en/mysqli-stmt.bind-param.php', ''),
(32, 1383846748, 1383846748, 23, 'http://php.net/manual/en/mysqli-stmt.bind-param.php', 'PHP: mysqli_stmt::bind_param - Manual'),
(33, 1383846915, 1383846915, 23, 'http://us2.php.net/manual/en/mysqli.real-escape-string.php', 'PHP: mysqli::real_escape_string - Manual'),
(34, 1383847569, 1383847569, 23, '$_POST[\\''content\\'']', '');

-- --------------------------------------------------------

--
-- Table structure for table `timelines`
--

CREATE TABLE `timelines` (
  `timeline_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  PRIMARY KEY (`timeline_id`),
  UNIQUE KEY `timeline_id` (`timeline_id`),
  KEY `creator_id` (`creator_id`,`topic_id`),
  KEY `topic_id` (`topic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `timelines`
--

INSERT INTO `timelines` (`timeline_id`, `title`, `created`, `modified`, `creator_id`, `topic_id`) VALUES
(1, 'White Xos', 1387337906, 0, 47, 1),
(2, 'Boston Marathon', 1387553189, 0, 1, 1),
(13, 'Bulling', 1387736600, 0, 1, 3),
(14, 'Gov\\''t Shutdown', 1387736712, 0, 1, 1),
(15, 'Christmas', 1387847098, 0, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `name` varchar(255) NOT NULL,
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`topic_id`),
  UNIQUE KEY `topic_id` (`topic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`name`, `topic_id`) VALUES
('politics', 1),
('technology', 2),
('entertainment', 3),
('sports', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `last_login` int(11) NOT NULL,
  `timezone` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `twitter_handle` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `created`, `modified`, `token`, `password`, `last_login`, `timezone`, `first_name`, `last_name`, `email`, `avatar`, `website`, `twitter_handle`) VALUES
(1, 1382587237, 0, '135c60a4d6bebba3e875602a2785b3ddf6f1892b', 'c04da1a8a57d8d7cd81a2aa8f55a2dbe833d866d', 1387838301, '', 'Sam', 'Seaborn', 'sam@whitehouse.gov', '13877330431.png', NULL, NULL),
(2, 1382587246, 0, 'a7ab183e9e10ac61081fd18c7eba1dd2ce2745db', '777c8c084052831d4f6792a580142cfc359fd945', 1383603491, '', 'Donna', 'Moss', 'donna@whitehouse.gov', '', NULL, NULL),
(3, 1382587258, 0, '29ddc530dd921b7ec935ba1da505347d00d246f5', '2da908d5c171567c5033b5a44eeedd88eadccdc6', 1383603687, '', 'Toby', 'Ziegler', 'toby@whitehouse.gov', '', NULL, NULL),
(4, 1382587269, 0, '161e0f31839869d78fe6c4d99219de08fbf6fab1', '597de90230cae1e03080ec424f7fd57d60a0ca0d', 0, '', 'CJ', 'Cregg', 'cj@whitehouse.gov', '', NULL, NULL),
(23, 1383171916, 1383171916, '8cbcce66dd270bc7953356e23c102daff253f43e', 'bf0ac8f4177843110d4ab9f9bd9a61231fa692d2', 1387818415, '', 'Adrienne', 'Debigare', 'adrienne@deb.com', '138379023023.png', 'www.adriennedebigare.com', '@adebigare'),
(25, 1383197347, 1383197347, '4a235111a0441c1a41409e21548eb6d60b95f6ce', '64a1bdfb3ff08f9c2653b48e402a210844878f74', 0, '', 'herp', 'merp', 'herp@merp.com', '', NULL, NULL),
(26, 1383250642, 1383250642, 'f1ddc8c44c56d3511a07d0074c4201152cf2412f', '95f16f9d135e2856af9d5fea87b481aeda289957', 0, '', 'Amos', 'Andy', 'amos@andy.com', '', NULL, NULL),
(27, 1383250916, 1383250916, '0969d9d71449a20df3e874874f74343373446947', '5ef1d48c1d78d6bd1d7dcb27ac2ba9651617fc78', 0, '', 'Ansel', 'Adams', 'Ansel@photo.com', '', NULL, NULL),
(29, 1383251211, 1383251211, '71e1d4495b897ccabed21d016b590312910916eb', 'fd4f985ec4be4f0f5f0da5392b4d03322af4739a', 0, '', 'Anson', 'Mills', 'anson@mills.com', '', NULL, NULL),
(30, 1383259705, 1383259705, '4c9936cf624eb232a425231f122e689bacaf50dd', '9a2c67e92e24f2f7f563325f9304833419894b17', 0, '', 'Benny', 'Hannah', 'Benny@hannah.com', '', NULL, NULL),
(32, 1383715785, 1383715785, '8b91e09155a7e8f5c342fd61bf2c56f695d3c69f', '14494d8be97690f8d4e6e15db5f1940aacd781ff', 0, '', 'mary', 'sunshine', 'mary@sunshine.org', '32.png', NULL, NULL),
(34, 1383719369, 1383719369, '43de2d41df3985ca4b260f44715a94f4c8c0745c', '7cf9a1fb0a55acb84d4428948f3203cad24371a3', 0, '', 'Mary', 'Sunshine', 'mary@sunshine.com', '34.png', '@marys', NULL),
(39, 1383793012, 1383793012, '736c03dab5cec630daf2edf006768e0aa946720d', '0bb7d3edfce7a92f5b0a3a1070259bfdba7ff772', 0, '', 'fiddler', 'soren', 'Merp@merp.com', '39.png', NULL, NULL),
(40, 1383797173, 1383797173, '1e102354d074e0e46b19ced33516d4697d3ec44e', 'c5c2cedf78818235612846f6f7d27fa0468e01d4', 0, '', 'Amy', 'Adams', 'Amy@gmail.com', '', NULL, NULL),
(41, 1383797778, 1383797778, 'eac20c8be31dd81e98ff2894d57567bede70608a', '5dcc9102ffdb958ecd5a9cec9de0f8fdf9cc55b2', 0, '', 'sheila', 'forzythe', 'sheila@fors.com', '', NULL, NULL),
(42, 1383797842, 1383797842, 'd1c949152aae5787893283f0211673f5d97a5e7e', '9f8eabf05597de4682597ca3d56008d310d5a1df', 0, '', 'sheila', 'forzythe', 'sheila@forse.com', '42.png', NULL, NULL),
(43, 0, 0, '', 'khjo', 0, '', 'sheila', 'forzythe', 'sheila@foe.com', '43.png', NULL, NULL),
(44, 1383799785, 1383799785, '36d5e6319d3f181005b818b7460ae32386d476b6', '6ff765de508c9b23c14ab84e84c4af24893f8e4f', 0, '', 'sheila', 'forzythe', 'sheila@oe.com', '44.png', NULL, NULL),
(45, 1383799852, 1383799852, '216eeab4d007ba427498dd273f9ab4c674ae76f1', 'bebc55a646822393d8118c42fa35202706e6eca7', 0, '', 'Lucky', 'Levison', 'lucky@lulu.com', '45.png', NULL, NULL),
(46, 1383799909, 1383799909, '615e4b76bf4d6c1d7bbe6687fc84f51daf5b6e7b', 'dd6205bb9db93811da22435fb78e50ffdc9b0b65', 0, '', 'Hugo', 'Chavez', 'Hugo@do.com', '46.png', NULL, NULL),
(47, 1386804932, 1386804932, '5ba0e788ad28c3ce17ac7dde88db6fcda3a94112', 'bf0ac8f4177843110d4ab9f9bd9a61231fa692d2', 1387838265, '', 'Lady', 'boner', 'test@test.com', '47.png', NULL, NULL),
(48, 1386805082, 1386805082, '1d349a264aa02f12d1dad448d22747f209a19179', 'bf0ac8f4177843110d4ab9f9bd9a61231fa692d2', 0, '', 'Lucy', 'Diamond', 'schlerp@test.com', '138680519048.png', 'herpderp.com', '@herpderp');

-- --------------------------------------------------------

--
-- Table structure for table `users_timelines`
--

CREATE TABLE `users_timelines` (
  `user_timeline_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timeline_id` int(11) NOT NULL,
  PRIMARY KEY (`user_timeline_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='list of the timelines each user follows' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users_users`
--

CREATE TABLE `users_users` (
  `user_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'follower',
  `user_id_followed` int(11) NOT NULL COMMENT 'followed',
  PRIMARY KEY (`user_user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `users_users`
--

INSERT INTO `users_users` (`user_user_id`, `created`, `user_id`, `user_id_followed`) VALUES
(1, 1382587640, 1, 2),
(2, 1382587662, 2, 1),
(4, 1382587664, 2, 3),
(5, 1382587664, 2, 4),
(6, 1382587709, 3, 1),
(7, 1383091654, 5, 1),
(8, 1383091661, 5, 2),
(15, 1383603705, 3, 2),
(16, 1383603717, 3, 23),
(18, 1383611816, 3, 4),
(24, 1383719778, 34, 21),
(25, 1383719779, 34, 23),
(26, 1383719780, 34, 2),
(27, 1383719783, 34, 3),
(28, 1383792786, 1, 26),
(30, 1383792794, 1, 29),
(31, 1383792951, 1, 3),
(32, 1383793169, 39, 3),
(33, 1383793171, 39, 2),
(34, 1383793173, 39, 1),
(36, 1386890211, 48, 3),
(37, 1386890216, 48, 1),
(38, 1387548767, 1, 47),
(39, 1387548771, 1, 48),
(40, 1387837751, 23, 1),
(41, 1387837753, 23, 2),
(42, 1387837756, 23, 23),
(43, 1387837763, 23, 47),
(44, 1387837766, 23, 48),
(47, 1387840507, 1, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `links`
--
ALTER TABLE `links`
  ADD CONSTRAINT `links_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timelines`
--
ALTER TABLE `timelines`
  ADD CONSTRAINT `timelines_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `timelines_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`topic_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `users_timelines`
--
ALTER TABLE `users_timelines`
  ADD CONSTRAINT `users_timelines_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
