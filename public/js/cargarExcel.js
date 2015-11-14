var xlf = document.getElementById('cargarExcel');
var table = $('#pesosDT').dataTable({
    "language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},
    "bPaginate": false,
    "bLengthChange": false,
    "bFilter": false,
    "bSort": false,
    "bInfo": false,
    "bAutoWidth": false
});

// Delete dataTable
$('#borrarDT').click( function() {
    table.fnDeleteRow();
    updateControlSemanal();
});

/**
 * Convertir JSON
 * @param workbook
 * @returns {{}}
 */
function to_json(workbook) {
    var result = {};
    workbook.SheetNames.forEach( function(sheetName) {
        var roa = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
        if(roa.length > 0){
            result[sheetName] = roa;
        }
    });
    return result;
}
/**
 * Convierte archivo excel en javascript
 * @param e
 */
function handleFile(e) {
    var files = e.target.files;
    var i,f;

    for (i = 0, f = files[i]; i != files.length; ++i) {
        var reader = new FileReader();
        var name = f.name;

        reader.onload = function(e) {
            var data = e.target.result;
            var workbook = XLSX.read(data, {type: 'binary'});

            // Parse JS Object
            var jsondata = (to_json(workbook))["Hoja1"];

            for(var i in jsondata) {
                var obj = jsondata[i];
                var row = [];
                for(var j in obj) {
                    row.push(obj[j]);
                }

                table.fnAddData(row);
            }

            updateControlSemanal();
        };

        reader.readAsBinaryString(f);
    }
}

if(xlf.addEventListener)
{
    xlf.addEventListener('change', handleFile, false);
}

function updateControlSemanal() {
    var prom = calcularPromedio( table.fnGetData() );

    $('#peso_promedio').val(prom);
    $('#estado').val("Actualizando estado");
}

function calcularPromedio(obj) {
    var promedio = 0;
    var suma = 0;

    if (obj.length == 0)
        return promedio;

    for (var i in obj) {
        var row = obj[i];
        for(var j in row) {
            suma += parseFloat(row[j]);
        }
    }
    promedio = suma / (obj.length * obj[0].length);
    console.log("Promedio: " + promedio);

    return promedio;
}

function updateEstado(promedio) {

}