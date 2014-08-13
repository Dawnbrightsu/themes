{$head}
	<body>
		<!--[if lte IE 8]>
			<style type="text/css">
				body {
					background-image:url(images/bg.jpg);
					background-position:top center;
				}
			</style>
		<![endif]-->
		<section id="wrapper">
			{$modals}
			<div class="accp_register">
            	{if $isOnline}
                	<a href="./ucp" id="accp_button"><h1>Account Panel</h1></a>
                	{else}
                    <a href="./register" id="register_button"><h1>Register</h1></a> 
                {/if}
            </div>
            
            <a id="server-logo" href="./" title=""><!--{$serverName}--></a>
            <div class="top_menu">
                <ul id="top_menu">
                    {foreach from=$menu_top item=menu_1}
                        <li><a {$menu_1.link}>{$menu_1.name}<p></p></a><span></span></li>
                    {/foreach}
                </ul>
            </div>
            	
			<div id="main">
				<div class="ice_ornament_slider"></div>
					<div class="ice_ornament_left_menu"></div>
				<aside id="left">
					<article>
						<ul id="left_menu">
							{foreach from=$menu_side item=menu_2}
								<li><a {$menu_2.link}><img src="{$image_path}bullet.png">{$menu_2.name}</a></li>
							{/foreach}
                            <li class="bot_shadow"></li>
						</ul>
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
					<section id="slider_bg" {if !$show_slider}style="display:none;"{/if}>
						<div id="slider">
							{foreach from=$slider item=image}
								<a href="{$image.link}"><img src="{$image.image}" title="{$image.text}"/></a>
							{/foreach}
						</div>
					</section>

					{$page}
				</aside>

				<div class="clear"></div>
			</div>
			<footer>
				<a href="http://ta6363237.deviantart.com/" id="logo" target="_blank" title="Coded by Dawnbrightsu"><p></p><span></span></a>
				<p></p><span></span>
             	<a href="http://www.fusion-hub.com/" id="dawn" target="_blank" title="Fusion Hub"><p></p><span></span></a>
				<p></p><span></span>
				Designed by REPLAY
				<p></p><span></span>
				<h3>&copy; Copyright {date("Y")} {$serverName}</h3>
			</footer>
		</section>
	</body>
</html>