<?php
if (!defined('init_pages'))
{	
	header('HTTP/1.0 404 not found');
	exit;
}

//Set template parameters
$TPL->SetParameters(array(
	'title'		=> 'Home',
	'slider'	=> true,
	'topbar'	=> true
));
//Print the header
$TPL->LoadHeader();

?>

<div class="content_holder">

<?php

if ($config['IMPORTANT_NOTICE']['ENABLE'] == true)
{
	echo '
	<div class="important_notice">
		<p>'. $config['IMPORTANT_NOTICE']['MESSAGE'] .'</p>
	</div>
	';
}

?>

<!-- Main Side -->
<div class="main_side">
 
<!-- Index News -->
<div class="index_news">
   
   	<div class="welcome_to_warcry">
    	<h1>Welcome to Obsidian WoW</h1>
        <p>
        Obsidian is a quality warcraft server our aim is to provide you with a Blizzlike server in terms of rates/drops and stats but with custom content such as a custom raid ,custom chars ,custom mounts and a few other things like transmog etc. Register today!
        </p>
    </div>
   	
	<div class="news_container">
    	
        <ul class="header">
            <li><a href="<?php echo $config['BaseURL']; ?>/index.php?page=news">Archived News</a></li>
            
        </ul>
        <div class="clear"></div>
        
        <div class="active_latest_news">
        
			<?php
            //Get latest news
            $res = $DB->prepare("SELECT * FROM `news` ORDER BY `id` DESC LIMIT 1;");
            $res->execute();
            
			if ($res->rowCount() > 0)
			{
				$row = $res->fetch();
				
				echo '
				<div class="news_thumb_image"><img src="./uploads/news/thumbs/', $row['image'], '" /></div>
				<div class="news_content">
					<h1>', stripslashes($row['title']), '</h1>
					<h4>By <a href="#">', $row['authorStr'], '</a>, ', $CORE->convertDataTime($row['added']), '</h4>
					<p>', stripslashes($row['shortText']), '</p>
					<a class="readn_ln" href="?page=news&id=', $row['id'], '">Read More</a>
				</div>
				<div class="clear"></div>';
			}
			unset($res, $row);
			?>
            
        </div>
        
        <ul class="older_news">
        
        <?php
			$res = $DB->prepare("SELECT * FROM `news` ORDER BY `id` DESC LIMIT 1, 3;");
			$res->execute();
			
			while ($arr = $res->fetch())
			{
				echo '
				<li>
					<h2><a href="?page=news&id=', $arr['id'], '">', stripslashes($arr['title']), '</a></h2>
					<h4>by <a href="#">', $arr['authorStr'], '</a>, ', $CORE->convertDataTime($arr['added']), '</h4>
					<div class="line_sep"></div>
					<a class="rm" href="?page=news&id=', $arr['id'], '">Read More</a>
					<div class="hover_effect"></div>
				</li>';
			}
			unset($arr, $row);
		?>
        
        </ul>
    
	</div>
    
</div>
<!-- Index News.End -->

	<!-- SOCIAL Media -->
	
 	<!-- SOCIAL Media.End -->

    <!-- MEDIA -->
    
    	<div class="home_media">
        
        	<div class="new_trailer">
            	<div class="sub_header">
                	<h1></h1>
                    
                    <div class="clear"></div>
                </div>
                <div class="new_video_thumb">
                <?php
						//Define the chosen movie
						$ChooseMovieId = false;
						
						//Check if we have a chosen movie
						if (!$ChooseMovieId)
						{
							$res = $DB->query("SELECT `id` FROM `movies` ORDER BY `id` DESC LIMIT 1;");
							
							if ($res->rowCount() > 0)
							{
								$row = $res->fetch();
								//set chosen
								$ChooseMovieId = $row['id'];
								
								unset($row);
							}
							unset($res);
						}
						
						//get the chosen movie
						$res = $DB->prepare("SELECT `id`, `name`, `short_text`, `youtube`, `image`, `dirname` FROM `movies` WHERE `id` = :id LIMIT 1;");
						$res->bindParam(':id', $ChooseMovieId, PDO::PARAM_INT);
						$res->execute();
						
						if ($res->rowCount() > 0)
						{
							$row = $res->fetch();
								
							echo '
							<a title="', $row['name'], '" href="index.php?page=open-video&id=', $row['id'], '">
								<!--Video THUMB Preview-->
								<div class="image-thumb-preview" style="background-image:url(\'', $config['BaseURL'], '/uploads/media/movies/', $row['dirname'], '/thumbnails/index_', $row['image'], '\');"></div>
								<div class="play-button-small"></div>
							</a>';
						}
						unset($ChooseMovieId, $res);
					?>
                    </div>
                    
                    <div class="sub_header sreenshots">
                        <h1></h1>
                        <a href="<?php echo $config['BaseURL']; ?>/index.php?page=all-screenshots">All Screeshots</a>
                        <div class="clear"></div>
                	</div>
                    
                    
                
            </div>
        </div>
    
    <!-- MEDIA.End -->
    
    <!-- TOP VOTERS -->
        <div class="top_voters">
            <div class="sub_header">
                <h1></h1>
                <h2></h2>
            </div>
            
            <div class="cont_container">
            
            	<ul class="top_voters_list">
                <?php
				
				$year = date('Y');
				$month = date('n');
				
				$res = $DB->prepare("SELECT `account`, `counter` FROM `votecounter` WHERE `year` = :year AND `month` = :month ORDER BY `counter` DESC LIMIT 5;");
				$res->bindParam(':year', $year, PDO::PARAM_INT);
				$res->bindParam(':month', $month, PDO::PARAM_INT);
				$res->execute();
				
				$x = 1;
				
				while ($arr = $res->fetch())
				{
					$accid = $arr['account'];
					
					$res2 = $DB->prepare("SELECT `displayName` FROM `account_data` WHERE `id` = :acc LIMIT 1;");
					$res2->bindParam(':acc', $accid, PDO::PARAM_INT);
					$res2->execute();
					
					$arr2 = $res2->fetch();
					
					echo '
						<li>
							<p>', $x ,'</p>
							<a href="', $config['BaseURL'], '/index.php?page=profile&uid=', $accid, '">', $arr2['displayName'] ,'</a>
							<span>', $arr['counter'] ,' <i>Votes</i></span>
						</li>';
					$x++;
					unset($res2, $arr2, $accid);
				}
				unset($res, $x);
				
				?>
                <div class="gift_box">
                	<div class="gift_image"></div>
                    <h2>
                    Monthly rewards will be given to the Top Voters. 
                    25 silver coins for the Top 5 and an additional 5 gold coins for top 3.
                    </h2>
                </div>
            
            </div>
            
        </div>
    <!-- TOP VOTERS.End -->
    
    <div class="clear"></div>
    
</div>
<!-- Main side.End-->

<?php

//include the sidebar
include $config['RootPath'] . '/template/sidebar.php';

?>

<div class="clear"></div>

</div>

<!-- Include Social APIs -->
<div id="fb-root"></div>

<?php
	//Add some javascripts to the loader
	$TPL->AddFooterJs('template/js/page.homepage.js');
	$TPL->AddFooterJs('template/js/shadowbox.js');
	$TPL->AddFooterJs('template/js/init.custom.shadowbox.js');
	//print the footer
	$TPL->LoadFooter();
?>
