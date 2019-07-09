<!-- Required Jqurey -->
<script src="/assets/plugins/jquery/dist/jquery.min.js"></script>
<script src="/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="/assets/plugins/tether/dist/js/tether.min.js"></script>

<!-- Required Fremwork -->
<script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- waves effects.js -->
<script src="/assets/plugins/Waves/waves.min.js"></script>

<!-- Scrollbar JS-->
<script src="/assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="/assets/plugins/jquery.nicescroll/jquery.nicescroll.min.js"></script>

<!--classic JS-->
<script src="/assets/plugins/classie/classie.js"></script>

<!-- notification -->
<script src="/assets/plugins/notification/js/bootstrap-growl.min.js"></script>

<!-- Select 2 js -->
<script src="/assets/plugins/select2/dist/js/select2.full.min.js"></script>


<!-- Tags js -->
<script src="/assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.js"></script>

<!-- custom js -->
<script type="text/javascript" src="/assets/js/main.min.js"></script>
<script type="text/javascript" src="/assets/pages/advance-form.js"></script>
<script type="text/javascript" src="/assets/pages/elements.js"></script>
<script type="text/javascript" src="/assets/js/menu.min.js"></script>

<!-- datatables -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

























<!-- Date picker.js -->
<script src="/assets/plugins/datepicker/js/moment-with-locales.min.js"></script>
<script src="/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

<!-- Select 2 js -->
<script src="/assets/plugins/select2/dist/js/select2.full.min.js"></script>

<!-- Max-Length js -->
<script src="/assets/plugins/bootstrap-maxlength/src/bootstrap-maxlength.js"></script>

<!-- Multi Select js -->
<script src="/assets/plugins/bootstrap-multiselect/dist/js/bootstrap-multiselect.js"></script>
<script src="/assets/plugins/multiselect/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="/assets/plugins/multi-select/js/jquery.quicksearch.js"></script>

<!-- Tags js -->
<script src="/assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.js"></script>

<!-- Bootstrap Datepicker js -->
<script type="text/javascript" src="/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="/assets/plugins/bootstrap-datepicker/js/bootstrap-datetimepicker.min.js"></script>

<!-- bootstrap range picker -->
<script type="text/javascript" src="/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- color picker -->
<script type="text/javascript" src="/assets/plugins/spectrum/spectrum.js"></script>
<script type="text/javascript" src="/assets/plugins/jscolor/jscolor.js"></script>

<!-- highlite js -->
<script type="text/javascript" src="/assets/plugins/syntaxhighlighter/scripts/shCore.js"></script>
<script type="text/javascript" src="/assets/plugins/syntaxhighlighter/scripts/shBrushJScript.js"></script>
<script type="text/javascript" src="/assets/plugins/syntaxhighlighter/scripts/shBrushXml.js"></script>
<script type="text/javascript">
    SyntaxHighlighter.all();
</script>

<!-- custom js -->
<script type="text/javascript" src="/assets/js/main.min.js"></script>
<script type="text/javascript" src="/assets/pages/advance-form.js"></script>
<script src="/assets/js/menu.min.js"></script>


<!-- My Javascript -->
<script>
    $(document).ready(function() {
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
                ` + harga + `
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
                        <input class="form-control {{ $errors->has('fasilitas') ? 'input-danger' : '' }}" type="text" id="fasilitas" name="fasilitas[]" value="{{ old('fasilitas') }}">
                        <small class="text-danger">{{ $errors->first('fasilitas') }}</small>
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-danger krngg" type="button"><i class="icofont icofont-minus-square"></i></button>
                    </div>
                </div>
            `)
        })
    })

    function total() {
        var sum = 0;

        $('.harga').each(function() {
            var harga = +$(this).val();
            sum += harga;
        });
        $('#total').text(sum);
        $('#hasil').val(sum);
    }
</script>




























<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>