
$(document).ready(function(){

    var depart = $.get({
                        url: 'http://' + $(location).attr('host') + '/search/trip/places',
                        dataType: 'json',

                        success: function (datas) {
                            // console.log(datas);
                            $('#depart').autocomplete({
                                source : datas
                            });
                        }

                    });

    var destination = $.get({
                        url: 'http://' + $(location).attr('host') + '/search/trip/places',
                        dataType: 'json',

                        success: function (datas) {
                            // console.log(datas);
                            $('#destination').autocomplete({
                                source : datas
                            });
                        }

                    });

    // $('#destination').autocomplete({
    //     source : function(saisie, reponse){
    //         $.post({
    //             url: 'http://' + $(location).attr('host') + '/search/trip/places',
    //             dataType: 'json',
    //             data: "saisie=" + $('#destination').val(),
    //
    //             success: function (datas) {
    //                 console.log(datas);
    //                 return datas;
    //             }
    //
    //         });
    //     }
    // });

});

   
    
