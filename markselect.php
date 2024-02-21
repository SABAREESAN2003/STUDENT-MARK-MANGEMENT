<?php
echo "<body bgcolor=powderblue></body>";
$conn = new mysqli("localhost","id20793040_admin","Sabareesan@5","id20793040_myadmindb");

if($conn->connect_error)
{
die("connection failed: ".$conn->connect_error);
}
$id=$_POST['dno'];
$sql="select * from student_marks where stud_dno='$id'";
$res=$conn->query($sql);
if($row=$res->fetch_assoc())
{
echo" <html>
<body>
<center><h1>RESULT</h1>
<table border=1 >
<tr><th>$row[stud_name]</th><th>$row[stud_dno]</th></tr>
<tr><td>LANGUAGE</td><td>$row[language]</td></tr>
<tr><td>ENGLISH</td><td>$row[english]</td></tr>
<tr><td>ALLIED</td><td>$row[allied]</td></tr>
<tr><td>MAJOR 1</td><td>$row[major1]</td></tr>
<tr><td>MAJOR 2</td><td>$row[major2]</td></tr>
<tr><td>LAB 1</td><td>$row[lab1]</td></tr>
<tr><td>LAB 2</td><td>$row[lab2]</td></tr>
<tr><td>GENERAL ELECTIVE</td><td>$row[general]</td></tr>
<tr><td>SPECIFIC ELECTIVE</td><td>$row[elective]</td></tr>
<tr><td colspan=2><center>SGPA : $row[sgpa]</center></td></tr>
</table>
</center>
</body>
</html>";
}
else
{
echo "no record found";
}
$conn->close();
?>