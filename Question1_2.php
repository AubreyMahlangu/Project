<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<form action="" method="post" >
  <select name="Search" >
      <?php 
	  ////checkbox
	$objConnect=oci_connect("system","1234","localhost/XE");
            $strSQL="SELECT  LOCATION_ID FROM Departments ";
                  $objParse=oci_parse ($objConnect, $strSQL);
                        oci_execute($objParse,OCI_DEFAULT);

while ($row = oci_fetch_array($objParse, OCI_RETURN_NULLS+OCI_ASSOC))
              {
                 echo ("<option value=>". $row['LOCATION_ID']. "</option> ");	          
				} 
		  
			?>
				
  </select>
    <input type="submit" name="submit1" value="Search" />
  
</form>
  
  <?php
  
     if(isset($_POST['submit1'])){
    if(!empty($_POST['Search'])) {
        $selected = $_POST['Search'];
        echo 'You have chosen: '. $selected;
    } else {
        echo 'Please select the value.';
    }
    }
	
  $objConnect=oci_connect("system","1234","localhost/XE");
$SQLDept="SELECT * FROM Departments ";
$objparse=oci_parse ($objConnect, $SQLDept);
oci_execute($objparse,OCI_DEFAULT);

  
?>
<table width="868" height="93" border="1">
  <tr>
    <th width="126" scope="col">Delete</th>
    <th width="126" scope="col">Department No </th>
    <th width="126" scope="col">Department Name </th>
    <th width="169" scope="col">Manager no </th>
    <th width="76" scope="col">location</th>
    <th width="76" scope="col">Edit</th>
  </tr>
  

  <?php
while($objResult = oci_fetch_array($objparse,OCI_BOTH))
{
?>
<tr>

<td height="43"><a
href="DeleteDept.php?DEPARTMENT_ID=<?=$objResult["DEPARTMENT_ID"];?>">

<input type="checkbox" name="Delete" value="Delete">Delete</input>

</a></td>
<td><?=$objResult["DEPARTMENT_ID"];?></td>
<td align="center"><?=$objResult["DEPARTMENT_NAME"];?></td>
<td align="center"><?=$objResult["MANAGER_ID"];?></td>
<td align="center"><?=$objResult["LOCATION_ID"];?></td>
<td><a
href="UpdateRecord.php?DEPARTMENT_ID=<?=$objResult["DEPARTMENT_ID"];?>">Modify</a></td>

><?php
}
?>
</table>
<p>
  <input type="submit" name="Delete1" value="Delete" />
</p>


<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
