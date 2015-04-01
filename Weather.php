<?php
error_reporting(0);
$Link = array();
$Link[] = 'images/xml/HCM.xml';
$Link[] = 'images/xml/Sonla.xml';
$Link[] = 'images/xml/Haiphong.xml';
$Link[] = 'images/xml/Hanoi.xml';
$Link[] = 'images/xml/Vinh.xml';
$Link[] = 'images/xml/Danang.xml';
$Link[] = 'images/xml/Nhatrang.xml';
$Link[] = 'images/xml/Pleicu.xml';

$Link2 = array();
$Link2[] = 'http://vnexpress.net/ListFile/Weather/HCM.xml';
$Link2[] = 'http://vnexpress.net/ListFile/Weather/Sonla.xml';
$Link2[] = 'http://vnexpress.net/ListFile/Weather/Haiphong.xml';
$Link2[] = 'http://vnexpress.net/ListFile/Weather/Hanoi.xml';
$Link2[] = 'http://vnexpress.net/ListFile/Weather/Vinh.xml';
$Link2[] = 'http://vnexpress.net/ListFile/Weather/Danang.xml';
$Link2[] = 'http://vnexpress.net/ListFile/Weather/Nhatrang.xml';
$Link2[] = 'http://vnexpress.net/ListFile/Weather/Pleicu.xml';

$id= isset($_GET['id'])?intval($_GET['id']):0;
$content = file_get_contents($Link2[$id]);
if($content=='')
{
	$content = file_get_contents($Link[$id]);
}
$p = xml_parser_create();
xml_parse_into_struct($p, $content, $xml);
xml_parser_free($p);
?>
<table cellpadding="0" cellspacing="0">
<tr><td>
<img src="http://vnexpress.net/Images/Weather/<?php echo $xml[1]['value']; ?>" align="left" />
<img src="images/weather/<?php echo $xml[3]['value']; ?>" align="left" />
<img src="images/weather/<?php echo $xml[5]['value']; ?>" align="left" />
<img src="images/weather/c.gif" />
</td>
</tr>
<tr>
<td>
<?php echo $xml[13]['value']; ?>
</td>
</tr>
</table>
