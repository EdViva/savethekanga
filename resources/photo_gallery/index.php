<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>savethekangaroo.com</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../../styles.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
-->
</style>
<script language="JavaScript" type="text/JavaScript">
<!--

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<style type="text/css">
<!--
-->
</style>
<style type="text/css">
<!--
-->
</style>
</head>
<body bgcolor="#333333">
<table width="640" height="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="maintableborder">
  <tr> 
    <td height="160" valign="top"> 
      <?
       include("../../ssi/header.txt"); 
       include("require.php"); 
       ?>
    </td>
  </tr>
  <tr> 
    <td valign="top" bgcolor="#FFFFFF" class="maincell"> <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td valign="top"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td class="headingtxt">PHOTO GALLERY </td>
              </tr>

              <tr> 
                <td valign="top"> 
                 <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr valign="top"> 
                      <td width="259"><img src="/images/gallery-montage.jpg" width="259" height="487"></td>
                      <td>
                  <?

	//retrive categories
	$query="SELECT * FROM $tablename WHERE parent='0'";
	$result=mysql_db_query ($dbname, $query, $link);
	while ($row=mysql_fetch_array ($result)){
	$parent=$row[parent];
	$cat=$row[cat];
	$catid=$row[catid];
		//Create link only if images exist in category
		$query3="SELECT * FROM $table2name WHERE catid='$catid'";
		$result3=mysql_db_query ($dbname, $query3, $link);
		$num_rows = mysql_num_rows($result3); 	
		if ($num_rows){
		$alink="<a href=\"thumbnails.php?catid=$catid&parent=$parent\">";
		$alink2="</a>";
		}
	
	print "$alink<strong>$cat</strong>$alink2<br>";

		//retrieve sub categories
		$query="SELECT * FROM $tablename WHERE parent='$catid' ORDER BY catid DESC";
		$result2=mysql_db_query ($dbname, $query, $link);
		print "<ul>\n";
		while ($row2=mysql_fetch_array ($result2)){
		$parent=$row2[parent];
		$cat=$row2[cat];
		$catid=$row2[catid];
		print "<li><a href=\"thumbnails.php?catid=$catid&parent=$parent\">$cat</a></li>\n";
		}
		print "</ul>\n";
	
	}
?>
                </td>
              </tr>
            </table></td>
              </tr>
            </table></td>
          <td width="130" valign="top" class="smalltext">     
           <? 
      include ("../../ssi/resources_sidebar.txt"); 
      ?>
      </td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td height="5" valign="top" bgcolor="#FFFFFF"> 
      <? 
      include ("../../ssi/footer.txt"); 
      ?>
    </td>
  </tr>
</table>
</body>
</html>
