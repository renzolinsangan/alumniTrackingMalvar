<?php
include ("../phpConnection/restriction.php");
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/virtual-select.min.css">
  <link rel="stylesheet" href="css/notSWForm.css">
  <title>Malvar Senior High School Alumni</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="shortcut icon" href="images/logoLogin.png">
  <script type="text/javascript" src="multi-select"></script>
</head>

<body>
  <form action="#" method="POST">
    <nav class="navbar mb-5">
      <div class="container-fluid">
        <span class="navbar-text">
          <i class="exit bi bi-x" data-bs-toggle="modal" data-bs-target="#cancelForm"></i>
          Alumni Tracer Survey Form
        </span>
      </div>
    </nav>
    <!-- EDIT DATA -->
    <?php include ("sql/notSWSQL.php"); ?>
    <div class="container">
      <div class="row align-items-center justify-content-center mb-5">
        <div class="col-md-8">
          <!-- HEADER -->
          <div class="main-card card mb-4 ps-3">
            <div class="card-body">
              <div class="row mt-3">
                <div class="col-12 mb-2">
                  <h2>
                    Tracer Survey Form for Alumni Not Studying & Not Working
                  </h2>
                </div>
                <div class="col-12">
                  <p class="text-body-secondary">
                    All of the data below are answered by the alumni in which, the administrator can't change or edit
                    the value of the data.
                  </p>
                </div>
                <div class="col-12 mb-3">
                  <?php include ("table/notSWTable.php"); ?>
                  <button class="btn" id="exportButton" style="background-color: #00274C; color: white;">
                    Download to Excel
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- PART I. - DEMOGRAPHIC INFORMATION -->
          <div class="demographic-container">
            <div class="row mb-2">
              <div class="col-md-12 mb-4">
                <div class="card mt-2">
                  <div class="card-header" style="background-color: #00274C; color: white;">
                    <div class="col-12 mt-2">
                      <h4>
                        Part I. - Demographic Information
                      </h4>
                    </div>
                  </div>
                  <div class="card-body ps-4" style="padding: 20px;">
                    <div class="row mb-4">
                      <div class="col-md-6 mt-3">
                        <h5>
                          Name
                        </h5>
                        <input type="text" class="form-control" name="fullName" id="input-control"
                          placeholder="Enter your name" value="<?php echo $fullName ?>" disabled>
                      </div>
                      <div class="col-md-6 mt-3">
                        <h5>
                          Age
                        </h5>
                        <input type="text" class="form-control" name="age" id="input-control"
                          placeholder="Enter your age" value="<?php echo $age ?>" disabled>
                      </div>
                    </div>
                    <div class="row mb-4">
                      <div class="col-md-6 mb-3">
                        <h5>
                          Gender
                        </h5>
                        <select name="gender" class="form-select" name="gender" id="select-control" disabled>
                          <option disabled selected <?php echo empty($gender) ? 'selected' : '' ?>value>Select gender
                          </option>
                          <option value="male" <?php echo ($gender === 'male') ? 'selected' : '' ?>>Male</option>
                          <option value="female" <?php echo ($gender === 'female') ? 'selected' : '' ?>>Female</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <h5>
                          Civil Status
                        </h5>
                        <select name="civilStatus" class="form-select" id="select-control" disabled>
                          <option disabled selected <?php echo empty($civilStatus) ? 'selected' : '' ?>value>Select
                            civil status</option>
                          <option value="single" <?php echo ($civilStatus === 'single') ? 'selected' : '' ?>>Single
                          </option>
                          <option value="married" <?php echo ($civilStatus === 'married') ? 'selected' : '' ?>>Married
                          </option>
                          <option value="widow" <?php echo ($civilStatus === 'widow') ? 'selected' : '' ?>>Widow/er
                          </option>
                          <option value="separated" <?php echo ($civilStatus === 'separated') ? 'selected' : '' ?>>
                            Separated</option>
                          <option value="solo" <?php echo ($civilStatus === 'solo') ? 'selected' : '' ?>>Solo Parent
                          </option>
                        </select>
                      </div>
                    </div>
                    <div class="row mb-4">
                      <div class="col-md-6 mb-3">
                        <h5>
                          Contact Number
                        </h5>
                        <input type="tel" class="form-control" name="contactNumber" id="input-control"
                          pattern="^(09|\+639)\d{9}$" maxlength="11" placeholder="Enter your contact number"
                          value="<?php echo $contactNumber ?>" disabled>
                      </div>
                      <div class="col-md-6">
                        <h5>
                          Residential Address
                        </h5>
                        <input type="text" class="form-control" name="residentialAddress" id="input-control"
                          placeholder="Enter your residential address" value="<?php echo $residentialAddress ?>"
                          disabled>
                      </div>
                    </div>
                    <div class="row mb-4">
                      <div class="col-md-6 mb-3">
                        <h5>
                          Email Address
                        </h5>
                        <input type="email" class="form-control" name="emailAddress" id="input-control"
                          placeholder="Enter your email address" value="<?php echo $emailAddress ?>" disabled>
                      </div>
                      <div class="col-md-6">
                        <h5>
                          City / Province
                        </h5>
                        <input type="text" class="form-control" name="city" id="input-control"
                          placeholder="Enter your city / province" value="<?php echo $city ?>" disabled>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-6 mb-3">
                        <h5>
                          Strand taken in SHS
                        </h5>
                        <input type="text" class="form-control" name="strand" id="input-control"
                          placeholder="Enter your strand taken" value="<?php echo $strand ?>" disabled>
                      </div>
                      <div class="col-md-6">
                        <h5>
                          Year Graduated
                        </h5>
                        <input type="text" class="form-control" name="yearGraduated" id="input-control"
                          placeholder="Enter the year you graduated" value="<?php echo $yearGraduated ?>" disabled>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- PART II. - EDUCATIONAL STATUS -->
          <div class="educational-container">
            <div class="row mb-2">
              <div class="col-md-12 mb-4">
                <div class="card mt-2">
                  <div class="card-header" style="background-color: #00274C; color: white;">
                    <div class="col-12 mt-2">
                      <h4>
                        Part II. - Educational Status
                      </h4>
                    </div>
                  </div>
                  <div class="card-body ps-4" style="padding: 20px;">
                    <div class="row mt-3 mb-4">
                      <div class="col-12 mb-4">
                        <h5>
                          1. Please provide the reason(s) for not pursuing further education. (Select one or more)
                        </h5>
                        <select id="multipleSelect" multiple name="answer1" placeholder="Select the reason(s)">
                          <option value="Financial constraints" <?php echo in_array('Financial constraints', $answer1Options) ? 'selected' : ''; ?>>
                            Financial constraints
                          </option>
                          <option value="Lack of interest in academics" <?php echo in_array('Lack of interest in academics', $answer1Options) ? 'selected' : ''; ?>>
                            Lack of interest in academics
                          </option>
                          <option value="Personal/Family reasons" <?php echo in_array('Personal/Family reasons', $answer1Options) ? 'selected' : ''; ?>>
                            Personal/Family reasons
                          </option>
                          <option value="Career opportunities" <?php echo in_array('Career opportunities', $answer1Options) ? 'selected' : ''; ?>>
                            Career opportunities
                          </option>
                          <option value="Others" <?php echo in_array('Others', $answer1Options) ? 'selected' : ''; ?>>
                            Others
                          </option>
                        </select>
                      </div>
                      <div class="col-12 mb-4">
                        <h5>
                          2. Do you plan to pursue further education in the future?
                        </h5>
                        <select name="answer2" class="form-select" id="select-control" disabled>
                          <option disabled selected <?php echo empty($answer2) ? 'selected' : '' ?>value>Choose your
                            option</option>
                          <option value="Yes" <?php echo ($answer2 === 'Yes') ? 'selected' : '' ?>>Yes</option>
                          <option value="No" <?php echo ($answer2 === 'No') ? 'selected' : '' ?>>No</option>
                          <option value="Maybe" <?php echo ($answer2 === 'Maybe') ? 'selected' : '' ?>>Maybe</option>
                        </select>
                      </div>
                      <div class="col-12">
                        <h5>
                          3. If you answered Yes or Maybe to the previous question, what focus would influence
                          your decision to pursue further education? (Please select one or more)
                        </h5>
                        <select id="multipleSelect" multiple name="answer3" placeholder="Select the reason(s)">
                          <option value="I answered No" <?php echo in_array('I answered No', $answer3Options) ? 'selected' : ''; ?>>
                            I answered No
                          </option>
                          <option value="Financial considerations" <?php echo in_array('Financial considerations', $answer3Options) ? 'selected' : ''; ?>>
                            Financial considerations
                          </option>
                          <option value="Personal interest/passion" <?php echo in_array('Personal interest/passion', $answer3Options) ? 'selected' : ''; ?>>
                            Personal interest/passion
                          </option>
                          <option value="Family support" <?php echo in_array('Family support', $answer3Options) ? 'selected' : ''; ?>>
                            Family support
                          </option>
                          <option value="Career advancement opportunities" <?php echo in_array('Career advancement opportunities', $answer3Options) ? 'selected' : ''; ?>>
                            Career advancement opportunities
                          </option>
                          <option value="Availability of educational resources" <?php echo in_array('Availability of educational resources', $answer3Options) ? 'selected' : ''; ?>>
                            Availability of educational resources
                          </option>
                          <option value="Others" <?php echo in_array('Others', $answer3Options) ? 'selected' : ''; ?>>
                            Others
                          </option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- PART III. EMPLOYMENT STATUS -->
          <div class="employment-container">
            <div class="row mb-2">
              <div class="col-md-12 mb-4">
                <div class="card mt-2">
                  <div class="card-header" style="background-color: #00274C; color: white;">
                    <h4>
                      Part III. - Employment Status
                    </h4>
                  </div>
                  <div class="card-body ps-4" style="padding: 20px;">
                    <div class="row mt-3 mb-4">
                      <div class="col-12 mb-4">
                        <h5>
                          4. Please provide reason(s) for why you are not employed. (Select one or more)
                        </h5>
                        <select id="multipleSelect" multiple name="answer4" placeholder="Select the reason(s)">
                          <option value="Financial problem" <?php echo in_array('Financial problem', $answer4Options) ? 'selected' : ''; ?>>
                            Financial problem
                          </option>
                          <option value="Personal/Family reasons" <?php echo in_array('Personal/Family reasons', $answer4Options) ? 'selected' : ''; ?>>
                            Personal/Family reasons
                          </option>
                          <option value="Recently unemployed" <?php echo in_array('Recently unemployed', $answer4Options) ? 'selected' : ''; ?>>
                            Recently unemployed
                          </option>
                          <option value="Waiting for employment" <?php echo in_array('Waiting for employment', $answer4Options) ? 'selected' : ''; ?>>
                            Waiting for employment
                          </option>
                          <option value="Health Issues" <?php echo in_array('Health Issues', $answer4Options) ? 'selected' : ''; ?>>
                            Health Issues
                          </option>
                          <option value="Others" <?php echo in_array('Others', $answer4Options) ? 'selected' : ''; ?>>
                            Others
                          </option>
                        </select>
                      </div>
                      <div class="col-12 mb-4">
                        <h5>
                          5. Do you plan to search for a job in the future?
                        </h5>
                        <select class="form-select" name="answer5" id="select-control" disabled>
                          <option disabled selected <?php echo empty($answer5) ? 'selected' : '' ?> value>Select your
                            option</option>
                          <option value="Yes" <?php echo ($answer5 === 'Yes') ? 'selected' : '' ?>>
                            Yes
                          </option>
                          <option value="No" <?php echo ($answer5 === 'No') ? 'selected' : '' ?>>
                            No
                          </option>
                          <option value="Maybe" <?php echo ($answer5 === 'Maybe') ? 'selected' : '' ?>>
                            Maybe
                          </option>
                        </select>
                      </div>
                      <div class="col-12">
                        <h5>
                          6. If you answered Yes or Maybe to the previous question, what factors would influence
                          your decision to search for a job in the future? (Select one or more)
                        </h5>
                        <select id="multipleSelect" multiple name="answer6" placeholder="Select the reason(s)">
                          <option value="I answered no" <?php echo in_array('I answered no', $answer6Options) ? 'selected' : ''; ?>>
                            I answered no
                          </option>
                          <option value="Financial considerations" <?php echo in_array('Financial considerations', $answer6Options) ? 'selected' : ''; ?>>
                            Financial considerations
                          </option>
                          <option value="Personal interest/passion" <?php echo in_array('Personal interest/passion', $answer6Options) ? 'selected' : ''; ?>>
                            Personal/Family reasons
                          </option>
                          <option value="Family Support" <?php echo in_array('Family Support', $answer6Options) ? 'selected' : ''; ?>>
                            Family Support
                          </option>
                          <option value="Career advancement opportunities" <?php echo in_array('Career advancement opportunities', $answer6Options) ? 'selected' : ''; ?>>
                            Career advancement opportunities
                          </option>
                          <option value="Availability of work resources" <?php echo in_array('Availability of work resources', $answer6Options) ? 'selected' : ''; ?>>
                            Availability of work resources
                          </option>
                          <option value="Others" <?php echo in_array('Others', $answer6Options) ? 'selected' : ''; ?>>
                            Others
                          </option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- PART IV. - COMMENTS AND SUGGESTIONS -->
          <div class="feedback-container">
            <div class="row mb-2">
              <div class="col-md-12 mb-4">
                <div class="card mt-2">
                  <div class="card-header" style="background-color: #00274C; color: white;">
                    <div class="col-12 mt-2">
                      <h4>
                        Part IV. - Comments and Suggestions
                      </h4>
                    </div>
                  </div>
                  <div class="card-body ps-4" style="padding: 20px;">
                    <div class="row mt-3 mb-4">
                      <!-- FIRST PART -->
                      <div class="col-12 mb-4">
                        <h5>
                          Based on your present status, what do you suggest to improve the system in the Senior High
                          School? (Select one or more)
                        </h5>
                        <select id="multipleSelect" multiple name="feedback1" placeholder="Select the factor(s)">
                          <option value="Additional Funds for Improving the Workshop Facilities" <?php echo in_array('Additional Funds for Improving the Workshop Facilities', $feedbackOptions) ? 'selected' : ''; ?>>
                            Additional Funds for Improving the Workshop Facilities
                          </option>
                          <option value="Provision of more updated books, digitalized instructional materials" <?php echo in_array('Provision of more updated books, digitalized instructional materials', $feedbackOptions) ? 'selected' : ''; ?>>
                            Provision of more updated books, digitalized instructional materials
                          </option>
                          <option value="More relevant course content" <?php echo in_array('More relevant course content', $feedbackOptions) ? 'selected' : ''; ?>>
                            More relevant course content
                          </option>
                          <option value="Skills Enhancement Training" <?php echo in_array('Skills Enhancement Training', $feedbackOptions) ? 'selected' : ''; ?>>
                            Skills Enhancement Training
                          </option>
                          <option value="Ideal Teacher-Student Ratio" <?php echo in_array('Ideal Teacher-Student Ratio', $feedbackOptions) ? 'selected' : ''; ?>>
                            Ideal Teacher-Student Ratio
                          </option>
                          <option value="Career Guidance Counselling" <?php echo in_array('Career Guidance Counselling', $feedbackOptions) ? 'selected' : ''; ?>>
                            Career Guidance Counselling
                          </option>
                          <option
                            value="Closer linkage between school and industry to ensure alumni know where look for jobs"
                            <?php echo in_array('Closer linkage between school and industry to ensure alumni know where look for jobs', $feedbackOptions) ? 'selected' : ''; ?>>
                            Closer linkage between school and industry to ensure alumni know where look for jobs
                          </option>
                          <option value="Others" <?php echo in_array('Others', $feedbackOptions) ? 'selected' : ''; ?>>
                            Others
                          </option>
                        </select>
                      </div>
                      <!-- SECOND PART -->
                      <div class="col-12 mb-4">
                        <h5>
                          Do you have any other comments and suggestions to further enhance the educational and
                          employment opportunities for yourself, your fellow alumni, and your underclassmen in the
                          Senior High School.
                        </h5>
                        <textarea name="feedback2" class="form-control" id="input-control"
                          style="resize: none; height: 20vh;" placeholder="Write any comment or suggestion"
                          disabled><?php echo htmlspecialchars($feedback2, ENT_QUOTES, 'UTF-8'); ?></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

  <!-- MODAL -->
  <?php include ("modal/exitForm.php"); ?>
  <!-- MAIN JAVASCRIPT -->
  <?php include ("js/javascript.php"); ?>
  <!-- JAVASCRIPT FOR MULTIPLE SELECT -->
  <script type="text/javascript" src="js/virtual-select.min.js"></script>
  <script>
    VirtualSelect.init({
      ele: '#multipleSelect'
    });
  </script>
  <!-- TABLE TO EXCEL -->
  <script type="text/javascript" src="js/table2excel.js"></script>
  <script>
    document.getElementById('exportButton').addEventListener('click', function () {
      var table2excel = new Table2Excel();
      var tables = document.querySelectorAll("table");

      tables.forEach(function (table) {
        table2excel.export([table]);
      });
    });
  </script>
</body>

</html>