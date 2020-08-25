var Kajian = function() {
        var check_session_agent;
        var get_next_kajian_agent;
        var map = null;
        var arrMarker = [];
        var islamic_green = $('#gambar_masjid_hijau').attr('href');
        this.url_latest_kajian = $('#link_get_kajian_latest').attr('href');
        this.url_search_kajian = $('#link_search_kajian').attr('href');

        this.push_marker_to_array = function(contentKajian) {
            var newArrMarker = [];
            // set array for marker
            $.each(contentKajian, function(i, dataMap) {
                arrMarker.push({
                    latitude: dataMap.lokasi.latitude,
                    longitude: dataMap.lokasi.longitude,
                    place: dataMap.lokasi.place,
                    address: dataMap.lokasi.address,
                });
                newArrMarker.push({
                    latitude: dataMap.lokasi.latitude,
                    longitude: dataMap.lokasi.longitude,
                    place: dataMap.lokasi.place,
                    address: dataMap.lokasi.address,
                });
            });

            return newArrMarker;
        };


        // get array marker
        this.get_array_marker = function() {
            return arrMarker;
        };



        // init array marker
        this.init_array_marker = function() {
            arrMarker = [];
        };

        this.setCurrentLocation = function(successCallback, errorCallback) {
            if(!!navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                function(position){
                    $('#geo_latitude').attr('href', position.coords.latitude);
                    $('#geo_longitude').attr('href', position.coords.longitude);

                    successCallback();
                },function(error){
                    bootbox.dialog({
                        title: "Info",
                        message: 'Geolocation failed: ' + error.message
                    });
                    errorCallback();
                },{
                    enableHighAccuracy: true,
                    timeout: 5000,
                    maximumAge: 0
                });
            } else {
                bootbox.dialog({
                    title: "Info",
                    message: 'Your browser does not support geolocation'
                });
                errorCallback();
            }

            // set geolocation
            /*
            GMaps.geolocate({
                success: function(position) {
                    // set latitude & longitude
                    $('#geo_latitude').attr('href', position.coords.latitude);
                    $('#geo_longitude').attr('href', position.coords.longitude);

                    successCallback();
                },
                error: function(error) {
                    bootbox.dialog({
                        title: "Info",
                        message: 'Geolocation failed: ' + error.message
                    });
                    errorCallback();
                },
                not_supported: function() {
                    bootbox.dialog({
                        title: "Info",
                        message: 'Your browser does not support geolocation'
                    });
                    errorCallback();
                }, always: function(){
                }
            });*/
            
        };

        // set map & marker
        this.clear_map_and_marker = function() {
            // set map view

            if(map != null){
            map.removeMarkers();
            }
        }

        
        // set map & marker
        this.set_map_and_marker = function(arr) {
            // set map view

            if(map != null){
            map.removeMarkers();
            }else{
                map = new GMaps({
                    div: '#map',
                    lat: arr[0].latitude,
                    lng: arr[0].longitude,
                    zoom: 10
                });
            }

            map.setCenter($('#geo_latitude').attr('href'), $('#geo_longitude').attr('href'));
            map.addMarker({
                lat: $('#geo_latitude').attr('href'),
                lng: $('#geo_longitude').attr('href'),
                title: 'Me',
                icon: {
                    url: $('#path_realestate').attr('href') + 'images/markers/user-01.png'
                },
                infoWindow: {
                    content: '<div class="padding-none full">' + '<h4 id="latlong" class="text-primary margin-bottom-none">' + 'Your Position ' + '</h4> </div>' + '</div>'
                }
            });

            // set geolocation
            /*
            GMaps.geolocate({
                success: function(position) {
                    
                    // set latitude & longitude
                    $('#geo_latitude').attr('href', position.coords.latitude);
                    $('#geo_longitude').attr('href', position.coords.longitude);

                    
                    map.setCenter(position.coords.latitude, position.coords.longitude);
                    map.addMarker({
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                        title: 'Me',
                        icon: {
                            url: $('#path_realestate').attr('href') + 'images/markers/user-01.png'
                        },
                        infoWindow: {
                            content: '<div class="padding-none full">' + '<h4 id="latlong" class="text-primary margin-bottom-none">' + 'Your Position ' + '</h4> </div>' + '</div>'
                        }
                    });
                    
                },
                error: function(error) {
                    bootbox.dialog({
                        title: "Info",
                        message: 'Geolocation failed: ' + error.message
                    });
                },
                not_supported: function() {
                    bootbox.dialog({
                        title: "Info",
                        message: 'Your browser does not support geolocation'
                    });
                }
                
            });*/
            
            // set marker
            $.each(arr, function(i, value) {

                map.addMarker({
                    lat: value.latitude,
                    lng: value.longitude,
                    icon : {
                        url : $('#path_realestate').attr('href') +'images/markers/mosque.png'
                    },
                    infoWindow: {
                    content: '<div class="padding-none">' + '<div class="text-center"> <h4 class="text-primary margin-bottom-none">' + value.place + '</h4>' 
                            + '<p class="h5 text-muted margin-v-5-15">' + value.address + '</p>' + '</div>' + '</div>'
                    }
                });
            });
        };


        // set map & marker
        this.append_map_and_marker = function(arr) {
            // set map view

            if(map == null){
                map = new GMaps({
                    div: '#map',
                    lat: arr[0].latitude,
                    lng: arr[0].longitude,
                    zoom: 10
                });
            }

            // set new marker
            $.each(arr, function(i, value) {

                map.addMarker({
                    lat: value.latitude,
                    lng: value.longitude,
                    icon : {
                        url : $('#path_realestate').attr('href') +'images/markers/mosque.png'
                    },
                    infoWindow: {
                    content: '<div class="padding-none">' + '<div class="text-center"> <h4 class="text-primary margin-bottom-none">' + value.place + '</h4>' 
                            + '<p class="h5 text-muted margin-v-5-15">' + value.address + '</p>' + '</div>' + '</div>'
                    }
                });
            });
        };


        // show div maps
        this.showDivMaps = function() {
            $("#div_parent_map").show();
        };
        // hide div maps
        this.hideDivMaps = function() {
            $("#div_parent_map").hide();
        };
        // show div list kajian
        this.showDivListKajian = function() {
            $("#kajian_content").show();
        };
        // hide div list kajian
        this.hideDivListKajian = function() {
            $("#kajian_content").hide();
        };
        // empty div list kajian
        this.emptyDivListKajian = function() {
            $("#kajian_content").empty();
        };
        // set notif
        this.set_notif = function(notif) {
            $("#notif").html(notif);
        };
        // append data kajian to list result
        this.appendDivContentKajian = function(obj) {
            $.each(obj, function(i, val) {

                var date = new Date(val.tanggal);
                var dateString = date.toLocaleString("id-id", { day: "2-digit", month: "long", year: "numeric"});

                var shareTitle = "Jadwal Kajian - "+val.title+" oleh "+val.ustadz.name;
                var shareBody = "Jadwal Kajian - "+val.title+" oleh "+val.ustadz.name+" di "
                                +val.lokasi.place+" pada "+dateString+"\n\n"
                                +"Untuk info lebih jelas, kunjungi link berikut :\n\nhttps://sahabatmuslim.zaitunlabs.com/kajiandetail/"+val.id
                                +"\n\nUntuk download aplikasi jadwal kajian versi android, kunjungi link berikut :\n\nhttps://zaitunlabs.com/yourls/sahabatmuslim";

                $('#kajian_content').append('<div class="panel-body" style="margin:15px 3px;background-color:grey;">' + '<div class="media media-clearfix-xs media-clearfix-sm">' + '<div class="media-left">' 
                    + '<p>' + '<a href="#">' + '<img src="' + islamic_green + '" alt="property" width="150" class="media-object"/>' + '</a>' 
                    + '</p>' + '</div>' + '<div class="media-body">' + '<h4 class="media-heading margin-v-0-10">' + '<a>' + val.title + '</a>' + '</h4>' + '<p>'
                    + '<span class="label label-black-100" style="margin-top:10px;"><i class="fa fa-user fa-fw"></i>' + val.ustadz.name + '</span> ' 
                    + '<span class="label label-black-100" style="margin-top:10px;"><i class="fa fa-calendar fa-fw"></i>' + dateString + '</span> ' 
                    + '<span class="label label-black-100" style="margin-top:10px;"><i class="fa fa-clock-o fa-fw"></i>' + val.starttime + ' - ' + val.endtime + '</span> </p>' 
                    + '<p class="margin-none"><b>' + val.lokasi.place + ' - ' + val.lokasi.address + '</b><br/>'
                    + '<br/>'
                    + '<p class="margin-none"><b>' + 'Info : ' + ((val.info !== null && val.info !== "")?val.info : '---') + '</b><br/>'
                    + '<br/>'

                
                    + '<span class="label label-black-100" style="margin-top:10px;"><i class="fa fa-map-marker fa-fw"></i>' +'<a onclick="openMaps("'+val.lokasi.place_in_maps +'",'+val.lokasi.latitude +',' + val.lokasi.longitude +');return false;" href="#">Peta Lokasi</a>' + '</span> '


                    + '<span class="label label-black-100" style="margin-top:10px;"><i class="fa fa-map-marker fa-fw"></i>' 


                    + (typeof sahabatmuslim != 'undefined' ? '<a onclick="remindMe(\''+fixedEncodeURIComponent(val.title)+' oleh '+fixedEncodeURIComponent(val.ustadz.name)+'\',\''+val.tanggal+'\',\''+dateString+'\',\''+val.starttime+'\',\''+val.endtime+'\',\''+fixedEncodeURIComponent(val.lokasi.place)+'\');return false;"  href="#">Pengingat</a>' 
                    
                    : ' <span class="addtocalendar">'
                                + '<a class="atcb-link">Pengingat</a>'
                                + '<var class="atc_event">'
                                    + '<var class="atc_date_start">'+val.tanggal+' '+val.starttime+'</var>'
                                    + '<var class="atc_date_end">'+val.tanggal+' '+val.endtime+'</var>'
                                    + '<var class="atc_timezone">Asia/Jakarta</var>'
                                    + '<var class="atc_title">'+val.title+' oleh '+val.ustadz.name+'</var>'
                                    + '<var class="atc_description">'+val.title+' oleh '+val.ustadz.name+' di '+val.lokasi.place+'</var>'
                                    + '<var class="atc_location">'+ val.lokasi.address +'</var>'
                                + '</var>'
                        + '</span>' )
                    
                    + '</span> '

                    
                    //+ (typeof sahabatmuslim != 'undefined' ? '<span class="label label-black-100" style="margin-top:10px;"><i class="fa fa-map-marker fa-fw"></i>' +'<a onclick="callNumber(0000);return false;"  href="#">Hubungi CP</a>' + '</span> ' : '')
                    
                    + (typeof sahabatmuslim != 'undefined' ? '<span class="label label-black-100" style="margin-top:10px;"><i class="fa fa-map-marker fa-fw"></i>' +'<a onclick="shareKajian(\''+fixedEncodeURIComponent(shareTitle)+'\',\''+fixedEncodeURIComponent(shareBody)+'\');return false;"  href="#">Share</a>' + '</span> ' 
                    : '<br/><br/><div class="ssk-group" data-url="https://sahabatmuslim.zaitunlabs.com/kajiandetail/'+val.id+'" data-text="'+val.title+' oleh '+val.ustadz.name+' pada '+dateString+'" >'
                        +'<a href="" class="ssk ssk-facebook"></a>'
                        +'<a href="" class="ssk ssk-twitter"></a>'
                        +'<a href="" class="ssk ssk-google-plus"></a>'
                        +'<a href="" class="ssk ssk-tumblr"></a>'
                    +'</div>' )

                    + '</p>' + '</div>' + '</div>' + '</div>');


            });

            //$('#kajian_content').append('<a id="load-more-button" href="#" class="btn btn-primary btn-lg text-center load-more-button" role="button" title="klik untuk data selanjutnya" data-toggle="tooltip" data-placement="center"><span class="glyphicon glyphicon-chevron-down"></span></a>')   
            $('#kajian_content').append('<a id="load-more-button" href="#" class="text-center load-more-button" title="klik untuk data selanjutnya" data-toggle="tooltip" data-placement="center">klik untuk menampilkan jadwal selanjutnya</a>')
            
            addtocalendar.load();
            SocialShareKit.init();
        };


        // check data search in session
        this.check_parameter_in_session = function() {
            var statusSession;
            $.ajax({
                type: "GET",
                url: $('#link_check_data_search_kajian_in_session').attr('href'),
                async: false,
                dataType: "json",
                success: function(response) {
                    statusSession = response.status;
                }
            });
            return statusSession;
        }


        this.abortAllConnection = function(){
            if(this.check_session_agent !== undefined && this.check_session_agent !== null){
                this.check_session_agent.abort();
            }

            if(this.get_next_kajian_agent !== undefined && this.get_next_kajian_agent !== null){
                this.get_next_kajian_agent.abort();
            }
        }


        this.check_parameter_in_session_async = function(successCallback, errorCallback) {
            this.check_session_agent = $.ajax({
                type: "GET",
                url: $('#link_check_data_search_kajian_in_session').attr('href'),
                async: true,
                dataType: "json",
                success: function(response) {
                    successCallback(response.status);
                },
                error: function(xhr, Status, err) {
                    errorCallback();
                }
            });
        }
    }





    function fixedEncodeURIComponent (str) {
    return encodeURIComponent(str).replace(/[!'()*]/g, function(c) {
        return '%' + c.charCodeAt(0).toString(16);
    });
    }


    function openMaps(place_in_maps,lat, long){
        if(typeof sahabatmuslim != 'undefined'){
            sahabatmuslim.openMaps(lat+","+long);
        }else{
            //window.open("http://maps.google.com/maps?q="+lat+","+long);
            window.open("https://www.google.com/maps?daddr="+place_in_maps+","+lat+","+long);
        }
    }

    function remindMe(titleAndUstadz,dateX,dateXString,starttimeX,endtimeX,locationX){
        if(typeof sahabatmuslim != 'undefined'){
            sahabatmuslim.remindMe(titleAndUstadz,dateX,dateXString,starttimeX,endtimeX,locationX);
        }else{
            alert(titleAndUstadz+"\n"+dateX+" "+starttimeX+" - "+endtimeX+" di "+locationX);
        }
    }

    function callNumber(number){
        if(typeof sahabatmuslim != 'undefined'){
            //sahabatmuslim.callNumber(number);
            sahabatmuslim.showInfo("Maaf","fitur ini sedang dalam pengembangan");
        }else{
            alert("fitur ini hanya untuk android");
        }
    }

    function shareKajian(title, body){
        if(typeof sahabatmuslim != 'undefined'){
            if(sahabatmuslim.shareKajian != 'undefined'){
                sahabatmuslim.shareKajian(title,body);
            }
        }else{
            alert("fitur ini hanya untuk android");
        }
    }



