function queryPostRequest(url, parameters, successFunction, failFunction) {
    $(document).ready(function () {
        $.ajax({
            url: url,
            method: "POST",
            data: {'data': JSON.stringify(parameters)},
            dataType: "html",
            statusCode:{
                200:(data)=>successFunction(data),
                201:(data)=>failFunction(data),
            }
        })
    });
}
window.onload = function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}
function deleteAnn(id)
{
  /*  let confirm1 = confirm(`Вы действительно хотите удалить отклик соискателя: "${name}"?`);*/
        $.ajax({
            url: "/delete",
            type: "POST",
            data: ({_token: $('#csrf-token')[0].content, 'id': id}),
            dataType: "text",
            success:(data)=>{
                $(`#card${id}`).remove();
            }

        });
}

