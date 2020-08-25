<!DOCTYPE html>
<html class="hide-sidebar top-navbar ls-bottom-footer-fixed" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Jadwal Kajian</title>
    <link type="text/css" href="<?php echo $path_realestate; ?>css/vendor/all.css" rel="stylesheet">
    <link type="text/css" href="<?php echo $path_realestate; ?>css/app/app.css" rel="stylesheet">
    <link type="text/css" href="<?php echo $path_app; ?>css/welcome.css?update=2018-10-01" rel="stylesheet">
    <!-- Datepicker -->
    <link rel="stylesheet" type="text/css" href="<?php echo $path_datepicker; ?>css/bootstrap-datepicker3.min.css">
    <!-- Clock Picker -->
    <link rel="stylesheet" type="text/css" href="<?php echo $path_clockpicker; ?>dist/bootstrap-clockpicker.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $path_clockpicker; ?>assets/css/github.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $path_powerange; ?>powerange.css">

    <link rel="stylesheet" type="text/css" href="<?php echo $path_toastr; ?>toastr.min.css">

    <link href="https://addtocalendar.com/atc/1.5/atc-style-blue.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo $path_ssk; ?>css/social-share-kit.css" type="text/css">
    
</head>

<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-main navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo base_url();?>">Sahabat Muslim</a>
            </div>
        </div>
    </nav>
    <div id="content">
        <section class="cover overlay height-140 height-100-xs"  style="background-color:green !important; <?php echo ($is_mobile?'display:none;':'');?>">
            <!-- <img src="<?php echo $path_realestate; ?>images/photodune-186709-residential-street-m.jpg" alt="cover" /> -->
            <div class="overlay overlay-full overlay-bg-black bg-transparent">
                <div class="container">
                    <h1 class="text-h1 text-overlay">Jadwal Kajian</h1>
                    <a id="gambar_masjid_hijau" href="<?php echo $path_realestate .'images/islamic_green.jpg'; ?>"></a>
                    <a id="link_get_kajian_latest" href="<?php echo $link_get_kajian_latest; ?>"></a>
                    <a id="link_list_ustadz" href="<?php echo $link_list_ustadz; ?>"></a>
                    <a id="link_list_lokasi" href="<?php echo $link_list_lokasi; ?>"></a>
                    <a id="link_search_kajian" href="<?php echo $link_search_kajian; ?>"></a>
                    <a id="link_check_data_search_kajian_in_session" href="<?php echo $link_check_data_search_kajian_in_session; ?>"></a>
                    <a id="path_realestate" href="<?php echo $path_realestate; ?>"></a>
                    <a id="geo_latitude" href=""></a>
                    <a id="geo_longitude" href=""></a>
                </div>
            </div>
            <div class="overlay overlay-bg-black">
                <div class="v-bottom">
                    <div class="container">
                        <p class="text-overlay">Aplikasi ini menyajikan jadwal-jadwal kajian yang berada disekitar anda<span class="hidden-sm hidden-xs"></span>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        
        

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading panel-collapse-trigger" data-toggle="collapse" data-target="#search-panel"  style="margin-bottom:20px;">
                            <h4 class="panel-title">Pencarian kajian</h4>
                        </div>
                        <div id="search-panel" class="collapse in">
                            <form id="form_search_kajian" role="form" method="post">
                                    <div class="panel-body">
                                        <label class="label-block">Judul/Tema</label>
                                        <div class="form-group">
                                            <input id="title" name="title" class="form-control" placeholder="Masukkan judul Kajian"> 
                                        </div>
                                        <label class="label-block">Ustadz</label>
                                        <div class="form-group">
                                            <input id="ustadzid" name="ustadzid" class="form-control" type="hidden">
                                            <input id="ustadz" name="ustadz" class="form-control" placeholder="Pilh Ustadz" readonly>
                                        </div>
                                        <label class="label-block">Lokasi</label>
                                        <div class="form-group">
                                            <input id="placeid" name="placeid" class="form-control" type="hidden">
                                            <input id="place" name="place" class="form-control" placeholder="Pilih Lokasi" readonly> 
                                        </div>
                                            <label class="label-block" for="check-in">Tanggal</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                <input id="tanggal" name="tanggal" value="<?php echo date('Y-m-d')?>" class="form-control" placeholder="Pilih Tanggal" readonly> 
                                            </div><br/>
                                            <label class="label-block" for="check-in">Waktu Mulai</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                                <input id="starttime" name="starttime" class="form-control" placeholder="Waktu Mulai" readonly> 
                                            </div><br/>
                                            <label class="label-block" for="check-out">Waktu selesai</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                                <input id="endtime" name="endtime" class="form-control" placeholder="Waktu Akhir" readonly>
                                            </div><br/>
                                            <label class="label-block" for="check-in">Urutkan dari</label>
                                            <div class="input-group">
                                                <input type="radio" name="orderby" value="time"> mulai lebih dulu<br>
                                                <input type="radio" name="orderby" value="distance"  checked="checked"> jarak terdekat<br>
                                            </div>
                                            <br/>
                                            <label class="label-block" for="check-out">Maksimal jarak dari lokasi anda</label>
                                            <div class="slider-wrapper">
                                                <input name="distance" type="text" class="js-check-change"/><br/>
                                                <div id="js-display-change" class="display-box"></div>
                                            </div>
                                        
                                    </div>
                                    <div class="row text-center">
                                        <div class="col-xs-6">
                                            <button type="submit" class="btn btn-block btn-success">Cari</button>
                                        </div>
                                        <div class="col-xs-6">
                                            <button id="clear_form" type="button" class="btn btn-block btn-danger">Reset</button>
                                        </div>
                                    </div>
                            </form>  
                        </div>
                        
                        <br/>
                    </div>
                    <div id="div_progress_bar" class="progress progress-striped active" style="display:none"></div>
                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%;z-index:10000"></div>
                    <div id="download_android_id" style="display:none;"><a href="https://play.google.com/store/apps/details?id=com.zaitunlabs.salim"><b>Download Versi Android</b></a></div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-xs-6">
                            <h4 id="notif"></h4>
                        </div>
                    </div>
                    <div id="div_parent_map" class="panel panel-default" style="display:none">
                        <div class="panel-heading">
                            <h4 class="panel-title">Map View</h4>
                        </div>
                        <div id="map" class="panel-body relative height-350"></div>
                    </div>
                    <div id="kajian_content" class="panel panel-default" style="display:none"></div>
                    <div id="mapBunshin" class="panel-body relative height-350" style="display:none"></div>


                    <div id="more" style="display:none">Loading More Content...</div>
                    <div id="no-more" style="display:none">No More Content</div>
                    <div id="loading" style="display:none"><img style="width:50px;height:50px;display:block;margin:auto;" src="<?php echo $path_gif .'ring-alt.gif'; ?>"></div>
                    

                    </div>

            </div>
        </div>
    </div>
    
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="klik untuk ke atas" data-toggle="tooltip" data-placement="left"><span class="glyphicon glyphicon-chevron-up"></span></a>
                
    <!-- Modal Ustadz -->
    <?php echo $view_modal_ustadz; ?>
    <!-- Modal Lokasi -->
    <?php echo $view_modal_lokasi; ?>


     <!-- 2. Include script -->
    <script type="text/javascript">(function () {
            if (window.addtocalendar)if(typeof window.addtocalendar.start == "function")return;
            if (window.ifaddtocalendar == undefined) { window.ifaddtocalendar = 1;
                var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                s.type = 'text/javascript';s.charset = 'UTF-8';s.async = true;
                s.src = ('https:' == window.location.protocol ? 'https' : 'http')+'://addtocalendar.com/atc/1.5/atc.min.js';
                var h = d[g]('body')[0];h.appendChild(s); }})();
    </script>

    <!-- Inline Script for colors and config objects; used by various external scripts; -->
    <script type="text/javascript">
        var colors = {
            "danger-color": "#e74c3c",
            "success-color": "#81b53e",
            "warning-color": "#f0ad4e",
            "inverse-color": "#2c3e50",
            "info-color": "#2d7cb5",
            "default-color": "#6e7882",
            "default-light-color": "#cfd9db",
            "purple-color": "#9D8AC7",
            "mustard-color": "#d4d171",
            "lightred-color": "#e15258",
            "body-bg": "#f6f6f6"
        };
        var config = {
            theme: "html",
            skins: {
                "default": {
                    "primary-color": "#16ae9f"
                }
            }
        };

        

    </script>
    <script type="text/javascript" src="<?php echo $path_realestate; ?>js/vendor/core/jquery.js"></script>
    <script type="text/javascript" src="<?php echo $path_realestate; ?>js/vendor/all.js"></script>

    
    <!-- <script type="text/javascript" src="https://maps.google.com/maps/api/js"></script> -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfp20TEldFUHZ3hlVGgpyBWnpGxeLIJZw" type="text/javascript"></script> -->

    <!-- <script type="text/javascript" src="<?php echo $path_gmaps; ?>gmaps.js"></script> -->
    <!-- <script type="text/javascript" src="<?php echo $path_gmaps; ?>markerclusterer.js"></script> -->



    <!-- Datepicker -->
    <script type="text/javascript" src="<?php echo $path_datepicker; ?>js/bootstrap-datepicker.min.js"></script>
    <!-- Clockpicker -->
    <script type="text/javascript" src="<?php echo $path_clockpicker; ?>dist/bootstrap-clockpicker.min.js"></script>
    <script type="text/javascript" src="<?php echo $path_clockpicker; ?>assets/js/highlight.min.js"></script>
    <!-- DataTables JavaScript -->
    <script type="text/javascript" src="<?php echo $path_datatables; ?>datatables/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo $path_datatables; ?>datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <!-- Bootbox -->
    <script type="text/javascript" src="<?php echo $path_bootbox; ?>bootbox.min.js"></script>
    <!-- Powerange -->
    <script type="text/javascript" src="<?php echo $path_powerange; ?>powerange.js"></script>
    <!-- App -->
    <script type="text/javascript" src="<?php echo $path_app; ?>js/form_search.js?update=2018-12-25-rev1"></script>
    <!-- <script type="text/javascript" src="<?php echo $path_app; ?>js/main.js"></script> -->
    <script type="text/javascript" src="<?php echo $path_app; ?>js/search.js?update=2018-10-18-rev2"></script>
    <!-- <script type="text/javascript" src="<?php echo $path_app; ?>js/welcome.js"></script> -->


    <!-- Toastr -->
    <script type="text/javascript" src="<?php echo $path_toastr; ?>toastr.min.js"></script>


    <script type="text/javascript" src="<?php echo $path_ssk; ?>js/social-share-kit.min.js"></script>

    <script type="text/javascript">
        var defaultDistance = 20; //in KM
        var changeInput = document.querySelector('.js-check-change');
        var initChangeInput = new Powerange(changeInput, { start: defaultDistance });
        changeInput.onchange = function() {
            document.getElementById('js-display-change').innerHTML = changeInput.value +' KM';
        };
        document.getElementById('js-display-change').innerHTML  = defaultDistance + ' KM';
        
    </script>

    <script type="text/javascript">
        function changeUstadzModalHeight(){
                $('#modalUstadz .modal-body').css('overflow-y', 'auto'); 
                $('#modalUstadz .modal-body').css('max-height', $(window).height() * 0.7);
        }

        function changeLokasiModalHeight(){
                $('#modalLokasi .modal-body').css('overflow-y', 'auto'); 
                $('#modalLokasi .modal-body').css('max-height', $(window).height() * 0.7);
        }
        $(document).ready(function(){
            $('#modalUstadz').on('show.bs.modal', function () {
                changeUstadzModalHeight();
            });

            $('#modalLokasi').on('show.bs.modal', function () {
                changeLokasiModalHeight();
            });

            if(typeof sahabatmuslim == 'undefined'){
                $('#download_android_id').show();
            }
        })

        $(window).resize(function(){
            changeUstadzModalHeight();
            changeLokasiModalHeight();
        })
    </script>

</body>

</html>