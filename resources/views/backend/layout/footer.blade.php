<!-- Required Fremwork -->
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- Required Jqurey -->
<script src="/assets/plugins/jquery/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="/assets/plugins/tether/dist/js/tether.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


<!-- waves effects.js -->
<script src="/assets/plugins/Waves/waves.min.js"></script>

<!-- Scrollbar JS-->
<script src="/assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="/assets/plugins/jquery.nicescroll/jquery.nicescroll.min.js"></script>

<!--classic JS-->
<script src="/assets/plugins/classie/classie.js"></script>

<!-- notification -->
<script src="/assets/plugins/notification/js/bootstrap-growl.min.js"></script>

<!-- custom js -->
<script type="text/javascript" src="/assets/js/main.js"></script>
<script type="text/javascript" src="/assets/pages/elements.js"></script>
<script type="text/javascript" src="/assets/js/menu.min.js"></script>


<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script>

@yield('footer')
<!-- My Javascript -->
<script>
    $(document).ready(function() {

        $('.js-example-basic-single').select2();
        // swal
        const flashMessage = $('.flash-message').data('flashmessage');
        if (flashMessage) {
            Swal.fire(
                'success',
                flashMessage,
                'success'
            )
        }

        $('.btn-del').on('click', function(e) {
            e.preventDefault();
            const href = $(this).attr('href');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    document.location.href = href;
                }
            });
        });
        // end swal

        $('#fasilitas').keydown(function(e) {
            if (e.Which == 13) {
                console.log('berhasil');
            } else {
                console.log('gagal');
            }
        });
        $(document).on('click', '.krngg', function(e) {
            $(this).parents('.form-group').remove()
        });
        $(document).on('click', '.krng-peserta', function(e) {
            $(this).parents('tr').remove();
            total();
        });
        $(document).on('click', '#tmbh_psrt', function() {
            var peserta = $('#peserta').val();
            var dokumen = $('#dokumen').val();
            var idpaket = $('#paket').val();
            var tanggal = $('#tgl').val();
            var harga = $('#paket').find(':selected').data("harga");
            var paket = $('#paket').find(':selected').data("paket");
            $("#peserta").val("");
            $("#dokumen").val("");
            $("#paket").val("");
            $("#tgl").val("");
            console.log(peserta)
            $('#invoce').append(`
            <tr>
                <th><button class="btn btn-danger krng-peserta" type="button"><i class="icofont icofont-minus-square"></i></button></th>
                <td>
                ` + peserta + `
                <input class="form-control" type="hidden" name="pesertaa[]" value="` + peserta + `" placeholder="Masukan Nama Peserta">
                </td>
                <td>
                ` + paket + `
                <input class="form-control" type="hidden" name="pakett[]" value="` + idpaket + `" placeholder="Masukan Nama Peserta">
                </td>
                <td>
                ` + dokumen + `
                <input class="form-control" type="hidden" name="dokumenn[]" value="` + dokumen + `" placeholder="Masukan Nama Peserta">
                </td>
                <td>
                ` + tanggal + `
                <input class="form-control" type="hidden" name="tgll[]" value="` + tanggal + `" placeholder="Masukan Nama Peserta">
                </td>
                <td>
                ` + angka(harga) + `
                <input class="form-control harga" type="hidden" name="hargaa[]" value="` + harga + `" placeholder="Masukan Nama Peserta">
                </td>
            </tr>
            `);
            total();
        })
        $('#tmbh').on('click', function() {
            $('#isi').append(`
            <div class="form-group row">
                    <label for="fasilitas" class="col-xs-2 col-form-label form-control-label"></label>
                    <div class="col-sm-8">
                        <input class="form-control {{ $errors->has('fasilitas') ? 'input-danger' : '' }}" type="text" name="fasilitas[]" value="{{ old('fasilitas') }}"  required>
                        <small class="text-danger">{{ $errors->first('fasilitas') }}</small>
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-danger krngg" type="button"><i class="icofont icofont-minus-square"></i></button>
                    </div>
                </div>
            `)
        })
        $('#diskon').on('keyup', function() {
            var diskon = $(this).val();
            if (diskon == "") {
                var hasil = 0;
            } else {
                var harga = +$('#paket').find(':selected').data("harga");

                var hasil = (harga * diskon) / 100;
                var total = angka(harga - hasil);
            }

            $('#hrg_diskon').val(total);
        })
        setInterval(function() {
            $.getJSON('/komplain/notif', function(data) {
                console.log(data.length);
                $('#totalPesan').html(data.length);
                // $.each(data, function(index, e) {
                //     console.log(e.nama_staf);
                // })
            })
        }, 1000);
        $('#notifPesan').on('click', function() {
            $.getJSON('/komplain', function(data) {
                console.log(data.length);
                var html = "";
                $.each(data, function(index, e) {


                    html += `
                    <div class="media friendlist-box" data-id="1" data-status="online" data-username="` + e.nama_pelanggan + `" data-invoice="` + e.invoice_id + `" data-komplain="` + e.kode + `" data-toggle="tooltip" data-placement="left" title="` + e.nama_pelanggan + `">

                        <a class="media-left" href="#!">
                            <img class="media-object img-circle" src="assets/images/avatar-1.png" alt="Generic placeholder image">
                        </a>
                        <div class="media-body">
                            <div class="friend-header">` + e.nama_pelanggan + `</div>
                        </div>
                    </div>
                    `;
                })

                $('#customerList').html(html);

            })
        })
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token]').attr('content')
            }
        });
        $(document).on('keyup', '#inputEmail', function(e) {
            var pesan = $(this).val();
            var komplain_id = $('#komplain_idd').val();
            if (e.which == 13) {
                console.log('ok');
                $.ajax({
                    type: 'POST',
                    url: '/komplain/balas',
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': komplain_id,
                        'psn': pesan
                    },
                    success: function() {
                        $('#inputEmail').val("");
                        $('#kotakChat').append(`
                        <div class="media chat-messages">
                            <div class="media-body chat-menu-reply">
                                <div class="">
                                    <p class="chat-cont">` + pesan + `</p>
                                    <p class="chat-time">8:20 a.m.</p>
                                </div>
                            </div>
                            <div class="media-right photo-table">
                                <a href="#!">
                                    <img class="media-object img-circle m-t-5" src="assets/images/avatar-2.png" alt="Generic placeholder image">
                                    <div class="live-status bg-success"></div>
                                </a>
                            </div>
                        </div>
                        `);
                    }
                })
            }
        })
        // $(document).on('click', '.media', function(e) {
        //     $(".showChat_inner.chatInner").show('slow');
        //     e.preventDefault();
        //     return false;
        // });
        // $('#chatPesan').on('click', function(e) {
        //     $(".showChat_inner.chatInner").hide();
        //     e.preventDefault();
        //     return true;
        // });
        // $(".showChat_inner.chatInner").hide();
    })

    function total() {
        var sum = 0;

        $('.harga').each(function() {
            var harga = +$(this).val();
            sum += harga;
        });
        $('#total').text(angka(sum));
        $('#hasil').val(sum);
    }

    function angka(num) {
        num = num.toString().replace(/\Rp|/g, '');
        if (isNaN(num))
            num = "0";
        sign = (num == (num = Math.abs(num)));
        num = Math.floor(num * 100 + 0.50000000001);
        cents = num % 100;
        num = Math.floor(num / 100).toString();
        if (cents < 10)
            cents = "0" + cents;
        for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
            num = num.substring(0, num.length - (4 * i + 3)) + '.' +
            num.substring(num.length - (4 * i + 3));
        return ((sign) ? '' : '-') + num;
    }
</script>




























<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>