<?php
include ("restriction.php");
include ("../../../../../admin/pages/editDesign/phpConnection/logoSQL.php");
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/virtual-select.min.css">
  <link rel="stylesheet" href="css/workingForm.css">
  <title>Malvar Senior High School Alumni</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
  if ($logoResult) {
    $logo = $logoResult['logo'];
    ?>
    <link rel="shortcut icon" href="../../../../../admin/pages/editDesign/<?php echo $logo ?>" />
    <?php
  } else {
    ?>
    <link rel="shortcut icon" href="images/logoLogin.png" />
    <?php
  }
  ?>
  <script type="text/javascript" src="multi-select"></script>
</head>

<body>
  <?php include ("sql/indexSQL.php"); ?>
  <form action="#" method="POST">
    <nav class="navbar mb-5">
      <div class="container-fluid">
        <span class="navbar-text">
          <i class="exit bi bi-x" data-bs-toggle="modal" data-bs-target="#cancelForm"></i>
          Alumni Tracer Survey Form
        </span>
      </div>
    </nav>
    <div class="container">
      <div class="row align-items-center justify-content-center mb-5">
        <div class="col-md-8">
          <!-- HEADER -->
          <div class="main-card card mb-4 ps-3">
            <div class="card-body">
              <div class="row mt-3">
                <div class="col-12 mb-2">
                  <h2>
                    Tracer Survey Form for Alumni Working & Not Studying
                  </h2>
                </div>
                <div class="col-12">
                  <p class="text-body-secondary">
                    Instruction: Please make sure that you answer every question and avoid returning or refreshing the
                    page
                    or else your data will be reset.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <!-- VALIDATION ALERT -->
          <div class="alert alert-danger alert-dismissible fade show" id="validationAlert" role="alert"
            style="display: none; padding: 10px;">
            <i class="bi bi-exclamation-triangle-fill" style="margin-right: 5px;"></i>
            Please fill out the inputs and don't leave it empty.
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
                          placeholder="Enter your name">
                      </div>
                      <div class="col-md-6 mt-3">
                        <h5>
                          Age
                        </h5>
                        <input type="text" class="form-control" name="age" id="input-control"
                          placeholder="Enter your age">
                      </div>
                    </div>
                    <div class="row mb-4">
                      <div class="col-md-6 mb-3">
                        <h5>
                          Gender
                        </h5>
                        <select name="gender" class="form-select" name="gender" id="select-control">
                          <option disabled selected value>Select gender</option>
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <h5>
                          Civil Status
                        </h5>
                        <select name="civilStatus" class="form-select" id="select-control">
                          <option disabled selected value>Select civil status</option>
                          <option value="single">Single</option>
                          <option value="married">Married</option>
                          <option value="widow">Widow/er</option>
                          <option value="separated">Separated</option>
                          <option value="solo">Solo Parent</option>
                        </select>
                      </div>
                    </div>
                    <div class="row mb-4">
                      <div class="col-md-6 mb-3">
                        <h5>
                          Contact Number
                        </h5>
                        <input type="tel" class="form-control" name="contactNumber" id="input-control"
                          pattern="^(09|\+639)\d{9}$" maxlength="11" placeholder="Enter your contact number">
                      </div>
                      <div class="col-md-6">
                        <h5>
                          Residential Address
                        </h5>
                        <input type="text" class="form-control" name="residentialAddress" id="input-control"
                          placeholder="Enter your residential address">
                      </div>
                    </div>
                    <div class="row mb-4">
                      <div class="col-md-6 mb-3">
                        <h5>
                          Email Address
                        </h5>
                        <input type="email" class="form-control" name="emailAddress" id="input-control"
                          placeholder="Enter your email address">
                      </div>
                      <div class="col-md-6">
                        <h5>
                          City / Province
                        </h5>
                        <input type="text" class="form-control" name="city" id="input-control"
                          placeholder="Enter your city / province">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-6 mb-3">
                        <h5>
                          Strand taken in SHS
                        </h5>
                        <input type="text" class="form-control" name="strand" id="input-control"
                          placeholder="Enter your strand taken">
                      </div>
                      <div class="col-md-6">
                        <h5>
                          Year Graduated
                        </h5>
                        <input type="text" class="form-control" name="yearGraduated" id="input-control"
                          placeholder="Enter the year you graduated">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- PART II. - EMPLOYMENT STATUS -->
          <div class="employment-container">
            <div class="row mb-2">
              <div class="col-md-12 mb-4">
                <div class="card mt-2">
                  <div class="card-header" style="background-color: #00274C; color: white;">
                    <div class="col-12 mt-2">
                      <h4>
                        Part II. - Employment Status
                      </h4>
                    </div>
                  </div>
                  <div class="card-body ps-4" style="padding: 20px;">
                    <div class="row mt-3 mb-4">
                      <!-- NUMBER 1 QUESTION -->
                      <div class="col-12 mb-4">
                        <h5>
                          1. Are you presently employed?</p>
                        </h5>
                        <input type="text" class="form-control" name="answer1" id="input-control" value="Yes" readonly>
                      </div>
                      <!-- NUMBER 2 QUESTION -->
                      <div class="col-12 mb-4">
                        <h5>
                          2. What is the status of your employment?
                        </h5>
                        <select name="answer2" class="form-select" id="select-control">
                          <option disabled selected value>Choose your status</option>
                          <option value="Part Time">
                            Part Time
                          </option>
                          <option value="Job Order (JO)">
                            Job Order
                          </option>
                          <option value="Contractual">
                            Contractual
                          </option>
                          <option value="Self-Employed">
                            Self-Employed
                          </option>
                          <option value="Temporary">
                            Temporary
                          </option>
                          <option value="Permanent">
                            Permanent
                          </option>
                          <option value="Others">
                            Others
                          </option>
                        </select>
                      </div>
                      <!-- NUMBER 3 QUESTION -->
                      <div class="col-12 mb-4">
                        <h5>
                          3. What industry sector are you working in?
                        </h5>
                        <select name="answer3" class="form-select" id="select-control">
                          <option disabled selected value>Choose your industry sector</option>
                          <option value="Manufacturing">
                            Manufacturing
                          </option>
                          <option value="Economics">
                            Economics
                          </option>
                          <option value="Health Care">
                            Health Care
                          </option>
                          <option value="Education">
                            Education
                          </option>
                          <option value="Finance">
                            Finance
                          </option>
                          <option value="Fashion">
                            Fashion
                          </option>
                          <option value="Medical">
                            Medical
                          </option>
                          <option value="Agriculture">
                            Agriculture
                          </option>
                        </select>
                      </div>
                      <!-- NUMBER 4 QUESTION -->
                      <div class="col-12 mb-4">
                        <h5>
                          4. How long did it take you to find your present job?
                        </h5>
                        <select name="answer4" class="form-select" id="select-control">
                          <option disabled selected value>Select your category</option>
                          <option value="0-3 months">
                            0-3 months
                          </option>
                          <option value="4-6 months">
                            4-6 months
                          </option>
                          <option value="7-9 months">
                            7-9 months
                          </option>
                          <option value="10-12 months">
                            10-12 months
                          </option>
                          <option value="More than one (1) year">
                            More than one year
                          </option>
                        </select>
                      </div>
                      <!-- NUMBER 5 QUESTION -->
                      <div class="col-12 mb-4">
                        <h5>
                          5. How many years of experience in the company?
                        </h5>
                        <input type="text" class="form-control" name="answer5" id="input-control"
                          placeholder="Enter your years of experience in the company">
                      </div>
                      <!-- NUMBER 6 QUESTION -->
                      <div class="col-12 mb-4">
                        <h5>
                          6. Where is the company located at?
                        </h5>
                        <input type="text" class="form-control" name="answer6" id="input-control"
                          placeholder="Enter the location of the company">
                      </div>
                      <!-- NUMBER 7 QUESTION -->
                      <div class="col-12 mb-4">
                        <h5>
                          7. What is your designation/position?
                        </h5>
                        <input type="text" class="form-control" name="answer7" id="input-control"
                          placeholder="Enter your designation/position">
                      </div>
                      <!-- NUMBER 8 QUESTION -->
                      <div class="col-12 mb-4">
                        <h5>
                          8. In what way did you find your job?
                        </h5>
                        <select name="answer8" class="form-select" id="select-control">
                          <option disabled selected value>Select your option</option>
                          <option value="Newspaper/Television/Radio">
                            Newspaper/Television/Radio
                          </option>
                          <option value="Internet">
                            Internet
                          </option>
                          <option value="Relatives or/and Colleagues">
                            Relatives or/and Colleagues
                          </option>
                          <option value="Industry Linkages">
                            Industry Linkages
                          </option>
                          <option value="Job Fair">
                            Job Fair
                          </option>
                          <option value="Others">
                            Others
                          </option>
                        </select>
                      </div>
                      <!-- NUMBER 9 QUESTION -->
                      <div class="col-12 mb-4">
                        <h5>
                          9. Are you satisfied with your opportunities for career growth at your job?
                        </h5>
                        <select name="answer9" class="form-select" id="select-control">
                          <option disabled selected value>Select your option</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                        </select>
                      </div>
                      <!-- NUMBER 10 QUESTION -->
                      <div class="col-12 mb-4">
                        <h5>
                          10. How satisfied are you with your current job?
                        </h5>
                        <select name="answer10" class="form-select" id="select-control">
                          <option disabled selected value>Select your option</option>
                          <option value="Strongly Satisfied">
                            Strongly Satisfied
                          </option>
                          <option value="Satisfied">
                            Satisfied
                          </option>
                          <option value="Neutral">
                            Neutral
                          </option>
                          <option value="Dissatisfied">
                            Dissatisfied
                          </option>
                          <option value="Strongly Dissatisfied">
                            Strongly Dissatisfied
                          </option>
                        </select>
                      </div>
                      <!-- NUMBER 11 QUESTION -->
                      <div class="col-12 mb-4">
                        <h5>
                          11. How much is your first monthly income salary of your first job?
                        </h5>
                        <select name="answer11" class="form-select" id="select-control">
                          <option disabled selected value>Select your first monthly income</option>
                          <option value="below P5,000">
                            below P5,000
                          </option>
                          <option value="P5,000 - P10,999">
                            P5,000 - P10,999
                          </option>
                          <option value="P11,000 - P15,999">
                            P11,000 - P15,999
                          </option>
                          <option value="P16,000 - P20,999">
                            P16,000 - P20,999
                          </option>
                          <option value="P21,000 and above">
                            P21,000 and above
                          </option>
                        </select>
                      </div>
                      <!-- NUMBER 12 QUESTION -->
                      <div class="col-12 mb-4">
                        <h5>
                          12. How much is your current monthly income salary of your present job?
                        </h5>
                        <select name="answer12" class="form-select" id="select-control">
                          <option disabled selected value>Select your current monthly income</option>
                          <option value="below P5,000">
                            below P5,000
                          </option>
                          <option value="P5,000 - P10,999">
                            P5,000 - P10,999
                          </option>
                          <option value="P11,000 - P15,999">
                            P11,000 - P15,999
                          </option>
                          <option value="P16,000 - P20,999">
                            P16,000 - P20,999
                          </option>
                          <option value="P21,000 and above">
                            P21,000 and above
                          </option>
                        </select>
                      </div>
                      <!-- NUMBER 13 QUESTION -->
                      <div class="col-12 mb-4">
                        <h5>
                          13. Do you feel your education prepared for your current job?
                        </h5>
                        <select name="answer13" class="form-select" id="select-control">
                          <option disabled selected value>Select your option</option>
                          <option value="Strongly Satisfied">
                            Strongly Satisfied
                          </option>
                          <option value="Satisfied">
                            Satisfied
                          </option>
                          <option value="Neutral">
                            Neutral
                          </option>
                          <option value="Dissatisfied">
                            Dissatisfied
                          </option>
                          <option value="Strongly Dissatisfied">
                            Strongly Dissatisfied
                          </option>
                        </select>
                      </div>
                      <!-- NUMBER 14 QUESTION -->
                      <div class="col-12 mb-4">
                        <h5>
                          14. How satisfied are you with the office/workspace facilities provided by your company?
                        </h5>
                        <select name="answer14" class="form-select" id="select-control">
                          <option disabled selected value>Select your option</option>
                          <option value="Strongly Satisfied">
                            Strongly Satisfied
                          </option>
                          <option value="Satisfied">
                            Satisfied
                          </option>
                          <option value="Neutral">
                            Neutral
                          </option>
                          <option value="Dissatisfied">
                            Dissatisfied
                          </option>
                          <option value="Strongly Dissatisfied">
                            Strongly Dissatisfied
                          </option>
                        </select>
                      </div>
                      <!-- NUMBER 15 QUESTION -->
                      <div class="col-12 mb-4">
                        <h5>
                          15. How satisfied are you with the overall enviroment of the workplace?
                        </h5>
                        <select name="answer15" class="form-select" id="select-control">
                          <option disabled selected value>Select your option</option>
                          <option value="Strongly Satisfied">
                            Strongly Satisfied
                          </option>
                          <option value="Satisfied">
                            Satisfied
                          </option>
                          <option value="Neutral">
                            Neutral
                          </option>
                          <option value="Dissatisfied">
                            Dissatisfied
                          </option>
                          <option value="Strongly Dissatisfied">
                            Strongly Dissatisfied
                          </option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- PART III. - EDUCATIONAL STATUS -->
          <div class="educational-container">
            <div class="row mb-2">
              <div class="col-md-12 mb-4">
                <div class="card mt-2">
                  <div class="card-header" style="background-color: #00274C; color: white;">
                    <div class="col-12 mt-2">
                      <h4>
                        Part III. - Educational Status
                      </h4>
                    </div>
                  </div>
                  <div class="card-body ps-4" style="padding: 20px;">
                    <div class="row mt-3 mb-4">
                    <div class="col-12 mb-4">
                        <h5>
                          16. Please provide the reason(s) for not pursuing further education. (Select one or more)
                        </h5>
                        <select id="multipleSelect" multiple name="answer16" placeholder="Select the reason(s)">
                          <option value="Financial constraints">
                            Financial constraints
                          </option>
                          <option value="Lack of interest in academics">
                            Lack of interest in academics
                          </option>
                          <option value="Personal/Family reasons">
                            Personal/Family reasons
                          </option>
                          <option value="Career opportunities">
                            Career opportunities
                          </option>
                          <option value="Others">
                            Others
                          </option>
                        </select>
                      </div>
                      <div class="col-12 mb-4">
                        <h5>
                          17. Do you plan to pursue further education in the future?
                        </h5>
                        <select name="answer17" class="form-select" id="select-control">
                          <option disabled selected value>Choose your option</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                          <option value="Maybe">Maybe</option>
                        </select>
                      </div>
                      <div class="col-12">
                        <h5>
                          18. If you answered Yes or Maybe to the previous question, what focus would influence
                          your decision to pursue further education? (Please select one or more)
                        </h5>
                        <select id="multipleSelect" multiple name="answer18" placeholder="Select the reason(s)">
                          <option value="I answered No">I answered No</option>
                          <option value="Financial considerations">
                            Financial considerations
                          </option>
                          <option value="Personal interest/passion">
                            Personal interest/passion
                          </option>
                          <option value="Family support">
                            Family support
                          </option>
                          <option value="Career advancement opportunities">
                            Career advancement opportunities
                          </option>
                          <option value="Availability of educational resources">
                            Availability of educational resources
                          </option>
                          <option value="Others">
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
                          <option value="Additional Funds for Improving the Workshop Facilities">
                            Additional Funds for Improving the Workshop Facilities
                          </option>
                          <option value="Provision of more updated books, digitalized instructional materials">
                            Provision of more updated books, digitalized instructional materials
                          </option>
                          <option value="More relevant course content">
                            More relevant course content
                          </option>
                          <option value="Skills Enhancement Training">
                            Skills Enhancement Training
                          </option>
                          <option value="Ideal Teacher-Student Ratio">
                            Ideal Teacher-Student Ratio
                          </option>
                          <option value="Career Guidance Counselling">
                            Career Guidance Counselling
                          </option>
                          <option
                            value="Closer linkage between school and industry to ensure alumni know where look for jobs">
                            Closer linkage between school and industry to ensure alumni know where look for jobs
                          </option>
                          <option value="Others">
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
                          style="resize: none; height: 20vh;" placeholder="Write any comment or suggestion"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- SUBMIT FORM -->
          <div class="submit-form">
            <div class="col">
              <p class="text-body-secondary">
                Note: Please make sure that the information you provided is true and will be saved at the system.
              </p>
              <button type="submit" name="submit" class="btn" style="background-color: #00274C; color: white">
                Submit form <i class="bi bi-box-arrow-in-right"></i>
              </button>
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
</body>

</html>