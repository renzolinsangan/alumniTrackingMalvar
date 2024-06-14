<!-- CONNECTIONS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
  integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
  integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

<!-- JAVASCRIPT FOR INDEX IN CHECKING EMPTY AND INVALID INPUTS-->
<script>
  var form = document.querySelector('form');

  form.addEventListener('submit', function (event) {
    // PART I. - DEMOGRAPHIC INFORMATIONS
    var fullNameInput = document.querySelector('input[name="fullName"]');
    var ageInput = document.querySelector('input[name="age"]');
    var genderSelect = document.querySelector('select[name="gender"]');
    var civilStatusSelect = document.querySelector('select[name="civilStatus"]');
    var contactNumberInput = document.querySelector('input[name="contactNumber"]');
    var residentialAddressInput = document.querySelector('input[name="residentialAddress"]');
    var emailAddressInput = document.querySelector('input[name="emailAddress"]');
    var cityInput = document.querySelector('input[name="city"]');
    var strandInput = document.querySelector('input[name="strand"]');
    var yearGraduatedInput = document.querySelector('input[name="yearGraduated"]');

    var validationAlert = document.querySelector('#validationAlert'); // Assuming you have an alert element with this ID

    var isEmpty = false;

    if (fullNameInput.value.trim() === '' || ageInput.value.trim() === '' || genderSelect.value.trim() === '' ||
      civilStatusSelect.value.trim() === '' || contactNumberInput.value.trim() === '' || residentialAddressInput.value.trim() === '' ||
      emailAddressInput.value.trim() === '' || cityInput.value.trim() === '' || strandInput.value.trim() === '' ||
      yearGraduatedInput.value.trim() === '') {
      isEmpty = true;
    }

    //FULL NAME
    if (fullNameInput.value.trim() === '') {
      isEmpty = true;
      fullNameInput.classList.add('is-invalid');
    } else {
      fullNameInput.classList.remove('is-invalid');
    }

    //AGE
    if (ageInput.value.trim() === '' || isNaN(ageInput.value)) {
      ageInput.classList.add('is-invalid');
      isEmpty = true;
    } else {
      ageInput.classList.remove('is-invalid');
    }

    //GENDER
    if (genderSelect.value.trim() === '') {
      isEmpty = true;
      genderSelect.classList.add('is-invalid');
    } else {
      genderSelect.classList.remove('is-invalid');
    }

    // CIVIL STATUS
    if (civilStatusSelect.value.trim() === '') {
      isEmpty = true;
      civilStatusSelect.classList.add('is-invalid');
    } else {
      civilStatusSelect.classList.remove('is-invalid');
    }

    // CONTACT NUMBER
    if (contactNumberInput.value.trim() === '') {
      isEmpty = true;
      contactNumberInput.classList.add('is-invalid');
    } else {
      contactNumberInput.classList.remove('is-invalid');
    }

    // REISDENTIAL ADDRESS
    if (residentialAddressInput.value.trim() === '') {
      isEmpty = true;
      residentialAddressInput.classList.add('is-invalid');
    } else {
      residentialAddressInput.classList.remove('is-invalid');
    }

    // EMAIL ADDRESS 
    if (emailAddressInput.value.trim() === '') {
      isEmpty = true;
      emailAddressInput.classList.add('is-invalid');
    } else {
      emailAddressInput.classList.remove('is-invalid');
    }

    // CITY / PROVINCE
    if (cityInput.value.trim() === '') {
      isEmpty = true;
      cityInput.classList.add('is-invalid');
    } else {
      cityInput.classList.remove('is-invalid');
    }

    // STRAND 
    if (strandInput.value.trim() === '') {
      isEmpty = true;
      strandInput.classList.add('is-invalid');
    } else {
      strandInput.classList.remove('is-invalid');
    }

    // YEAR GRADUATED
    if (yearGraduatedInput.value.trim() === '') {
      isEmpty = true;
      yearGraduatedInput.classList.add('is-invalid');
    } else {
      yearGraduatedInput.classList.remove('is-invalid');
    }

    // EDUCATIONAL STATUS
    var answer2Select = document.querySelector('select[name="answer2"]');
    var answer5Select = document.querySelector('select[name="answer5"]');

    if (answer2Select.value.trim() === '') {
      isEmpty = true;
      answer2Select.classList.add('is-invalid');
    } else {
      answer2Select.classList.remove('is-invalid');
    }

    if (answer5Select.value.trim() === '') {
      isEmpty = true;
      answer5Select.classList.add('is-invalid');
    } else {
      answer5Select.classList.remove('is-invalid');
    }

    // COMMENTS AND SUGGESTIONS
    var feedback2Textarea = document.querySelector('textarea[name="feedback2"]');

    if (feedback2Textarea.value.trim() === '') {
      isEmpty = true;
      feedback2Textarea.classList.add('is-invalid');
    } else {
      feedback2Textarea.classList.remove('is-invalid');
    }

    if (isEmpty) {
      event.preventDefault();
      validationAlert.style.display = 'block';

      setTimeout(function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
        validationAlert.focus();
      }, 100);
    }
  });
</script>