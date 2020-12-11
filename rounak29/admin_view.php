<style type="text/css">
	.header {
	width: 130%;
	margin: 50px auto 0px;
	color: white;
	background: #4CAF50;
	text-align: center;
	border: 1px solid #B0C4DE;
	border-bottom: none;
	border-radius: 10px 10px 0px 0px;
	padding: 20px;
}

.content {
	width: 130%;
	margin: 0px auto;
	padding: 20px;
	border: 1px solid #B0C4DE;
	background-image: url('https://png.pngtree.com/thumb_back/fw800/back_our/20190621/ourmid/pngtree-business-resume-background-material-image_177422.jpg');
	border-radius: 0px 0px 10px 10px;
}
	button[name=register_btn] {
		background: #003366;
	}
	#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
button {
    color: #333;
    box-shadow: -6px 6px #4CAF50, -4px 4px #4CAF50, -2px 2px #4CAF50;
    border: 1px solid #4CAF50;
    height: 50px;
    width:90px;
}
</style>

<?php
include('functions.php');
if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: ../login.php");
}
include("connection.php");



$query="SELECT * FROM RESUME";

$data=mysqli_query($db,$query);

$total = mysqli_num_rows($data);

if( $total !=0)
{
?>
<body>
<div class="header">
<h2>Admin - Home Page</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<div class="profile_info">
			<img src="https://previews.123rf.com/images/designofire/designofire1902/designofire190201446/116270633-vector-edit-profile-icon.jpg" height="60px" width="60px" >
			<div><br>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>
					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						
                       
					</small>

				<?php endif ?>
			</div>
		</div>
	<br><br>

<table id="customers">

<tr>
	<th>Name</th>
	<th> Address </th>
	<th> Email </th>
	<th> Phone_No </th>
	<th> Qualifications </th>
	<th> Acheivements </th>
	<th>  Experience</th>
	<th> Skills </th>
	<th> Extra_Curricular </th>
	<th> Cultural </th>
	<th> Sports </th>
	<th colspan=2> Operations </th>
</tr>
	
	<?php

	while($result=mysqli_fetch_assoc($data))
	{
		echo "<tr>
				<td>".$result['Name']."</td>
				<td>".$result['Address']."</td>
				<td>".$result['Email']."</td>
				<td>".$result['Phone_No']."</td>
				<td>".$result['Qualifications']."</td>
				<td>".$result['Acheivements']."</td>
				<td>".$result['Experience']."</td>
				<td>".$result['Skills']."</td>
				<td>".$result['Extra_Curricular']."</td>
				<td>".$result['Cultural']."</td>
				<td>".$result['Sports']."</td>
				<td><a href='view.php?nm=$result[Name]&add=$result[Address]&em=$result[Email]&pn=$result[Phone_No]&qn=$result[Qualifications]&acv=$result[Acheivements]&exp=$result[Experience]&sk=$result[Skills]&ex=$result[Extra_Curricular]&cul=$result[Cultural]&sp=$result[Sports]'>Edit</a></td>
				<td><a href='delete.php?nm=$result[Name]' onclick='return checkdelete()'>Delete</a></td>
				</tr>";
	}
}
else
{
	echo "No Record";
}
				
	?>
</table>


<br><br>
	<br><br>
		<a href="login.php?logout='1'"><button type="submit"><b>Log Out</b></button></a>
	<br><br>
</div>
</body>
<script type="text/javascript">
function checkdelete(){
	return confirm('Are you sure you want to delete this data???');


	}
</script>








		
