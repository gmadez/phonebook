<?php 
	function addUser($name, $phone, $email, $group) {
		if (isset($_POST['groups']) && $_POST['groups']!=""){
		   $group = $_POST['groups'];
		   $sql = "INSERT INTO users ". "(user_name, phone, email, assigned_group) ". "VALUES('$name','$phone', '$email', '$group')";
		} else {
		   $sql = "INSERT INTO users ". "(user_name, phone, email) ". "VALUES('$name','$phone', '$email')";
		}
		addData($sql);
	}

	function addGroup($group_name) {
		$sql = "INSERT INTO groups (group_name) VALUES ('$group_name')";
		addData($sql);
	}

	function updateGroup($id, $group_name) {
		$sql = "UPDATE groups SET group_name = '$group_name' WHERE id='$id'";
		mysql_select_db('phone_db');
		$retval = mysql_query( $sql, $GLOBALS['conn'] );

		if(isset($_POST)){
			header('location:index.php');
			die();
		}
	}

	function updateUser($id, $name, $phone, $email, $group) {
		$sql = "UPDATE users SET user_name='$name', phone='$phone', email='$email', assigned_group='$group' WHERE id='$id'";

		mysql_select_db('phone_db');
		$retval = mysql_query( $sql, $GLOBALS['conn'] );

		if(isset($_POST)){
			header('location:index.php');
			die();
		}
	}

	function addData($sql){
		mysql_select_db('phone_db');
		$retval = mysql_query( $sql, $GLOBALS['conn'] );

		if(isset($_POST)){
			header('location:index.php');
			die();
		}

		if(! $retval ) {
		   echo $sql."<br /><br />";
		   die('Could not enter data: ' . mysql_error());
		}

		echo "Entered data successfully\n";
	}

	function getGroups(){
        $sql = 'SELECT * FROM groups';
        mysql_select_db('phone_db');
        $retval = mysql_query( $sql, $GLOBALS['conn']  );
        
        if(! $retval ) {
           die('Could not get data: ' . mysql_error());
        }

        return $retval;
	}

	function getGroup($id){
        $sql = "SELECT * FROM groups WHERE id='$id'";
        mysql_select_db('phone_db');
        $retval = mysql_query( $sql, $GLOBALS['conn']  );
        
        if(! $retval ) {
           die('Could not get data: ' . mysql_error());
        }

        return $retval;
	}

	function getUser($id){
        $sql = "SELECT * FROM users WHERE id='$id'";
        mysql_select_db('phone_db');
        $retval = mysql_query( $sql, $GLOBALS['conn']  );
        
        if(! $retval ) {
           die('Could not get data: ' . mysql_error());
        }

        return $retval;
	}

	function getUsers(){
        $sql = 'SELECT * FROM users';
        mysql_select_db('phone_db');
        $retval = mysql_query( $sql, $GLOBALS['conn']  );
        
        if(! $retval ) {
           die('Could not get data: ' . mysql_error());
        }

        return $retval;
	}


	function deleteUser($id){
		$sql = "DELETE FROM users WHERE id='$id'";
		mysql_select_db('phone_db');
		$retval = mysql_query( $sql, $GLOBALS['conn'] );
	}

	function deleteGroup($id){
		$sql = "DELETE FROM groups WHERE id='$id'";
		mysql_select_db('phone_db');
		$retval = mysql_query( $sql, $GLOBALS['conn'] );
	}

?>