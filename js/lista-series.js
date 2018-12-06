$(document).ready(function(){
    $.post("php/consulta.php", {"get_registros":true}).done(function(data){
        var registros = $.parseJSON(data);
        var conDet,conPop;
        for(var x in registros){
            $("#table_registro").append(
                "<tr>"+
                "<td>"+(parseInt(x)+1)+"</td>"+
                "<td>"+registros[x]["PP_SER"]+"</td>"+
                "</tr>"
            );
        }
    });
});

