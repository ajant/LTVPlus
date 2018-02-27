function initMap() {
    var locations = [
        {"lat": 32.776664, "lng": -96.796988, "zip": 75211, "type": "A", "date": "11/20/16 0:00"},
        {"lat": 32.7493946, "lng": -96.9114570, "zip": 75211, "type": "A", "date": "1/16/16 0:00"},
        {"lat": 32.8813232, "lng": -96.8853170, "zip": 75229, "type": "C", "date": "11/29/15 0:00"},
        {"lat": 32.8878498, "lng": -96.8558507, "zip": 75229, "type": "A", "date": "11/28/15 0:00"}
    ];

    render_maps(locations);
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