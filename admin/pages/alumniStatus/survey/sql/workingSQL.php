<?php
include ("../phpConnection/config.php");

$user_id = $_GET['user_id'];

// DEMOGRAPHIC INFORMATION
$demographicKeys = [
    'fullName', 'age', 'gender', 'civilStatus', 'contactNumber',
    'residentialAddress', 'emailAddress', 'city', 'strand', 'yearGraduated'
];

$demographicData = [];
$sql = "SELECT questionAnswer FROM alumniworkingdata WHERE questionKey = ? AND status = 'active' AND user_id = ?";
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

// WORKING STATUS
$workingKeys = [
    'answer1', 'answer2', 'answer3', 'answer4', 'answer5', 'answer6', 'answer7',
    'answer8', 'answer9', 'answer10', 'answer11', 'answer12', 'answer13',
    'answer14', 'answer15', 'answer16', 'answer17', 'answer18'
];

$workingData = [];
$sqlworkingData = "SELECT questionAnswer FROM alumniworkingdata WHERE questionKey = ? AND status = 'active' AND user_id = ?";
$stmtworkingData = $db->prepare($sqlworkingData);

foreach ($workingKeys as $key) {
    $stmtworkingData->execute([$key, $user_id]);
    $result = $stmtworkingData->fetch(PDO::FETCH_ASSOC);
    $workingData[$key] = $result['questionAnswer'] ?? null;
}

$answer1 = $workingData['answer1'];
$answer2 = $workingData['answer2'];
$answer3 = $workingData['answer3'];
$answer4 = $workingData['answer4'];
$answer5 = $workingData['answer5'];
$answer6 = $workingData['answer6'];
$answer7 = $workingData['answer7'];
$answer8 = $workingData['answer8'];
$answer9 = $workingData['answer9'];
$answer10 = $workingData['answer10'];
$answer11 = $workingData['answer11'];
$answer12 = $workingData['answer12'];
$answer13 = $workingData['answer13'];
$answer14 = $workingData['answer14'];
$answer15 = $workingData['answer15'];
$answer16Options = explode(',', $workingData['answer16']);
$answer17= $workingData['answer17'];
$answer18Options = explode(',', $workingData['answer18']);

// COMMENTS AND SUGGESTIONS

$feedbackKeys = [
    'feedback1',
    'feedback2'
];

$feedbackData = [];
$sqlfeedbackData = "SELECT questionAnswer from alumniworkingdata WHERE questionKey = ? AND status = 'active' AND user_id = ?";
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