<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php
$objConnect = oci_connect("system","1234","localhost/XE");
if (isset($_POST['btnRemove'])){
	if(count($_POST["chkBox"]) > 0){
		for($i=0;$i<count($_POST["chkBox"]);$i++){
           if($_POST["chkBox"][$i] != ""){
		   
			   $strSQL = "SELECT COUNT(EMPLOYEE_ID) TOTAL FROM EMPLOYEES WHERE EMPLOYEE_ID = ".$_POST["chkBox"][$i];
               $objParse = oci_parse($objConnect, $strSQL);	
               $objExecute = oci_execute($objParse);
			   $objResult = oci_fetch_array($objParse);
			   $count = $objResult["TOTAL"];
			   if ($count <= 0){	
               		$strSQL = "DELETE FROM EMPLOYEES WHERE EMPLOYEE_ID = ".$_POST["chkDel"][$i];
               		$objParse1 = oci_parse($objConnect, $strSQL);	
               		$objExecute1 = oci_execute($objParse1);
					if($objExecute1)
						echo "EMPLOYEE_ID No: " .$_POST["chkDel"][$i]. " deleted successfully.\n";
			   }else
			   		echo "EMPLOYEE_ID No: " .$_POST["chkDel"][$i]. " has employees attached.\n";	
            }
        }
	}else{
		echo "Please select any record(s) you want to delete.\n";}
}elseif(isset($_POST['btnRemove'])){
	if(count($_POST["chkBox"]) > 0){
		for($i=0;$i<count($_POST["chkBox"]);$i++){
           if($_POST["chkBox"][$i] != ""){ 
	
 $strSQL = "UPDATE EMPLOYEES SET";
$strSQL .=" EMPLOYEE_ID = '".$_POST["employeid"]."' ";
$strSQL .=", FIRST_NAME = ".$_POST["fname"]." ";
$strSQL .=", LAST_NAME = ".$_POST["lastname"]." ";
$strSQL .=", EMAIL = ".$_POST["email"]." ";
$strSQL .=", PHONE_NUMBER = ".$_POST["phone"]." ";
$strSQL .=", HIRE_DATE = ".$_POST["hiredate"]." ";
$strSQL .=", JOB_ID  = ".$_POST["jobid"]." ";
$strSQL .=", SALARY  = ".$_POST["salary"]." ";
$strSQL .=", COMMISSION_PCT = ".$_POST["Commission"]." ";
$strSQL .=", MANAGER_ID = ".$_POST["ManagerId"]." ";
$strSQL .=", DEPARTMENT_ID = ".$_POST["Departmentid"]." ";
$strSQL .=" WHERE EMPLOYEE_ID = ".$_POST["chkDel"][$i];
$objParse = oci_parse($objConnect, $strSQL);
$objExecute = oci_execute($objParse);
if($objExecute){
	echo "Location record updated successfully."
}
}
}
}
?>
<body>
<form id="form1" name="form1" method="post" action="Edit.php">
  <table width="483" border="1">
 
	<tr><td width="78">Employee No</td>
	<td width="389"><input type="text" name="employeid" disabled value="<?=$objResult["EMPLOYEE_ID "];?>"></td></tr>
<tr><td>firstName </td><td><input type="text" name="fname" value="<?=$objResult["FIRST_NAME "];?>"></td></tr>
<tr><td>Lastname No</td><td><input type="text" name="lname" value="<?=$objResult["LAST_NAME "];?>"></td></tr>
<tr><td>email No</td><td><input type="text" name="email" value="<?=$objResult["EMAIL "];?>"></td></tr>
<tr><td>phone Number</td><td><input type="text" name="phone" value="<?=$objResult["PHONE_NUMBER "];?>"></td></tr>
<tr><td>hire date</td><td><input type="text" name="hiredate" value="<?=$objResult["HIRE_DATE "];?>"></td></tr>
<tr><td>hjobid</td><td><input type="text" name="jobid" value="<?=$objResult["JOB_ID "];?>"></td></tr>
<tr><td>Salary</td><td><input type="text" name="salary" value="<?=$objResult["SALARY  "];?>"></td></tr>
<tr><td>Commission No</td><td><input type="text" name="Commission" value="<?=$objResult["COMMISSION_PCT  "];?>"></td></tr>
<tr><td>ManagerI No</td><td><input type="text" name="ManagerId" value="<?=$objResult["MANAGER_ID "];?>"></td></tr>
<tr><td>Departmentid No</td><td><input type="text" name="Departmentid" value="<?=$objResult["DEPARTMENT_ID "];?>"></td></tr>


  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>
