<?php 
   include "header.php";
   include "functions.php";

   if(isset($_POST['add_group'])) {
      $group_name = $_POST['group_name'];

      addGroup($group_name);
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
        <h1>Add Groups</h1>
      </div>
      <form method="post" action="<?php $_PHP_SELF ?>">
         <table>
            <tr>
               <td width="100">Group Name</td>
               <td><input name="group_name" type="text" id="group_name"></td>
            </tr>
            <tr>
               <td>
                  <input class="btn btn-success" name="add_group" type="submit" id="add_group" value="Add Group">
               </td>
            </tr>
         
         </table>
      </form>
   </body>
</html>
<?php
   include "footer.php";
?>
