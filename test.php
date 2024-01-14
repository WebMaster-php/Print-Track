<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTables Example</title>
    <!-- Include DataTables CSS and jQuery -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
</head>

<body>
    <h2>DataTables Example</h2>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <script>
        $(document).ready(function () {
            var dataTable = $('#example').DataTable({
                ajax: {
                    url: 'data.php', // Your server-side script to fetch data
                    dataSrc: ''
                },
                columns: [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'email' }
                ]
            });

            // Make rows clickable
            $('#example tbody').on('click', 'tr', function () {
                var data = dataTable.row(this).data();
                alert('Row Clicked!\nID: ' + data.id + '\nName: ' + data.name + '\nEmail: ' + data.email);
            });
        });
    </script>
</body>

</html>
