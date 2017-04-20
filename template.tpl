{$head}
<script type="text/javascript" src="{$image_path}resources/min/?f=template/js/jquery-1.7.js,template/js/custom.js,template/js/alertbox.js,template/js/jquery.cycle.all.js,template/js/jquery.easing.1.3.js,template/js/video.bg.js"></script>
<body>
	<!--[if lte IE 8]>
                        <style type="text/css">
                                body {
                                        background-image:url(images/bg.jpg);
                                        background-position:top center;
                                }
                        </style>
                <![endif]-->
                <section id="header-wrapper">
				<div class="login_box_top">
                    	<div class="actions_cont">
                        
                        	{if $isOnline}
                            	<div class="account_info">
                                	
                                    <!-- Avatar -->
                                    	<div class="avatar_top">
                                            <img src="{$CI->user->getAvatar()}" width="50" height="50"/>
                                            <span></span>
                                        </div>
                                    <!-- Avatar . End -->
                                    
                                    <!-- Welcome & VP/DP -->
                                	<div class="left">
                                    
                                        <p>Welcome back, <span>{$CI->user->getUsername()}</span>!</p>
                                        <div class="vpdp">
                                        
                                        	<div class="vp">
                                           		<img src="{$url}application/images/icons/lightning.png" align="absmiddle" width="12" height="12" /> VP
                                                <span>{$CI->user->getVp()}</span>
                                            </div>
                                            <div class="dp">
                                           		<img src="{$url}application/images/icons/coins.png" align="absmiddle" width="12" height="12"  /> DP
                                                <span>{$CI->user->getDp()}</span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!-- Welcome & VP/DP . End-->
                                    	<div class="right">
                                        	<a href="{$url}ucp" class="nice_button">User panel</a>
											<a href="{$url}messages" class="nice_button">PM</a>
                                            <a href="{$url}vote" class="nice_button">Vote</a>
											<a href="{$url}logout" class="nice_button">Log out</a>
                                        </div>
                                    <!-- Account Panel & Logout -->
                                    
                                </div>
                            {else}
                            	<div class="login_form_top">
                                    {form_open('login')}
                                            <input type="text" name="login_username" id="login_username" value="" placeholder="Username">
                                            <input type="password" name="login_password" id="login_password" value="" placeholder="Password">
                                            <input type="submit" name="login_submit" value="Login">
											<a href="{$url}register" class="nice_button">Register</a>
                                    </form>
									
                            	</div>
                            {/if}
                        
                                        
                                </form>
                        </div>
                </section>
				<!-- TextSlider -->
			<script type="text/javascript">
				$(function() {
					$("#IndexTextFader img").css({
						opacity: 0
					});
					setTimeout(function() {
						$("#IndexTextFader").cycle({
						random: 1,
						delay: -6000
					});
					$("#IndexTextFader img").css({
						opacity: 0
					});
					}, 1000);
				}); 
			</script>
			<div class="ForumsTextFader" id="IndexTextFader">
				<img src="{$image_path}boosts.png" style="opacity:0;"/>
				<img src="{$image_path}icc.png" style="opacity:0;"/>
				<img src="{$image_path}teleporter.png" style="opacity:0;"/>
				<img src="{$image_path}voters.png" style="opacity:0;"/>
				<img src="{$image_path}xprate.png" style="opacity:0;"/>
			</div>
			<!-- TextSlider.End -->	
                <section id="wrapper">
                        
 

 
 
                        <div class="top_menu">
                                <ul id="top_menu">
                                                                                        
				{foreach from=$menu_top item=menu_1}
					<li><a {$menu_1.link}>{$menu_1.name}</a></li>
				{/foreach}
			</ul>
                        </div>
						<article>
        <h1 class="status2">Realm Status</h1>
        <section class="status">
            <section id="update_status" style="display: block;">
                <div class="realm">
                    <div class="realm_online"></div>


                    		
                    		
                    		

                    <div class="realm_bar">
                        <div class="realm_bar_fill" style="width:0%"></div>
                    </div>
                    


                    			

                    			
                </div>
                
                <div id="realmlist">

                    

                </div>
            </section>
            <script type="text/javascript">


                	var Status = {
		statusField: $("#update_status"),
		
		/**
		 * Refresh the realm status
		 */
		update: function()
		{
			$.get(Config.URL + "sidebox_status/status_refresh", function(data)
			{
				Status.statusField.fadeOut(300, function()
				{
					Status.statusField.html(data);
					Status.statusField.fadeIn(300);
				})
			});
		}
	}

	Status.update();

            </script>
        </section>
    </article>
				   
                        <div id="top_info">
                       
                        </div>
                        <div id="main">                                                                                                                                 
                                       
                        <aside id="left">
                                <article>
                                        <h1 class="top-menu"><p> </p></h1>
                                        <section class="body-menu">
                                        <ul id="left_menu">
                                                                                          <ul id="left_menu">
							{foreach from=$menu_side item=menu_2}
								<li><a {$menu_2.link}><img src="{$image_path}bullet.png">{$menu_2.name}</a></li>
							{/foreach}
						</ul>              
                                                                                        </ul>
                                        </section>
                                        <h1 class="bot-menu"><p> </p></h1>
                                </article>
                                    

					{foreach from=$sideboxes item=sidebox}
						<article>
							<h1 class="top">{$sidebox.name}</h1>
							<section class="body">
								{$sidebox.data}
							</section>
						</article>
					{/foreach}
				</aside>

				<aside id="right">
					

					{$page}
				</aside>

				<div class="clear"></div>
			</div>
			<footer>
				<p>&copy; Copyright {date("Y")} {$serverName}</p>
			</footer>
		</section>
	</body>
</html>