<?php
include ("conn.php");

if($_POST)
	{
		$name =$_POST["name"];
		$pass =$_POST["pass"];


		$query  = $db->query("SELECT * FROM users WHERE username='$name' && password='$pass'",PDO::FETCH_ASSOC);
		if ( $say = $query -> rowCount() ){

			if( $say > 0 ){
				session_start();
				$_SESSION['is_authenticated'] = true;
				$_SESSION['name'] = $name;
				$_SESSION['pass'] = $pass;
                //header("location:index.php");
                echo $_SESSION['is_authenticated'];
                echo "<script>window.location = 'index.php';</script>";
			}else{
				//header("location:index.php");
                echo "<script>window.location = 'index.php?error=2';</script>";
			}
		}else{
            echo "<script>window.location = 'index.php?error=1';</script>";
		}
	}
?>