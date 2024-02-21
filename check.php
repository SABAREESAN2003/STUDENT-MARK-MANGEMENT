<?php
$name = $_POST['nam'];
$dpno = $_POST['dno'];
$language = $_POST['lan'];
$english = $_POST['eng'];
$allied = $_POST['ald'];
$major1 = $_POST['m1'];
$major2 = $_POST['m2'];
$lab1 = $_POST['l1'];
$lab2 = $_POST['l2'];
$ge = $_POST['ge'];
$se = $_POST['se'];
$sgpa=10.0;

$conn = new mysqli("localhost","id20793040_admin","Sabareesan@5","id20793040_myadmindb");
if($conn->connect_error)
{
die("connection failed: ".$conn->connect_error);
}
$id=$_POST['dno'];
$sql="select * from student_marks where stud_dno='$id'";
$res=$conn->query($sql);
$upd="update student_marks set stud_name='$name',language=$language,english=$english,allied=$allied,major1=$major1,major2=$major2,lab1=$lab1,lab2=$lab2,general=$ge,elective=$se,sgpa=$sgpa where stud_dno='$id'";
$ins="insert into student_marks  values('$name','$dpno',$language,$english,$allied,$major1,$major2,$lab1,$lab2,$ge,$se,$sgpa)";

if($res->num_rows>0) 
{
$conn->query($upd);
echo "<body bgcolor=blue>
<center>
RECORD UPDATED SUCCESSFULLY<br><br>
<a href=dbselect.php>
<button>view all student records </button></a>";
if($row=$res->fetch_assoc())
{
echo "<html>
<body>
<br>
<br>
<br>
<center>
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
    
}
else if($res->num_rows=0) 
{
$conn->query($ins);
echo "<body bgcolor=green;>
<center>
RECORD INSERTED SUCCESSFULLY<br><br>
<a href=dbselect.php>
<button>view all student records </button></a>";

if($row=$res->fetch_assoc())
{
echo "<html>
<body>
<br>
<br>
<br>
<center>
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
}
$conn->close();
?>