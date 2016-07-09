CREATE TABLE IF NOT EXISTS `hotshoe_client` (  `clientID` int(11) NOT NULL AUTO_INCREMENT,  `userName` varchar(15) NOT NULL,  `firstName` varchar(250) NOT NULL,  `lastName` varchar(250) NOT NULL,  `email` varchar(250) NOT NULL,  `password` varchar(250) NOT NULL,  `RS` varchar(15) NOT NULL,  PRIMARY KEY (`clientID`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;~


INSERT INTO `hotshoe_client` (`clientID`, `userName`, `firstName`, `lastName`, `email`, `password`, `RS`) VALUES(15, 'demo', 'Demo', 'McDermot', 'demo@hotshoecms.org', '01943e44b9e53a8eb11cc66fbb1513e0', ''),(12, 'cal89', 'Callum', 'Henry', 'callum@hoosk.org', '01943e44b9e53a8eb11cc66fbb1513e0', ''),(13, 'simva', 'Simon', 'Vavavoom', 'simon@vavoom.com', '01943e44b9e53a8eb11cc66fbb1513e0', ''),(14, 'craigyj', 'Craig', 'Jackson', 'craigyj@craig.com', '01943e44b9e53a8eb11cc66fbb1513e0', '');~



CREATE TABLE IF NOT EXISTS `hotshoe_gallery` (
  `galID` int(11) NOT NULL AUTO_INCREMENT,
  `galTitle` varchar(250) NOT NULL,
  `galLocation` varchar(250) NOT NULL,
  `galDescription` text NOT NULL,
  `galREF` varchar(5) NOT NULL,
  `galWatermark` int(11) NOT NULL,
  `galWatermarkThumb` int(11) NOT NULL,
  `galHeaderImage` varchar(250) NOT NULL,
  `galHeaderImageEnable` int(11) NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`galID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;~



INSERT INTO `hotshoe_gallery` (`galID`, `galTitle`, `galLocation`, `galDescription`, `galREF`, `galWatermark`,`galWatermarkThumb`, `galHeaderImage`, `galHeaderImageEnable`, `added`) VALUES(5, 'Autumn', 'Glasgow, Scotland', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ornare diam massa, non congue enim aliquet in. Phasellus est dui, tempor nec nisi id, ornare congue velit. Nunc at posuere elit. Aliquam aliquam ultricies quam, nec blandit felis consectetur id.', 'AUTU', 0, 0, '', 0, '2015-02-23 21:32:47');~



CREATE TABLE IF NOT EXISTS `hotshoe_gallery_client` (  `clientID` int(11) NOT NULL,  `galID` int(11) NOT NULL) ENGINE=MyISAM DEFAULT CHARSET=latin1;~



INSERT INTO `hotshoe_gallery_client` (`clientID`, `galID`) VALUES(15, 5),(13, 5);~

CREATE TABLE IF NOT EXISTS `hotshoe_images` (  `imageID` int(11) NOT NULL AUTO_INCREMENT,  `galID` int(11) NOT NULL,  `image` varchar(250) NOT NULL,  `thumb` varchar(250) NOT NULL,  `order` int(11) NOT NULL,  PRIMARY KEY (`imageID`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;~


INSERT INTO `hotshoe_images` (`imageID`, `galID`, `image`, `thumb`, `order`) VALUES(62, 5, '/gallery/5/scottwills_farmhouse2.jpg', '/gallery/5/thumb/scottwills_farmhouse2.jpg', 0),(63, 5, '/gallery/5/adfish_falltrees.jpg', '/gallery/5/thumb/adfish_falltrees.jpg', 0),(64, 5, '/gallery/5/adfish_falltrees2.jpg', '/gallery/5/thumb/adfish_falltrees2.jpg', 0),(65, 5, '/gallery/5/adfish_falltrees3.jpg', '/gallery/5/thumb/adfish_falltrees3.jpg', 0),(66, 5, '/gallery/5/adfish_falltrees4.jpg', '/gallery/5/thumb/adfish_falltrees4.jpg', 0),(67, 5, '/gallery/5/adfish_falltrees5.jpg', '/gallery/5/thumb/adfish_falltrees5.jpg', 0),(68, 5, '/gallery/5/scottwills_autumn2.jpg', '/gallery/5/thumb/scottwills_autumn2.jpg', 0),(69, 5, '/gallery/5/scottwills_autumn4.jpg', '/gallery/5/thumb/scottwills_autumn4.jpg', 0),(70, 5, '/gallery/5/scottwills_autumn3.jpg', '/gallery/5/thumb/scottwills_autumn3.jpg', 0),(71, 5, '/gallery/5/scottwills_autumn6.jpg', '/gallery/5/thumb/scottwills_autumn6.jpg', 0),(72, 5, '/gallery/5/scottwills_autumn5.jpg', '/gallery/5/thumb/scottwills_autumn5.jpg', 0),(73, 5, '/gallery/5/scottwills_autumnleaf.jpg', '/gallery/5/thumb/scottwills_autumnleaf.jpg', 0),(74, 5, '/gallery/5/scottwills_butterfly.jpg', '/gallery/5/thumb/scottwills_butterfly.jpg', 0),(75, 5, '/gallery/5/scottwills_autumn7.jpg', '/gallery/5/thumb/scottwills_autumn7.jpg', 0);~



CREATE TABLE IF NOT EXISTS `hotshoe_sessions` (  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',  `user_agent` varchar(120) NOT NULL,  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',  `user_data` text NOT NULL,  PRIMARY KEY (`session_id`),  KEY `last_activity_idx` (`last_activity`)) ENGINE=MyISAM DEFAULT CHARSET=latin1;~





CREATE TABLE IF NOT EXISTS `hotshoe_settings` (
  `siteID` int(11) NOT NULL,
  `siteTitle` text NOT NULL,
  `siteDescription` text NOT NULL,
  `siteLogo` text NOT NULL,
  `siteWatermark` varchar(250) NOT NULL,
  `siteThumbWatermark` varchar(250) NOT NULL,
  `siteTheme` varchar(250) NOT NULL,
 
 `siteLang` varchar(250) NOT NULL,  `siteFooter` text NOT NULL,
  UNIQUE KEY `siteID` (`siteID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;~



INSERT INTO `hotshoe_settings` (`siteID`, `siteTitle`, `siteDescription`, `siteLogo`, `siteLang`, `siteWatermark`,  `siteThumbWatermark`, `siteTheme`, `siteFooter`) VALUES(0, 'Hotshoe CMS', 'Hoosk', 'logo.png', 'english', 'watermark2.png', 'watermark2.png', 'front', '&copy; Hotshoe CMS 2015');~


CREATE TABLE IF NOT EXISTS `hotshoe_user` (  `userID` int(11) NOT NULL AUTO_INCREMENT,  `userName` varchar(15) NOT NULL,  `email` varchar(250) NOT NULL,  `password` varchar(250) NOT NULL,  `RS` varchar(15) NOT NULL,  PRIMARY KEY (`userID`)) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;~


INSERT INTO `hotshoe_user` (`userID`, `userName`, `email`, `password`, `RS`) VALUES(10, 'admin', 'admin@hotshoecms.org', '01943e44b9e53a8eb11cc66fbb1513e0', '');~