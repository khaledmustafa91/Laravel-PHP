// $(document).ready(function () {
//     $('.alertMessage').fadeIn("slow",function (){
//       $(this).delay(3000).fadeOut("slow");
//     });
//
// });

function order($id) {
        $.ajax({
            url: '/pizzas/' + $id,
            type: 'get',
            data: $id, // Remember that you need to have your csrf token included
            success: function (_response) {
                // Handle your response..
                if(_response == '') {
                    $('.alertMessage').fadeIn("slow",function (){
                        $(this).delay(3000).fadeOut("slow");
                    });
                }
                else{
                    $('.DangerMessage').fadeIn("slow",function (){
                        $(this).delay(3000).fadeOut("slow");
                    });
                    window.setTimeout(function() {
                        window.location = _response;
                    },3500);
                }
                console.log(_response);
            },
            error: function (_response) {
                // Handle error
            }
        });
}

function Deleteorder($id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/pizzas/orders/' + $id,
        type: 'DELETE',
        data: $id, // Remember that you need to have your csrf token included
        success: function (_response) {
            // Handle your response..
            if(_response == '') {
                $('.alertMessage').fadeIn("slow",function (){
                    $(this).delay(3000).fadeOut("slow");
                });
            }
            else{
                $('.DangerMessage').fadeIn("slow",function (){
                    $(this).delay(3000).fadeOut("slow");
                });
            }
            console.log(_response);
        },
        error: function (_response) {
            // Handle error
        }
    });
}

function Completeorder($id) {
    $.ajax({
        url: '/pizzas/orders/' + $id,
        type: 'get',
        data: $id, // Remember that you need to have your csrf token included
        success: function (_response) {
            // Handle your response..
            if(_response == '') {
                $('.alertMessage').fadeIn("slow",function (){
                    $(this).delay(3000).fadeOut("slow");
                });
            }
            else{
                $('.DangerMessage').fadeIn("slow",function (){
                    $(this).delay(3000).fadeOut("slow");
                });
            }
            console.log(_response);
        },
        error: function (_response) {
            // Handle error
        }
    });
}


