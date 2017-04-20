<?php
if (!defined('init_config'))
{	
	header('HTTP/1.0 404 not found');
	exit;
}

$config['SiteName'] = 'OBSIDIANWOW';

$config['RootPath'] = 'C:\OBSIDIAN\SESM'; 		//(No slash at the end)
$config['BaseURL'] = 'http://obsidianwow.com/sesm'; 	//(No slash at the end)

//Must be unique for each website
$config['AuthCookieName'] = 'obwow';

//Minifier Settings
//StyleFolderURL rewrites the URLs for the image in the CSS files
$config['StyleFolderURL'] = 'http://obsidianwow.com/sesm/template/style/'; //(With slash at the end)

//E-mail Address
$config['Email'] = 'info@localhost';

//Time settings
$config['TimeZone'] = 'Europe/Berlin';
$config['TimeZoneOffset'] = '+1';

//Warcry WoW Database URL
$config['WoWDB_URL'] = 'http://obsidianwow.com/sesm/www_WOWDB/power.js';	//(No slash at the end)
    
		 		
		
		
		
//Complete URL to the power.js
$config['WoWDB_JS'] = 'http://obsidianwow.com/www_WOWDB/power.js';
//$config['WoWDB_JS'] = 'http://static.wowhead.com/widgets/power.js';