<?php
include ("../config.php");

$user_id = $_GET['user_id'];

// DEMOGRAPHIC INFORMATION
$demographicKeys = [
    'fullName',
    'age',
    'gender',
    'civilStatus',
    'contactNumber',
    'residentialAddress',
    'emailAddress',
    'city',
    'strand',
    'yearGraduated'
];

$demographicData = [];
$sql = "SELECT questionAnswer FROM alumninotswdata WHERE questionKey = ? AND status = 'active' AND user_id = ?";
$stmt = $db->prepare($sql);

foreach ($demographicKeys as $key) {
    $stmt->execute([$key, $user_id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $demographicData[$key] = $result['questionAnswer'] ?? null;
}

$fullName = $demographicData['fullName'];
$age = $demographicData['age'];
$gender = $demographicData['gender'];
$civilStatus = $demographicData['civilStatus'];
$contactNumber = $demographicData['contactNumber'];
$residentialAddress = $demographicData['residentialAddress'];
$emailAddress = $demographicData['emailAddress'];
$city = $demographicData['city'];
$strand = $demographicData['strand'];
$yearGraduated = $demographicData['yearGraduated'];

// EDUCATIONAL STATUS
$educationalKeys = [
    'answer1',
    'answer2',
    'answer3',
    'answer4',
    'answer5',
    'answer6'
];

$educationalData = [];
$sqleducationalData = "SELECT questionAnswer FROM alumninotswdata WHERE questionKey = ? AND status = 'active' AND user_id = ?";
$stmteducationalData = $db->prepare($sqleducationalData);

foreach ($educationalKeys as $key) {
    $stmteducationalData->execute([$key, $user_id]);
    $result = $stmteducationalData->fetch(PDO::FETCH_ASSOC);
    $educationalData[$key] = $result['questionAnswer'] ?? null;
}

$answer1 = $educationalData['answer1'];
$answer1Options = explode(',', $answer1);
$answer2 = $educationalData['answer2'];
$answer3 = $educationalData['answer3'];
$answer3Options = explode(',', $answer3);
$answer4 = $educationalData['answer4'];
$answer4Options = explode(',', $answer4);
$answer5 = $educationalData['answer5'];
$answer6 = $educationalData['answer6'];
$answer6Options = explode(',', $answer6);

// COMMENTS AND SUGGESTIONS

$feedbackKeys = [
    'feedback1',
    'feedback2'
];

$feedbackData = [];
$sqlfeedbackData = "SELECT questionAnswer from alumninotswdata WHERE questionKey = ? AND status = 'active' AND user_id = ?";
$stmtfeedbackData = $db->prepare($sqlfeedbackData);

foreach ($feedbackKeys as $key) {
    $stmtfeedbackData->execute([$key, $user_id]);
    $result = $stmtfeedbackData->fetch(PDO::FETCH_ASSOC);
    $feedbackData[$key] = $result['questionAnswer'] ?? null;
}

$feedback1 = $feedbackData['feedback1'];
$feedbackOptions = explode(',', $feedback1);
$feedback2 = $feedbackData['feedback2'];

if (isset($_POST['submit'])) {

    $currentDate = date('F j, Y');

    // Function to insert into history table if data is changed
    function insertIntoHistory($db, $user_id, $key, $currentDate) {
        $sqlHistory = "INSERT INTO alumninotswhistory (questionKey, questionAnswer, user_id, date) 
                       SELECT questionKey, questionAnswer, user_id, ? FROM alumninotswdata 
                       WHERE user_id = ? AND questionKey = ?";
        $stmtHistory = $db->prepare($sqlHistory);
        $stmtHistory->execute([$currentDate, $user_id, $key]);
    }

    // Update demographic data
    $sqlUpdateDemographic = "UPDATE alumninotswdata SET questionAnswer = ? WHERE questionKey = ? AND user_id = ?";
    $stmtUpdateDemographic = $db->prepare($sqlUpdateDemographic);

    foreach ($demographicKeys as $key) {
        if ($_POST[$key] !== $demographicData[$key]) {
            insertIntoHistory($db, $user_id, $key, $currentDate);
            $stmtUpdateDemographic->execute([$_POST[$key], $key, $user_id]);
        }
    }

    // Update educational data
    $sqlUpdateEducational = "UPDATE alumninotswdata SET questionAnswer = ? WHERE questionKey = ? AND user_id = ?";
    $stmtUpdateEducational = $db->prepare($sqlUpdateEducational);

    foreach ($educationalKeys as $key) {
        if ($_POST[$key] !== $educationalData[$key]) {
            insertIntoHistory($db, $user_id, $key, $currentDate);
            $stmtUpdateEducational->execute([$_POST[$key], $key, $user_id]);
        }
    }

    // Update feedback data
    $sqlUpdateFeedback = "UPDATE alumninotswdata SET questionAnswer = ? WHERE questionKey = ? AND user_id = ?";
    $stmtUpdateFeedback = $db->prepare($sqlUpdateFeedback);

    foreach ($feedbackKeys as $key) {
        if ($_POST[$key] !== $feedbackData[$key]) {
            insertIntoHistory($db, $user_id, $key, $currentDate);
            $stmtUpdateFeedback->execute([$_POST[$key], $key, $user_id]);
        }
    }

    $_SESSION['showEditAlert'] = true;
    header("Location: ../../index.php");
    exit();
}
?>
