<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
        <title>Datatable Server side</title>
    </head>
    <body>
        <h2 class="text-center my-4">Datatable Server side</h2>
        <div class="container">
            <table id="datatable" class="table table-stripped">
                <thead>
                    <tr>
                        <th><input type="checkbox"></th>
                        <th>Nik</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Date Of Birth</th>
                        <th>Gender</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.js"></script>
        <script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
        <script type="text/javascript" >
            let employee = [];
            const table = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                bLengthChange: true,
                bFilter: true,
                bInfo: true,
                order: [[1, 'asc']],
                autoWidth: false,
                ajax: 'detail-data',
                columnDefs: [
                    { targets: '_all', visible: true },
                    {
                        "targets": 0,
                        "sortable": false,
                        "class": "text-dark",
                        "render": function(type,data, row, meta){
                            let checkbox = `<input type="checkbox"  class="child-cb" value="${row.id}">`;
                            return checkbox;
                        }
                    },
                    {
                        "targets": 1,
                        "class": "text-dark",
                        "render": function(type,data, row, meta){
                            employee[row.id] = row;
                            return row.nik;
                        }
                    },
                    {
                        "targets": 2,
                        "class": "text-dark",
                        "render": function(type,data, row, meta){
                            return row.full_name;
                        }
                    },
                    {
                        "targets": 3,
                        "class": "text-dark",
                        "render": function(type,data, row, meta){
                            return row.email;
                        }
                    },
                    {
                        "targets": 4,
                        "class": "text-dark",
                        "render": function(type,data, row, meta){
                            return row.pob;
                        }
                    },
                    {
                        "targets": 5,
                        "class": "text-dark",
                        "render": function(type,data, row, meta){
                            return row.gender;
                        }
                    },
                    {
                        "targets": 6,
                        "class": "text-dark",
                        "render": function(type,data, row, meta){
                            return row.status;
                        }
                    },
                    {
                        "targets": 7,
                        "class": "text-dark",
                        "render": function(type,data, row, meta){
                            return row.action;
                        }
                    },
                ],
            });

            function edit(id){
                alert(employee[id]);
            }

            function remove(id){
                alert(id)
            }

            $('.cb-child').on('click', function(){
                alert('test')
            })
        </script>
    </body>
</html>