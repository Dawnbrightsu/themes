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
				<a id="slide"></a>
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

				<div class="clear"></div>
			</div><footer>
				<ul3><a href="https://fusion-hub.com/" id="logo" target="_blank"></a>
				ALL RIGHTS RESERVED &copy; <a href="news">{$serverName}</a>
				<p2>Coded by <a href="http://ta6363237.deviantart.com/">Dawnbrightsu</a> Designed by <a href="http://zafirehd.deviantart.com/">Zafire</a></p2>
				</ul3>                
                <ul2>
                    <li><a href="forum">FORUMS</a></li>
                    <li><a href="page/connect">GUIDE</a></li>
                </ul2>
                
                <ul>
                    <li><a href="register">REGISTER</a></li>
                    <li><a href="armory">ARMORY</a></li>
                </ul>
                
            	<ul>
                	<li><a href="news">HOME</a></li>
                    <li><a href="serverinfo">INFO</a></li>
                </ul>
        </div>
			</footer>
		</section>
	</body>
<link href='http://fonts.googleapis.com/css?family=Federant' rel='stylesheet' type='text/css'>
</html>