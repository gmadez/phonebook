<?php 
   include "header.php";
   include "functions.php";

   if(isset($_POST['update_user'])) {
      $user_id = $_POST['user_id'];
      $name = $_POST['name'];
      $phone = $_POST['phone'];
      $email = $_POST['email'];
      $group = $_POST['groups'];

      updateUser($user_id, $name, $phone, $email, $group);
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
   <?php include "navigation.php"; ?>

   <div class="container">
      <div class="page-header">
        <h1>Edit User</h1>
      </div>
      <form method="post" action="<?php $_PHP_SELF ?>">
         <table>
            <tr>
               <td width="100">User Name</td>
<?php
                  $user_data = getUser($_GET['id']);
   
                  while($r=mysql_fetch_array($user_data, MYSQL_ASSOC)){
                     echo '<tr><td width="100">Name</td><td><input name="name" type="text" id="name" value="'.$r["user_name"].'"></td></tr>';
                     echo '<tr><td width="100">Phone</td><td><input name="phone" type="text" id="phone" value="'.$r["phone"].'"></td></tr>';
                     echo '<tr><td width="100">Email</td><td><input name="email" type="text" id="email" value="'.$r["email"].'"></td></tr>';
                     echo '<tr><td><input name="user_id" type="hidden" id="user_id" value="'.$r["id"].'"></td></tr>';

                     $retval = getGroups();

                     echo '<tr><td width="100">Group</td><td><select name="groups">';
                     echo '<option value="">-- Select Group --</option>';
                     while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
                        echo '<option value="'.$row['id'].'" '.($row['id']==$r['assigned_group']?'selected="selected"':'').'>'.$row['group_name'].'</option>';

                     }
                     echo '</select></td></tr>';
                  }
?>
            <tr>
               <td>
                  <input class="btn btn-primary"  name="update_user" type="submit" id="update_user" value="Update User">
               </td>
            </tr>
         </table>
      </form>
   </body>
</html>
<?php
   include "footer.php";
?>
