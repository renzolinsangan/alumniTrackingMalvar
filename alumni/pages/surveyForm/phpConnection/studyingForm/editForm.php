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
  <link rel="stylesheet" href="css/studyingForm.css">
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
  <!-- SQL -->
  <?php include ("sql/editData.php"); ?>
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
                  <h3 class="text-body-secondary">
                    (Edit Form)
                  </h3>
                  <h2>
                    Tracer Survey Form for Alumni Studying & Not Working
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
                          placeholder="Enter your name" value="<?php echo $fullName ?>">
                      </div>
                      <div class="col-md-6 mt-3">
                        <h5>
                          Age
                        </h5>
                        <input type="text" class="form-control" name="age" id="input-control"
                          placeholder="Enter your age" value="<?php echo $age ?>">
                      </div>
                    </div>
                    <div class="row mb-4">
                      <div class="col-md-6 mb-3">
                        <h5>
                          Gender
                        </h5>
                        <select name="gender" class="form-select" id="select-control">
                          <option disabled <?php echo empty($gender) ? 'selected' : ''; ?> value>Select gender</option>
                          <option value="male" <?php echo ($gender === 'male') ? 'selected' : ''; ?>>Male</option>
                          <option value="female" <?php echo ($gender === 'female') ? 'selected' : ''; ?>>Female</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <h5>
                          Civil Status
                        </h5>
                        <select name="civilStatus" class="form-select" id="select-control">
                          <option disabled selected <?php echo empty($civilStatus) ? 'selected' : '' ?> value></option>
                          Select civil status</option>
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
                          value="<?php echo $contactNumber ?>">
                      </div>
                      <div class="col-md-6">
                        <h5>
                          Residential Address
                        </h5>
                        <input type="text" class="form-control" name="residentialAddress" id="input-control"
                          placeholder="Enter your residential address" value="<?php echo $residentialAddress ?>">
                      </div>
                    </div>
                    <div class="row mb-4">
                      <div class="col-md-6 mb-3">
                        <h5>
                          Email Address
                        </h5>
                        <input type="email" class="form-control" name="emailAddress" id="input-control"
                          placeholder="Enter your email address" value="<?php echo $emailAddress ?>">
                      </div>
                      <div class="col-md-6">
                        <h5>
                          City / Province
                        </h5>
                        <input type="text" class="form-control" name="city" id="input-control"
                          placeholder="Enter your city / province" value="<?php echo $city ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-6 mb-3">
                        <h5>
                          Strand taken in SHS
                        </h5>
                        <input type="text" class="form-control" name="strand" id="input-control"
                          placeholder="Enter your strand taken" value="<?php echo $strand ?>">
                      </div>
                      <div class="col-md-6">
                        <h5>
                          Year Graduated
                        </h5>
                        <input type="text" class="form-control" name="yearGraduated" id="input-control"
                          placeholder="Enter the year you graduated" value="<?php echo $yearGraduated ?>">
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
                      <!-- NUMBER 1 QUESTION -->
                      <div class="col-12 mb-4">
                        <h5>
                          1. Are you presently pursuing higher education?</p>
                        </h5>
                        <input type="text" class="form-control" name="answer1" id="input-control"
                          value="<?php echo $answer1 ?>" readonly>
                      </div>
                      <!-- NUMBER 2 QUESTION -->
                      <div class="col-12 mb-4">
                        <h5>
                          2. What is the degree program you have taken in the university?
                        </h5>
                        <input type="text" class="form-control" name="answer2" id="input-control"
                          placeholder="Enter your degree program" value="<?php echo $answer2 ?>">
                      </div>
                      <!-- NUMBER 3 QUESTION -->
                      <div class="col-12 mb-4">
                        <h5>
                          3. What type of degree?
                        </h5>
                        <select name="answer3" class="form-select" id="select-control">
                          <option disabled selected <?php echo empty($answer3) ? 'selected' : '' ?> value>Select the
                            type of degree</option>
                          <option value="Bachelor's Degree" <?php echo ($answer3 === 'Bachelor\'s Degree') ? 'selected' : '' ?>>
                            Bachelor's Degree
                          </option>
                          <option value="Vocational" <?php echo ($answer3 === 'Vocational') ? 'selected' : '' ?>>
                            Vocational
                          </option>
                        </select>
                      </div>
                      <!-- NUMBER 4 QUESTION -->
                      <div class="col-12 mb-4">
                        <h5>
                          4. What category is the degree?
                        </h5>
                        <select name="answer4" class="form-select" id="select-control">
                          <option disabled selected <?php echo empty($answer4) ? 'selected' : '' ?> value>Select your
                            category</option>
                          <option value="Science/Technology/Matehmatics/Engineering" <?php echo ($answer4 === 'Science/Technology/Matehmatics/Engineering') ? 'selected' : '' ?>>
                            Science/Technology/Mathematics/Engineering
                          </option>
                          <option value="Education/Teaching" <?php echo ($answer4 === 'Education/Teaching') ? 'selected' : '' ?>>
                            Education/Teaching
                          </option>
                          <option value="Business" <?php echo ($answer4 === 'Business') ? 'selected' : '' ?>>
                            Business
                          </option>
                          <option value="Medical" <?php echo ($answer4 === 'Medical') ? 'selected' : '' ?>>
                            Medical
                          </option>
                          <option value="Humanities/Arts" <?php echo ($answer4 === 'Humanities/Arts') ? 'selected' : '' ?>>
                            Humanities/Arts
                          </option>
                          <option value="Others" <?php echo ($answer4 === 'Others') ? 'selected' : '' ?>>
                            Others
                          </option>
                        </select>
                      </div>
                      <!-- NUMBER 5 QUESTION -->
                      <div class="col-12 mb-4">
                        <h5>
                          5. Name and Location of the University
                        </h5>
                        <input type="text" class="form-control" name="answer5" id="input-control"
                          placeholder="Enter the name and location of your university" value="<?php echo $answer5 ?>">
                      </div>
                      <!-- NUMBER 6 QUESTION -->
                      <div class="col-12 mb-4">
                        <h5>
                          6. What type of institution is your university?
                        </h5>
                        <select name="answer6" class="form-select" id="select-control">
                          <option disabled selected <?php echo empty($answer6) ? 'selected' : '' ?> value>Select your
                            institution</option>
                          <option value="Private" <?php echo ($answer6 === 'Private') ? 'selected' : '' ?>>
                            Private
                          </option>
                          <option value="Public" <?php echo ($answer6 === 'Public') ? 'selected' : '' ?>>
                            Public
                          </option>
                        </select>
                      </div>
                      <!-- NUMBER 7 QUESTION -->
                      <div class="col-12 mb-4">
                        <h5>
                          7. How did you choose your current university? (Select one or more)
                        </h5>
                        <select name="answer7[]" id="multipleSelect" multiple placeholder="Select the degree">
                          <option value="Recommended by family or friends" <?php echo in_array('Recommended by family or friends', $selectedOptions) ? 'selected' : ''; ?>>
                            Recommended by family or friends
                          </option>
                          <option value="Reputation or ranking of the university" <?php echo in_array('Reputation or ranking of the university', $selectedOptions) ? 'selected' : ''; ?>>
                            Reputation or ranking of the university
                          </option>
                          <option value="Location or proximity to home" <?php echo in_array('Location or proximity to home', $selectedOptions) ? 'selected' : ''; ?>>
                            Location or proximity to home
                          </option>
                          <option value="Availability or desired program/course of study" <?php echo in_array('Availability or desired program/course of study', $selectedOptions) ? 'selected' : ''; ?>>
                            Availability or desired program/course of study
                          </option>
                          <option value="Scholarships or financial aid opportunities offered" <?php echo in_array('Scholarships or financial aid opportunities offered', $selectedOptions) ? 'selected' : ''; ?>>
                            Scholarships or financial aid opportunities offered
                          </option>
                          <option value="Campus facilities and resources" <?php echo in_array('Campus facilities and resources', $selectedOptions) ? 'selected' : ''; ?>>
                            Campus facilities and resources
                          </option>
                          <option value="Alumni network and career opportunities" <?php echo in_array('Alumni network and career opportunities', $selectedOptions) ? 'selected' : ''; ?>>
                            Alumni network and career opportunities
                          </option>
                          <option value="Personal research and exploration of universities" <?php echo in_array('Personal research and exploration of universities', $selectedOptions) ? 'selected' : ''; ?>>
                            Personal research and exploration of universities
                          </option>
                        </select>
                      </div>
                      <!-- NUMBER 8 QUESTION -->
                      <div class="col-12 mb-4">
                        <h5>
                          8. How satisfied are you with your current course/program of study?
                        </h5>
                        <select name="answer8" class="form-select" id="select-control">
                          <option disabled selected <?php echo empty($answer8) ? 'selected' : '' ?> value>Select your
                            option</option>
                          <option value="Strongly Satisfied" <?php echo ($answer8 === 'Strongly Satisfied') ? 'selected' : '' ?>>
                            Strongly Satisfied
                          </option>
                          <option value="Satisfied" <?php echo ($answer8 === 'Satisfied') ? 'selected' : '' ?>>
                            Satisfied
                          </option>
                          <option value="Neutral" <?php echo ($answer8 === 'Neutral') ? 'selected' : '' ?>>
                            Neutral
                          </option>
                          <option value="Dissatisfied" <?php echo ($answer8 === 'Dissatisfied') ? 'selected' : '' ?>>
                            Dissatisfied
                          </option>
                          <option value="Strongly Dissatisfied" <?php echo ($answer8 === 'Strongly Dissatisfied') ? 'selected' : '' ?>>
                            Strongly Dissatisfied
                          </option>
                        </select>
                      </div>
                      <!-- NUMBER 9 QUESTION -->
                      <div class="col-12 mb-4">
                        <h5>
                          9. How satisfied are you with the location of your university?
                        </h5>
                        <select name="answer9" class="form-select" id="select-control">
                          <option disabled selected <?php echo empty($answer9) ? 'selected' : '' ?> value>Select your
                            option</option>
                          <option value="Strongly Satisfied" <?php echo ($answer9 === 'Strongly Satisfied') ? 'selected' : '' ?>>
                            Strongly Satisfied
                          </option>
                          <option value="Satisfied" <?php echo ($answer9 === 'Satisfied') ? 'selected' : '' ?>>
                            Satisfied
                          </option>
                          <option value="Neutral" <?php echo ($answer9 === 'Neutral') ? 'selected' : '' ?>>
                            Neutral
                          </option>
                          <option value="Dissatisfied" <?php echo ($answer9 === 'Dissatisfied') ? 'selected' : '' ?>>
                            Dissatisfied
                          </option>
                          <option value="Strongly Dissatisfied" <?php echo ($answer9 === 'Strongly Dissatisfied') ? 'selected' : '' ?>>
                            Strongly Dissatisfied
                          </option>
                        </select>
                      </div>
                      <!-- NUMBER 10 QUESTION -->
                      <div class="col-12 mb-4">
                        <h5>
                          10. Do you find the campus in the university (such as libraries, laboratories, sport
                          facilities, etc.)
                          adequate for your needs?
                        </h5>
                        <select name="answer10" class="form-select" id="select-control">
                          <option disabled selected <?php echo empty($answer10) ? 'selected' : '' ?>value>Select your
                            option</option>
                          <option value="Yes" <?php echo ($answer10 === 'Yes') ? 'selected' : '' ?>>Yes</option>
                          <option value="No" <?php echo ($answer10 === 'No') ? 'selected' : '' ?>>No</option>
                        </select>
                      </div>
                      <!-- NUMBER 11 QUESTION -->
                      <div class="col-12 mb-4">
                        <h5>
                          11. Are you satisfied with the accessibility of essential servicesin the university
                          (cafeteria, healthcare, transportation) on campus?
                        </h5>
                        <select name="answer11" class="form-select" id="select-control">
                          <option disabled selected <?php echo empty($answer11) ? 'selected' : '' ?>value>Select your
                            option</option>
                          <option value="Yes" <?php echo ($answer11 === 'Yes') ? 'selected' : '' ?>>Yes</option>
                          <option value="No" <?php echo ($answer11 === 'No') ? 'selected' : '' ?>>No</option>
                        </select>
                      </div>
                      <!-- NUMBER 12 QUESTION -->
                      <div class="col-12 mb-4">
                        <h5>
                          12. How would you rate the safety and security measures in the university campus?
                        </h5>
                        <select name="answer12" class="form-select" id="select-control">
                          <option disabled selected <?php echo empty($answer12) ? 'selected' : '' ?> value>Select your
                            option</option>
                          <option value="Very Safe" <?php echo ($answer12 === 'Very Safe') ? 'selected' : '' ?>>Very Safe
                          </option>
                          <option value="Safe" <?php echo ($answer12 === 'Safe') ? 'selected' : '' ?>>Safe</option>
                          <option value="Neutral" <?php echo ($answer12 === 'Neutral') ? 'selected' : '' ?>>Neutral
                          </option>
                          <option value="Unsafe" <?php echo ($answer12 === 'Unsafe') ? 'selected' : '' ?>>Unsafe</option>
                          <option value="Very Unsafe" <?php echo ($answer12 === 'Very Unsafe') ? 'selected' : '' ?>>Very
                            Unsafe</option>
                        </select>
                      </div>
                      <!-- NUMBER 13 QUESTION -->
                      <div class="col-12">
                        <h5>
                          13. How satisfied are you with the quality of teaching and instruction provided by the faculty
                          members?
                        </h5>
                        <select name="answer13" class="form-select" id="select-control">
                          <option disabled selected <?php echo empty($answer13) ? 'selected' : '' ?> value>Select your
                            option</option>
                          <option value="Strongly Satisfied" <?php echo ($answer13 === 'Strongly Satisfied') ? 'selected' : '' ?>>
                            Strongly Satisfied
                          </option>
                          <option value="Satisfied" <?php echo ($answer13 === 'Satisfied') ? 'selected' : '' ?>>
                            Satisfied
                          </option>
                          <option value="Neutral" <?php echo ($answer13 === 'Neutral') ? 'selected' : '' ?>>
                            Neutral
                          </option>
                          <option value="Dissatisfied" <?php echo ($answer13 === 'Dissatisfied') ? 'selected' : '' ?>>
                            Dissatisfied
                          </option>
                          <option value="Strongly Dissatisfied" <?php echo ($answer13 === 'Strongly Dissatisfied') ? 'selected' : '' ?>>
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
                          14. Please provide reason(s) for why you are not employed. (Select one or more)
                        </h5>
                        <select id="multipleSelect" multiple name="answer14" placeholder="Select the reason(s)">
                          <option value="Financial problem" <?php echo in_array('Financial problem', $answer14Options) ? 'selected' : ''; ?>>
                            Financial problem
                          </option>
                          <option value="Personal/Family reasons" <?php echo in_array('Personal/Family reasons', $answer14Options) ? 'selected' : ''; ?>>
                            Personal/Family reasons
                          </option>
                          <option value="Recently unemployed" <?php echo in_array('Recently unemployed', $answer14Options) ? 'selected' : ''; ?>>
                            Recently unemployed
                          </option>
                          <option value="Waiting for employment" <?php echo in_array('Waiting for employment', $answer14Options) ? 'selected' : ''; ?>>
                            Waiting for employment
                          </option>
                          <option value="Health Issues" <?php echo in_array('Health Issues', $answer14Options) ? 'selected' : ''; ?>>
                            Health Issues
                          </option>
                          <option value="Others" <?php echo in_array('Others', $answer14Options) ? 'selected' : ''; ?>>
                            Others
                          </option>
                        </select>
                      </div>
                      <div class="col-12 mb-4">
                        <h5>
                          15. Do you plan to search for a job in the future?
                        </h5>
                        <select class="form-select" name="answer15" id="select-control">
                          <option disabled selected <?php echo empty($answer15) ? 'selected' : '' ?> value>Select your
                            option</option>
                          <option value="Yes" <?php echo ($answer15 === 'Yes') ? 'selected' : '' ?>>
                            Yes
                          </option>
                          <option value="No" <?php echo ($answer15 === 'No') ? 'selected' : '' ?>>
                            No
                          </option>
                          <option value="Maybe" <?php echo ($answer15 === 'Maybe') ? 'selected' : '' ?>>
                            Maybe
                          </option>
                        </select>
                      </div>
                      <div class="col-12">
                        <h5>
                          16. If you answered Yes or Maybe to the previous question, what factors would influence
                          your decision to search for a job in the future? (Select one or more)
                        </h5>
                        <select id="multipleSelect" multiple name="answer16" placeholder="Select the reason(s)">
                          <option value="I answered no" <?php echo in_array('I answered no', $answer16Options) ? 'selected' : ''; ?>>
                            I answered no
                          </option>
                          <option value="Financial considerations" <?php echo in_array('Financial considerations', $answer16Options) ? 'selected' : ''; ?>>
                            Financial considerations
                          </option>
                          <option value="Personal interest/passion" <?php echo in_array('Personal interest/passion', $answer16Options) ? 'selected' : ''; ?>>
                            Personal/Family reasons
                          </option>
                          <option value="Family Support" <?php echo in_array('Family Support', $answer16Options) ? 'selected' : ''; ?>>
                            Family Support
                          </option>
                          <option value="Career advancement opportunities" <?php echo in_array('Career advancement opportunities', $answer16Options) ? 'selected' : ''; ?>>
                            Career advancement opportunities
                          </option>
                          <option value="Availability of work resources" <?php echo in_array('Availability of work resources', $answer16Options) ? 'selected' : ''; ?>>
                            Availability of work resources
                          </option>
                          <option value="Others" <?php echo in_array('Others', $answer16Options) ? 'selected' : ''; ?>>
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
                        <select id="multipleSelect" multiple name="feedback1[]" placeholder="Select the factor(s)">
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
                          style="resize: none; height: 20vh; color: black;"
                          placeholder="Write any comment or suggestion"><?php echo htmlspecialchars($feedback2, ENT_QUOTES, 'UTF-8'); ?></textarea>
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