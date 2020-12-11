<?php
include('connection.php');
$Name=$_GET['nm'];
$query = "DELETE FROM RESUME WHERE NAME='$Name'";
 $data=mysqli_query($db,$query);                                        
if($data)
{
	echo "<script>alert('Record Deleted')</script>";
	?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=	http://localhost/rounak29/admin_view.php">
	<?php
}
else
{
	echo "Sorry,Delete process Failed!!";
}
?>



<!-- component,services,routing,http-->