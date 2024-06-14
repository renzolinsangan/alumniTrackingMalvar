  // Get the current year
  const currentYear = new Date().getFullYear();
  // Set the starting year
  const startYear = 2016;

  // Get the select element
  const yearSelect = document.getElementById('yearGraduated');

  // Add options to the select element
  for (let year = startYear; year <= currentYear; year++) {
    let option = document.createElement('option');
    option.value = year;
    option.textContent = year;
    yearSelect.appendChild(option);
  }