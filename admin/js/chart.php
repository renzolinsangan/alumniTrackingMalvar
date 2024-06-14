<!-- BAR CHART -->
<script>
  google.charts.load('current', { 'packages': ['bar'] });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Category', 'Total'],
      <?php
      // TOTAL ALL ALUMNI
      $sqlTotalAlumni = "SELECT COUNT(*) AS totalAlumni FROM user_account WHERE usertype = 'alumni'";
      $stmtTotalAlumni = $db->query($sqlTotalAlumni);
      $rowAlumni = $stmtTotalAlumni->fetch(PDO::FETCH_ASSOC);
      $totalAlumni = $rowAlumni['totalAlumni'];

      // TOTAL ALUMNI STUDYING
      $sqlTotalStudying = "SELECT COUNT(*) AS totalStudying FROM alumnistudying";
      $stmtTotalStudying = $db->query($sqlTotalStudying);
      $rowStudying = $stmtTotalStudying->fetch(PDO::FETCH_ASSOC);
      $totalStudying = $rowStudying['totalStudying'];

      // TOTAL ALUMNI WORKING
      $sqlTotalWorking = "SELECT COUNT(*) AS totalWorking FROM alumniworking";
      $stmtTotalWorking = $db->query($sqlTotalWorking);
      $rowWorking = $stmtTotalWorking->fetch(PDO::FETCH_ASSOC);
      $totalWorking = $rowWorking['totalWorking'];

      // TOTAL ALUMNI STUDYING & WORKING
      $sqlTotalSW = "SELECT COUNT(*) AS totalSW FROM alumnisw";
      $stmtTotalSW = $db->query($sqlTotalSW);
      $rowSW = $stmtTotalSW->fetch(PDO::FETCH_ASSOC);
      $totalSW = $rowSW['totalSW'];

      // TOTAL ALUMNI NOT STUDYING OR WORKING
      $sqlTotalNotSW = "SELECT COUNT(*) AS totalnotSW FROM alumninotsw";
      $stmtTotalNotSW = $db->query($sqlTotalNotSW);
      $rownotSW = $stmtTotalNotSW->fetch(PDO::FETCH_ASSOC);
      $totalnotSW = $rownotSW['totalnotSW'];

      // Output data
      echo "['Total Alumni', $totalAlumni],";
      echo "['Studying', $totalStudying],";
      echo "['Working', $totalWorking],";
      echo "['Studying & Working', $totalSW],"; // Added totalSW
      echo "['Not Studying or Working', $totalnotSW],"; // Added totalnotSW
      ?>
    ]);

    var options = {
      chart: {
        title: 'Malvar Senior High School Alumni',
      },
      bars: 'horizontal' // Required for Material Bar Charts.
    };

    var chart = new google.charts.Bar(document.getElementById('barchart_material'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
  }
</script>

<!-- SELECTING PIE-CHART TO SHOW -->
<script>
  document.getElementById('process').addEventListener('change', function() {
    var selectValue = this.value;
    if (selectValue === 'walkin') {
      document.getElementById('walkin-piechart').style.visibility = 'visible';
      document.getElementById('online-piechart').style.visibility = 'hidden';
    } else if (selectValue === 'online') {
      document.getElementById('walkin-piechart').style.visibility = 'hidden';
      document.getElementById('online-piechart').style.visibility = 'visible';
    }
  });
</script>


<!-- PIE CHART FOR WALK-IN -->
<?php
// TOTAL CERTIFICATE 
$sqlCertificateCount = "SELECT COUNT(*) AS totalCertificate FROM certificate WHERE process = 'walk-in'";
$stmtCertificateCount = $db->query($sqlCertificateCount);
$row = $stmtCertificateCount->fetch(PDO::FETCH_ASSOC);
$totalCertificate = $row['totalCertificate'];

// TOTAL FORM 137
$sqlForm137Count = "SELECT COUNT(*) AS totalForm137 FROM form137 WHERE process = 'walk-in'";
$stmtForm137Count = $db->query($sqlForm137Count);
$row = $stmtForm137Count->fetch(PDO::FETCH_ASSOC);
$totalForm137 = $row['totalForm137'];

// TOTAL GOOD MORAL
$sqlGoodMoralCount = "SELECT COUNT(*) AS totalGoodMoral FROM goodmoral WHERE process = 'walk-in'";
$stmtGoodMoralCount = $db->query($sqlGoodMoralCount);
$row = $stmtGoodMoralCount->fetch(PDO::FETCH_ASSOC);
$totalGoodMoral = $row['totalGoodMoral'];

// TOTAL OTHER DOCUMENT

$sqlOtherDocumentsCount = "SELECT COUNT(*) AS totalOtherDocuments FROM otherdocuments WHERE process = 'walk-in'";
$stmtOtherDocumentsCount = $db->query($sqlOtherDocumentsCount);
$row = $stmtOtherDocumentsCount->fetch(PDO::FETCH_ASSOC);
$totalOtherDocuments = $row['totalOtherDocuments'];
?>
<script>
  google.charts.load('current', { 'packages': ['corechart'] });
  google.charts.setOnLoadCallback(drawWalkinPieChart);

  function drawWalkinPieChart() {

    var data = google.visualization.arrayToDataTable([
      ['Task', 'Hours per Day'],
      ['Certificate of Graduation', <?php echo $totalCertificate ?>],
      ['Form 137', <?php echo $totalForm137 ?>],
      ['Good Moral', <?php echo $totalGoodMoral ?>],
      ['Other Documents', <?php echo $totalOtherDocuments ?>],
    ]);

    var options = {
      title: 'Requested Requirements',
      chartArea: { width: '100%', height: '90%' }
    };

    var chart = new google.visualization.PieChart(document.getElementById('walkin-piechart'));

    chart.draw(data, options);
  }
</script>

<!-- PIE CHART FOR ONLINE -->
<?php
// TOTAL CERTIFICATE 
$sqlCertificateCount = "SELECT COUNT(*) AS totalCertificate FROM certificate WHERE process = 'online'";
$stmtCertificateCount = $db->query($sqlCertificateCount);
$row = $stmtCertificateCount->fetch(PDO::FETCH_ASSOC);
$totalCertificate = $row['totalCertificate'];

// TOTAL FORM 137
$sqlForm137Count = "SELECT COUNT(*) AS totalForm137 FROM form137 WHERE process = 'online'";
$stmtForm137Count = $db->query($sqlForm137Count);
$row = $stmtForm137Count->fetch(PDO::FETCH_ASSOC);
$totalForm137 = $row['totalForm137'];

// TOTAL GOOD MORAL
$sqlGoodMoralCount = "SELECT COUNT(*) AS totalGoodMoral FROM goodmoral WHERE process = 'online'";
$stmtGoodMoralCount = $db->query($sqlGoodMoralCount);
$row = $stmtGoodMoralCount->fetch(PDO::FETCH_ASSOC);
$totalGoodMoral = $row['totalGoodMoral'];

// TOTAL OTHER DOCUMENT

$sqlOtherDocumentsCount = "SELECT COUNT(*) AS totalOtherDocuments FROM otherdocuments WHERE process = 'online'";
$stmtOtherDocumentsCount = $db->query($sqlOtherDocumentsCount);
$row = $stmtOtherDocumentsCount->fetch(PDO::FETCH_ASSOC);
$totalOtherDocuments = $row['totalOtherDocuments'];
?>
<script>
  google.charts.load('current', { 'packages': ['corechart'] });
  google.charts.setOnLoadCallback(drawOnlinePieChart);

  function drawOnlinePieChart() {

    var data = google.visualization.arrayToDataTable([
      ['Task', 'Hours per Day'],
      ['Certificate of Graduation', <?php echo $totalCertificate ?>],
      ['Form 137', <?php echo $totalForm137 ?>],
      ['Good Moral', <?php echo $totalGoodMoral ?>],
      ['Other Documents', <?php echo $totalOtherDocuments ?>],
    ]);

    var options = {
      title: 'Requested Requirements',
      chartArea: { width: '100%', height: '90%' }
    };

    var chart = new google.visualization.PieChart(document.getElementById('online-piechart'));

    chart.draw(data, options);
  }
</script>