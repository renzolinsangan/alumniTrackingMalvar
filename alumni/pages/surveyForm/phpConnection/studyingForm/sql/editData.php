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
$sql = "SELECT questionAnswer FROM alumnistudyingdata WHERE questionKey = ? AND status = 'active' AND user_id = ?";
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
    'answer6',
    'answer7',
    'answer8',
    'answer9',
    'answer10',
    'answer11',
    'answer12',
    'answer13',
    'answer14',
    'answer15',
    'answer16'
];

$educationalData = [];
$sqleducationalData = "SELECT questionAnswer FROM alumnistudyingdata WHERE questionKey = ? AND status = 'active' AND user_id = ?";
$stmteducationalData = $db->prepare($sqleducationalData);

foreach ($educationalKeys as $key) {
    $stmteducationalData->execute([$key, $user_id]);
    $result = $stmteducationalData->fetch(PDO::FETCH_ASSOC);
    $educationalData[$key] = $result['questionAnswer'] ?? null;
}

$answer1 = $educationalData['answer1'];
$answer2 = $educationalData['answer2'];
$answer3 = $educationalData['answer3'];
$answer4 = $educationalData['answer4'];
$answer5 = $educationalData['answer5'];
$answer6 = $educationalData['answer6'];
$answer7 = $educationalData['answer7'];
$selectedOptions = explode(',', $educationalData['answer7']);
$answer8 = $educationalData['answer8'];
$answer9 = $educationalData['answer9'];
$answer10 = $educationalData['answer10'];
$answer11 = $educationalData['answer11'];
$answer12 = $educationalData['answer12'];
$answer13 = $educationalData['answer13'];
$answer14Options = explode(',', $educationalData['answer14']);
$answer15 = $educationalData['answer15'];
$answer16Options = explode(',', $educationalData['answer16']);

// COMMENTS AND SUGGESTIONS

$feedbackKeys = [
    'feedback1',
    'feedback2'
];

$feedbackData = [];
$sqlfeedbackData = "SELECT questionAnswer from alumnistudyingdata WHERE questionKey = ? AND status = 'active' AND user_id = ?";
$stmtfeedbackData = $db->prepare($sqlfeedbackData);

foreach ($feedbackKeys as $key) {
    $stmtfeedbackData->execute([$key, $user_id]);
    $result = $stmtfeedbackData->fetch(PDO::FETCH_ASSOC);
    $feedbackData[$key] = $result['questionAnswer'] ?? null;
}

$feedback1 = $feedbackData['feedback1'];
$feedbackOptions = explode(',', $feedback1);
$feedback2 = $feedbackData['feedback2'];

// UPDATE DATA
if (isset($_POST['submit'])) {
    $currentDate = date('F j, Y');

    // Function to insert into history table if data is changed
    function insertIntoHistory($db, $user_id, $key, $currentDate) {
        $sqlHistory = "INSERT INTO alumnistudyinghistory (questionKey, questionAnswer, user_id, date) 
                       SELECT questionKey, questionAnswer, user_id, ? FROM alumnistudyingdata 
                       WHERE user_id = ? AND questionKey = ?";
        $stmtHistory = $db->prepare($sqlHistory);
        $stmtHistory->execute([$currentDate, $user_id, $key]);
    }

    // Update demographic data
    $sqlUpdateDemographic = "UPDATE alumnistudyingdata SET questionAnswer = ? WHERE questionKey = ? AND user_id = ?";
    $stmtUpdateDemographic = $db->prepare($sqlUpdateDemographic);

    foreach ($demographicKeys as $key) {
        if (isset($_POST[$key]) && $_POST[$key] !== $demographicData[$key]) {
            insertIntoHistory($db, $user_id, $key, $currentDate);
            $stmtUpdateDemographic->execute([$_POST[$key], $key, $user_id]);
        }
    }

    // Update educational data
    $sqlUpdateEducational = "UPDATE alumnistudyingdata SET questionAnswer = ? WHERE questionKey = ? AND user_id = ?";
    $stmtUpdateEducational = $db->prepare($sqlUpdateEducational);

    foreach ($educationalKeys as $key) {
        if (isset($_POST[$key])) {
            $answer = $_POST[$key];
            if (is_array($answer)) {
                $answer = implode(',', $answer);
            }
            if ($answer !== $educationalData[$key]) {
                insertIntoHistory($db, $user_id, $key, $currentDate);
                $stmtUpdateEducational->execute([$answer, $key, $user_id]);
            }
        }
    }

    // Update feedback data
    $sqlUpdateFeedback = "UPDATE alumnistudyingdata SET questionAnswer = ? WHERE questionKey = ? AND user_id = ?";
    $stmtUpdateFeedback = $db->prepare($sqlUpdateFeedback);

    foreach ($feedbackKeys as $key) {
        if (isset($_POST[$key])) {
            $feedback = $_POST[$key];
            if (is_array($feedback)) {
                $feedback = implode(',', $feedback);
            }
            if ($feedback !== $feedbackData[$key]) {
                insertIntoHistory($db, $user_id, $key, $currentDate);
                $stmtUpdateFeedback->execute([$feedback, $key, $user_id]);
            }
        }
    }

    $_SESSION['showEditAlert'] = true;
    header("Location: ../../index.php");
    exit();
}
?>
