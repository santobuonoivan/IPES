$TABLE2 = $('#table2');
//$(".id2").hide();
//$(".idAlumno2").hide();
//var $BTN = $('#export-btn');
//var $EXPORT = $('#export');
//check
    $('.table2-check').click(function () {
        let pago ={};
        pago.id = $(this).parents('tr').find('td:first').text();
        pago.id_alumno = $(this).parents('tr').find('td:nth-child(2)').text();
        pago.concepto = $(this).parents('tr').find('td:nth-child(3)').text();
        pago.fecha = $(this).parents('tr').find('td:nth-child(4)').text();
        pago.importe = $(this).parents('tr').find('td:nth-child(5)').text();
        
        //$clone1.find('span.table1-check').css("pointer-events", "none");
        //$clone1.find('span.table1-check').css("pointer-events", "auto");
        Test.changePago(pago);
    });
//clone
    $('.table2-add').click(function () {
        Test.addPago();        
    });
//remove
    $('.table2-remove').click(function () {
        let id = $(this).parents('tr').find('td:first').text();
        if( confirm("estás seguro de eliminar la Cuota? id: "+id)){
        Test.deletePago(id);
        $(this).parents('tr').detach();
        }
    });
//up
    $('.table2-up').click(function () {
        var $row = $(this).parents('tr');
        if ($row.index() === 1) return; // Don't go above the header
        $row.prev().before($row.get(0));
    });
//down
    $('.table2-down').click(function () {
        var $row = $(this).parents('tr');
        $row.next().after($row.get(0));
    });