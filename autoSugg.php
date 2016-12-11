<?php
$conn = new mysqli("localhost", "root", "amit", "mess"); // connecting to server 
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($conn,$_POST['query']);  //getting data posted by user
	$output = '';
	$q = "SELECT name FROM ` student` WHERE name LIKE '$search%'";

	$result = $conn->query($q);
	$total = $result->num_rows;

	$output = '<ul class="list-unstyled">';
	if($total > 0)
	{
		while($row = $result->fetch_assoc())
		{
			$output .= '<li>'.$row["name"].'</li>'; // 
		} 
	}
	else
	{
		$output .= '</ul>Student Not Found<br/>';
	}
	$output .= '</ul>';
	echo $output;  // returning final data back to client 
	echo "Total Result Found is ". $total;
}
?>
