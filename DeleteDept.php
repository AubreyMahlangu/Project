<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<?php
	$objConnect=oci_connect("system","1234","localhost/XE");
$strSQL="DELETE FROM Departments ";
$strSQL.="WHERE DEPARTMENT_ID = ".$_GET["DEPARTMENT_ID"];
$objParse=oci_parse($objConnect, $strSQL);
$objExecute=oci_execute($objParse, OCI_DEFAULT);
if($objExecute)
{
oci_commit($objConnect); //*** Commit Transaction ***//
echo "Record Deleted.";
}
else
{
oci_rollback($objConnect); //*** RollBack Transaction ***//
$e =oci_error($objParse);
echo "Error Deleting [".$e['message']."]";
}
oci_close($objConnect);
?>






<body>
</body>
</html>
