
function addRoomList(){
    $("#btnAddRoom").click(()=>{
        //$('select[name=habitacion]').val()
        console.log($('select[name=habitacion]').val())



    })
}

function compareDates(fechaEntrada, horaEntrada, fechaSalida, horaSalida)
{
    if(new Date(fechaEntrada + " " + horaEntrada) > new Date(fechaSalida + " " + horaSalida))
    {
        Swal.fire({
            title: 'Fechas incorrectas',
            text: 'La salida no puede ser anterior a la entrada',
            type: 'error',
            confirmButtonText: 'Mmm ya'
            });
        return false;

    }else if(new Date(fechaEntrada + " " + horaEntrada) == new Date(fechaSalida + " " + horaSalida)){
        
        Swal.fire({
            title: 'Fechas incorrectas',
            text: 'La salida y la entrada no pueden ser iguales',
            type: 'error',
            confirmButtonText: 'OK'
            });
        return false;
    }

    return true;

    
}

function dateFields()
{
    if($("#horaEntrada").val() && $("#fechaEntrada").val() && $("#horaSalida").val() && $("#fechaSalida").val())
    {
        return true;
    }else{
        Swal.fire({
            title: 'Fije los parámetros',
            text: 'Especifique la entrada y salida',
            type: 'info',
            confirmButtonText: 'Vale'
            });
        return false;
    }
}

$("#btnAddRoom").click(()=>{
    
    if(!dateFields())
    {
        return;
    }

    if(!compareDates($("#fechaEntrada").val(), $("#horaEntrada").val(), $("#fechaSalida").val(), $("#horaSalida").val()))
    {
        return;
    }
    
    if($("#selectRoom").val())
    {

        id = $('select[name=habitacion]').val();
        habitacion = $("#selectRoom option:selected").text();
        
        var element = `<div class="col-12 room-item" id="${id}">
        <p>${habitacion}</p>
        <i id="remove-room" onclick="removeItem(${id})" class="fa fa-times delete-room"></i>
    
        </div>`;
    
        $("#rooms-list").append(element);
    }
    

});

$("#selectRoom").change(function (){
    console.log($(this).children("option:selected").val())
})

// $(".delete-room").unbind().click(function(){
//     $(this).parent('.room-item').first().remove();
    // id = $(this).attr('data')
     // $(`.root-item#${id}`).remove();
// })


function removeItem(id)
{
    $(`div#${id}`).remove();
}

function fillSelectHab(list)
{
    data = JSON.parse(list);
    cad = "";
    data.forEach(k =>{
        //console.log(k.nombre +" " + k.apellidos)

        cad += `<option value="${k.id_habitacion}">${k.numero}</option>`
    });

    $("#selectRoom").html(cad);
    
    
}

$("#searchHuesped").keyup(function(e){
    if($("#searchHuesped").val())
    {
        var str ={"info" : $("#searchHuesped").val()}
        var car = JSON.stringify(str)
        $.ajax({
            url: 'control/buscarHuespedes.php',
            //url: 'modelo/rec.php',
            type: 'POST',
            data: {str: car},
            success: function(response){
                //fillTableHuesped(response)
                //dat = JSON.parse(response)
                //console.log(dat[0].huesped_1)
            }
        })
    }
})

$("#selecTipoHab").change(function(){
    if($("#selecTipoHab").val())
    {
        var type = {"id" : $("#selecTipoHab").val()}
        var dat = JSON.stringify(type)

        $.ajax({
            url: 'control/getHabs.php',
            //url: 'modelo/rec.php',
            type: 'POST',
            data: {type: dat},
            success: function(response){
                fillSelectHab(response)
                
            }
        })
    }
    id = $(this).val();
})



function agregarHuesped(id)
{
    $("#huespedId").val(id);
}


