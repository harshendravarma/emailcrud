<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>crud </title>
   </head>
   <body>
      <div class="header">
         <a href="#default" class="logo">KelltonTech</a>
         <div class="header-right">
            <a class="active" href="dashboardfinal.php">Dashboard</a>
            <a href="welcome.php">Add employee</a>
            <a href="sendemail.php">sendemail</a>
            <a href="logout.php">logout</a>
         </div>
      </div>
      <center>
         <h1>Welcome<?php echo $login_session; ?></h1>
         <table>
            <tr>
               <th>Name</th>
               <th>Email</th>
               <th>Gender</th>
               <th>Address</th>
               <th>Hobby</th>
               <th>Country</th>
               <th>Update</th>
               <th>Delete</th>
            </tr>
            <?php 
               include("config.php");
               include('sqloperations.php');
               try{
                $sql= new sqloperations();
                $show=$sql->read();
               	while($res=mysqli_fetch_array($show))
               	{            
               ?>
            <tr>
               <td><?php echo $res['name']; ?></td>
               <td><?php echo $res['email']; ?></td>
               <td><?php echo $res['gender']; ?></td>
               <td><?php echo $res['address']; ?></td>
               <td><?php echo $res['hobby']; ?></td>
               <td><?php echo $res['country']; ?></td>
               <td><a href="update.php?id=<?php echo $res['id']; ?>">Update</a></td>
               <td><a href="delete.php?id=<?php echo $res['id']; ?>" onClick="return confirm('are u sure want to delete this record?')">Delete</a></td>
               <?php
                  }
                  }
                  catch (Exception $ex) 
                  {
                     echo $ex->getMessage();
                  }
                  ?>
         </table>
      </center>
   </body>
</html>
<style>
   * {box-sizing: border-box;}
   body { 
   margin: 0;
   font-family: Arial, Helvetica, sans-serif;
   }
   .header {
   overflow: hidden;
   background-color: #f1f1f1;
   padding: 20px 10px;
   }
   .header a {
   float: left;
   color: black;
   text-align: center;
   padding: 12px;
   text-decoration: none;
   font-size: 18px; 
   line-height: 25px;
   border-radius: 4px;
   }
   .header a.logo {
   font-size: 25px;
   font-weight: bold;
   }
   .header a:hover {
   background-color: #ddd;
   color: black;
   }
   .header a.active {
   background-color: dodgerblue;
   color: white;
   }
   .header-right {
   float: right;
   }
   @media screen and (max-width: 500px) {
   .header a {
   float: none;
   display: block;
   text-align: left;
   }
   .header-right {
   float: none;
   }
   }
   table {
   font-family: arial, sans-serif;
   border-collapse: collapse;
   width: 80%;
   margin: 80px 0px 0px;
   }
   td, th {
   border: 1px solid #dddddd;
   text-align: left;
   padding: 8px;
   }
   tr:nth-child(even) {
   background-color: #dddddd;
   }
</style>