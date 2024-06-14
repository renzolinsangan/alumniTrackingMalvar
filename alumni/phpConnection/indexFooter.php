<style>
  .footer {
    background-color: #00274C;
    padding: 20px;
    display: flex;
  }

  .footer-container {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .contact-header,
  .email-header,
  .address-header,
  .quick-link,
  .survey-header,
  .request-header {
    color: white;
    font-weight: bold;
  }

  .footer .container .row .col p,
  li {
    color: white;
    font-size: 13px;
  }

  .footer .footer-container .row .col a {
    text-decoration: none;
  }

  .footer .footer-container .row .col a p {
    margin-bottom: 5px;
  }

  .footer .footer-container .row .col a p:hover {
    color: gold;
    transition: 1s;
  }

  .footer .footer-container .row .col .studying:hover,
  .footer .footer-container .row .col .working:hover {
    color: gold;
    transition: 1s;
    cursor: pointer;
  }

  .footer .footer-container .row .col .certificateFooter:hover,
  .footer .footer-container .row .col .form137Footer:hover,
  .footer .footer-container .row .col .goodmoralFooter:hover,
  .footer .footer-container .row .col .othersFooter:hover {
    color: gold;
    transition: 1s;
    cursor: pointer;
  }
</style>
<?php include ("../admin/pages/editDesign/phpConnection/footerSQL.php"); ?>
<div class="footer">
  <div class="footer-container container">
    <div class="row" style="gap: 20px; width: 100%; margin-left: 20vh;">
      <div class="col col-md-2 mt-4">
        <h5 class="quick-link">Quick Links</h5>
        <a href="../../../../ALUMNI/alumni/index.php">
          <p>Profile</p>
        </a>
        <a href="../../../../ALUMNI/alumni/pages/surveyForm/index.php">
          <p>Tracer Survey Form</p>
        </a>
        <a href="../../../../ALUMNI/alumni/pages/requestForm/index.php">
          <p>Request Forms</p>
        </a>
      </div>
      <div class="col col-md-2 mt-4">
        <h5 class="survey-header">Survey Form</h5>
        <ul>
          <li>
            <p class="studying" style="margin-bottom: 4px;">
              Tracer Survey Form
            </p>
          </li>
        </ul>
      </div>
      <div class="col col-md-2 mt-4">
        <h5 class="request-header">Request Form</h5>
        <ul>
          <li>
            <p class="certificateFooter" style="margin-bottom: 2px;">
              Certificate of Graduation
            </p>
          </li>
          <li>
            <p class="form137Footer" style="margin-bottom: 2px;">
              Form 137
            </p>
          </li>
          <li>
            <p class="goodmoralFooter" style="margin-bottom: 2px;">
              Good Moral
            </p>
          </li>
          <li>
            <p class="othersFooter" style="margin-bottom: 2px;">
              Other Documents
            </p>
          </li>
        </ul>
      </div>
      <?php
      if ($footerdata) {
        $contact = $footerdata['contact'];
        $email = $footerdata['email'];
        $address = $footerdata['address'];
        ?>
        <div class="col" style="border-left: 1px solid white; padding-left: 5vh;">
          <h5 class="contact-header mt-3">Contact Us</h5>
          <p>Contact No. : <?php echo $contact ?></p>
          <h5 class="email-header">Email:</h5>
          <ul>
            <li><?php echo $email ?></li>
          </ul>
          <h5 class="address-header">Address:</h5>
          <p><?php echo $address ?></p>
        </div>
        <?php
      } else {
        ?>
        <div class="col" style="border-left: 1px solid white; padding-left: 5vh;">
          <h5 class="contact-header mt-3">Contact Us</h5>
          <p>Contact No. : (043) 409 1072</p>
          <h5 class="email-header">Email:</h5>
          <ul>
            <li>info@shsinmalvar.org</li>
          </ul>
          <h5 class="address-header">Address:</h5>
          <p>Poblacion Malvar, Batangas 4233</p>
        </div>
        <?php
      }
      ?>
    </div>
  </div>
</div>