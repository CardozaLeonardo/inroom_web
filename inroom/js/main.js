
$(document).ready(()=>{
    console.log('holaaa')
})



$("#tipoProducto").change(function(){
    console.log($("#tipoProducto").val())
    if($("#tipoProducto").val())
    {
        if($("#tipoProducto").val() == 2)
        {
            $("#costo").prop('disabled', true);
            $("#marca").prop('disabled', true);
            $("#vencimiento").prop('disabled', true);
            $("#codigoBarras").prop('disabled', true);
            $("#stock").prop('disabled', true);

            $("#costo").val("");
            $("#marca").val("");
            $("#vencimiento").val("");
            $("#codigoBarras").val("");
            $("#stock").val("");
            $("#stock").prop('required', false);
            $("#vencimiento").prop('required', false);

            $("#opc").val(2);
        }else if($("#tipoProducto").val() == 1){
            $("#costo").prop('disabled', false);
            $("#marca").prop('disabled', false);
            $("#vencimiento").prop('disabled', false);
            $("#codigoBarras").prop('disabled', false);
            $("#stock").prop('disabled', false);
            $("#stock").prop('required', true);
            $("#vencimiento").prop('required', true);
            $("#opc").val(1);
        }
    }
})