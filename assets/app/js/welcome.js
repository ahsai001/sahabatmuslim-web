(function($) {

    $(document).ready(function() {

        /*
        var Welcome = function() {};

        Welcome.prototype = new Kajian();
        Welcome.prototype.constructor = Kajian;

        var objKajian = new Welcome();
        //var kajianCount;

        objKajian.setCurrentLocation(function(){initKajianList();}, function(){initKajianList();}); //init current location


        function initKajianList(){
            //added by ahmad,  session must be created after reload page, not only after klick search button
            var dataParameter = $('#form_search_kajian').serializeArray();
            var latit = $("#geo_latitude").attr("href");
            var longi = $("#geo_longitude").attr("href");
            dataParameter.push({name: 'latitude', value: latit});
            dataParameter.push({name: 'longitude', value: longi});

            debugger;
            // get count kajian latest
            $.ajax({
                type: "POST",
                url: objKajian.url_search_kajian,
                cache: false,
                data: dataParameter,
                dataType: "json",
                beforeSend: function() {
                    // show loading     
                    $("#loading").show();
                },
                success: function(response) {
                    // hide loading

                    debugger;
                    $("#loading").hide();
                    kajianCount = response.count;

                    // status true
                    if (response.status) {

                        if (kajianCount > 0) {

                            var contentKajian = response.content;

                            try {

                                // set result count kajian
                                objKajian.set_notif('<span class="text-primary">' + kajianCount + '</span> Hasil Pencarian');

                                //init arrMarker
                                objKajian.init_array_marker();

                                // set array for marker
                                objKajian.push_marker_to_array(contentKajian);

                                // show div maps & set marker in map
                                objKajian.showDivMaps();
                                objKajian.set_map_and_marker(objKajian.get_array_marker());

                                // show div list kajian & append data kajian
                                objKajian.showDivListKajian();
                                objKajian.appendDivContentKajian(contentKajian);

                            } catch (e) {

                                objKajian.set_notif('<span class="text-primary">' + e.message + '</span>');
                            }
                        } else {

                            objKajian.set_notif('<span class="text-primary">No Data Latest Kajian</span>');
                        }
                    } else {

                        // set notif
                        objKajian.set_notif('<span class="text-primary">' + response.message + '</span>');
                    }
                },
                error: function(xhr, Status, err) {

                    // hide loading & show notif
                    $("#loading").hide();
                    objKajian.set_notif('<span class="text-primary">' + Status + '</span>');
                }
            });
        }
        */

        


        /*
        // infinite scroll
        var page = 1;

        $(window).scroll(function() {

            $('#more').hide();
            $('#no-more').hide();

            if ($(window).scrollTop() + $(window).height() > $(document).height() - 200) {

                $('#more').css("top", "400");
                $('#more').show();
            }

            if ($(window).scrollTop() + $(window).height() == $(document).height()) {

                $('#more').hide();
                $('#no-more').hide();

                // check data search kajian in session
                if (objKajian.check_parameter_in_session() == 'not exist') {

                    page++;
                    var data = {
                        page_num: page
                    };

                    if ((page - 1) * 2 > kajianCount) {

                        $('#no-more').css("top", "400");
                        $('#no-more').show();

                    } else {

                        // run ajax
                        getLatestKajianPagingOffset(data);

                    }
                }
            }
        });

        // get kajian paging with offset
        function getLatestKajianPagingOffset(num_page) {

            $.ajax({
                type: "POST",
                url: objKajian.url_latest_kajian,
                data: num_page,
                cache: false,
                dataType: "json",
                beforeSend: function() {

                    // show loading     
                    $("#loading").show();
                },
                success: function(response) {

                    // hide loading     
                    $("#loading").hide();
                    var contentKajian = response.content;

                    try {

                        // set array for marker
                        objKajian.push_marker_to_array(contentKajian);

                        // set map & marker
                        objKajian.set_map_and_marker(objKajian.get_array_marker());

                        // append div content kajian
                        objKajian.appendDivContentKajian(contentKajian);

                    } catch (e) {

                        objKajian.set_notif('<span class="text-primary">' + e.message + '</span>');
                    }

                },
                error: function(xhr, Status, err) {

                    // show notif
                    objKajian.set_notif('<span class="text-primary">' + Status + '</span>');
                }
            });
        }
        */
    });
})(jQuery);