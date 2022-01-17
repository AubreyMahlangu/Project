<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>
<?php
$objConnect=oci_connect("system","1234","localhost/XE");

$strSQL="UPDATE DEPARTMENTS SET ";
$strSQL.="DEPARTMENT_ID  = ".$_POST["txtDeptnid"];
$strSQL.=",DEPARTMENT_NAME ='".$_POST["txtDeptname"]."' ";
$strSQL.=",MANAGER_ID = '".$_POST["txtManager"]."'";
$strSQL.=",LOCATION_ID = '".$_POST["txtloc"]."'";
$strSQL.="WHERE DEPARTMENT_ID = ".$_GET["DEPARTMENT_ID"];
$objParse=oci_parse($objConnect, $strSQL);
$objExecute=oci_execute($objParse, OCI_DEFAULT);

if($objExecute)
{
oci_commit($objConnect);
echo "Record updated successfully.";
}
else
{
oci_rollback($objConnect); 
$e =oci_error($objParse);
echo "Error Updating [".$e['message']."]";
}
oci_close($objConnect);
?>



</body>
</html>
