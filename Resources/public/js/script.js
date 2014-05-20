$(window).load(function() {
    $('.carousel').carousel();
    var map;
    var initialize;
    initialize = function() {
        var latLng = new google.maps.LatLng(49.2525846, 4.0244633); // Correspond au coordonnées de Lille
        var myOptions = {
            zoom: 14, // Zoom par défaut
            center: latLng, // Coordonnées de départ de la carte de type latLng
            mapTypeId: google.maps.MapTypeId.TERRAIN, // Type de carte, différentes valeurs possible HYBRID, ROADMAP, SATELLITE, TERRAIN
            maxZoom: 20
        };

        map = new google.maps.Map(document.getElementById('map'), myOptions);

        var marker = new google.maps.Marker({
            position: latLng,
            map: map,
            title: "Franklin domotique"
                    //icon     : "marker_lille.gif" // Chemin de l'image du marqueur pour surcharger celui par défaut
        });
        map.disableDragging();
    };
    initialize();
    

    
});