
@extends("layouts.main")
<style>
    span{
        color: #eca457;
    }
    nav{
        transition: 0.2s;
    }

    .container-home{
      background-image: url('/img/SAM_2141.JPG');
      background-attachment: fixed;
      background-position: center;
      background-size: cover;
    }

    .welcome{
      /* background-color: rgba(0, 0, 0, 0.329); */
      padding: 20px;
    }

    body{
      background-image: url('/img/playstation-pattern.webp');
    }

    #map {
      height: 780px; 
    }
</style>

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
  integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
  crossorigin=""/>

  <!-- Make sure you put this AFTER Leaflet's CSS -->
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/gokertanrisever/leaflet-ruler@master/src/leaflet-ruler.css" integrity="sha384-P9DABSdtEY/XDbEInD3q+PlL+BjqPCXGcF8EkhtKSfSTr/dS5PBKa9+/PMkW2xsY" crossorigin="anonymous">  
    <script src="https://cdn.jsdelivr.net/gh/gokertanrisever/leaflet-ruler@master/src/leaflet-ruler.js" integrity="sha384-N2S8y7hRzXUPiepaSiUvBH1ZZ7Tc/ZfchhbPdvOE5v3aBBCIepq9l+dBJPFdo1ZJ" crossorigin="anonymous"></script>

    {{-- Plugin Path --}}
    <link rel="stylesheet" href="/css/leaflet-measure-path.css">
    <script src="/js/leaflet-measure-path.js"></script>
    {{-- <script src="https://elfalem.github.io/Leaflet.curve/src/leaflet.curve.js"></script> --}}

    {{-- polyline --}}
    {{-- <link rel="stylesheet" href="https://ppete2.github.io/Leaflet.PolylineMeasure/Leaflet.PolylineMeasure.css" />
    <script src="https://ppete2.github.io/Leaflet.PolylineMeasure/Leaflet.PolylineMeasure.js"></script> --}}

@section("container")
  <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh" id="about">
            <div class="col-sm-12">
                <h2 class="fw-bold">Persebaran Alumni</h2>
                <div id="map"></div>
          </div>
        </div>
      </div>
      <script>

        let navbar = document.getElementById("navbar");
        let navbarNav = document.getElementById("navbar-nav");

            navbar.style.backgroundColor = "#ffffff88"
            navbar.style.boxShadow = "2px 2px 2px black"
            navbar.style.transform = "translateY(0)"

            // basemap
            var map = L.map('map').setView([-3.298618801108944,114.58542404981114], 18.46);
            // map.on('contextmenu', () => {
            //     map.off();
            //   })
            // icon marker
            var ulmIcon = L.icon({
            iconUrl: "/img/Logo_ULM.png",
            iconSize:     [50, 50], // size of the icon
            // iconAnchor:   [24, 24], // point of the icon which will correspond to marker's location
            // shadowAnchor: [4, 62],  // the same for the shadow
            // popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
            });

            var marker = L.marker([-3.298618801108944,114.58542404981114],{icon:ulmIcon}).addTo(map);
            marker.bindPopup('FKIP ULM').openPopup();



            L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}',{
        maxZoom: 20,
        subdomains:['mt0','mt1','mt2','mt3']

            }).addTo(map);

            


            @foreach ($biodatas as $biodata)

            var marker = L.marker([{{$biodata["latitude"]}}, {{$biodata["longitude"]}}], {icon:ulmIcon}).on('dblclick', (e) => {
              // alert(e.latlng.lat)
              

     
  

                var polyline = L.polyline([
                  [-3.298618801108944,114.58542404981114],
                  [e.latlng.lat, e.latlng.lng]
                ],{color:'red',weight:5}).addTo(map).showMeasurements();
 

              polyline.on('click', () => {
                polyline.remove()
              })
              
              
              

              
            }).addTo(map);
            
            // var polyline = L.polyline([
            //       [-3.298618801108944,114.58542404981114],
            //       [{{$biodata["latitude"]}}, {{$biodata["longitude"]}}]
            //     ],{color:'red',weight:5}).addTo(map);
 

            //   polyline.on('click', () => {
            //     polyline.remove()
            //   })

              @endforeach
              
      </script>

@endsection