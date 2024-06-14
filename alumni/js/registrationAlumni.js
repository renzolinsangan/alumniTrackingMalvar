$(document).ready(function () {
    $('.nextButtonFirstForm').on('click', function () {
        var usernameInput = $('#username');
        var passwordInput = $('#pass');
        var fullNameInput = $('#name');
        var genderInput = $('#gender');
        var isFormValid = true;

        if (passwordInput.val().trim().length < 8 || passwordInput.val().trim().length > 100) {
            passwordInput.addClass('is-invalid');
            isFormValid = false;
        } else {
            passwordInput.removeClass('is-invalid');
        }

        var namePattern = /^[a-zA-Z.\s]*$/;
        if (!namePattern.test(fullNameInput.val().trim())) {
            fullNameInput.addClass('is-invalid');
            isFormValid = false;
        } else {
            fullNameInput.removeClass('is-invalid');
        }

        var genderPattern = /^[a-zA-Z]+$/;
        if (!genderPattern.test(genderInput.val().trim())) {
            genderInput.addClass('is-invalid');
            isFormValid = false;
        } else {
            genderInput.removeClass('is-invalid');
        }

        if (usernameInput.val().trim() === '' || passwordInput.val().trim() === '' || fullNameInput.val().trim() === '' ||
            genderInput.val().trim() === '') {
            isFormValid = false;
        }

        if (!isFormValid) {
            $('#validationAlertFirstForm').show();
            console.log('Please fill in all the fields correctly in the first form before proceeding.');
            return;
        } else {
            $('#validationAlertFirstForm').hide();
        }

        $('.leftFirstForm').hide();
        $('.leftSecondForm').show();
        $('#validationAlertSecondForm').hide();
    });

    $('.nextButtonSecondForm').on('click', function () {
        var ageInput = $('#age');
        var houseAddressInput = $('#houseaddress');
        var emailInput = $('#email');
        var contactNumberInput = $('#contactnumber');
        var isFormValid = true;

        if (ageInput.val().trim() === '' || isNaN(ageInput.val())) {
            ageInput.addClass('is-invalid');
            isFormValid = false;
        } else {
            ageInput.removeClass('is-invalid');
        }

        if (houseAddressInput.val().trim() === '') {
            houseAddressInput.addClass('is-invalid');
            isFormValid = false;
        } else {
            houseAddressInput.removeClass('is-invalid');
        }

        var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (!emailPattern.test(emailInput.val())) {
            emailInput.addClass('is-invalid');
            isFormValid = false;
        } else {
            emailInput.removeClass('is-invalid');
        }

        if (contactNumberInput.val().length !== 11 || !contactNumberInput.val().startsWith("09")) {
            contactNumberInput.addClass('is-invalid');
            isFormValid = false;
        } else {
            contactNumberInput.removeClass('is-invalid');
        }

        if (!isFormValid) {
            $('#validationAlertSecondForm').show();
            console.log('Please fill in all the fields correctly in the second form before proceeding.');
            return;
        } else {
            $('#validationAlertSecondForm').hide();
        }

        $('.leftSecondForm').hide();
        $('.leftThirdForm').show();
    });

    $('.backButton').on('click', function () {
        var currentForm = $(this).closest('.leftSecondForm, .leftThirdForm');
        var prevForm = currentForm.prev('.leftFirstForm, .leftSecondForm');
        currentForm.hide();
        prevForm.show();

        $('#validationAlertFirstForm, #validationAlertSecondForm').hide();
    });
});

var contactInput = document.getElementById('contactnumber');

contactInput.addEventListener('input', function (e) {
    var inputValue = e.target.value.replace(/\D/g, '');

    e.target.value = inputValue;
});

var lrnInput = document.querySelector('input[name="lrn"]');
lrnInput.addEventListener('input', function (event) {
    var inputValue = event.target.value.replace(/\D/g, '');
    event.target.value = inputValue;
});

var form = document.querySelector('form');
var validationAlertThirdForm = document.getElementById('validationAlertThirdForm');

form.addEventListener('submit', function (event) {
    var academicStrandInput = document.querySelector('input[name="strand"]');
    var learningReferenceNumberInput = document.querySelector('input[name="lrn"]');
    var yearGraduatedInput = document.querySelector('input[name="yearGraduated"]');
    var awardInput = document.querySelector('input[name="award"]');
    var validationAlertThirdForm = document.getElementById('validationAlertThirdForm');

    var isEmpty = false;
    var isValidLRN = /^\d{12}$/.test(learningReferenceNumberInput.value.trim());
    var isValidYear = /^\d{4}$/.test(yearGraduatedInput.value.trim());

    if (academicStrandInput.value.trim() === '') {
        isEmpty = true;
        academicStrandInput.classList.add('is-invalid');
    } else {
        academicStrandInput.classList.remove('is-invalid');
    }

    if (!isValidLRN) {
        isEmpty = true;
        learningReferenceNumberInput.classList.add('is-invalid');
    } else {
        learningReferenceNumberInput.classList.remove('is-invalid');
    }

    if (!isValidYear) {
        isEmpty = true;
        yearGraduatedInput.classList.add('is-invalid');
    } else {
        yearGraduatedInput.classList.remove('is-invalid');
    }

    if (awardInput.value.trim() === '') {
        isEmpty = true;
        awardInput.classList.add('is-invalid');
    } else {
        awardInput.classList.remove('is-invalid');
    }

    if (isEmpty) {
        event.preventDefault();

        validationAlertThirdForm.style.display = 'block';

        setTimeout(function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
            validationAlertThirdForm.focus();
        }, 100);
    } else {
        $('#validationAlertThirdForm').hide();
    }
});
