<?php include_once "header.php"; ?>

    <div class="contact">

	    <div class="contact_map">
		    <div id="map"></div>
		</div>

		<div class="contact_info">
			<div class="contact_wrap">
				<div class="contact_details">
                    <div class="contact_d_inner">
						<h2>Contact us</h2>

						<div class="contact_d_content">
							<p><i class="fa fa-location-arrow" aria-hidden="true"></i>&nbsp; Chicago</p>
							<p><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp; 2839 Oakmound Drive</p>
							<p><i class="fa fa-phone" aria-hidden="true"></i>&nbsp; 773-414-1588</p>
							<p><i class="fa fa-mobile" aria-hidden="true"></i>&nbsp;&nbsp; 773-414-1588</p>
						</div>
					</div>
				</div>

				<div class="contact_form">

					<h2>Send us a message</h2>
                    
                    <?php include_once "forms/form_contact.php"; ?>

				</div>
			</div>
		</div>

    </div>

    <script>
    	
		function initMap() {

			var uluru = {lat: 41.881832, lng: -87.623177};
			var map = new google.maps.Map(document.getElementById('map'), {
			  zoom: 14,
			  gestureHandling: 'greedy',
			  styles: [
			{
			"elementType": "geometry",
			"stylers": [
			{
			"color": "#f5f5f5"
			}
			]
			},
			{
			"elementType": "labels.icon",
			"stylers": [
			{
			"visibility": "off",
			}
			]
			},
			{
			"elementType": "labels.text.fill",
			"stylers": [
			{
			"color": "#616161"
			}
			]
			},
			{
			"elementType": "labels.text.stroke",
			"stylers": [
			{
			"color": "#f5f5f5"
			}
			]
			},
			{
			"featureType": "administrative.land_parcel",
			"elementType": "labels.text.fill",
			"stylers": [
			{
			"color": "#bdbdbd"
			}
			]
			},
			{
			"featureType": "poi",
			"elementType": "geometry",
			"stylers": [
			{
			"color": "#eeeeee"
			}
			]
			},
			{
			"featureType": "poi",
			"elementType": "labels.text.fill",
			"stylers": [
			{
			"color": "#757575"
			}
			]
			},
			{
			"featureType": "poi.park",
			"elementType": "geometry",
			"stylers": [
			{
			"color": "#e5e5e5"
			}
			]
			},
			{
			"featureType": "poi.park",
			"elementType": "labels.text.fill",
			"stylers": [
			{
			"color": "#9e9e9e"
			}
			]
			},
			{
			"featureType": "road",
			"elementType": "geometry",
			"stylers": [
			{
			"color": "#ffffff"
			}
			]
			},
			{
			"featureType": "road.arterial",
			"elementType": "labels.text.fill",
			"stylers": [
			{
			"color": "#757575"
			}
			]
			},
			{
			"featureType": "road.highway",
			"elementType": "geometry",
			"stylers": [
			{
			"color": "#dadada"
			}
			]
			},
			{
			"featureType": "road.highway",
			"elementType": "labels.text.fill",
			"stylers": [
			{
			"color": "#616161"
			}
			]
			},
			{
			"featureType": "road.local",
			"elementType": "labels.text.fill",
			"stylers": [
			{
			"color": "#9e9e9e"
			}
			]
			},
			{
			"featureType": "transit.line",
			"elementType": "geometry",
			"stylers": [
			{
			"color": "#e5e5e5"
			}
			]
			},
			{
			"featureType": "transit.station",
			"elementType": "geometry",
			"stylers": [
			{
			"color": "#eeeeee"
			}
			]
			},
			{
			"featureType": "water",
			"elementType": "geometry",
			"stylers": [
			{
			"color": "#c9c9c9"
			}
			]
			},
			{
			"featureType": "water",
			"elementType": "labels.text.fill",
			"stylers": [
			{
			"color": "#9e9e9e"
			}
			]
			}
			],
			  center: uluru,
			  scaleControl: true
			});

			var marker = new google.maps.Marker({
			  position: uluru,
			  map: map
			});
		}
    </script> <!-- google map -->

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlR4PRP6hdL-XwVCF9vxB2M3zVpxfeiWo&callback=initMap"></script>

<?php include_once "footer.php"; ?>