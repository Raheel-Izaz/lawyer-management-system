<?php
	if(isset($_POST['login'])){
        include "connection.php";
		session_start();
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
        $admin = mysqli_query(
            $conn,"SELECT * FROM `admin` WHERE admin_email = '{$email}' AND admin_password = '{$password}' AND `admin_role` = 'admin'");

		$user = mysqli_query(
			$conn,"SELECT * FROM `client` WHERE client_email  = '{$email}' AND client_password = '{$password}' AND `client_role` = 'user'"
		);
		$lawyer = mysqli_query(
			$conn,"SELECT * FROM `lawyers` WHERE lawyer_email   = '{$email}' AND laywer_password = '{$password}' AND `role` = 'lawyer'"
		);
            if(mysqli_num_rows($admin) > 0){
				while($row = mysqli_fetch_assoc($admin)){
				$_SESSION['admin_id'] = $row['admin_id'];
                $_SESSION['admin_name'] = $row['admin_name'];
                $_SESSION['admin_status']=$row['admin_status'];
				$_SESSION['role'] = $row['admin_role'];
                $_SESSION['login']=TRUE;

                header("Location: ../Admin/admin_dashboard.php");
				}
            }
			else if(mysqli_num_rows($user) > 0) {
				while($row = mysqli_fetch_assoc($user)){
				$_SESSION['client_id'] = $row['client_id'];
                $_SESSION['client_name'] = $row['client_name'];
                $_SESSION['client_status']=$row['client_status'];
                $_SESSION['client_role']=$row['client_role'];
                $_SESSION['login']=TRUE;
				header("Location: ../User-Dashboard/user_dashboard.php");
				}
			}
			else if(mysqli_num_rows($lawyer) > 0) {
				while($row = mysqli_fetch_assoc($lawyer)){
				$_SESSION['lawyer_id'] = $row['lawyer_id'];
                $_SESSION['lawyer_name'] = $row['lawyer_name'];
                $_SESSION['role']=$row['role'];
                $_SESSION['login']=TRUE;
				header("Location: ../Lawyer-dashboard/lawyer-dashboard.php");
				}
			}
			else{
                header("Location: ../login.php");
            }
        }
?>