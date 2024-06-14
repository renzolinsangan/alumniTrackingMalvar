<?php
include ("../phpConnection/config.php");

$user_id = $_GET['user_id'];

// DEMOGRAPHIC INFORMATION
$demographicKeys = [
    'fullName', 'age', 'gender', 'civilStatus', 'contactNumber',
    'residentialAddress', 'emailAddress', 'city', 'strand', 'yearGraduated'
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
    'answer1', 'answer2', 'answer3',
    'answer4', 'answer5', 'answer6'
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
$answer4Options = explode(',', $educationalData['answer4']);
$answer5 = $educationalData['answer5'];
$answer6Options = explode(',', $educationalData['answer6']);

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
?>