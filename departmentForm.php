<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

 
<script type="text/javascript">{
 function Validationform()
 { 
 var deptno=document.forms[form1][deptNo].value;
 var Depname=document.forms[form1][DeptName].value;
  var loc=document.forms[form1][loc ].value;
 
 if(deptno ==NULL || deptno= "")
 {
   alert(" Please enter deparment  number 
   ");
   return false
 }
 
  if(Depname ==null || Depname="")
{
   alert("Please Department Name");
   return false
 }
 
  if(loc ==null || loc="")
{
   alert("Please Enter location ");
   return false
 }
 
 
 }



}
</script>
<body>
<form id="form1" name="form1" method="post" action="Insert.php" onsubmit=" return  Validationform();">

  <table width="323" border="1">
    <tr>
      <th width="163" scope="col">Department Number </th>
      <th width="144" scope="col"><label>
        <input type="text" name="deptNo" />
      </label></th>
    </tr>
    <tr>
      <td><div align="center"><strong>Department</strong> name </div></td>
      <td><input type="text" name="DeptName" /></td>
    </tr>
    <tr>
      <td><div align="center"><strong> location</strong></div></td>
      <td><input type="text" name=" loc" /></td>
    </tr>
    <tr>  
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="Submit" value="Submit" />
      </label></td>
    </tr>
  </table>
</form>


</body>
</html>
