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
    <h2>Employee Details</h2>
    <form role="form" method="post" action="update_confirmation.php">
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td>First Name</td>
            <td>
              <?php echo $first_name; ?>
            </td>
          </tr>
          <tr>
            <td>Last Name</td>
            <td>
              <?php echo $last_name; ?>
            </td>
          </tr>
          <tr>
            <td>Email</td>
            <td>
              <?php echo $email; ?>
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
                (".$type.") ".$number."
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
                ".$name."
                (".$start.") -
                (".$end.")
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
              ".$name."
              (".$start.") -
              (".$end.")
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
                ".$name."
              </td>
            </tr>";
            $counter++;
          }
          ?>

        </tbody>
      </table>
      </form>
    </div>
</div>
</div>
