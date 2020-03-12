function initMap() {
                    var uluru = {lat: 12.927089, lng: -16.739647};
                    var map = new google.maps.Map(document.getElementById('Map'), {
                      zoom: 15,
                      center: uluru
                    });
                    var marker = new google.maps.Marker({
                      position: uluru,
                      map: map
                    });
                }