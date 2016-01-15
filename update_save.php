<?php include('header.php'); ?>
<?php
  // conncetion details
  require "config.php";

	if (isset($_POST["submit"])) {
    $person_id = $_POST['person_id'];
		$first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    $sql = "UPDATE person SET first_name ='" .$first_name. "',last_name ='" .$last_name. "',email ='" .$email. "' WHERE person_id = '" .$person_id. "';";
    echo $sql;

      if ($person_id > 0) {

        $counter = 1;
        //iterate through phone numbers and insert into table
        while(true){
          $id = "phone_number".$counter;
          $phone_type = "phone_type".$counter;
          //chech whether there are more numbers
          if (isset($_POST[$id])){
            $phoneNumber = $_POST[$id];
            $type = $_POST[$phone_type];
            $sql = "UPDATE phone SET type = '".$type."', number = '" .$phoneNumber. "' WHERE fk_person_id = '" .$person_id. "';";
            if ($conn->query($sql) === TRUE) {
              //echo "New record created successfully";
            }
            else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $counter++;
          }
          else {
            break;
          }
        }


        $counter=1;
        //iterate through university and insert into table
        while(true){
          $id = "university".$counter;
          $start_year = "university_start".$counter;
          $end_year = "university_end".$counter;

          //chech whether there are more university
          if (isset($_POST[$id])){
            $university = $_POST[$id];
            $start_year = $_POST[$start_year];
            $end_year = $_POST[$end_year];
              //insert the unviersity name in table
              $sql = "UPDATE university SET name = '" .$university. "', start = '" .$start_year. "', end = '" .$end_year. "' WHERE fk_person_id = '" .$person_id. "';";
              if ($conn->query($sql) === TRUE) {
                //echo "university inserted successfully";
                }
              else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
              $counter++;
            }
          else{
            break;
          }
        }

        $counter=1;
        //iterate through university and insert into table
        while(true){
          $id = "company".$counter;
          $start_year = "company_start".$counter;
          $end_year = "company_end".$counter;

          //chech whether there are more university
          if (isset($_POST[$id])){
            $company = $_POST[$id];
            $start_year = $_POST[$start_year];
            $end_year = $_POST[$end_year];
              //insert the unviersity name in table
              $sql = "UPDATE employment SET name = '" .$company. "', start = '" .$start_year. "', end = '" .$end_year. "' WHERE fk_person_id = '" .$person_id. "';";
              if ($conn->query($sql) === TRUE) {
                //echo "university inserted successfully";
                }
              else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
              $counter++;
            }
          else{
            break;
          }
        }

        $counter=1;
        //iterate through university and insert into table
        while(true){
          $id = "topic".$counter;

          //chech whether there are more university
          if (isset($_POST[$id])){
            $topic = $_POST[$id];
              //insert the unviersity name in table
              $sql = "UPDATE topic SET name = '" .$topic. "' WHERE fk_person_id = '" .$person_id. "';";
              if ($conn->query($sql) === TRUE) {
                //echo "university inserted successfully";
                }
              else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
              $counter++;
            }
          else{
            break;
          }
        }
      }
    }
$conn->close();
?>
<div class = "container">
  <h2>Submitted successfully</h2>
</div>
