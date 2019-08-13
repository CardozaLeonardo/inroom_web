
function addRoomList(){
    $("#btnAddRoom").click(()=>{
        //$('select[name=habitacion]').val()
        console.log($('select[name=habitacion]').val())



    })
}

$("#btnAddRoom").click(()=>{
    
    id = $('select[name=habitacion]').val();
    habitacion = $("#selectRoom option:selected").text();
    
    var element = `<div class="col-12 room-item" id="${id}">
    <p>${habitacion}</p>
    <i id="remove-room" onclick="removeItem(${id})" class="fa fa-times delete-room"></i>

    </div>`;

    $("#rooms-list").append(element);

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
