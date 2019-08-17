!function ($) {

  $(function(){
		gmap_markers = new GMaps({
			el: '#gmap_marker',
			lat: -7.260483,
			lng: 112.7466374,
			zoom: 17
		});
		gmap_markers.addMarker({
			lat: -7.260483,
			lng: 112.7466374,
			title: 'Marker',
			infoWindow: {
				content: 'Balai Kota<br>Jalan Walikota Mustajab Surabaya'
			}
		});

		map = new GMaps({
			div: '#gmap_geocoding',
			lat: -12.043333,
			lng: -77.028333,
			zoom:3
		});
		$('#geocoding_form').submit(function(e){
			e.preventDefault();
			GMaps.geocode({
			  address: $('#address').val().trim(),
			  callback: function(results, status){
			    if(status=='OK'){
			      var latlng = results[0].geometry.location;
			      map.setCenter(latlng.lat(), latlng.lng());
			      map.addMarker({
			        lat: latlng.lat(),
			        lng: latlng.lng()
			      });
			    }
			  }
			});
		});

  });
}(window.jQuery);