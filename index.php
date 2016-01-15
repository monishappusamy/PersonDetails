<?php include('header.php'); ?>
<div class ="container">
<h3>Record</h3>
<?php
// conncetion details
require "config.php";

$sql = "SELECT person_id, first_name, last_name, email FROM person";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "
    <table class=\"table\">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
    ";
     // output data of each row
     while($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>". $row["person_id"]. "</td>
                  <td>". $row["first_name"]. " " . $row["last_name"] . "</td>
                  <td>". $row["email"] ."</td>
                </tr>";
     }

     echo "
      </tbody>
     </table>
     ";
} else {
     echo "0 results";
}

$conn->close();
?>
</div>
<?php include('footer.html'); ?>
