<!doctype html>
<!--
        Author: Pedro Santana
        Date: 03/1/2015
-->
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->


    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=yourKEYhere"></script>
        <script src="listRecCenter.js"></script>
         <script src="gmaps.js"></script>   
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <script type="text/javascript">
           
       
              

          
            
        </script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="header-container">
            <header class="wrapper clearfix">
                <h1 class="title">Hamilton Region Recreation Center Geo-map</h1>
                
            </header>
        </div>

        <div class="main-container">
            <div class="main wrapper clearfix">

                <article>
                    
                    <section>
                        
                        <div id="map"  style="position: relative; background-color: rgb(229, 227, 223); overflow: hidden; width: 950px; height: 300px;"></div>
                    </section>
                    <section>
                        <h3>Click the button to show or hide Json File.</h3>
                        <button id="hide">Hide Json</button>
                        <button id="show">Show Json</button>
                        <div id = "PrintJson"> 
                            <script type="text/javascript">
                            var str = JSON.stringify(listRecCenters); 
                            document.write(str);  
                          
                            
                        </script>
                    </div>
                    </section>
                    
                   <script type="text/javascript">
                   $(document).ready(function(){
                    var map = new GMaps({
                                el: '#map',
                                lat: 43.25002080000001,
                                lng: -79.86609140000002,
                                zoom: 10,
                              });
                        var count = 0;
                        var obj = [];
                        for(var i = 1; i < listRecCenters.length; i+=2) {
                            //obj = listRecCenters[i];

                            var Content = '<div><p> Name: '+ listRecCenters[count].name + '</p><p> Address: '
                            +listRecCenters[i].address +'</p><p> City: ' + listRecCenters[i].city +'</p><p> Phone: '
                            +listRecCenters[i].phone+ '<p>Longitude: ' +listRecCenters[i].latitude+ '</p>' +
                            '<p>Latitude: '+ listRecCenters[i].longitude+'</p></div>';

                            map.addMarker({
                            lat: listRecCenters[i].latitude,
                            lng: listRecCenters[i].longitude,
                            title: listRecCenters[count].name ,
                            infoWindow: {
                              content: Content
                            } 
                          });
                        count +=2;
                        }
                        $("#PrintJson").hide();
                        $("#hide").click(function(){
                        $("#PrintJson").hide();
                        });
                        $("#show").click(function(){
                        $("#PrintJson").show();
                        });
                        
                    
                    });
              
                    
                   </script>
                </article>

                

            </div> <!-- #main -->
        </div> <!-- #main-container -->

        <div class="footer-container">
            <footer class="wrapper">
                <h3>Hamilton Region Recreation Center Geo-map</h3>
            </footer>
        </div>

     
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
