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

    // PART II. - EDUCATIONAL STATUS
    var answer2Input = document.querySelector('input[name="answer2"]');
    var answer3Select = document.querySelector('select[name="answer3"]');
    var answer4Select = document.querySelector('select[name="answer4"]');
    var answer5Input = document.querySelector('input[name="answer5"]');
    var answer6Select = document.querySelector('select[name="answer6"]');
    var answer8Select = document.querySelector('select[name="answer8"]');
    var answer9Select = document.querySelector('select[name="answer9"]');
    var answer10Select = document.querySelector('select[name="answer10"]');
    var answer11Select = document.querySelector('select[name="answer11"]');
    var answer12Select = document.querySelector('select[name="answer12"]');
    var answer13Select = document.querySelector('select[name="answer13"]');

    if (answer2Input.value.trim() === '' || answer3Select.value.trim() === '' || answer4Select.value.trim() === '' ||
      answer5Input.value.trim() === '' || answer6Select.value.trim() === '' || 
      answer8Select.value.trim() === '' || answer9Select.value.trim() === '' || answer10Select.value.trim() === '' ||
      answer11Select.value.trim() === '' || answer12Select.value.trim() === '' || answer13Select.value.trim() === '') {
      isEmpty = true;
    }

    if (answer2Input.value.trim() === '') {
      isEmpty = true;
      answer2Input.classList.add('is-invalid');
    } else {
      answer2Input.classList.remove('is-invalid');
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

    if (answer6Select.value.trim() === '') {
      isEmpty = true;
      answer6Select.classList.add('is-invalid');
    } else {
      answer6Select.classList.remove('is-invalid');
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

    // PART III. - EMPLOYMENT STATUS
    var answer16Select = document.querySelector('select[name="answer16"]');
    var answer17Select = document.querySelector('select[name="answer17"]');
    var answer18Select = document.querySelector('select[name="answer18"]');
    var answer19Input = document.querySelector('input[name="answer19"]');
    var answer20Input = document.querySelector('input[name="answer20"]');
    var answer21Input = document.querySelector('input[name="answer21"]');
    var answer22Select = document.querySelector('select[name="answer22"]');
    var answer23Select = document.querySelector('select[name="answer23"]');
    var answer24Select = document.querySelector('select[name="answer24"]');
    var answer25Select = document.querySelector('select[name="answer25"]');
    var answer26Select = document.querySelector('select[name="answer26"]');
    var answer27Select = document.querySelector('select[name="answer27"]');
    var answer28Select = document.querySelector('select[name="answer28"]');
    var answer29Select = document.querySelector('select[name="answer29"]');

    if (answer16Select.value.trim() === '' || answer17Select.value.trim() === '' || answer18Select.value.trim() === '' ||
      answer19Input.value.trim() === '' || answer20Input.value.trim() === '' || answer21Input.value.trim() === '' ||
      answer22Select.value.trim() === '' || answer23Select.value.trim() === '' || answer24Select.value.trim() === '' ||
      answer25Select.value.trim() === '' || answer26Select.value.trim() === '' || answer27Select.value.trim() === '' ||
      answer28Select.value.trim() === '' || answer29Select.value.trim() === '') {
      isEmpty = true;
    }

    if (answer16Select.value.trim() === '') {
      isEmpty = true;
      answer16Select.classList.add('is-invalid');
    } else {
      answer16Select.classList.remove('is-invalid');
    }

    if (answer17Select.value.trim() === '') {
      isEmpty = true;
      answer17Select.classList.add('is-invalid');
    } else {
      answer17Select.classList.remove('is-invalid');
    }

    if (answer18Select.value.trim() === '') {
      isEmpty = true;
      answer18Select.classList.add('is-invalid');
    } else {
      answer18Select.classList.remove('is-invalid');
    }

    if (answer19Input.value.trim() === '') {
      isEmpty = true;
      answer19Input.classList.add('is-invalid');
    } else {
      answer19Input.classList.remove('is-invalid');
    }

    if (answer20Input.value.trim() === '') {
      isEmpty = true;
      answer20Input.classList.add('is-invalid');
    } else {
      answer20Input.classList.remove('is-invalid');
    }

    if (answer21Input.value.trim() === '') {
      isEmpty = true;
      answer21Input.classList.add('is-invalid');
    } else {
      answer21Input.classList.remove('is-invalid');
    }

    if (answer22Select.value.trim() === '') {
      isEmpty = true;
      answer22Select.classList.add('is-invalid');
    } else {
      answer22Select.classList.remove('is-invalid');
    }

    if (answer23Select.value.trim() === '') {
      isEmpty = true;
      answer23Select.classList.add('is-invalid');
    } else {
      answer23Select.classList.remove('is-invalid');
    }

    if (answer24Select.value.trim() === '') {
      isEmpty = true;
      answer24Select.classList.add('is-invalid');
    } else {
      answer24Select.classList.remove('is-invalid');
    }

    if (answer25Select.value.trim() === '') {
      isEmpty = true;
      answer25Select.classList.add('is-invalid');
    } else {
      answer25Select.classList.remove('is-invalid');
    }

    if (answer26Select.value.trim() === '') {
      isEmpty = true;
      answer26Select.classList.add('is-invalid');
    } else {
      answer26Select.classList.remove('is-invalid');
    }

    if (answer27Select.value.trim() === '') {
      isEmpty = true;
      answer27Select.classList.add('is-invalid');
    } else {
      answer27Select.classList.remove('is-invalid');
    }

    if (answer28Select.value.trim() === '') {
      isEmpty = true;
      answer28Select.classList.add('is-invalid');
    } else {
      answer28Select.classList.remove('is-invalid');
    }

    if (answer29Select.value.trim() === '') {
      isEmpty = true;
      answer29Select.classList.add('is-invalid'); 
    } else {
      answer29Select.classList.remove('is-invalid');
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