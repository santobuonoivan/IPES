$TABLE1 = $('#table1');
//$(".id").hide();
//$(".idAlumno").hide();
//var $BTN = $('#export-btn');
//var $EXPORT = $('#export');

//check
  $('.table1-check').click(function () {
    let cuota ={};
    cuota.id = $(this).parents('tr').find('td:first').text();
    cuota.id_alumno = $(this).parents('tr').find('td:nth-child(2)').text();
    cuota.concepto = $(this).parents('tr').find('td:nth-child(3)').text();
    cuota.fecha = $(this).parents('tr').find('td:nth-child(4)').text();
    cuota.importe = $(this).parents('tr').find('td:nth-child(5)').text();    
    //$clone1.find('span.table1-check').css("pointer-events", "none");
    //$clone1.find('span.table1-check').css("pointer-events", "auto");
    Test.changeCuota(cuota);    
  });  
//clone ok
  $('.table1-add').click(function () {        
    Test.addCuota();       
  });  
//remove
  $('.table1-remove').click(function () {
    let id = $(this).parents('tr').find('td:nth-child(1)').text();
    if( confirm("estás seguro de eliminar la Cuota? id: "+id)){
      Test.deleteCuota(id);
      $(this).parents('tr').detach();
    }    
  });  
//up
  $('.table1-up').click(function () {
    var $row = $(this).parents('tr');
    if ($row.index() === 1) return; // Don't go above the header
    $row.prev().before($row.get(0));
  });  
//down
  $('.table1-down').click(function () {
    var $row = $(this).parents('tr');
    $row.next().after($row.get(0));
  });
  

// A few jQuery helpers for exporting only
//jQuery.fn.pop = [].pop;
//jQuery.fn.shift = [].shift;
/*
  $BTN.click(function () {
    var $rows = $TABLE.find('tr:not(:hidden)');
    var headers = [];
    var data = [];
    
    // Get the headers (add special header logic here)
    $($rows.shift()).find('th:not(:empty)').each(function () {
      headers.push($(this).text().toLowerCase());
    });
    
    // Turn all existing rows into a loopable array
    $rows.each(function () {
      var $td = $(this).find('td');
      var h = {};
      
      // Use the headers from earlier to name our hash keys
      headers.forEach(function (header, i) {
        h[header] = $td.eq(i).text();   
      });
      
      data.push(h);
    });
    
    // Output the result
    $EXPORT.text(JSON.stringify(data));
  });
*/