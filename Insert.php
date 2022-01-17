<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
   <?php
 $objconnec=oci_connect("system","1234","localhost/XE");
   $strSQL.=" INSERT INTO  DEPT";
  $strSQL.="( DEPTNO,DNAME,'LOC)";
   $strSQL.="VALUES";
  $strSQL.="(".$_POST["DeptNo"].",'".$_POST["DName"]."'";
    $strSQL.=",'".$_POST["Loc"]."')";
   $objParse=oci_parse($objConnect, $strSQL);
$objExecute=oci_execute($objParse, OCI_DEFAULT);
if($objExecute)   {
    oci_commit($objconnect);
	
   }
   else 
{
 oci_Rollback($objconnect );
  oci_error($objconnect );
  
}
     ?>
	 
<body>
</body>
</html>
