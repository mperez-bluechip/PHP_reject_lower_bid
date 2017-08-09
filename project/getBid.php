<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Ajax Bidders</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>

    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <h2>Bids</h2>

        <?php

        $q = intval($_GET['q']);

        $con = mysqli_connect('localhost','mperez','admin0112@','php-reject-lower-bid');
        if (!$con) {
          die('Could not connect: ' . mysqli_error($con));
        }

        mysqli_select_db($con,"php-reject-lower-bid");
        $sql = "SELECT MAX(`client_bid`) AS lower_bid FROM users WHERE client_bid < (SELECT MAX(`client_bid`) AS highest-bid FROM users)";
        $result = mysqli_query($con,$sql);

        echo "<ul>";
        while($row = mysqli_fetch_array($result)) {
          echo "<li>" . $row['lower_bid'] . "</li>";
        }
        echo "</ul>";

        if($row['lower_bid'] < $row['highest-bid']){
          echo "<li> The highest bid to this spot is " . $row['highest-bid'] . "</li>";
          // header(Location:'index.php');
        } else {
          echo "Congratulations, you're the highest bidder!";
        }
        mysqli_close($con);
        ?>

        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>


        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
