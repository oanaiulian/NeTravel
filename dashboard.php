<?php
    require_once('res/db/database.php');

    if(isset($_POST['submit'])){
        // take input and put it into variables
        //create this variables by collecting the field's values
        // mysqli_real_escape_string -> php function to avoid malicious code
        $locationName = mysqli_real_escape_string($mysqli, $_POST['locationName']);
        $locationDescription = mysqli_real_escape_string($mysqli, $_POST['locationDescription']);
        $locationImage1 = mysqli_real_escape_string($mysqli, $_POST['locationImage1']);
        $locationImage2 = mysqli_real_escape_string($mysqli, $_POST['locationImage2']);
        $locationImage3 = mysqli_real_escape_string($mysqli, $_POST['locationImage3']);
        $locationMapLat = mysqli_real_escape_string($mysqli, $_POST['locationMapLat']);
        $locationMapLong = mysqli_real_escape_string($mysqli, $_POST['locationMapLong']);
        $wikiLink = mysqli_real_escape_string($mysqli, $_POST['wikiLink']);
        $type = $_POST['type'];
        $season_array = $_POST['checkbox1'];
        $theme_array = $_POST['checkbox'];
        //if everything is completed
        if(!empty($locationName) &&
          !empty($locationDescription) &&
          !empty($locationMapLat) &&
          !empty($locationMapLong) &&
          !empty($type) &&
          !empty($season_array) &&
          !empty($theme_array)
          ){
            
            // first insertion into the location table
            $sql1 = "INSERT IGNORE INTO location (locationName, locationDescription, locationImage1,locationImage2,locationImage3, locationMapLat,locationMapLong, wikiLink, typeID)
            VALUES ('$locationName','$locationDescription', '$locationImage1','$locationImage2','$locationImage3', '$locationMapLat','$locationMapLong','$wikiLink', '$type')";
            $result = $mysqli->query($sql1) or die($mysqli->error);
            // check is the query has worked
            if($result === TRUE){
                //create a variable to hold the newly created entry ID
                $last_id = $mysqli->insert_id;
            }
            //for every element into the season array
            $count = count($season_array);
            for($i=0; $i< $count; $i++){
                //create a separate sql query to insert a new season into the season ID
                //as long as into the location id (link them both)
                $sql[$i] = "INSERT IGNORE INTO locationseason (seasonID, locationID)
                    VALUES ('$season_array[$i]', '$last_id')";
                $mysqli->query($sql[$i]) or die($mysqli->error);
            }
            
            //the same action
            $count = count($theme_array);
            for($i=0; $i< $count; $i++){
                $sql[$i] = "INSERT IGNORE INTO locationtheme (themeID, locationID)
                    VALUES ('$theme_array[$i]', '$last_id')";
                $mysqli->query($sql[$i]) or die($mysqli->error);
            }
            
            
            //redirect
            header("Location: dashboard.php");
            
            


        
        }
    }

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
        <title>Dashboard | NeTravel</title>
    </head>
    
    <body>
        <div class="bg-dashboard">
            <header>

                <nav class="navigation">
                    <h1><a class="logo" href="#">NeTravel</a></h1>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="index.php#find">Find</a></li>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="output.php">Output</a></li>
                    </ul>
                </nav>
            </header>

            <section class="main-ctn-dashboard">
                <article>
                    <h1>Dashboard</h1>
                </article>
            </section>
           
            <article class="dashboard-section">
                <div id="dashboard">
                    <h1 class="title">Insert a Destination</h1>
                    <form action="dashboard.php" method="POST">
                        <input name="locationName" type="text" placeholder="Destination Name" id="locationName" /> <br />
                        <textarea name="locationDescription" placeholder="Description" id="locationDescription" /></textarea><br />
                        <input name="locationImage1" type="text" placeholder="Image URL 1" id="locationImage1" /><br />
                        <input name="locationImage2" type="text" placeholder="Image URL 2" id="locationImage2" /><br />
                        <input name="locationImage3" type="text" placeholder="Image URL 3" id="locationImage3" /><br />
                        <input name="locationMapLat" step="0.000001" min="0" max="900" type="number" placeholder="Map Latitude" id="locationMapLat" /><br />
                        <input name="locationMapLong" step="0.000001" min="0" max="900" type="number" placeholder="Map Longitude" id="locationMapLat" /><br />
                        <input type="text" name="wikiLink" placeholder="Wikipedia Link" id="wikiLink">
                        <br />

                        <label for="type"><h3>Type of Destination</h3></label><br />
                        <select name="type" id="type">
                            <option selected disabled>Type</option>
                            <option value="1">Urban</option>
                            <option value="2">Rural</option>
                            <option value="3">Costal</option>
                            <option value="4">Mountain</option>
                        </select>
                         <br />
                        
                        <label for="season"><h3>Season of Destination</h3></label> <br />
                        <label><input type="checkbox" name="checkbox1[]" value="1" />Summer</label>
                        <label><input type="checkbox" name="checkbox1[]" value="2" />Winter</label><br />

                        <label for="theme"><h3>Select themes</h3></label><br />
                        <label><input type="checkbox" name="checkbox[]" value="1" />Couple</label>
                        <label><input type="checkbox" name="checkbox[]" value="2" />Single</label>
                        <label><input type="checkbox" name="checkbox[]" value="3" />Family</label>
                        <label><input type="checkbox" name="checkbox[]" value="4" />Culture</label>
                        <label><input type="checkbox" name="checkbox[]" value="5" />Art</label>
                        <label><input type="checkbox" name="checkbox[]" value="6" />History</label>
                        <label><input type="checkbox" name="checkbox[]" value="7" />Beauty</label>
                        <label><input type="checkbox" name="checkbox[]" value="8" />Adventure</label>
                        <label><input type="checkbox" name="checkbox[]" value="9" />Night</label>
                        <label><input type="checkbox" name="checkbox[]" value="10" />Sport</label>
            

                        <br /><br />
                        <div class="btns">
                        <input type="submit" name="submit" value="submit" />
                        <input type="Reset" value="reset" />
                        </div>
                    </form>
                </div>
            </article>

            <footer>
                <nav class="footer_nav">
                    <ul>
                       
                        <li><a href="index.php">Home</a></li>|
                        <li><a href="index.php#find">Find</a></li>|
                        <li><a href="login.php">Login</a></li>|
                        <li><a href="output.php">Output</a></li>
                    </ul>
                    <p class="credits">Copyright &#169; NeTravel Inc. All rights reserved.</p>
                </nav>
                
            </footer>
        </div>
    </body>
</html>


































