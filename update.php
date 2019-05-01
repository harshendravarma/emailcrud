<?php
include("config.php");
include('session.php');
include("validate.php");
include('sqloperations.php');
try{
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
}
$sql          = new sqloperations();
$fetch        = $sql->readbyid('employee', $id);
$fetchaddress = $sql->readbyid('address', $id);
$emailerror   = $nameerror = $addresserror = "";
if (isset($_POST['bt-update'])) {
    
    $emailerrorobject   = new Validation($_POST['email'], 1, 50, true, true, true);
    $emailerror         = $emailerrorobject->validate();
    $nameerrorobject    = new Validation($_POST['name'], 1, 15, false, true, false);
    $nameerror          = $nameerrorobject->validate();
    $addresserrorobject = new Validation($_POST['address'], 1, 100, true, true, true);
    $addresserror       = $addresserrorobject->validate();
    $name               = $_POST['name'];
    $email              = $_POST['email'];
    $gender             = $_POST['gender'];
    $address            = $_POST['address'];
    $hobby              = implode(",", $_POST['hobby']);
    $country            = $_POST['country'];
    $name               = $_POST['name'];
    $email              = $_POST['email'];
    $gender             = $_POST['gender'];
    $address            = $_POST['address'];
    $hobby              = implode(",", $_POST['hobby']);
    $country            = $_POST['country'];
	$responce=$sql->update($name, $email, $gender, $hobby, $country, $address, $db, $id);
	echo ($responce='success') ? "<script>alert('updatedsuccesfully!'); location.href='dashboardfinal.php';</script>" : "<script>alert('failed to update!'); location.href='dashboardfinal.php';</script>";
}
}
catch (Exception $ex) 
{
   echo $ex->getMessage();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
      <title>crud </title>
   </head>
   <body>
      <?php include("header.php");?>
      <center>
         <h1 align="center"><ins>Update</ins></h1>
         <form method="post">
            <table border="1" cellspacing="0" cellpadding="5" width="50%" align="center">
               <thead>
                  <tr align="left">
                     <th>Field Name</th>
                     <th>Form Control</th>
                  </tr>
               </thead>
               <tbody>
                  <tr bgcolor="#F1F1F1">
                     <td>Name</td>
                     <td><input type="text" name="name" value="<?php echo $fetch['name']; ?>"  required  />
                        <span class = "rederror"><?php echo $nameerror;?></span>
                     </td>
                  </tr>
                  <tr>
                     <td>Email</td>
                     <td><input type="email" name="email" value="<?php echo $fetch['email']; ?>" required />
                        <span class = "rederror"><?php echo $emailerror;?></span>
                     </td>
                  </tr>
                  <tr bgcolor="#F1F1F1">
                     <td >Gender</td>
                     <td><input type="radio" name="gender" value="male"  <?php echo ($fetch['gender']=='male')?'checked':'' ?>>Male
                        <input type="radio" name="gender" value="female" <?php echo ($fetch['gender']=='female')?'checked':'' ?> />Female
                     </td>
                  </tr>
                  <tr>
                     <td>Address</td>
                     <td><textarea name="address"><?php echo $fetchaddress['address']; ?></textarea><span class = "rederror"><?php echo $addresserror;?></span></td>
                  </tr>
                  <tr bgcolor="#F1F1F1">
                     <td >Hobby</td>
                     <td>
                        <input type="checkbox" name="hobby[]" value="music"   <?php echo (strpos($fetch['hobby'],'music') !== false)?'checked':'' ?>>Music
                        <input type="checkbox" name="hobby[]" value="Movies" <?php echo (strpos($fetch['hobby'],'Movies') !== false)?'checked':'' ?>>Movies
                        <input type="checkbox" name="hobby[]" value="Games" <?php echo (strpos($fetch['hobby'],'Games') !== false)?'checked':'' ?>>Games
                        <input type="checkbox" name="hobby[]" value="Travel" <?php echo (strpos($fetch['hobby'],'Travel') !== false)?'checked':'' ?>>Travel
                     </td>
                  </tr>
                  <tr>
                     <td>
                     <td>
                        <select name="country">
                           <option value="India" <?=$fetch['country'] == 'India' ? ' selected="selected"' : '';?>>India</option>
                           <option value="Austrlia"<?=$fetch['country'] == 'Austrlia' ? ' selected="selected"' : '';?>>Austrlia</option>
                           <option value="Pakistan" <?=$fetch['country'] == 'Pakistan' ? ' selected="selected"' : '';?>>Pakistan</option>
                           <option value="Japan" <?=$fetch['country'] == 'Japan' ? ' selected="selected"' : '';?>>Japan</option>
                        </select>
                     </td>
                  </tr>
                  <tr>
                     <td></td>
                     <td><input type="submit" name="bt-update" value="update" /></td>
                  </tr>
               </tbody>
            </table>
         </form>
      </center>
   </body>
</html>
<style>
   .rederror{
   color: #FF0000;
   }
</style>