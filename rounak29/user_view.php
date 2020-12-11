<style type="text/css">
	

body{
background-image: url('https://png.pngtree.com/thumb_back/fw800/back_our/20190621/ourmid/pngtree-business-resume-background-material-image_177422.jpg');
background-size: cover;
background-repeat: no-repeat;
height: 100%;
font-family: 'Numans', sans-serif;
}
	.header {
	width: 130%;
	margin: 50px auto 0px;
	color: white;
	background: #CD5C5C;
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
  background-color: #CD5C5C;
  color: white;
}
button {
    color: #333;
    box-shadow: -6px 6px #CD5C5C, -4px 4px #CD5C5C, -2px 2px #CD5C5C;
    border: 1px solid #CD5C5C;
    height: 50px;
    width:90px;

}
</style>

<?php
include('connection.php');
session_start();

$name=$_SESSION['user']['username'];

$query="SELECT * FROM RESUME where Name='$name'";

$data=mysqli_query($db,$query);

$total = mysqli_num_rows($data);

if( $total !=0)
{
?>
<body>
<div class="header">
<h2>User - View Page</h2>
	</div>
<div class="content">
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
				<td><a href='user_update.php?nm=$result[Name]&add=$result[Address]&em=$result[Email]&pn=$result[Phone_No]&qn=$result[Qualifications]&acv=$result[Acheivements]&exp=$result[Experience]&sk=$result[Skills]&ex=$result[Extra_Curricular]&cul=$result[Cultural]&sp=$result[Sports]'>Edit</a></td>
				<td><a href='user_delete.php?nm=$result[Name]' onclick='return checkdelete()'>Delete</a></td>
				
				</tr>";
	}
	 
	
	 
}
else
{
	echo "<script>alert('No Record Found')</script>";?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=	http://localhost/rounak29/index.php">
	<?php
}
?>
</table>
<br><br>
							<a href="index.php"><button type="submit">Home</button></a>
						
						<br><br>
					</div></<body>
						
					</body>>
<script type="text/javascript">
function checkdelete(){
	return confirm('Are you sure you want to delete this data???');


	}
</script>

	