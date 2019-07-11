$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Swal
    const flashMessage = $('.flash-message').data('flashmessage');
    if (flashMessage) {
        Swal.fire(
            'success',
            flashMessage,
            'success'
        )
    }


    // chat
    $('#btnChat').on('click', function () {
        let btnVal = $(this);
        $('#chatDiv').slideToggle('slow', function () {
            const chatSesi = $('#sesi-chat').data('sesichat');
            if (chatSesi) {
                $('#valid').slideToggle('slow');
            } else {
                $('#invalid').show();
                $('#idInvoice').on('keyup', function (e) {
                    if (e.which == 13) {
                        var invId = $(this).val();
                        $.ajax({
                            type: 'get',
                            url: '/chat/getinvoice/' + invId,
                            success: function (data) {
                                if (data) {
                                    $('#invalid').hide();
                                    $('#valid').slideToggle();
                                    var objId = JSON.parse(data);
                                    $('#sesi-chat').data('sesichat', objId.id);
                                    chat();
                                } else {
                                    $('#idInvoice').addClass('invalid-chat');
                                }
                            }
                        })
                    }
                })
            }
        });
        if ($(this).is(':visible')) {
            $("i", btnVal).toggleClass("fa-headphones fa-times");
        } else {
            $("i", btnVal).toggleClass("fa-times fa-headphones");
        }
    })

    chat();

    // Login and register
    $('#SignUpForm').hide();
    $('#SignUp').click(function (e) {
        e.preventDefault();
        $('#LoginForm').hide();
        $('#SignUpForm').slideToggle('slow');
        $('#LoginHeader').text('Sign-Up')
    })

    $('#LogIn').click(function (e) {
        e.preventDefault();
        $('#SignUpForm').hide();
        $('#LoginForm').slideToggle('slow');
        $('#LoginHeader').text('Sign-In')
    });
    // End login and register

    // Form Testimoni
    // Get Invoice
    $('#invoiceId').on('keyup', function () {
        let invoiceId = $(this).val();
        console.log(invoiceId);
        $.ajax({
            type: 'get',
            url: '/testimonial/get/invoiceId/' + invoiceId,
            success: function (data) {
                let obj = JSON.parse(data);
                $('#namaPelanggan').val(obj.name);
            }
        })
    });
    // Star rating
    $("#rateYo").rateYo({
        rating: 0,
        fullStar: true,
        multiColor: {
            "startColor": "#CF000F", //RED
            "endColor": "#FFA500" //Yellow
        }
    }).on("rateyo.change", function (e, data) {
        var rating = data.rating;
        var word;
        if (rating == 0) {
            rating = null;
            word = null;
        } else if (rating == 1) {
            word = 'Awful';
        } else if (rating == 2) {
            word = 'Bad';
        } else if (rating == 3) {
            word = 'Good';
        } else if (rating == 4) {
            word = 'Excellent';
        } else {
            word = 'Perfect';
        }
        $('#rateText').html(word);
        $('#star').val(rating);
    });
    // End Testimoni
})

function chat() {
    const sesiChat = $('#sesi-chat').data('sesichat');

    if (sesiChat) {
        // load chat
        $.get('/chat/' + sesiChat, function (data) {
            $('#viewChat').html(data);
        });
        $('#chatIdInvoice').val(sesiChat);
        $('#chatMessage').focus();

        // sending chat
        $('#formChat').on('submit', function (e) {
            e.preventDefault();
            let id = $('#chatIdInvoice').val();
            let chat = $('#chatMessage').val();
            let url = $(this).attr('action');
            if (chat === "") {
                $('#chatMessage').addClass('invalid-chat');
            } else {
                $('#chatMessage').removeClass('invalid-chat');
                $.ajax({
                    type: 'post',
                    url: url,
                    data: {
                        invoiceId: id,
                        message: chat
                    },
                    success: function () {
                        $('#chatMessage').val('');
                        $.get('/chat/' + sesiChat, function (data) {
                            $('#viewChat').html(data);
                        });
                    }
                });
            }
        });
    }
}
