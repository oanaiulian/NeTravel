<?php
    require_once('res/db/database.php');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Travel Expert System">
        <meta name="keywords" content="Travel, System, Tourism, Romania, Destinations">
        <meta name="author" content="Iulian Oana">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="res/js/scroll.js"></script>
        <script src="res/js/index.js"></script>
        <link rel="stylesheet" href="res/css/style.css" type="text/css">
        <title>Home | NeTravel</title>
    </head>
    
    <body>
        <div class="bg">
            <header>

                <nav class="navigation">
                    <h1><a class="logo" href="#">NeTravel</a></h1>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#find">Find</a></li>
                        <li><a href="login.php">Login</a></li>
                    </ul>
                </nav>
            </header>

            <section class="main-ctn">
                <article>
                    <h1>NeTravel</h1>
                    <div class="btns">
                        <a href="#find">Find</a>
                        <a href="login.php">Login</a>
                    </div>
                </article>
            </section>
           
            <article class="find-section">
                <div id="find">
                    <h1 class="title">Find Your Destination</h1>
                    <form action="index.php" method="POST">
                        <h3>1) What type of destination would you prefere?</h3>
                        <label><input type="radio" name="type" value="1" />Urban</label>
                        <label><input type="radio" name="type" value="2" />Rural</label>
                        <label><input type="radio" name="type" value="3" />Costal</label>
                        <label><input type="radio" name="type" value="4" />Mountain</label><br/>

                        <h3>2) When do you plan on traveling?</h3>
                        <label><input type="checkbox" name="season[]" value="1" />Summer</label>
                        <label><input type="checkbox" name="season[]" value="2" />Winter</label><br/>

                        <h3>3) Who are you traveling with?</h3>
                        <label><input type="radio" name="theme[]" value="1" />Friends / Partener</label>
                        <label><input type="radio" name="theme[]" value="2" />Traveling Alone</label>
                        <label><input type="radio" name="theme[]" value="3" />Whole Family</label><br/>

                        <h3>4) What is your prefered theme of destination?</h3>
                        <label><input type="checkbox" name="theme[]" value="4" />Culture</label>
                        <label><input type="checkbox" name="theme[]" value="5" />Art</label>
                        <label><input type="checkbox" name="theme[]" value="6" />History</label>
                        <label><input type="checkbox" name="theme[]" value="0" />Not Decided</label><br/>

                        <h3>5) What activities would you mostly be keen on?</h3>
                        <label><input type="checkbox" name="theme[]" value="7" />Beauty Spots</label>
                        <label><input type="checkbox" name="theme[]" value="8" />Adventures</label>
                        <label><input type="checkbox" name="theme[]" value="9" />Night Life</label>
                        <label><input type="checkbox" name="theme[]" value="10" />Sports</label><br/>

                        <br /><br />
                        <div class="btns">
                        <input type="submit" name="submit" value="submit" />
                        <input type="Reset" value="reset" />
                        </div>
                    </form>
                </div>
            </article>
            
        
        <?php
            if(isset($_POST['submit'])){
            // take input and put it into variables
            //create this variables by collecting the field's values
        
                if(!empty($_POST['type']&&
                         $_POST['season']&&
                         $_POST['theme'])
                  ){
                    $type = $_POST['type'];
                    $theme = $_POST['theme'];
                    $season = $_POST['season'];
                    //turning theme array into workable values
                    foreach($theme as $theme_key=>$theme_value){
                        //define an output string to be used in the query
                        //w3schools inspiration
                        $theme_output = $theme_value . ",0";
                        //the same action
                        foreach($season as $season_key=>$season_value){
                            $season_output = $season_value . ",0";
                            //build the subquery
                            //it firstly run through type then season then theme
                            //this is the order
                            $sql =  "SELECT *
                                    FROM location
                                    WHERE locationID IN
                                    (
                                        SELECT locationID
                                        FROM locationtheme
                                        WHERE themeID IN
                                        (
                                            SELECT themeID
                                            FROM theme
                                            WHERE themeID IN($theme_output)
                                            AND locationID IN
                                            (
                                                SELECT locationID
                                                FROM locationseason
                                                WHERE seasonID IN
                                                (
                                                    SELECT seasonID
                                                    FROM season
                                                    WHERE seasonID IN($season_output)
                                                    AND typeID IN
                                                    (
                                                        SELECT typeID
                                                        FROM type
                                                        WHERE typeID = $type 
                                                    )
                                                )
                                            )
                                        )
                                    )
                                    GROUP BY locationName
                                    ";
                                }
                            }
                                    //build the result data member to run the query
                                    $result = $mysqli->query($sql);
                                    //check if there are any records after the request
                                    if($result->num_rows == 0){
                                        //alert a message
                                        echo '<p>Sorry, no matches found</p>';
                                    }else{//if there are any records into the db
                                        while($row = $result->fetch_assoc()){//fetch assoc the result into row[]
                                            //output this nice layed out section containing the destination values
                                            echo '
                                                <section class="output">
                                                    <div class="wraper">



                                                        <article class="content">

                                                            <h1 class="title">'.$row["locationName"].'</h1>

                                                            <p class="description">'.$row["locationDescription"].'</p>

                                                            <p class="link"><a href="'.$row["wikiLink"].'" target="_blank">Learn More</a></p>

                                                        </article>


                                                        <article class="assets">
                                                        <!-- row[locationimage] imports the link into the src section of an img tag 
                                                            row[locationID] ads an integer to the class of each image so they can be
                                                            referenced later into the script. E.g. first location has 3 images
                                                            with 3 unique classes (myslides + id of that particular location: myslides"3")
                                                            so that each destination has its own set of unique classes-->
                                                            <div class="carousel we-content w3-section" style="max-width:500px">
                                                                <img class="slider-img mySlides'.$row["locationID"].'" 
                                                                src="'.$row["locationImage1"].'" style="width:100%">

                                                                <img class="slider-img mySlides'.$row["locationID"].'" src="'.$row["locationImage2"].'" style="width:100%">

                                                                <img class="slider-img mySlides'.$row["locationID"].'" src="'.$row["locationImage3"].'" style="width:100%">
                                                            </div>

                                                            <div id="map'.$row["locationID"].'" class="map">
                                                            </div>

                                                        </article>

                                                    </div>

                                                    <script>
                                                        //the same method with the id is used here
                                                        var myIndex = 0;
                                                        carousel'.$row["locationID"].'();
                                                        function carousel'.$row["locationID"].'() 
                                                        {
                                                            var i;
                                                            var x = document.getElementsByClassName("mySlides'.$row["locationID"].'");
                                                            for (i = 0; i < x.length; i++) {
                                                               x[i].style.display = "none";  
                                                            }
                                                            myIndex++;
                                                            if (myIndex > x.length) {myIndex = 1}    
                                                            x[myIndex-1].style.display = "block";  
                                                            setTimeout(carousel'.$row["locationID"].', 2000); // Change image every 2 seconds
                                                        }
                                                    </script>

                                                </section>
                                            ';
                                        }
                                    }

                                }
                            }

        ?>

            <footer>
                <nav class="footer_nav">
                    <ul>
                       
                        <li><a href="#">Home</a></li>|
                        <li><a href="#find">Find</a></li>|
                        <li><a href="login.php">Login</a></li>
                    </ul>
                    <p class="credits">Copyright &#169; NeTravel Inc. All rights reserved.</p>
                </nav>
                
            </footer>
        </div>
    </body>
</html>


































