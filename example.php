<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once 'excel_reader2.php';
$data = new Spreadsheet_Excel_Reader("example.xls");
?>
<html>
<head>
<style>
table.excel {
	border-style:ridge;
	border-width:1;
	border-collapse:collapse;
	font-family:sans-serif;
	font-size:12px;
}
table.excel thead th, table.excel tbody th {
	background:#CCCCCC;
	border-style:ridge;
	border-width:1;
	text-align: center;
	vertical-align:bottom;
}
table.excel tbody th {
	text-align:center;
	width:20px;
}
table.excel tbody td {
	vertical-align:bottom;
}
table.excel tbody td {
    padding: 0 3px;
	border: 1px solid #EEEEEE;
}
</style>
</head>

<body>
<br><hr>
<table border="1">
	<tr>
		<th>Roll.NO.</th>
		<th>Name</th>
		<th>Father's Name</th>
		<th>English</th>
		<th>Maths</th>
		<th>Hindi</th>
		<th>Punjabi</th>
		<th>Total</th>
	</tr>
	<tr>
<?php
	$find = $_REQUEST['rollno'];
	$class = $_REQUEST['class'];
	$totalrows = $data->rowcount($sheet_index=$class);
	for($i=1; $i<$totalrows; $i++)
	{
	$rowdata = $data->val($i,'A',$class);
	
	if($rowdata=="$find")
	{
		print "<td>".$data->val($i,'A',$class)."</td>";
		print "<td>".$data->val($i,'B',$class)."</td>";
		print "<td>".$data->val($i,'C',$class)."</td>";
		print "<td>".$data->val($i,'D',$class)."</td>";
		print "<td>".$data->val($i,'E',$class)."</td>";
		print "<td>".$data->val($i,'F',$class)."</td>";
		print "<td>".$data->val($i,'G',$class)."</td>";
		print "<td>".$data->val($i,'H',$class)."</td>";
	}
	}
?>
	</tr>
</table>
<?php //echo $data->val(5,''); ?>
<?php //echo $data->dump(true,true); ?>
<br /><br />
<form action="example.php" method="GET">
	<lable name="rollno">Roll No.</lable>
	<input type="text" name="rollno" />
	<br /><br />	
	<lable name="class">Select Your Class</lable>
	<select name="class">
		<option value="0">8th</opion>
		<option value="1">9th</opion>
		<option value="2">10th</opion>
	</select>
	<br />
	<input type="submit" value="Submit">
</form>
</body>
</html>
