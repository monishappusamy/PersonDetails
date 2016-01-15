<?php include('header.php'); ?>
<div class ="container">
  <div class="row">
    <form class="form-inline" role="form" method="post" action="search_two.php">
      <div class="form-group">
        <label for="University">University Name:</label>
        <input type="text" class="form-control" id="university" name="university">
      </div>
      <div class="form-group">
          <input id="submit" name="submit" type="submit" value="Submit" class="btn btn-primary">
      </div>
    </form>
    </form>
  </div>
  <br/>
  <br/>
  <br/>
<?php
  // conncetion details
  require "config.php";

  if (isset($_POST["submit"])) {
    if (isset($_POST["university"])){
      $university = $_POST["university"];
    }
    $sql = "
    select DISTINCT person.email,
    phone_numbers.number AS phone_numbers
    from person
    INNER JOIN university_link on person.person_id=university_link.fk_person_id
    INNER JOIN universities on university_link.fk_university_id = universities.university_id
    INNER JOIN phone_numbers on person.person_id=phone_numbers.fk_person_id
    INNER JOIN research_topics_link on person.person_id = research_topics_link.fk_person_id
    INNER JOIN research_topics on research_topics_link.fk_topic_id = research_topics.topic_id
    where universities.university_name='" .$university."';";

    $temp = 'SET sql_mode = \'\'';
    $conn->query($temp);
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      echo "
        <table class=\"table\">
          <thead>
            <tr>
              <th>Email</th>
              <th>Phone Numbers</th>
            </tr>
          </thead>
          <tbody>
        ";
         // output data of each row
         while($row = $result->fetch_assoc()) {
              echo "<tr>
                      <td>". $row["email"] ."</td>
                      <td>". $row["phone_numbers"] ."</td>
                    </tr>";
         }

         echo "
          </tbody>
         </table>
         ";
    } else {
         echo "0 results";
    }

  }
  $conn->close();
?>
</div>
</div>

<?php include('footer.html'); ?>
