(function($) {

    $(document).ready(function() {

        // datepicker (tanggal)
        $('#tanggal').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
        // clock piker
        var input = $('#starttime');
        input.clockpicker({
            autoclose: true
        });

        var input2 = $('#endtime');
        input2.clockpicker({
            autoclose: true
        });

        var oTable2 = $('#tableListUstadz').dataTable({
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: $("#link_list_ustadz").attr("href"), // json datasource                
                type: "post", // method  , by default get
            },
            "columnDefs": [
                {
                    "targets": [ 0 ],
                    className: "hide_column"
                }
            ]
        });

        var oTable3 = $('#tableListLokasi').dataTable({
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: $("#link_list_lokasi").attr("href"), // json datasource                
                type: "post", // method  , by default get
            },
            "columnDefs": [
                {
                    "targets": [ 0 ],
                    className: "hide_column"
                }
            ]
        });

        // show modal list ustadz
        $('#ustadz').click(function() {

            var options = {
                //"backdrop": "static"
            }

            $('#modalUstadz').modal(options);
        });

        // select ustadz
        $("#tableListUstadz").delegate("tr", "click", function() {

            var nameUstadz = $("td:eq(1)", this).text();
            $('#ustadz').val(nameUstadz);

            var idUstadz = $("td:eq(0)", this).text();
            $('#ustadzid').val(idUstadz);

            $('#modalUstadz').modal('hide');
        });

        // show modal list lokasi
        $('#place').click(function() {

            var options = {
                //"backdrop": "static"
            }

            $('#modalLokasi').modal(options);
        });

        // select place
        $("#tableListLokasi").delegate("tr", "click", function() {

            var nameLokasi = $("td:eq(1)", this).text();
            $('#place').val(nameLokasi);

            var idLokasi = $("td:eq(0)", this).text();
            $('#placeid').val(idLokasi);

            $('#modalLokasi').modal('hide');
        });

        // clear form
        $('#clear_form').click(function() {
            $('#form_search_kajian')[0].reset();
            $('#placeid').val("");
            $('#ustadzid').val("");
            $('#tanggal').val("");
            initChangeInput.setStart(20);
        });

    });

})(jQuery);
