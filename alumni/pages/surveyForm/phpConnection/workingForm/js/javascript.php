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

    // PART II. - EMPLOYMENT STATUS
    var answer2Select = document.querySelector('select[name="answer2"]');
    var answer3Select = document.querySelector('select[name="answer3"]');
    var answer4Select = document.querySelector('select[name="answer4"]');
    var answer5Input = document.querySelector('input[name="answer5"]');
    var answer6Input = document.querySelector('input[name="answer6"]');
    var answer7Input = document.querySelector('input[name="answer7"]');
    var answer8Select = document.querySelector('select[name="answer8"]');
    var answer9Select = document.querySelector('select[name="answer9"]');
    var answer10Select = document.querySelector('select[name="answer10"]');
    var answer11Select = document.querySelector('select[name="answer11"]');
    var answer12Select = document.querySelector('select[name="answer12"]');
    var answer13Select = document.querySelector('select[name="answer13"]');
    var answer14Select = document.querySelector('select[name="answer14"]');
    var answer15Select = document.querySelector('select[name="answer15"]');

    if (answer2Select.value.trim() === '' || answer3Select.value.trim() === '' || answer4Select.value.trim() === '' ||
      answer5Input.value.trim() === '' || answer6Input.value.trim() === '' || answer7Input.value.trim() === '' ||
      answer8Select.value.trim() === '' || answer9Select.value.trim() === '' || answer10Select.value.trim() === '' ||
      answer11Select.value.trim() === '' || answer12Select.value.trim() === '' || answer13Select.value.trim() === '' ||
      answer14Select.value.trim() === '' || answer15Select.value.trim() === '') {
      isEmpty = true;
    }

    if (answer2Select.value.trim() === '') {
      isEmpty = true;
      answer2Select.classList.add('is-invalid');
    } else {
      answer2Select.classList.remove('is-invalid');
    }

    if (answer3Select.value.trim() === '') {
      isEmpty = true;
      answer3Select.classList.add('is-invalid');
    } else {
      answer3Select.classList.remove('is-invalid');
    }

    if (answer4Select.value.trim() === '') {
      isEmpty = true;
      answer4Select.classList.add('is-invalid');
    } else {
      answer4Select.classList.remove('is-invalid');
    }

    if (answer5Input.value.trim() === '') {
      isEmpty = true;
      answer5Input.classList.add('is-invalid');
    } else {
      answer5Input.classList.remove('is-invalid');
    }

    if (answer6Input.value.trim() === '') {
      isEmpty = true;
      answer6Input.classList.add('is-invalid');
    } else {
      answer6Input.classList.remove('is-invalid');
    }

    if (answer7Input.value.trim() === '') {
      isEmpty = true;
      answer7Input.classList.add('is-invalid');
    } else {
      answer7Input.classList.remove('is-invalid');
    }

    if (answer8Select.value.trim() === '') {
      isEmpty = true;
      answer8Select.classList.add('is-invalid');
    } else {
      answer8Select.classList.remove('is-invalid');
    }

    if (answer9Select.value.trim() === '') {
      isEmpty = true;
      answer9Select.classList.add('is-invalid');
    } else {
      answer9Select.classList.remove('is-invalid');
    }

    if (answer10Select.value.trim() === '') {
      isEmpty = true;
      answer10Select.classList.add('is-invalid');
    } else {
      answer10Select.classList.remove('is-invalid');
    }

    if (answer11Select.value.trim() === '') {
      isEmpty = true;
      answer11Select.classList.add('is-invalid');
    } else {
      answer11Select.classList.remove('is-invalid');
    }

    if (answer12Select.value.trim() === '') {
      isEmpty = true;
      answer12Select.classList.add('is-invalid');
    } else {
      answer12Select.classList.remove('is-invalid');
    }

    if (answer13Select.value.trim() === '') {
      isEmpty = true;
      answer13Select.classList.add('is-invalid');
    } else {
      answer13Select.classList.remove('is-invalid');
    }

    if (answer14Select.value.trim() === '') {
      isEmpty = true;
      answer14Select.classList.add('is-invalid');
    } else {
      answer14Select.classList.remove('is-invalid');
    }

    if (answer15Select.value.trim() === '') {
      isEmpty = true;
      answer15Select.classList.add('is-invalid'); 
    } else {
      answer15Select.classList.remove('is-invalid');
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