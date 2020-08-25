<!DOCTYPE html>
<html class="hide-sidebar top-navbar ls-bottom-footer-fixed" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Jadwal Kajian</title>

    <?php 
        $dateString = date("d F Y", strtotime($content->tanggal));
        $shareTitle = "Jadwal Kajian - ".$content->title." oleh ".$content->ustadz->name;
        $shareBody = "Jadwal Kajian - ".$content->title." oleh ".$content->ustadz->name." di "
        .$content->lokasi->place." pada ".$dateString."\n\n"
        ."Untuk info lebih jelas, kunjungi link berikut :\n\nhttps://sahabatmuslim.zaitunlabs.com/kajiandetail/".$content->id
        ."\n\nUntuk download aplikasi jadwal kajian versi android, kunjungi link berikut :\n\nhttps://zaitunlabs.com/yourls/sahabatmuslim";

    ?>


    <meta property="og:title" content="Jadwal Kajian - <?php echo $content->title.' oleh '.$content->ustadz->name.' pada '.$dateString;?>"/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:description" content="Jadwal Kajian - <?php echo $content->title.' oleh '.$content->ustadz->name.' di '.$content->lokasi->place.' ('.$content->lokasi->address.')';?>"/>
    <meta property="og:site_name" content="Jadwal Kajian"/>
    <meta property="og:type" content="website"/>



    <link type="text/css" href="<?php echo $path_realestate; ?>css/vendor/all.css" rel="stylesheet">
    <link type="text/css" href="<?php echo $path_realestate; ?>css/app/app.css" rel="stylesheet">
    <link type="text/css" href="<?php echo $path_app; ?>css/welcome.css" rel="stylesheet">
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
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>">Sahabat Muslim</a>
            </div>
        </div>
    </nav>
    <div id="content">
        <section class="cover overlay height-200 height-270-xs"  style="background-color:green !important;">
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
                <div class="col-md-9">
                        <?php if(is_object($content)){?>

                        
                        <div class="panel-body" style="margin:15px 3px;background-color:grey;">
                            <div class="media media-clearfix-xs media-clearfix-sm"> 
                                <div class="media-left">
                                    <p> <a href="#"> <img src="<?php echo $path_realestate."/images/islamic_green.jpg";?>" alt="property" width="150" class="media-object"/> </a></p> </div> <div class="media-body"> <h4 class="media-heading margin-v-0-10"> <a><?php echo $content->title;?></a> </h4> <p>
                                    <span class="label label-black-100" style="margin-top:10px;"><i class="fa fa-user fa-fw"></i><?php echo $content->ustadz->name;?></span>
                                    <span class="label label-black-100" style="margin-top:10px;"><i class="fa fa-calendar fa-fw"></i><?php echo $content->tanggal;?></span>
                                    <span class="label label-black-100" style="margin-top:10px;"><i class="fa fa-clock-o fa-fw"></i><?php echo (!empty($content->startendtime)?$content->startendtime:$content->starttime." - ".$content->endtime);?></span> </p><p class="margin-none"><b><?php echo $content->lokasi->place." - ".$content->lokasi->address;?></b><br/><br/>
                                    <p class="margin-none"><b><?php echo $content->info;?></b></p><br/>
                                    <br/>

                                    <p>
                                    <span class="label label-black-100" style="margin-top:10px;"><i class="fa fa-map-marker fa-fw"></i><a onclick="openMaps('<?php echo $content->lokasi->latitude;?>','<?php echo $content->lokasi->longitude;?>');return false;" href="#">Peta Lokasi</a></span>
                                    <span class="label label-black-100" style="margin-top:10px;"><i class="fa fa-map-marker fa-fw"></i>
                                
                                    <a id="reminderMobId" onclick="remindMe(fixedEncodeURIComponent('<?php echo $content->title;?>')+' oleh '+fixedEncodeURIComponent('<?php echo $content->ustadz->name;?>'),'<?php echo $content->tanggal;?>','<?php echo $content->tanggal;?>','<?php echo $content->starttime;?>','<?php echo $content->endtime;?>',fixedEncodeURIComponent('<?php echo $content->lokasi->place;?>'));return false;"  href="#">Pengingat</a>

                                    <span id="reminderWebId" class="addtocalendar"><a class="atcb-link">Pengingat</a>
                                        <var class="atc_event">
                                        <var class="atc_date_start"><?php echo $content->tanggal." ".$content->starttime;?></var>
                                        <var class="atc_date_end"><?php echo $content->tanggal." ".$content->endtime;?></var>
                                        <var class="atc_timezone">Asia/Jakarta</var>
                                        <var class="atc_title"><?php echo $content->title." oleh ".$content->ustadz->name;?></var>
                                        <var class="atc_description"><?php echo $content->title." oleh ".$content->ustadz->name." di ".$content->lokasi->place;?></var>
                                        <var class="atc_location"><?php echo $content->lokasi->address;?></var>
                                        </var></span>
                                    </span>
                                    
                                    <span id="callMobId" class="label label-black-100" style="margin-top:10px;"><i class="fa fa-map-marker fa-fw"></i><a onclick="callNumber(0000);return false;"  href="#">Hubungi CP</a></span></p>


                                    <span id="shareMobId" class="label label-black-100" style="margin-top:10px;"><i class="fa fa-map-marker fa-fw"></i><a onclick="shareKajian('<?php echo urlencode($shareTitle);?>','<?php echo urlencode($shareBody);?>');return false;"  href="#">Share</a></span>
                                    <br/>
                                    <br/>

                                    <div id="shareWebId" class="ssk-group" data-url="https://sahabatmuslim.zaitunlabs.com/kajiandetail/<?php echo $content->id;?>" data-text="<?php echo $content->title.' oleh '.$content->ustadz->name.' pada '.$dateString;?>" >
                                        <a href="" class="ssk ssk-facebook"></a>
                                        <a href="" class="ssk ssk-twitter"></a>
                                        <a href="" class="ssk ssk-google-plus"></a>
                                        <a href="" class="ssk ssk-tumblr"></a>
                                    </div>
                                </div> 
                            </div> 
                        </div>


                        <?php } else { ?>
                            <p class="text-overlay"><?php echo $content;?><span class="hidden-sm hidden-xs"></span></p>
                        <?php }?>
                </div>
            </div> <!-- end of row -->
        </div>
    </div>
              




     <!-- 2. Include script -->
    <script type="text/javascript">(function () {
            if (window.addtocalendar)if(typeof window.addtocalendar.start == "function")return;
            if (window.ifaddtocalendar == undefined) { window.ifaddtocalendar = 1;
                var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                s.type = 'text/javascript';s.charset = 'UTF-8';s.async = true;
                s.src = ('https:' == window.location.protocol ? 'https' : 'http')+'://addtocalendar.com/atc/1.5/atc.min.js';
                var h = d[g]('body')[0];h.appendChild(s); }})();

                addtocalendar.load();
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
    <script type="text/javascript" src="<?php echo $path_gmaps; ?>markerclusterer.js"></script>
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="<?php echo $path_gmaps; ?>gmaps.js"></script>
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
    <script type="text/javascript" src="<?php echo $path_app; ?>js/detail_kajian.js"></script>

    <!-- Toastr -->
    <script type="text/javascript" src="<?php echo $path_toastr; ?>toastr.min.js"></script>

    
    <script type="text/javascript" src="<?php echo $path_ssk; ?>js/social-share-kit.min.js"></script>

    <script type="text/javascript"> 
        SocialShareKit.init();
    </script>

</body>

</html>