$(document).ready(function(){
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $("#save").on('click', function () {
        event.preventDefault();

        let name = $('#name').val();
        let description = $('#description').val();
        let dateAppointment= $('#date').val();
        // let csrfToken = $('meta[name="csrf-token"]').attr('content');

        //токен для доступа в контроллер
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });

        $.ajax({
            url: "/addAffairs",
            type:"POST",
            data:{
                name:name,
                description:description,
                dateAppointment: dateAppointment
            },
            success:function(response){
                console.log(response);
                window.location.reload();
            },
        });


    });


    $(".open-modal").on('click', function () {
        event.preventDefault();

        let idElements = $(this).attr('element-id');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });

        $.ajax({
            url: "/getAffairs",
            type:"POST",
            data:{
                id:idElements
            },
            success:function(response){
                if (response !== '') {
                    let responseAffairs = response.data;
                    $('#myModal').modal('show');

                    for (let i in responseAffairs) {
                        $('#name-req').val(responseAffairs[i].name);
                        $('#description-req').val(responseAffairs[i].description);
                    }

                    $("#edit").on('click', function () {
                        event.preventDefault();

                        let name = $('#name-req').val();
                        let description = $('#description-req').val();
                        // let csrfToken = $('meta[name="csrf-token"]').attr('content');

                        //токен для доступа в контроллер
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': csrfToken
                            }
                        });

                        $.ajax({
                            url: "/editAffairs",
                            type:"POST",
                            data:{
                                id:idElements,
                                name:name,
                                description:description,
                            },
                            success:function(response){
                                window.location.reload();
                            },
                        });
                    });


                    $("#assign").on('click', function () {
                        event.preventDefault();

                        // let csrfToken = $('meta[name="csrf-token"]').attr('content');

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': csrfToken
                            }
                        });

                        $.ajax({
                            url: "/editAffairs",
                            type:"POST",
                            data:{
                                id: idElements,
                                assign: true
                            },
                            success:function(response){
                                window.location.reload();
                            },
                        });


                    });

                }
            },
        });


    });


});
