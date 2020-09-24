<?php

$search = $_POST['search'];

if ($search) {

    $con = mysqli_connect('localhost', 'root', '', 'crowdfunding');
    $sql = "select * from users where fullname like '%{$search}%'";
    $result = mysqli_query($con, $sql);

    $data = "<table border=1>
				<tr>
                    <td>Full Name</td>
                    <td>Email</td>
                    <td>Address</td>
                    <td>Contact</td>
                    <td>Type</td>
				</tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        $data .= "<tr>
					<td>{$row['fullname']}</td>
					<td>{$row['email']}</td>
					<td>{$row['address']}</td>
					<td>{$row['contact']}</td>
					<td>{$row['type']}</td>
				</tr>";
    }
    $data .= "</table>";

    echo $data;
}
