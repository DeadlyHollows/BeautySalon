var map;

function initMap() {
	// Constructor function to cretae a new map... Only center and zoom are the required attributes...
	
	var salon = {lat: 46.606231, lng: -120.447496};

	map = new google.maps.Map(document.getElementById('map'), {
			center: salon,
			zoom: 13
		});

	// To get a marker at the destination location ...
	var marker = new google.maps.Marker({
          position: salon,
          map: map
        });

}

var list = document.getElementsByClassName('more-vert')[0];

function open() {
	// $('.navigator').removeClass('hide');
	$('.navigator').show("slow").fadeIn("slow");
}

function close() {
	$('.navigator').hide(200);
}

$(document).click(function() {
	close();
});
$(".more-vert").click(function(e) {
    open();
    e.stopPropagation(); // This is the preferred method.
    return false;        // This should not be used unless you do not want
                         // any click events registering inside the div
});