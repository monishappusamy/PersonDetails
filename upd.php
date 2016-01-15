<?php include('header.php'); ?>
<div class ="container">
  <div class="row">
    <form class="form-inline" role="form" method="post" action="upd.php">
      <div class="form-group">
        <label for="first_name">First Name:</label>
        <input type="text" class="form-control" id="first_name" name="first_name" value="">
      </div>
      <div class="form-group">
        <label for="last_name">Last Name:</label>
        <input type="text" class="form-control" id="last_name" name="last_name" value="">
      </div>
      <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" id="email" name="email" value="">
      </div>
      <div class="form-group">
          <input id="submit" name="submit" type="submit" value="Submit" class="btn btn-primary">
      </div>
    </form>
  </div>
  <br><br>
  <div class="row">
    <?php
      // conncetion details
      require "config.php";

      if (isset($_POST["submit"])) {
        $first_name = NULL;
        $last_name = NULL;
        $email = NULL;

        if (isset($_POST["first_name"])){
          $first_name = $_POST["first_name"];
        }

        if (isset($_POST["last_name"])){
          $last_name = $_POST["last_name"];
        }

        if (isset($_POST["email"])){
          $email = $_POST["email"];
        }

        if("" == trim($_POST["email"]) && "" == trim($_POST["last_name"])){
          $sql = "
              select person.person_id,person.first_name, person.last_name, person.email from person
              WHERE person.first_name='" .$first_name. "';";
        }

        else if("" == trim($_POST["first_name"]) && "" == trim($_POST["email"])){
          $sql = "
              select person.person_id,person.first_name, person.last_name, person.email from person
              WHERE person.last_name='" .$last_name. "';";
        }

        else if("" == trim($_POST["first_name"]) && "" == trim($_POST["last_name"])){
          $sql = "
              select person.person_id,person.first_name, person.last_name, person.email from person
              WHERE person.email='" .$email. "';";
        }

        $temp = 'SET sql_mode = \'\'';
        $conn->query($temp);
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          echo "
            <table class=\"table\">
              <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
            ";
             // output data of each row
             while($row = $result->fetch_assoc()) {
                  $id = $row["person_id"];
                  echo "<tr>
                          <td>". $row["first_name"]."</td>
                          <td>". $row["last_name"] ."</td>
                          <td>". $row["email"] ."</td>";

                  echo "<td>
                    <div class=\"form-group\">
                    <a href = \"update.php?id=".$id."\" class=\"btn btn-danger\">Update</a>
                  </div>
                  </td>";
                  echo "</tr>";
             }

             echo "
              </tbody>
             </table>
             </div>
             ";

        } else {
             echo "0 results";
        }

      }
      $conn->close();
    ?>


</div>
<?php include('footer.html'); ?>
