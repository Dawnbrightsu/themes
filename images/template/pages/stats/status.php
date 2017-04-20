<?php
$host="127.0.0.1";
$user="root";
$pass="n7NALms9mY7L5N2";
$db="characters";
$con = mysql_connect("$host","$user","$pass");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
$whosonline = '<br><table width="100%">
                 <tr>
                   <td align="center"><u>Name</u></td>
                   <td align="center"><u>Level</u></td>
                   <td align="center"><u>Race</u></td>
                   <td align="center"><u>Class</u></td>
                </tr>';
$get_online_char = mysql_query("SELECT * FROM $db.characters WHERE online='1'");
while($g_o_c = mysql_fetch_array($get_online_char))
{
$whosonline .= "<tr>
	                  <td align=center>{$g_o_c['name']}</td>
					  <td align=center>{$g_o_c['level']}</td>
					  <td align=center><img src='/stats/images/race/{$g_o_c['race']}-{$g_o_c['gender']}.gif'></td>
					  <td align=center><img src='/stats/images/class/{$g_o_c['class']}.gif'></td>					  
	                </tr>";}
echo $whosonline;
print'</table></div></div></td>';
mysql_close($con);
?>