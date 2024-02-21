<?php
$id=$_POST['un'];
$ps=$_POST['pw'];
$conn = new mysqli("localhost","id20793040_admin","Sabareesan@5","id20793040_myadmindb");
if($conn->connect_error)
{
die("connection failed: ".$conn->connect_error);
}
$sql="select * from admin where userid='$id' && password='$ps'";
$res=$conn->query($sql);
if($res->num_rows>0)
{
echo "<body bgcolor=black>
<script>
window.location.href='mark.html';
alert('LOGIN SUCCESSFUL');
</script>
</body>";
}
else
{
echo "<body bgcolor=black>
<script>
window.location.href='login.html';
alert('LOGIN UNSUCCESSFUL');
</script>
</body>";
}
?>