function initMap() {
    $.get('http://ltvplus.local/locations', function (data) {
        render_maps(data.data);
    }).fail(function () {
        $('#maps-error').html(message);
    });
}

function render_maps(locations) {
    for (var i = 0; i < locations.length; i++) {
        var divId = "map-" + i;

        var row = "<div class='map-div' id='" + divId + "'></div>";
        var meta = "<div class='text-info'>Zip: " + locations[i].zip + "<br/>Type: " + locations[i].type + "<br/>Date: " + locations[i].date + "</div>";
        $("#maps").append("<div class='map-slide'>" + row + meta + "</div>");

        var map = new google.maps.Map($('#' + divId)[0], {
            center: {lat: locations[i].lat, lng: locations[i].lng},
            zoom: 20
        });
    }

    start_slide_show();
}

function start_slide_show() {
    $(function () {
        $('#maps > div').first().show(); // show first slide
        setInterval(function () {
            $('#maps > div:first')
                .fadeOut(1000)
                .next()
                .fadeIn(1000)
                .end()
                .appendTo('#maps')
        }, 3000); // slide duration
    });
}