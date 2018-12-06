jQuery(document).on('submit', '#Login', function(event){
    event.preventDefault();
    
    jQuery.ajax({
        url: 'php/login.php',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        beforeSend: function(){ 
            $('.botonlg').val('Validando');
    }
    }).done(function(respuesta){
        console.log(respuesta);
        if(!respuesta.error){
            if(respuesta.tipo == 'test'){
                location.href = 'test.php';
            }else if(respuesta.tipo == 'admin'){
                location.href = 'admin.php';
            }           
           }else{
                $('.error').slideDown('slow');
               setTimeout(function(){
                   $('.error').slideUp('slow');
               },3000);
               $('.botonlg').val('Iniciar Sesión');
           }
    }).fail(function(resp){
        console.log(resp.responseText);
    }).always(function(){
        console.log("complete");
    });
});

$(document).ready(function() {   
    $("#asignaPP").click(function(){
        if(confirm("Deseas ingresar una serie??")){
            insertarPP();            
        }     
    });
    $("#asignaME").click(function(){
        if(confirm("Deseas ingresar una serie??")){
            insertarME();
        }        
    });
    $("#asignaMP").click(function(){
        if(confirm("Deseas ingresar una serie??")){
            insertarMP();
        }        
    });
    $("#asignaLM").click(function(){
        if(confirm("Deseas ingresar una serie??")){
            insertarLM();
        }        
    });
    $("#asignaNUM").click(function(){
        if(confirm("Deseas ingresar una serie??")){
            insertNUM();
        }        
    });
    function insertarPP() {
        //valores para incrementar la serie
        var serie = $("#PP_SER").text();     
        var regex = /(\d+)/g; 
        var seriePP = serie.match(regex);   var seriePPINC = parseInt(seriePP); 
        var PPinsert = "PP0000000".concat(++seriePPINC);
        
        var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
        var f=new Date();
        var miFecha = diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear() + " a las  " + f.getHours() + ":" + f.getMinutes() + ":" + f. getSeconds();
        var host = $("#host").text();      
        
        $.post("/lotificador/php/insert_serie.php",{"miFecha":miFecha,"host":host,"PPinsert":PPinsert}).done(function(data) {
            alert(data);
            location.reload();
        });
        
    }
    function insertarME() {
        var serie = $("#ME_SER").text();     
        var regex = /(\d+)/g; 
        var serieME = serie.match(regex);   var serieMEINC = parseInt(serieME); 
        var MEinsert = "ME0000000".concat(++serieMEINC);
        
        var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
        var f=new Date();
        var miFecha = diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear() + " a las  " + f.getHours() + ":" + f.getMinutes() + ":" + f. getSeconds();
        var host = $("#host").text();       
        
        $.post("/lotificador/php/insert_serie.php",{"miFecha":miFecha,"host":host,"MEinsert":MEinsert}).done(function(data) {
            alert(data);
            location.reload();
        });
    }
    function insertarMP() {
        var serie = $("#MP_SER").text();     
        var regex = /(\d+)/g; 
        var serieMP = serie.match(regex);   var serieMPINC = parseInt(serieMP); 
        var MPinsert = "MP0000000".concat(++serieMPINC);
        
        var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
        var f=new Date();
        var miFecha = diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear() + " a las  " + f.getHours() + ":" + f.getMinutes() + ":" + f. getSeconds();
        var host = $("#host").text();       
        
        $.post("/lotificador/php/insert_serie.php",{"miFecha":miFecha,"host":host,"MPinsert":MPinsert}).done(function(data) {
            alert(data);
            location.reload();
        });
    }
    function insertarLM() {
        var serie = $("#LM_SER").text();     
        var regex = /(\d+)/g; 
        var serieLM = serie.match(regex);   var serieLMINC = parseInt(serieLM); 
        var LMinsert = "LM0000000".concat(++serieLMINC);
        
        var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
        var f=new Date();
        var miFecha = diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear() + " a las  " + f.getHours() + ":" + f.getMinutes() + ":" + f. getSeconds();
        var host = $("#host").text();
        
        $.post("/lotificador/php/insert_serie.php",{"miFecha":miFecha,"host":host,"LMinsert":LMinsert}).done(function(data) {
            alert(data);
            location.reload();
        });
    }
    function insertNUM() {
        var serie = $("#numerico").text();    
        var serNUM = parseInt(serie);        
        var NUMinsert = "0000000".concat(++serNUM);
        
        var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
        var f=new Date();
        var miFecha = diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear() + " a las  " + f.getHours() + ":" + f.getMinutes() + ":" + f. getSeconds();
        var host = $("#host").text();
        
        $.post("/lotificador/php/insert_serie.php",{"miFecha":miFecha,"host":host,"NUMinsert":NUMinsert}).done(function(data) {
            alert(data);
            location.reload();
        });
    };
    

});
