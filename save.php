<?php include('header.php'); ?>
<?php
  // conncetion details
  require "config.php";

	if (isset($_POST["submit"])) {
		$first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO person(first_name,last_name,email) VALUES ('" .$first_name. "','" .$last_name. "','" .$email. "');";
    if ($conn->query($sql) === TRUE) {
      //echo "New record created successfully";
      $sql = "SELECT person_id FROM person WHERE first_name='" .$first_name. "' AND last_name='" .$last_name. "' AND email='" .$email. "';";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $person_id = $row["person_id"];

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
            $sql = "INSERT INTO phone(fk_person_id, type, number) VALUES ('" .$person_id. "','".$type."','" .$phoneNumber. "');";
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
              $sql = "INSERT INTO university(fk_person_id, name, start, end) VALUES ('".$person_id. "','" .$university. "','" .$start_year. "','" .$end_year. "');";
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
              $sql = "INSERT INTO employment(fk_person_id, name, start, end) VALUES ('".$person_id. "','" .$company. "','" .$start_year. "','" .$end_year. "');";
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
              $sql = "INSERT INTO topic(fk_person_id, name) VALUES ('".$person_id. "','" .$topic. "');";
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
  }
$conn->close();
?>
<div class = "container">
  <h2>Submitted successfully</h2>
</div>
