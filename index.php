<?php 
   include "header.php";
   include "functions.php";

   if(isset($_GET['edit_user'])) {
      echo $_GET['edit_user'];

      unset($_GET['edit_user']);
   }

   if(isset($_GET['delete_user'])) {
      deleteUser($_GET['delete_user']);

      unset($_GET['delete_user']);
   }

   if(isset($_GET['delete_group'])) {
      deleteGroup($_GET['delete_group']);

      unset($_GET['delete_group']);
   }
?>
<html>
   <head>
      <title>Phonebook Manager</title>
      <link rel="stylesheet" href="css/phonebook.css">


      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

      <!-- Optional theme -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

      <script src="https://code.jquery.com/jquery-3.1.1.min.js" />

      <!-- Latest compiled and minified JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   </head>
   
   <body>
<?php 
   include "navigation.php";
?>
   <div class="container">

      <div class="page-header">
        <h1>Users</h1>
      </div>

<?php
      $retval = getUsers();
      echo '<div class="row"><div class="col-md-6">
            <table class="table table-striped">
               <thead>
                 <tr>
                   <th>Name</th>
                   <th>Phone</th>
                   <th>Email</th>
                   <th>Group</th>
                   <th>Actions</th>
                 </tr>
               </thead>';
      while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
         echo '<tr>';
         echo '<td>'.$row['user_name'].'</td>';
         echo '<td>'.$row['phone'].'</td>';
         echo '<td>'.$row['email'].'</td>';
         echo '<td>';
         $group_name = getGroup($row['assigned_group']);
         while($r=mysql_fetch_array($group_name, MYSQL_ASSOC)){
            echo $r['group_name'];
         }
         echo '</td>';
         echo '<td><a class="btn btn-success" href="edit_user.php?id='.$row['id'].'">Edit</a> ';
         echo '<a class="btn btn-danger" href="?delete_user='.$row['id'].'">Delete</td>';
         echo '</tr>';
      }
      echo '</table></div></div>';
?>
      <div class="page-header">
        <h1>Groups</h1>
      </div>
<?php
      $retval = getGroups();
      echo '<div class="row"><div class="col-md-6">
            <table class="table table-striped">
               <thead>
                 <tr>
                   <th>Name</th>
                   <th>Actions</th>
                 </tr>
               </thead>';
      while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
         echo '<tr>';
         echo '<td>'.$row['group_name'].'</td>';
         echo '<td><a class="btn btn-success" href="edit_group.php?id='.$row['id'].'">Edit</a> ';
         echo '<a class="btn btn-danger" href="?delete_group='.$row['id'].'">Delete</td>';
         echo '</tr>';
      }
      echo '</table></div></div>';
?>
      </div>
   </body>
</html>
<?php
   include "footer.php";
?>
