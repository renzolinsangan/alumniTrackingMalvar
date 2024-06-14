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
    $_POST['feedback1'],
    $_POST['feedback2']
  );

  $currentDate = date('F j, Y');

  // Prepare an SQL statement to insert the data into the database
  $sqlQuestionAnswer = "INSERT INTO alumninotswdata (questionKey, questionAnswer, status, user_id, date) 
  VALUES (?, ?, 'active', ?, ?)";
  $stmtQuestionAnswer = $db->prepare($sqlQuestionAnswer);

  // Loop through the arrays and insert each entry into the database
  foreach ($questionKeys as $index => $questionKey) {
    $questionAnswer = $data[$index];
    $stmtQuestionAnswer->execute([$questionKey, $questionAnswer, $user_id, $currentDate]);
  }

  $sqlRetrieveFormID = "SELECT formNotSW_id FROM alumninotswdata WHERE status = 'active' AND user_id = ?";
  $stmtRetrieveFormID = $db->prepare($sqlRetrieveFormID);
  $stmtRetrieveFormID->execute([$user_id]);
  $results = $stmtRetrieveFormID->fetchAll(PDO::FETCH_ASSOC);
  
  // Extract formNotSW_IDs and serialize them
  $formNotSW_IDs = array_column($results, 'formNotSW_id');
  $formNotSWIDsSerialized = serialize($formNotSW_IDs);
  
  // SAVE TO MAIN alumninotsw
  $sqlAlumniNotSW = "INSERT INTO alumninotsw (user_id, formNotSW_id, date) VALUES (?, ?, ?)";
  $stmtAlumniNotSW = $db->prepare($sqlAlumniNotSW);
  $stmtAlumniNotSW->execute([$user_id, $formNotSWIDsSerialized, $currentDate]);

  $_SESSION['showSweetAlert'] = true;
  header("Location: ../../index.php");
  exit();
}
?>