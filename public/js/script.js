$(document).ready(function () {

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
