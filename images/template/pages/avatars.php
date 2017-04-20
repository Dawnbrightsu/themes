<?php
if (!defined('init_pages'))
{	
	header('HTTP/1.0 404 not found');
	exit;
}

$CORE->loggedInOrReturn();

//Set the title
$TPL->SetTitle('Avatars');
//Print the header
$TPL->LoadHeader();

?>
<div class="content_holder">

    <div class="sub-page-title">
        <div id="title"><h1>Account Panel<p></p><span></span></h1></div>
      
        <div class="quick-menu">
            <a class="arrow" href="#"></a>
            <ul class="dropdown-qmenu">
                <li><a href="<?php echo $config['BaseURL']; ?>/index.php?page=store">Store</a></li>
                <li><a href="<?php echo $config['BaseURL']; ?>/index.php?page=teleporter">Teleporter</a></li>
                <li><a href="<?php echo $config['BaseURL']; ?>/index.php?page=buycoins">Buy Coins</a></li>
                <li><a href="<?php echo $config['BaseURL']; ?>/index.php?page=vote">Vote</a></li>
               
                <li><a href="<?php echo $config['BaseURL']; ?>/index.php?page=unstuck">Unstuck</a></li>
                
            </ul>
        </div>
    </div>
 
  	<div class="container_2 account" align="center">
     	<div class="cont-image">
  
            <div class="container_3 account_sub_header">
                <div class="grad">
                    <div class="page-title">Select Avatar</div>
                    <a href="<?php echo $config['BaseURL'], '/index.php?page=account'; ?>">Back to account</a>
                </div>
            </div>
      
            <!-- Store Activity -->
            <div class="store-activity">
            
                <div class="page-desc-holder">
                    ObsidianWoW offers a vast selection of avatars based on your race and class.<br/>
                    
                </div>
                
                <div class="container_3 account-wide" align="center">
                    <div class="avatars_groups">
                    <div id="dk"><h1>DEATHKNIGHT</h1></div>
					<div id="druid"><h1>DRUID</h1></div>
					<div id="hunter"><h1>HUNTER</h1></div>
					<div id="mage"><h1>MAGE</h1></div>
					<div id="paladin"><h1>PALADIN</h1></div>
					<div id="priest"><h1>PRIEST</h1></div>
					<div id="rogue"><h1>ROGUE</h1></div>
					<div id="shaman"><h1>SHAMAN</h1></div>
					<div id="warlock"><h1>WARLOCK</h1></div>
					<div id="warrior"><h1>WARRIOR</h1></div>
                    <?php
                    //Let's display our galleries
                    $storage = new AvatarGallery();
    
                    foreach ($storage->getGalleries() as $RequiredRank => $avatars)
                    {
                        $GalleryRank = new UserRank($RequiredRank);
                        
                        //make sure we have any avatars in this gallery
                        if (count($avatars) == 0)
                            continue;
                        
						//Staff avatars, skip for users
						if ($RequiredRank >= RANK_STAFF_MEMBER)
						{
							if ($CURUSER->getRank()->int() < RANK_STAFF_MEMBER)
								continue;
						}
						
                        echo '
                        <div class="avatars_group_holder ', ($CURUSER->getRank()->int() < $RequiredRank ? 'not_avaliable' : ''), '">
                           
							
                            <ul class="avatars_group">';
                            
                                //Loop the avatars in this gallery
                                foreach ($avatars as $id => $string)
                                {
                                    echo '
									<li class="avatar-box" ', (($CURUSER->getAvatar()->type() == AVATAR_TYPE_GALLERY && $CURUSER->getAvatar()->int() == $id) ? 'id="active"' : ''), '>
										<a href="#" data-avatar-id="', $id, '" class="clickable-avatar" style="background-image: url(./resources/avatars/', $string, ');"></a>
									</li>';
                                }
                                unset($id, $string);
                                
                                echo '
                                <div class="clear"></div>
                            </ul>
                        </div>';
                    }
                    
                    unset($storage, $RequiredRank, $avatars, $GalleryRank);
                    ?>
                    
                    </div>                      
                </div>
                            
            </div>
            <!-- Store Activity.End -->
        
        </div>
    </div>
 
</div>

<script type="text/javascript">
$(function()
{
	$('.clickable-avatar').click(function(e)
	{
		var avatarId = $(this).attr('data-avatar-id');
		
		//prevent clicking on the active one
		if (typeof $(this).parent().attr('id') != 'undefined' && $(this).parent().attr('id') == 'active')
			return false;
		
		//submit the new avatar for change
		$.get(
			$BaseURL + '/ajax.php?phase=16&id=' + avatarId,
			function(data)
			{
				//verify success
				if (data == 'OK')
				{
					//Find the active avatar
					$('.avatar-box#active').attr('id', null);
					//Activate the new
					$('.clickable-avatar[data-avatar-id="' + avatarId + '"]').parent().attr('id', 'active');
				}
				else
				{
					$.fn.WarcryAlertBox('open', '<p>' + data + '</p>');
				}
			}
		);
		
		return false;
	});
});
</script>

<?php

$TPL->LoadFooter();

?>