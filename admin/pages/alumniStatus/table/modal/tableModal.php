<!-- STUDYING & NOT WORKING HISTORY -->
<div class="modal fade" id="studyingHistory_<?php echo $row['user_id'] ?>" data-bs-backdrop="static"
  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="border: none;">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h2>Working & Not Studying History</h2>
        <!-- SQL FOR STUDYING & NOT WORKING HISTORY -->
        <?php
        $sqlstudyingData = "SELECT * FROM alumnistudyinghistory WHERE user_id = ?";
        $stmtstudyingData = $db->prepare($sqlstudyingData);
        $stmtstudyingData->execute([$row['user_id']]);
        $studyingdata = $stmtstudyingData->fetch(PDO::FETCH_ASSOC);

        if (empty($studyingdata)) {
          ?>
          <p class="fs-5">There is no history update available.</p>
          <?php
        } else {
          foreach ($studyingdata as $studying) {
            ?>
            <div class="row">
              <div class="col">
                <p class="fs-5" style="margin-bottom: 0;">Date: <?php echo $studying['date']; ?></p>
                <p class="fs-5"><?php echo ucfirst($studying['questionKey']) ?>: <?php echo $studying['questionAnswer'] ?>
                </p>
              </div>
            </div>
            <?php
          }
        }
        ?>
      </div>
    </div>
  </div>
</div>

<!-- WORKING & NOT STUDYING HISTORY -->
<div class="modal fade" id="workingHistory_<?php echo $row['user_id']; ?>" data-bs-backdrop="static"
  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="border: none;">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h2>Working & Not Studying History</h2>
        <!-- SQL FOR WORKING & NOT STUDYING HISTORY -->
        <?php
        $sqlworkingData = "SELECT * FROM alumniworkinghistory WHERE user_id = ?";
        $stmtworkingData = $db->prepare($sqlworkingData);
        $stmtworkingData->execute([$row['user_id']]);
        $workingData = $stmtworkingData->fetchAll(PDO::FETCH_ASSOC);

        if (empty($workingData)) {
          ?>
          <p class="fs-5">There is no history update available.</p>
          <?php
        } else {
          foreach ($workingData as $working) {
            ?>
            <div class="row">
              <div class="col">
                <p class="fs-5" style="margin-bottom: 0;">Date: <?php echo $working['date']; ?></p>
                <p class="fs-5"><?php echo ucfirst($working['questionKey']) ?>: <?php echo $working['questionAnswer'] ?></p>
              </div>
            </div>
            <?php
          }
        }
        ?>
      </div>
    </div>
  </div>
</div>

<!-- STUDYING & WORKING HISTORY -->
<div class="modal fade" id="swHistory_<?php echo $row['user_id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false"
  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="border: none;">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h2>Studying & Working History</h2>
        <!-- SQL FOR STUDYING & WORKING HISTORY -->
        <?php
        $sqlswData = "SELECT * FROM alumniswhistory WHERE user_id = ?";
        $stmtswData = $db->prepare($sqlswData);
        $stmtswData->execute([$row['user_id']]);
        $swData = $stmtswData->fetchAll(PDO::FETCH_ASSOC);

        if (empty($swData)) {
          ?>
          <p class="fs-5">There is no history update available.</p>
          <?php
        } else {
          foreach ($swData as $sw) {
            ?>
            <div class="row">
              <div class="col">
                <p class="fs-5" style="margin-bottom: 0;">Date: <?php echo $sw['date']; ?></p>
                <p class="fs-5"><?php echo ucfirst($sw['questionKey']) ?>: <?php echo $sw['questionAnswer'] ?></p>
              </div>
            </div>
            <?php
          }
        }
        ?>
      </div>
    </div>
  </div>
</div>

<!-- NOT STUDYING & NOT WORKING HISTORY -->
<div class="modal fade" id="notSWHistory_<?php echo $row['user_id'] ?>" data-bs-backdrop="static"
  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="border: none;">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h2>Not Studying & Not Working History</h2>
          <!-- SQL FOR NOT STUDYING & NOT WORKING HISTORY -->
          <?php
          $sqlnotswData = "SELECT * FROM alumninotswhistory WHERE user_id = ?";
          $stmtnotswData = $db->prepare($sqlnotswData);
          $stmtnotswData->execute([$row['user_id']]);
          $notswData = $stmtnotswData->fetchAll(PDO::FETCH_ASSOC);

          if (empty($notswData)) {
            ?>
            <p class="fs-5">There is no history update available.</p>
            <?php
          } else {
            foreach ($notswData as $notsw) {
              ?>
              <div class="row">
                <div class="col">
                  <p class="fs-5" style="margin-bottom: 0;">Date: <?php echo $notsw['date']; ?></p>
                  <p class="fs-5"><?php echo ucfirst($notsw['questionKey']) ?>: <?php echo $notsw['questionAnswer'] ?></p>
                </div>
              </div>
              <?php
            }
          }
          ?>
      </div>
    </div>
  </div>
</div>