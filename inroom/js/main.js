
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


$("#btnAgregarRol").click(function(){
    if($("#roles").val() && !$(`.rolCont-item#${$("#roles").val()}`).length)
    {
        var elem = `
        <div class="rolCont-item" id="${$("#roles").val()}">
        <p class="rolCont-text">${$("#roles option:selected").text()}
        &nbsp;&nbsp;
        <i class="fa fa-times closeItem"></i>
        </p>
        
        </div>
       `;

       $(".rolCont").append(elem);

       if($("#rolesList").val())
       {
           var cont = $("#rolesList").val();

           var co = cont.slice(0,-1);
           co += `, "rol_${$("#roles").val()}" : ${$("#roles").val()}}`;

           $("#rolesList").val(co);
       }else{
           var con = `{"rol_${$("#roles").val()}" : ${$("#roles").val()}}`;
           $("#rolesList").val(con);
       }

    }

    //console.log($(".rolCont-item"));
})


// $(".rolCont-item").bind("click",".closeItem",function(){
//     $(this).closest(".rolCont-item").remove();
// });

$(".rolCont").on("click",".closeItem",function(){
    $(this).closest(".rolCont-item").remove();

    var con = "";
    
    //var dat = $(".rolCont-item").toArray();
    var cont = 0;

    if($(".rolCont-item").length)
    {
        con += "{";
        let dat = $(".rolCont-item").toArray();
        dat.forEach(k=>{
            if(cont > 0)
            {
                cont += ",";
            }
            con += `"rol_${k.id}" : ${k.id}`
            cont++;
        })

        con += "}";
    }

    $("#rolesList").val(con);


});


$("#usernameField").keyup(function(){
    if($(this).val())
    {
        var type = {"text" : $("#usernameField").val(), "op" : "user"}
        var dat = JSON.stringify(type)

        $.ajax({
            url: 'control/verifyUsername.php',
            //url: 'modelo/rec.php',
            type: 'POST',
            data: {type: dat},
            success: function(response){
                
                data = JSON.parse(response);

                if(data.id_user != 0)
                {

                    if(!$("#user-msg").length)
                    {

                        $("#usernameField").closest(".form-group").addClass("has-error");
                        $("#usernameField").closest(".form-group").append(`<span id="user-msg" class="has-error">
                          Este usuario ya existe
                        </span>`);
                    }
                }else{
                    if($("#user-msg").length)
                    {
                        $("#user-msg").remove();
                    }
                }
                
            }
        })
    }
})



$("#emailField").keyup(function(){
    if($(this).val())
    {
        var type = {"text" : $("#emailField").val(), "op" : "email"}
        var dat = JSON.stringify(type)

        $.ajax({
            url: 'control/verifyUsername.php',
            //url: 'modelo/rec.php',
            type: 'POST',
            data: {type: dat},
            success: function(response){
                
                data = JSON.parse(response);

                if(data.id_user != 0)
                {

                    if(!$("#email-msg").length)
                    {

                        $("#emailField").closest(".form-group").addClass("has-error");
                        $("#emailField").closest(".form-group").append(`<span id="email-msg" class="has-error">
                          Este correo ya existe
                        </span>`);
                    }
                }else{
                    if($("#email-msg").length)
                    {
                        $("#email-msg").remove();
                    }
                }
                
            }
        })
    }
})

$("#passwordConf, #password").focusout(function(){
    if($("#password").val() && $("#passwordConf").val())
    {
        if($("#password").val() != $("#passwordConf").val())
        {
            
            if(!$("#pwd-msg").length)
            {
                $("#passwordConf").closest(".form-group").addClass("has-error");
                $("#passwordConf").closest(".form-group").append(`<span id="pwd-msg" class="has-error">
                              Las contraseñas no coinciden
                            </span>`);

            }
        }else{
            if($("#pwd-msg").length)
            {
                $("#pwd-msg").remove();
            }
        }
    }
})
