<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<form
action="UpdateDept.php?DEPARTMENT_ID=<?=$_GET["DEPARTMENT_ID"];?> "method="post">
<?php
$objConnect=oci_connect("system","1234","localhost/XE");
$strSQL="SELECT * FROM Departments WHERE DEPARTMENT_ID =".$_GET["DEPARTMENT_ID"];
$objParse=oci_parse ($objConnect,$strSQL);
oci_execute($objParse,OCI_DEFAULT);
$objResult=oci_fetch_array($objParse);
if(!$objResult)
{
echo "The Department ID ".$_GET["DEPARTMENT_ID"]." not found";
}
else
{
?>
<table width="600"border="1">
<tr>
<th width="120"><div align="center">DEPARTMENT_ID </div></th>
<th width="120"><div align="center">DEPARTMENT_NAME </div></th>
<th width="120"><div align="center">MANAGER_ID </div></th>
<th width="120"><div align="center">LOCATION_ID </div></th>

</tr>

<tr>
<td><input type="text"name="txtDeptnid"size="20"value="<?=$objResult["DEPARTMENT_ID"];?>"></div></td>


<td><input type="text"name="txtDeptname"size="20"value="<?=$objResult["DEPARTMENT_NAME"];?>"></div></td>


<td > <input type="text"name="txtManager"size="20"value="<?=$objResult["MANAGER_ID"];?>"></td>

<td ><input type="text"name="txtloc"size="20"value="<?=$objResult["LOCATION_ID"];?>"></td>

</tr>
</table>
<input type="submit" name="Update"value="Update">
<?php
 }
oci_close($objConnect);
?>
</form>







<body>
</body>
</html>
