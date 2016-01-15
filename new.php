<?php include('header.php'); ?>
<div class ="container">
  <div class="row">
  			<div class="col-md-6 col-md-offset-3">
				<form class="form-horizontal" role="form" method="post" action="confirmation.php">
          <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="" >
          </div>

          <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="" >
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="" >
          </div>

          <div class="form-group">
            <label for="address">Address</label>
            <input type="type" class="form-control" id="address" name="address" placeholder="Address" value="" >
          </div>

          <div class="form-group" id="phone_number">
            <label for="phone_number">Phone Number</label>
            <a class="btn btn-default" onclick="create_element_number('phone_number')">+</a>
            <input type="text" class="form-control" id="phone_number1" name="phone_number1" placeholder="phone_number 1" value="" >
            <input type="text" name="phone_type1" placeholder="Phone Type">
          </div>

          <div class="form-group" id="university">
            <label for="university">University Name</label>
            <a class="btn btn-default" onclick="create_element_university('university')">+</a>
            <input type="text" class="form-control" id="university1" name="university1" placeholder="university 1" value="" >
            <input type="text" name="university_start1" placeholder="start year" >
            <input type="text" name="university_end1" placeholder="end year" >
          </div>

          <div class="form-group" id="company">
            <label for="employment">Employment (Company Name)</label>
            <a class="btn btn-default" onclick="create_element_employment('company')">+</a>
            <input type="text" class="form-control" id="company1" name="company1" placeholder="company 1" value="" >
            <input type="text" name="company_start1" placeholder="start year" >
            <input type="text" name="company_end1" placeholder="end year" >
          </div>

          <div class="form-group" id="topic">
            <label for="employment">Research Topics</label>
            <a class="btn btn-default" onclick="create_element_topic('topic')">+</a>
            <input type="text" class="form-control" id="topic1" name="topic1" placeholder="topic 1" value="" >
          </div>

          <div class="form-group">
              <input id="submit" name="submit" type="submit" value="Submit" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
</div>

<script>
var numberVal = 2;
var universityVal = 2;
var employmentVal = 2;
var topicVal = 2;

function create_element_number(property) {
  var ni = document.getElementById(property);
  var input = document.createElement('input');
  var type = document.createElement('input');

  input.setAttribute('type','text');
  input.setAttribute('class','form-control');

  type.setAttribute('type','text');

  var temp = property + numberVal;
  var phone_type = 'phone_type' + numberVal;

  input.setAttribute('id',temp);

  input.setAttribute('name',temp);
  type.setAttribute('name',phone_type);

  var placeHolder = property + " " + numberVal;

  input.setAttribute('placeholder', placeHolder);
  type.setAttribute('placeholder', 'Phone Type');

  ni.appendChild(input);
  ni.appendChild(type);
  numberVal = numberVal + 1;
}

function create_element_university(property) {
    var ni = document.getElementById(property);
    var input = document.createElement('input');
    var start = document.createElement('input');
    var end = document.createElement('input');

    input.setAttribute('type','text');
    input.setAttribute('class','form-control');

    start.setAttribute('type','text');

    end.setAttribute('type','text');

    var temp = property + universityVal;
    var start_year = 'university_start' + universityVal;
    var end_year = 'university_end' + universityVal;

    input.setAttribute('id',temp);

    input.setAttribute('name',temp);
    start.setAttribute('name',start_year);
    end.setAttribute('name',end_year);

    var placeHolder = property + " " + universityVal;

    input.setAttribute('placeholder', placeHolder);
    start.setAttribute('placeholder', 'start year');
    end.setAttribute('placeholder', 'end year');

    ni.appendChild(input);
    ni.appendChild(start);
    ni.appendChild(end);
    universityVal = universityVal + 1;
}

function create_element_employment(property) {
  var ni = document.getElementById(property);
  var input = document.createElement('input');
  var start = document.createElement('input');
  var end = document.createElement('input');

  input.setAttribute('type','text');
  input.setAttribute('class','form-control');

  start.setAttribute('type','text');

  end.setAttribute('type','text');

  var temp = property + employmentVal;
  var start_year = 'company_start' + employmentVal;
  var end_year = 'company_end' + employmentVal;

  input.setAttribute('id',temp);

  input.setAttribute('name',temp);
  start.setAttribute('name',start_year);
  end.setAttribute('name',end_year);

  var placeHolder = property + " " + employmentVal;

  input.setAttribute('placeholder', placeHolder);
  start.setAttribute('placeholder', 'start year');
  end.setAttribute('placeholder', 'end year');

  ni.appendChild(input);
  ni.appendChild(start);
  ni.appendChild(end);
  employmentVal = employmentVal + 1;
}

function create_element_topic(property) {
    var ni = document.getElementById(property);
    var input = document.createElement('input');
    input.setAttribute('type','text');
    input.setAttribute('class','form-control');
    var temp = property + topicVal;
    input.setAttribute('id',temp);
    input.setAttribute('name',temp);
    var placeHolder = property + " " + topicVal;
    input.setAttribute('placeholder', placeHolder);
    ni.appendChild(input);
    topicVal = topicVal + 1;
}

function remove(property){
  document.getElementById("my-element").remove();
}

Element.prototype.remove = function() {
    this.parentElement.removeChild(this);
}
NodeList.prototype.remove = HTMLCollection.prototype.remove = function() {
    for(var i = this.length - 1; i >= 0; i--) {
        if(this[i] && this[i].parentElement) {
            this[i].parentElement.removeChild(this[i]);
        }
    }
}

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<?php include('footer.html'); ?>
