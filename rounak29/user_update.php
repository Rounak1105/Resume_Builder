<?php

include('connection.php');

?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
</head>
<style>
  * { margin: 0px; padding: 0px; }

body{
background-image: url('https://png.pngtree.com/thumb_back/fw800/back_our/20190621/ourmid/pngtree-business-resume-background-material-image_177422.jpg');
background-size: cover;
background-repeat: no-repeat;
height: 100%;
font-family: 'Numans', sans-serif;
}
.header {
  width: 40%;
  margin: 50px auto 0px;
  color: white;
  background: #CD5C5C;
  text-align: center;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 20px;
}
form, .content {
  width: 40%;
  margin: 0px auto;
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 0px 0px 10px 10px;
}
.input-group {
  margin: 10px 0px 10px 0px;
}
.input-group label {
  display: block;
  text-align: left;
  margin: 3px;
}
.input-group input {
  height: 30px;
  width: 93%;
  padding: 5px 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid gray;
}
#user_type {
  height: 40px;
  width: 98%;
  padding: 5px 10px;
  background: white;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid gray;
}
.btn {
  padding: 10px;
  font-size: 15px;
  color: white;
  background: #CD5C5C;
  border: none;
  border-radius: 5px;
}
.error {
  width: 92%; 
  margin: 0px auto; 
  padding: 10px; 
  border: 1px solid #a94442; 
  color: #a94442; 
  background: #f2dede; 
  border-radius: 5px; 
  text-align: left;
}
.success {
  color: #3c763d; 
  background: #dff0d8; 
  border: 1px solid #3c763d;
  margin-bottom: 20px;
}
.profile_info img {
  display: inline-block; 
  width: 50px; 
  height: 50px; 
  margin: 5px;
  float: left;
}
.profile_info div {
  display: inline-block; 
  margin: 5px;
}
.profile_info:after {
  content: "";
  display: block;
  clear: both;
}
  </style>
<body>
   <div class="input-group" >
    <button type="submit" class="btn"><a href="index.php"><font-color="white">Home</a></font-color></button>
  </div>
<div class="header">
  <h2>Register</h2>
</div>
<form method="POST" action="">
  
  <div class="input-group">
    <label>Full Name</label>
    <input type="text" name="username" value="<?php echo $_GET['nm']; ?>">
  </div>
  <div class="input-group">
    <label>Address</label>
    <input type="text" name="address" value="<?php echo $_GET['add']; ?>" style="height: 140px">
  </div>
  <div class="input-group">
    <label>Email</label>
    <input type="email" name="email" value="<?php echo $_GET['em']; ?>">
  </div>
  <div class="input-group">
    <label>Phone number</label>
    <input type="text" name="phone" value="<?php echo $_GET['pn'] ; ?>" >
  </div>

  <div class="input-group">
    <label>Educational Qualifications</label>
    <input type="text" name="qualifications" value="<?php echo $_GET['qn']; ?>" style="height: 180px">
  </div>
  <div class="input-group">
    <label>Acheivements</label>
    <input type="text" name="acheivements" value="<?php echo $_GET['acv']; ?>" style="height: 180px">
  </div>
  <div class="input-group">
    <label>Work Experience</label>
    <input type="text" name="experience" value="<?php echo $_GET['exp']; ?>" style="height: 180px">
  </div>
  <div class="input-group">
    <label>Skills</label>
    <input type="text" name="skills" value="<?php echo $_GET['sk']; ?>" style="height: 180px">
  </div>
  <div class="input-group">
    <label>Extra Curricular</label>
    <input type="text" name="extra" value="<?php echo $_GET['ex']; ?>" style="height: 180px">
  </div>
  <div class="input-group">
    <label>Cultural</label>
    <input type="text" name="cultural" value="<?php echo $_GET['cul']; ?>" style="height: 180px">
  </div>
  <div class="input-group">
    <label>Sports</label>
    <input type="text" name="sports" value="<?php echo $_GET['sp']; ?>" style="height: 180px">
  </div>
  <div class="input-group">
    <button type="submit" class="btn" name="submit">Update</button>
  </div>
  
  
</form>
</body>
</html>

<?php

if(isset($_POST['submit']))
{
    $username =$_POST['username'];
    $address  =$_POST['address'];
    $email    =$_POST['email'];
    $phone    =$_POST['phone'];
    $qualifications=$_POST['qualifications'];
    $acheivements=$_POST['acheivements'];
    $experience=$_POST['acheivements'];
    $skills= $_POST['skills'];
    $extra=$_POST['extra'];
    $cultural=$_POST['cultural'];
    $sports=$_POST['sports'];

  $query="UPDATE RESUME SET Address='$address' ,Email='$email',Phone_No='$phone',Qualifications='$qualifications',Acheivements='$acheivements',Experience='$experience',Skills='$skills', Extra_Curricular=' $extra',Cultural='$cultural',Sports='$sports' WHERE Name='$username'" ;

   $data = mysqli_query($db, $query);

   if($data)
   {
    echo "<script>alert('Record Updated Successfully!!!!')</script>";
    ?>
        <META HTTP-EQUIV="Refresh" CONTENT="0; URL= http://localhost/rounak29/user_view.php">
    <?php
   }
   else
   {
    echo "<script>alert('Record Not Updated!!')</script>";
   }
}
else {
  echo "Click On Update to update your resume";
    }

?>