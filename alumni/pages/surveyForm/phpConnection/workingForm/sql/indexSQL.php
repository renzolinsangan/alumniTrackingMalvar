<?php
include ("../config.php");

if (isset($_POST['submit'])) {
  // Collect the POST data
  $user_id = $_SESSION['user_id'];

  // QUESTION KEY
  $questionKeys = array(
    "fullName",
    "age",
    "gender",
    "civilStatus",
    "contactNumber",
    "residentialAddress",
    "emailAddress",
    "city",
    "strand",
    "yearGraduated",
    "answer1",
    "answer2",
    "answer3",
    "answer4",
    "answer5",
    "answer6",
    "answer7",
    "answer8",
    "answer9",
    "answer10",
    "answer11",
    "answer12",
    "answer13",
    "answer14",
    "answer15",
    "answer16",
    "answer17",
    "answer18",
    "feedback1",
    "feedback2"
  );

  // QUESTION ANSWER
  $data = array(
    $_POST['fullName'],
    $_POST['age'],
    $_POST['gender'],
    $_POST['civilStatus'],
    $_POST['contactNumber'],
    $_POST['residentialAddress'],
    $_POST['emailAddress'],
    $_POST['city'],
    $_POST['strand'],
    $_POST['yearGraduated'],
    $_POST['answer1'],
    $_POST['answer2'],
    $_POST['answer3'],
    $_POST['answer4'],
    $_POST['answer5'],
    $_POST['answer6'],
    $_POST['answer7'],
    $_POST['answer8'],
    $_POST['answer9'],
    $_POST['answer10'],
    $_POST['answer11'],
    $_POST['answer12'],
    $_POST['answer13'],
    $_POST['answer14'],
    $_POST['answer15'],
    $_POST['answer16'],
    $_POST['answer17'],
    $_POST['answer18'],
    $_POST['feedback1'],
    $_POST['feedback2']
  );

  $currentDate = date('F j, Y');

  // Prepare an SQL statement to insert the data into the database
  $sqlQuestionAnswer = "INSERT INTO alumniworkingdata (questionKey, questionAnswer, status, user_id, date) 
  VALUES (?, ?, 'active', ?, ?)";
  $stmtQuestionAnswer = $db->prepare($sqlQuestionAnswer);

  // Loop through the arrays and insert each entry into the database
  foreach ($questionKeys as $index => $questionKey) {
    $questionAnswer = $data[$index];
    $stmtQuestionAnswer->execute([$questionKey, $questionAnswer, $user_id, $currentDate]);
  }

  $sqlRetrieveFormID = "SELECT formWorking_id FROM alumniworkingdata WHERE status = 'active' AND user_id = ?";
  $stmtRetrieveFormID = $db->prepare($sqlRetrieveFormID);
  $stmtRetrieveFormID->execute([$user_id]);
  $results = $stmtRetrieveFormID->fetchAll(PDO::FETCH_ASSOC);
  
  // Extract formWorking_id and serialize them
  $formWorkingIDs = array_column($results, 'formWorking_id');
  $formWorkingIDsSerialized = serialize($formWorkingIDs);
  
  // SAVE TO MAIN alumniworking
  $sqlAlumniWorking = "INSERT INTO alumniworking (user_id, formWorking_id, date) VALUES (?, ?, ?)";
  $stmtAlumniWorking = $db->prepare($sqlAlumniWorking);
  $stmtAlumniWorking->execute([$user_id, $formWorkingIDsSerialized, $currentDate]);

  $_SESSION['showSweetAlert'] = true;
  header("Location: ../../index.php");
  exit();
}
?>