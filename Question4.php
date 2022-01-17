<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php
$filename = "Manager.txt";
$file = fopen( $filename, "w" );
if( $file == false )
{
echo ( "Error in opening new file" );
exit();
}

$objConnect = oci_connect("system","1234","localhost/XE");

// Excute the call to the PL/SQL stored procedure
$objParse=oci_parse($objConnect, "call get_emp_report(:rc)");
$refcur=oci_new_cursor($objConnect); 
oci_bind_by_name($objParse, ':rc', $refcur, -1, OCI_B_CURSOR);
oci_execute($objParse);

// Execute and fetch from the cursor
oci_execute($refcur);

$olddeptno = 0;
fwrite($file, "REPORT: Manager Information 	GENERATED ON: ". date('d-m-y') . "\r\n");
fwrite($file, "Manager      Job    Department     No of Staff ");


while($row = oci_fetch_array($refcur, OCI_ASSOC)) { 
$newdeptno = $row['DEPARTMENT_ID'];
if ($newdeptno <> $olddeptno){
$Header = "\r\n" . $newdeptno . "-" . $row['MFNAME']." ".$row['MLNAME'] . " " . $row['JOB_TITLE'] . "" . $row['DEPARTMENT_NAME'] . "  " .$row['STAFF'] . "\r\n";
fwrite($file, $Header);
}

$olddeptno = $newdeptno;
}
fwrite($file, "\r\n" . "*** END OF REPORT ***");
fclose( $file );

echo("Report Sucessfully Created ");

?>

<body>
</body>
</html>
