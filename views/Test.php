
<!DOCTYPE html>

<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">

</head>
<body>

<table id="example" class=" table table-striped table-bordered" style="width:100%">
    <thead>

    <tr>
        <th>nom</th>
        <th>num</th>
        <th>prix</th>
        <th>qte</th>
        <th>cat</th>
        <th>desc</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <tr>
        <td ></td>
        <td ></td>
        <td ></td>
        <td ></td>
        <td ></td>
        <td ></td>
    </tr>
    </tbody>

    <tfoot>
    <tr>
        <th>nom</th>
        <th>num</th>
        <th>prix</th>
        <th>qte</th>
        <th>cat</th>
        <th>desc</th>
    </tr>
    </tfoot>
</table>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#example").DataTable({
            ajax: {
                url: "TestAjax.php",
                type: "POST",
                dataSrc: ""
            },
            columns: [
                { data: "nom" },
                { data: "num" },
                { data: "prix" },
                { data: "qte" },
                { data: "descr" },
                { data: "cat" }
            ],
            //iDisplayLength: 1,
            iDisplayStart: 0
        });
        $("#example").jqxDataTable(
            {
                width: 670,
                theme: 'energyblue',
                pageable: true,
                pagerButtonsCount: 10,
                source: dataAdapter,
                columnsResize: true,
                columns: [
                    { text: 'Name', dataField: 'firstname', width: 100 },
                    { text: 'Last Name', dataField: 'lastname', width: 100 },
                    { text: 'Product', editable: false, dataField: 'productname', width: 180 },
                    { text: 'Quantity', dataField: 'quantity', width: 80, cellsAlign: 'right', align: 'right' },
                    { text: 'Unit Price', dataField: 'price', width: 90, cellsAlign: 'right', align: 'right', cellsFormat: 'c2' },
                    { text: 'Total', dataField: 'total', cellsAlign: 'right', align: 'right', cellsFormat: 'c2' }
                ]
            });
    });;

</script>


</body>
</html>