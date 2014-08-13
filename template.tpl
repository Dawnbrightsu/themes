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
                <a id="server_logo" href="./" title="{$serverName}"><p>{$serverName}</p></a>
			<ul id="top_menu">
				{foreach from=$menu_top item=menu_1}
					<li><a {$menu_1.link}>{$menu_1.name}</a></li>
				{/foreach}
			</ul>
			<div id="main">
				<aside id="left">
					<article>
						<h1 class="top"></h1>
						<ul id="left_menu">
							{foreach from=$menu_side item=menu_2}
								<li><a {$menu_2.link}><img src="{$image_path}bullet.png">{$menu_2.name}</a></li>
							{/foreach}
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
							<div id="slider_frame">
							{foreach from=$slider item=image}
								<a href="{$image.link}"><img src="{$image.image}" title="{$image.text}"/></a>
							{/foreach}
							</div>
						</div>
					</section>

					{$page}
				</aside>
			</div>
			<center><footer>
				<ul3>
				Coded by <a href="http://ta6363237.deviantart.com/">Dawnbrightsu</a>
				</ul3>
                <ul2>
                	<li><a href="<?php echo $config['BaseURL']; ?>/index.php?page=all-wallpapers">Wallpapers</a></li>
                    <li><a href="<?php echo $config['BaseURL']; ?>/index.php?page=all-videos">Videos</a></li>
                </ul2>
                
                <ul>
                    <li><a href="<?php echo $config['BaseURL']; ?>/forums/">Forums</a></li>
                    <li><a href="<?php echo $config['BaseURL']; ?>/index.php?page=home">Support</a></li>
                </ul>
                
            	<ul>
                	<li><a href="<?php echo $config['BaseURL']; ?>/index.php">Home</a></li>
                    <li><a href="<?php echo $config['BaseURL']; ?>/index.php?page=changelogs">Vote</a></li>
                </ul>
        </div>
			</footer></center>
		</section>
	</body>
<link href='http://fonts.googleapis.com/css?family=Federant' rel='stylesheet' type='text/css'>
</html>