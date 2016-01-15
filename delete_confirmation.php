<?php include('header.php'); ?>
<div class ="container">
<?php
  // conncetion details
  require "config.php";
  $person_id = $_GET["id"];
  $sql = "DELETE FROM person WHERE person_id='" .$person_id. "';";

  if ($conn->query($sql) === TRUE) {
    echo "<h2>Record deleted successfully</h2>";
  } else {
    echo "Error deleting record: " . $conn->error;
  }
  $conn->close();
?>
</div>
