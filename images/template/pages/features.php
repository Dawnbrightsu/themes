

<?php
    if (!defined('init_pages'))
    {      
            header('HTTP/1.0 404 not found');
            exit;
    }
     
    //Set the title
    $TPL->SetTitle('Online Players');
    //CSS
    $TPL->AddCSS('template/style/page-support-all2.css');
    //Print the header
    $TPL->LoadHeader();
     
    ?>
    <div class="content_holder">
     
     <div class="sub-page-title">
      <div id="title"><h1>Online Players<p></p><span></span></h1></div>
     </div>
     
            <div class="container_3 archived-news">
                   
    <?php                  
    $host="localhost";
    $user="root";
    $pass="n7NALms9mY7L5N2";
    $db="characters";
    $con = mysql_connect("$host","$user","$pass");
    if (!$con)
      {
      die('Could not connect: ' . mysql_error());
      }
    $whosonline = '<br><table width="100%">
   
                    ';
    $get_online_char = mysql_query("SELECT * FROM $db.characters WHERE online='1'");
    while($g_o_c = mysql_fetch_array($get_online_char))
    {
	$prof1 = "None";
	$prof1val = "0";
	$prof1max = "0";
	$prof2 = "None";
	$prof2val = "0";
	$prof2max = "0";
    $whosonline .= "<tr>
                          <td align=center><a href='index.php?page=armory&PlayerGUID={$g_o_c['guid']}'>{$g_o_c['name']}</a></td>
                                          <td align=center>{$g_o_c['level']}</td>
                                          <td align=center><img src='/stats/images/race/{$g_o_c['race']}-{$g_o_c['gender']}.gif'></td>
                                          <td align=center><img src='/stats/images/class/{$g_o_c['class']}.gif'></td>";
										                $getprof = mysql_query("SELECT * FROM $db.character_skills WHERE guid='" . $g_o_c['guid'] . "'");
                                                        while($gp = mysql_fetch_array($getprof))
                                                        {
                                                            if ( $gp['skill'] == 186 ) //Mining
															{
																if ( $prof1 == "None" )
																{
																	$prof1 = "Mining";
																	$prof1val = $gp['value'];
																	$prof1max = $gp['max'];
																}
																else
																{
																	$prof2 = "Mining";
																	$prof2val = $gp['value'];
																	$prof2max = $gp['max'];
																}
															}
															if ( $gp['skill'] == 182 ) //Herbalism
															{
																if ( $prof1 == "None" )
																{
																	$prof1 = "Herbalism";
																	$prof1val = $gp['value'];
																	$prof1max = $gp['max'];
																}
																else
																{
																	$prof2 = "Herbalism";
																	$prof2val = $gp['value'];
																	$prof2max = $gp['max'];
																}
															}
															if ( $gp['skill'] == 755 ) //Jewelcrafting
															{
																if ( $prof1 == "None" )
																{
																	$prof1 = "Jewelcrafting";
																	$prof1val = $gp['value'];
																	$prof1max = $gp['max'];
																}
																else
																{
																	$prof2 = "Jewelcrafting";
																	$prof2val = $gp['value'];
																	$prof2max = $gp['max'];
																}
															}
															if ( $gp['skill'] == 164 ) //Blacksmithing
															{
																if ( $prof1 == "None" )
																{
																	$prof1 = "Blacksmithing";
																	
																}
																else
																{
																	$prof2 = "Blacksmithing";
																	$prof2val = $gp['value'];
																	$prof2max = $gp['max'];
																}
															}
															if ( $gp['skill'] == 333 ) //Enchanting
															{
																if ( $prof1 == "None" )
																{
																	$prof1 = "Enchanting";
																	$prof1val = $gp['value'];
																	$prof1max = $gp['max'];
																}
																else
																{
																	$prof2 = "Enchanting";
																	$prof2val = $gp['value'];
																	$prof2max = $gp['max'];
																}
															}
															if ( $gp['skill'] == 773 ) //Inscription
															{
																if ( $prof1 == "None" )
																{
																	$prof1 = "Inscription";
																	$prof1val = $gp['value'];
																	$prof1max = $gp['max'];
																}
																else
																{
																	$prof2 = "Inscription";
																	$prof2val = $gp['value'];
																	$prof2max = $gp['max'];
																}
															}
															if ( $gp['skill'] == 202 ) //Engineering
															{
																if ( $prof1 == "None" )
																{
																	$prof1 = "Engineering";
																	$prof1val = $gp['value'];
																	$prof1max = $gp['max'];
																}
																else
																{
																	$prof2 = "Engineering";
																	$prof2val = $gp['value'];
																	$prof2max = $gp['max'];
																}
															}
															if ( $gp['skill'] == 197 ) //Tailoring
															{
																if ( $prof1 == "None" )
																{
																	$prof1 = "Tailoring";
																	$prof1val = $gp['value'];
																	$prof1max = $gp['max'];
																}
																else
																{
																	$prof2 = "Tailoring";
																	$prof2val = $gp['value'];
																	$prof2max = $gp['max'];
																}
															}
															if ( $gp['skill'] == 165 ) //Leatherworking
															{
																if ( $prof1 == "None" )
																{
																	$prof1 = "Leatherworking";
																	
																}
																else
																{
																	$prof2 = "Leatherworking";
																	
																}
															}
															if ( $gp['skill'] == 393 ) //Skinning
															{
																if ( $prof1 == "None" )
																{
																	$prof1 = "Skinning";
																	$prof1val = $gp['value'];
																	$prof1max = $gp['max'];
																}
																else
																{
																	$prof2 = "Skinning";
																	$prof2val = $gp['value'];
																	$prof2max = $gp['max'];
																}
															}
															if ( $gp['skill'] == 171 ) //Alchemy
															{
																if ( $prof1 == "None" )
																{
																	$prof1 = "Alchemy";
																	$prof1val = $gp['value'];
																	$prof1max = $gp['max'];
																}
																else
																{
																	$prof2 = "Alchemy";
																	$prof2val = $gp['value'];
																	$prof2max = $gp['max'];
																}
															}
                                                        }
														//197
														$whosonline .= "<td align=center><img src='/stats/images/professions/{$prof1}.gif'></td>";
														$whosonline .= "<td align=center><img src='/stats/images/professions/{$prof2}.gif'></td>";														
                                                        $getzone = mysql_query("SELECT * FROM $db.ZoneTable WHERE ID='" . $g_o_c['zone'] . "'");
                                                        while($gz = mysql_fetch_array($getzone))
                                                        {
                                                                $whosonline .= "<td align=center>{$gz['Zone']}</td></tr>";
                                                        }                                          
    }
    echo $whosonline;
    print'</table></div></div></td>';
    mysql_close($con);
    ?>
    </div>
    <?php
            $TPL->LoadFooter();
    ?>