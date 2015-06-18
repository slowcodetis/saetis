$(document).on('ready',function(){
        $('#fecha').datetimepicker({
                yearOffset:0,
                lang:'es',
                timepicker:false,
                format:'Y-m-d',
                formatDate:'Y/m/d',
                minDate:'-1970/01/01', // fecha actual es el minimo de seleccion en fechas
                maxDate:'2015/06/30' 
                //maxDate:'+1970/04/01' // and tommorow is maximum date calendar
        });

        $('#hora').datetimepicker({
                datepicker:false,
                format:'H:i',

                step:5

        });

          $('#fecha2').datetimepicker({
                yearOffset:0,
                lang:'es',
                timepicker:false,
                format:'Y-m-d',
                formatDate:'Y/m/d',
                minDate: new Date() // fecha actual es el minimo de seleccion en fechas
                // and tommorow is maximum date calendar
        });

    
    });
