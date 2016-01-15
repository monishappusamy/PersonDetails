<?php include('header.php'); ?>
<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h2>Please confirm before submitting</h2>
      <form role="form" method="post" action="update_save.php">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>First Name</td>
              <td>
                <?php echo $_POST["first_name"]; ?>
                <input type="hidden" name="person_id" value= "<?php echo $_POST["person_id"]; ?>" />
                <input type="hidden" name="first_name" value= "<?php echo $_POST["first_name"]; ?>" />
              </td>
            </tr>
            <tr>
              <td>Last Name</td>
              <td>
                <?php echo $_POST["last_name"]; ?>
                <input type="hidden" name="last_name" value= "<?php echo $_POST["last_name"]; ?>" />
              </td>
            </tr>
            <tr>
              <td>Email</td>
              <td>
                <?php echo $_POST["email"]; ?>
                <input type="hidden" name="email" value= "<?php echo $_POST["email"]; ?>" />
              </td>
            </tr>

            <?php
            $counter = 1;


            while(true){
              $id = "phone_number".$counter;
              $idtype = "phone_type".$counter;
              //chech whether there are more numbers
              if (isset($_POST[$id])){
                $phoneNumber = $_POST[$id];
                $phoneType = $_POST[$idtype];

                echo "<tr><td>Phone Number (".$phoneType.")<input type=\"hidden\" name=".$idtype." value= " .$_POST[$idtype]." /></td>";
                echo "<td>"
                .$_POST[$id].
                "<input type=\"hidden\" name=".$id." value= " .$_POST[$id]." />
                </td></tr>";
                $counter++;
              }
              else {
                break;
              }
            }
            ?>

            <?php
            $counter = 1;
            while(true){
              $id = "university".$counter;
              $university_start = "university_start".$counter;
              $university_end = "university_end".$counter;
              //chech whether there are more numbers
              if (isset($_POST[$id])){
                $university = $_POST[$id];
                echo "<tr><td>University (".$counter.")</td>";
                echo "<td>"
                .$_POST[$id].
                "<input type=\"hidden\" name=\"".$id."\" value=\"".$_POST[$id]."\" />
                </td></tr>";
                echo "<tr><td>Start Year (".$counter.")</td>";
                echo "<td>"
                .$_POST[$university_start].
                "<input type=\"hidden\" name=".$university_start." value=\"".$_POST[$university_start]."\" />
                </td></tr>";
                echo "<tr><td>End Year (".$counter.")</td>";
                echo "<td>"
                .$_POST[$university_end].
                "<input type=\"hidden\" name=".$university_end." value=\"".$_POST[$university_end]."\" />
                </td></tr>";
                $counter++;
              }
              else {
                break;
              }
            }
            ?>

            <?php
            $counter = 1;
            while(true){
              $id = "company".$counter;
              $company_start = "company_start".$counter;
              $company_end = "company_end".$counter;
              //chech whether there are more numbers
              if (isset($_POST[$id])){
                $company = $_POST[$id];
                echo "<tr><td>Company (".$counter.")</td>";
                echo "<td>"
                .$_POST[$id].
                "<input type=\"hidden\" name=\"".$id."\" value=\"".$_POST[$id]."\" />
                </td></tr>";
                echo "<tr><td>Start Year (".$counter.")</td>";
                echo "<td>"
                .$_POST[$company_start].
                "<input type=\"hidden\" name=".$company_start." value=\"".$_POST[$company_start]."\" />
                </td></tr>";
                echo "<tr><td>End Year (".$counter.")</td>";
                echo "<td>"
                .$_POST[$company_end].
                "<input type=\"hidden\" name=".$company_end." value=\"".$_POST[$company_end]."\" />
                </td></tr>";
                $counter++;
              }
              else {
                break;
              }
            }
            ?>

            <?php
            $counter = 1;
            while(true){
              $id = "topic".$counter;
              //chech whether there are more numbers
              if (isset($_POST[$id])){
                $topic = $_POST[$id];
                echo "<tr><td>Research Topic (".$counter.")</td>";
                echo "<td>"
                .$_POST[$id].
                "<input type=\"hidden\" name=".$id."  value=\"".$_POST[$id]."\"  />
                </td></tr>";
                $counter++;
              }
              else {
                break;
              }
            }
            ?>


          </tbody>
        </table>
        <center><input id="submit" name="submit" type="submit" value="Confirm" class="btn btn-primary"/><center>
        </form>
      </div>
    </div>
  </div>
