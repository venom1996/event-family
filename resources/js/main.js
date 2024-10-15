$(document).ready(function () {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    $("#save").on('click', function () {
        event.preventDefault();

        let name = $('#name').val();
        let description = $('#description').val();
        let dateAppointment = $('#date').val();
        // let csrfToken = $('meta[name="csrf-token"]').attr('content');

        //токен для доступа в контроллер
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });

        $.ajax({
            url: "/addAffairs",
            type: "POST",
            data: {
                name: name,
                description: description,
                dateAppointment: dateAppointment
            },
            success: function (response) {
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
            type: "POST",
            data: {
                id: idElements
            },
            success: function (response) {
                if (response !== '') {
                    let responseAffairs = response.data;
                    event.preventDefault();
                    $('#myModal').modal('show');
                    console.log(idElements);

                    for (let i in responseAffairs) {
                        $('#name-req').val(responseAffairs[i].name);
                        $('#description-req').val(responseAffairs[i].description);
                        $('#finish-date-req').val(formatDate(responseAffairs[i].date_finish))
                    }
                }
            },
        });


        $("#edit").off('click').on('click', function () {
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
                type: "POST",
                data: {
                    id: idElements,
                    name: name,
                    description: description,
                },
                success: function (response) {
                    window.location.reload();
                },
            });
        });


        $("#finish").off('click').on('click', function () {
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
                type: "POST",
                data: {
                    id: idElements,
                    finish: true
                },
                success: function (response) {
                    window.location.reload();
                },
            });
        });


        $("#assign").off('click').on('click', function () {
            event.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });

            $.ajax({
                url: "/editAffairs",
                type: "POST",
                data: {
                    id: idElements,
                    assign: true
                },
                success: function (response) {
                    window.location.reload();
                },
            });
        });

    });


    function formatDate(dateString) {
        // Создаем объект даты из строки
        const date = new Date(dateString);

        const day = String(date.getDate()).padStart(2, '0');
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const year = date.getFullYear(); // год
        const hours = String(date.getHours()).padStart(2, '0');
        const minutes = String(date.getMinutes()).padStart(2, '0');
        const seconds = String(date.getSeconds()).padStart(2, '0');

        return `${day}.${month}.${year} ${hours}:${minutes}:${seconds}`;
    }
});
