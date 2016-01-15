<?php include('header.php'); ?>
<div class="container">
<?php
  // conncetion details
  require "config.php";
  $person_id = $_GET["id"];

      $sql = "select person_id, first_name, last_name, email from person
      WHERE person_id='" .$person_id. "';";

      $temp = 'SET sql_mode = \'\'';
      $conn->query($temp);
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $first_name = $row["first_name"];
      $last_name = $row["last_name"];
      $email = $row["email"];

?>
<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <h2>Please modify the details</h2>
    <form role="form" method="post" action="update_confirmation.php">
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td>First Name</td>
            <td>
              <input type="hidden" name="person_id" value= "<?php echo $person_id; ?>" />
              <input type="text" name="first_name" value= "<?php echo $first_name; ?>" />
            </td>
          </tr>
          <tr>
            <td>Last Name</td>
            <td>
              <input type="text" name="last_name" value= "<?php echo $last_name; ?>" />
            </td>
          </tr>
          <tr>
            <td>Email</td>
            <td>
              <input type="text" name="email" value= "<?php echo $email; ?>" />
            </td>
          </tr>

          <?php
          //code to extract phone numbers
          $sql = "select type, number from phone
          WHERE fk_person_id='" .$person_id. "';";

          $temp = 'SET sql_mode = \'\'';
          $conn->query($temp);
          $result = $conn->query($sql);

          $counter = 1;
          while($row = $result->fetch_assoc()) {
            $number = $row["number"];
            $type = $row["type"];
            echo "<tr>
              <td>Phone Number</td>
              <td>
                <input type=\"text\" size=\"7\" name=\"phone_type".$counter."\" value= \"".$type."\" />
                <input type=\"text\" name=\"phone_number".$counter."\" value= \"".$number."\" />
              </td>
            </tr>";
            $counter++;
          }
          ?>

          <?php
          //code to extract University
          $sql = "select name, start, end from university
          WHERE fk_person_id='" .$person_id. "';";

          $temp = 'SET sql_mode = \'\'';
          $conn->query($temp);
          $result = $conn->query($sql);

          $counter = 1;
          while($row = $result->fetch_assoc()) {
            $name = $row["name"];
            $start = $row["start"];
            $end = $row["end"];
            echo "<tr>
              <td>Unviversity ".$counter."</td>
              <td>
                <input type=\"text\" size=\"40\" name=\"university".$counter."\" value= \"".$name."\" />
                <input type=\"text\" size=\"4\" name=\"university_start".$counter."\" value= \"".$start."\" />
                <input type=\"text\" size=\"4\" name=\"university_end".$counter."\" value= \"".$end."\" />
              </td>
            </tr>";
            $counter++;
          }
          ?>

          <?php
          //code to extract University
          $sql = "select name, start, end from employment
          WHERE fk_person_id='" .$person_id. "';";

          $temp = 'SET sql_mode = \'\'';
          $conn->query($temp);
          $result = $conn->query($sql);

          $counter = 1;
          while($row = $result->fetch_assoc()) {
            $name = $row["name"];
            $start = $row["start"];
            $end = $row["end"];
            echo "<tr>
              <td>company ".$counter."</td>
              <td>
                <input type=\"text\" size=\"40\" name=\"company".$counter."\" value= \"".$name."\" />
                <input type=\"text\" size=\"4\" name=\"company_start".$counter."\" value= \"".$start."\" />
                <input type=\"text\" size=\"4\" name=\"company_end".$counter."\" value= \"".$end."\" />
              </td>
            </tr>";
            $counter++;
          }
          ?>

          <?php
          //code to extract University
          $sql = "select name from topic
          WHERE fk_person_id='" .$person_id. "';";

          $temp = 'SET sql_mode = \'\'';
          $conn->query($temp);
          $result = $conn->query($sql);

          $counter = 1;
          while($row = $result->fetch_assoc()) {
            $name = $row["name"];
            echo "<tr>
              <td>Research Topic ".$counter."</td>
              <td>
                <input type=\"text\" name=\"topic".$counter."\" value= \"".$name."\" />
              </td>
            </tr>";
            $counter++;
          }
          ?>

        </tbody>
      </table>
      <center><input id="submit" name="submit" type="submit" value="Update" class="btn btn-primary"/><center>
      </form>
    </div>
</div>
</div>
