<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
<script>
  $(document).ready(function () {
    $('#studying').DataTable();
    $('#working').DataTable();
    $('#sw').DataTable();
    $('#notsw').DataTable();
  });
</script>
<script>
  document.getElementById('selectForm').addEventListener('change', function () {
    var selectedOption = this.value;

    // Hide all tables
    document.getElementById('studyingTable').style.display = 'none';
    document.getElementById('workingTable').style.display = 'none';
    document.getElementById('swTable').style.display = 'none';
    document.getElementById('notswTable').style.display = 'none';

    // Show the selected table
    document.getElementById(selectedOption + 'Table').style.display = 'block';
  });
</script>
<script type="text/javascript" src="js/table2excel.js"></script>
<script>
  document.getElementById('exportButton').addEventListener('click', function () {
    var table2excel = new Table2Excel();
    var tables = document.querySelectorAll("table");

    tables.forEach(function (table) {
      table2excel.export([table]);
    });
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
  integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
  integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>