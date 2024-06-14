var form = document.querySelector('form');

var validationAlert = document.getElementById('validationAlert');

form.addEventListener('submit', function (event) {
  var processMethodSelect = document.querySelector('select[name="process"]');
  var othersDocumentInput = document.querySelector('input[name="document"]');
  var purposeInput = document.querySelector('textarea[name="purpose"]');
  var isEmpty = false;

  if (processMethodSelect.value.trim() === '' || othersDocumentInput.value.trim() === '' || purposeInput.value.trim() === '') {
    isEmpty = true;
  }

  if (processMethodSelect.value.trim() === '') {
    isEmpty = true;
    processMethodSelect.classList.add('is-invalid');
  } else {
    processMethodSelect.classList.remove('is-invalid');
  }

  if (othersDocumentInput.value.trim() === '') {
    isEmpty = true;
    othersDocumentInput.classList.add('is-invalid');
  } else {
    othersDocumentInput.classList.remove('is-invalid');
  }

  if (purposeInput.value.trim() === '') {
    isEmpty = true;
    purposeInput.classList.add('is-invalid');
  } else {
    purposeInput.classList.remove('is-invalid');
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