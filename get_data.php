<?php
include('db_config.php');

if(isset($_POST['custId'])){
	$id = $_POST['custId'];

	$sql = "select * from customers where customer_id=".$id;
	$result = mysqli_query($con,$sql);

	$response = "<table border='0' width='100%'>";
	while( $row = mysqli_fetch_array($result) ){
		$id = $row['customer_id'];
		$name = $row['customer_name'];
		$email = $row['customer_email'];
		$contact = $row['customer_contact'];
		$country = $row['country'];

		$response .= "<tr>";
		$response .= "<td>Name : </td><td>".$name."</td>";
		$response .= "</tr>";

		$response .= "<tr>";
		$response .= "<td>Email : </td><td>".$email."</td>";
		$response .= "</tr>";

		$response .= "<tr>";
		$response .= "<td>Contact : </td><td>".$contact."</td>";
		$response .= "</tr>";

		$response .= "<tr>";
		$response .= "<td>Country : </td><td>".$country."</td>";
		$response .= "</tr>"; 
	}
	$response .= "</table>";

	echo $response;
	exit;
}
?>
