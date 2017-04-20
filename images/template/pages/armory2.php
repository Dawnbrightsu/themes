<?php
if (!defined('AXE'))
        exit;
 
//common include
$box_simple_wide = new Template("styles/".$style."/box_simple_wide.php");
$box_wide = new Template("styles/".$style."/box_wide.php");
$box_wide->setVar("imagepath", 'styles/'.$style.'/images/');
$box_simple_wide->setVar("imagepath", 'styles/'.$style.'/images/');
//end common include
 
include "dataVariables.php";
 
$cont2.= "<div id='armory'><form action='' method='get'><input type='hidden' name='name' value='armory'><input type='text' name='char' value='".$_GET['char']."' placeholder='Look for character...'><div id='log-b'><input type='submit' value='Search'></div></form><br><br>";
if($_GET['char']){
        $char = mysql_real_escape_string($_GET['char']);
       
function wowhead_did($item) {  
mysql_select_db('world');  
$sql = mysql_query("SELECT displayid FROM item_template WHERE entry = '$item'");  
$displayid = mysql_result($sql, 0);  
return $displayid;}  
 
$db->select_db($realm[1]['db']);
$charData = $db->query("SELECT * FROM characters WHERE name='$char'");
        while($row = mysql_fetch_array($charData)){
                $status = array('offline','online');
                $guid = $row['guid'];
                $gender = $row['gender'];
                $status = $status[$row['online']];
                $cont2.= "<li><div class='avatar'><img class='ava' src='./images/portraits/wow-default/".$row['gender']."-".$row['race']."-".$row['class'].".gif' border='0'></div>";
                $cont2.="<h2>".$row['name']." <span class='charStatus' data-status='".$status."'>(".$status.")</span></h2>";
                $cont2.="<span class='description'><b>".$row['level']."</b> ".$raceList[round($row['race'])]." <span style='color:".$colorList[round($row['class'])]."'><b>".$classList[round($row['class'])]."</b></span></span><br><div class='healthBar'>Health: <b>".$row['health']."</b></div>";
                if($energyList[$row['class']]=='mana'){
                        $cont2.="<div class='manaBar'>Mana: <b>".$row['power1']."</b></div><br><h2>Items</h2>";
                }
                $currentSlot = 0;
                foreach($slotLocation as $item){
                        if($currentSlot == 0){
                        $cont2.= "<div class='left'>"; 
                        }
                        if($currentSlot == 9){
                        $cont2.= "<div class='right'>";
                        }
                        $itemAvailable = false;
                        $cont2.= "<b>".$item."</b><br>";
                                $db->select_db($realm[1]['db']);
                                $itemData = $db->query("SELECT * FROM character_inventory WHERE guid='$guid' AND slot='$currentSlot' AND bag = 0");
                                while($itemInf = mysql_fetch_array($itemData)){
                                        $itemSearchID = $itemInf['item'];
                                       
                                        $db->select_db($realm[1]['db']);
                                        $itemData2 = $db->query("SELECT * FROM item_instance WHERE guid='$itemSearchID'");
                                       
                                        while($row2 = mysql_fetch_array($itemData2)){
                                                $curItemID =$row2['itemEntry'];
                                               
                                                if($currentSlot == 0) {$headDid = wowhead_did($row2['itemEntry']); }
                                                if($currentSlot == 2) {$shoulderDid = wowhead_did($row2['itemEntry']); }
                                                if($currentSlot == 4) {$chestDid = wowhead_did($row2['itemEntry']); }
                                                if($currentSlot == 5) {$beltDid = wowhead_did($row2['itemEntry']); }
                                                if($currentSlot == 6) {$legsDid = wowhead_did($row2['itemEntry']); }
                                                if($currentSlot == 7) {$feetDid = wowhead_did($row2['itemEntry']); }
                                                if($currentSlot == 8) {$wristDid = wowhead_did($row2['itemEntry']); }
                                                if($currentSlot == 9) {$glovesDid = wowhead_did($row2['itemEntry']); }
                                                if($currentSlot == 14) {$backDid = wowhead_did($row2['itemEntry']); }
                                                if($currentSlot == 15) {$mainhandDid = wowhead_did($row2['itemEntry']); }
                                                if($currentSlot == 16) {$offhandDid = wowhead_did($row2['itemEntry']); }
                                               
                                               
                                                mysql_select_db('world');  
                                                $sql2 = mysql_query("SELECT name,entry,quality FROM item_template WHERE entry = '$curItemID'");
                                                while($row2 = mysql_fetch_array($sql2)){
                                                $cont2.="<a style='color:".$qualityColor[$row2['quality']]."; font-weight:normal;' href='http://wotlk.openwow.com/?item=".$row2['entry']."'>".$row2['name']."</a><br>";
                                                }
                                                $itemAvailable = true;
                                        }
                                }
                        if(!$itemAvailable){
                                $cont2.= "(not equiped)<br>";
                        }
                        $cont2.="<br>";
                        if($currentSlot == 18){
                        $cont2.= "</div><div class='clear'></div>";    
                        }
                        if($currentSlot == 8){
                        $cont2.= "</div>";     
                        }
                        $currentSlot++;
                       
                }
                $cont2.="</li><br><h2>3D View of Character:";
               
$char_race = array(  
1 => 'human',  
2 => 'orc',  
3 => 'dwarf',  
4 => 'nightelf',  
5 => 'scourge',  
6 => 'tauren',  
7 => 'gnome',  
8 => 'troll',  
10 => 'bloodelf',  
11 => 'draenei');  
 
$char_gender = array(  
0 => 'male',  
1 => 'female');  
 
                $cont2.='<div id="model_scene" align="center">  
<object id="wowhead" type="application/x-shockwave-flash" data="http://static.wowhead.com/modelviewer/ModelView.swf" height="580px" width="750px">  
<param name="quality" value="high">  
<param name="allowscriptaccess" value="always">  
<param name="menu" value="false">  
<param value="transparent" name="wmode">  
<param name="flashvars" value="model='.$char_race[$row['race']].$char_gender[$gender].'&amp;modelType=16&amp;ha=0&amp;hc=0&amp;fa=0&amp;sk=0&amp;fh=0&amp;fc=0&amp;contentPath=http://static.wowhead.com/modelviewer/&amp;blur=1&amp;equipList=1,'.$headDid.',3,'.$shoulderDid.',16,'.$backDid.',5,'.$chestDid.',9,'.$wristDid.',10,'.$glovesDid.',6,'.$beltDid.',7,'.$legsDid.',8,'.$feetDid.',14,'.$offhandDid.',21,'.$mainhandDid.'">  
<param name="movie" value="http://static.wowhead.com/modelviewer/ModelView.swf">  
</object>  
</div>';
        }
}
$cont2.= "</div>";
 
$box_wide->setVar("content_title", "Armory");  
$box_wide->setVar("content", $cont2);                                  
print $box_wide->toString();           
 
 
 
?>
 
// dataVariables.php (should be in the same folder as armory.php (modules/ folder of WebWoW)
 
<?php
 
$classList = array(
'1'=>'Warrior',
'2'=>'Paladin',
'3'=>'Hunter',
'4'=>'Rogue',
'5'=>'Priest',
'6'=>'Death Knight',
'7'=>'Shaman',
'8'=>'Mage',
'9'=>'Warlock',
'11'=>'Druid'
);
 
$energyList = array(
'1'=>'rage',
'2'=>'mana',
'3'=>'mana',
'4'=>'energy',
'5'=>'mana',
'6'=>'runicpower',
'7'=>'mana',
'8'=>'mana',
'9'=>'mana',
'11'=>'mana'
);
 
$colorList = array(
'1'=>'#C79C6E',
'2'=>'#F58CBA',
'3'=>'#ABD473',
'4'=>'#FFF569',
'5'=>'#FFFFFF',
'6'=>'#C41F3B',
'7'=>'#0070DE',
'8'=>'#69CCF0',
'9'=>'#9482C9',
'11'=>'#FF7D0A'
);
 
 
$raceList = array(
'1'=>'Human',
'2'=>'Orc',
'3'=>'Dwarf',
'4'=>'Night Elf',
'5'=>'Undead',
'6'=>'Tauren',
'7'=>'Gnome',
'8'=>'Troll',
'9'=>'Goblin',
'10'=>'Blood Elf',
'11'=>'Draenei',
'12'=>'Fel Orc',
'13'=>'Naga',
'14'=>'Broken',
'15'=>'Skeleton',
'16'=>'Vrykul',
'17'=>'Tuskarr',
'18'=>'Forest Troll',
'19'=>'Taunka',
'20'=>'Northrend Skeleton',
'21'=>'Ice Troll'
);
 
$slotLocation = array(
'0'=>'Head',
'1'=>'Neck',
'2'=>'Shoulders',
'3'=>'Body',
'4'=>'Chest',
'5'=>'Waist',
'6'=>'Legs',
'7'=>'Feet',
'8'=>'Wrists',
'9'=>'Hands',
'10'=>'Finger 1',
'11'=>'Finger 2',
'12'=>'Trinket 1',
'13'=>'Trinket 2',
'14'=>'Back',
'15'=>'Main Hand',
'16'=>'Off Hand',
'17'=>'Ranged',
'18'=>'Tabard',
);
 
$qualityColor = array (        
 '0'=>'gray',    
 '1'=>'white',  
 '2'=>'#25FF16',  
 '3'=>'#0070AC',  
 '4'=>'#A335EE',  
 '5'=>'#FF8000',  
 );