<?php
if (!defined('init_pages'))
{	
	header('HTTP/1.0 404 not found');
	exit;
}

//$TPL->UnderConstruction('Armory');

//Set the title
$TPL->SetTitle('Armory');
//CSS
$TPL->AddCSS('template/style/page-support-all3.css');
$TPL->AddCSS('template/style/playerlayout.css');
//Print the header
$TPL->LoadHeader();

?>
<div class="content_holder">

 <div class="sub-page-title">
  <div id="title"><h1>Armory<p></p><span></span></h1></div>
 </div>

<div class="container_3 archived-news">

<div id="content" class="ArmoryContent">

<?php 
	
	include "armory/index.php"; 
	
?>

<!--<div class="armory-filtering">
<form action="#" method="get">
<input type="hidden" name="page" value="armory">
<input type="text" name="search" value="Search" onfocus="if (this.value == 'Search') this.value = '';" onblur="if (this.value == '') this.value = 'Search';">
<select name="realm">
<option value="0">ObsidianWoW</option>ObsidianWoW
</select>
<input type="submit" value="Search">
</form>
</div><center>
<div class="armory-info">
<br><br>
Please enter the full name of the character you are looking for in order to get the best results.
</div>-->
</div>
    
    

    
			
        


<?php
	$TPL->LoadFooter();
?>