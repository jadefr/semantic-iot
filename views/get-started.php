<?php
// define variables and set to empty values
$longitude = $latitude = $provider = "";
$longitudeErr = $latitudeErr = $providerErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["longitude"])) {
        $longitudeErr = "Longitude is required";
    } else {
        $longitude = test_input($_POST["longitude"]);
    }

    if (empty($_POST["latitude"])) {
        $latitudeErr = "Latitude is required";
    } else {
        $latitude = test_input($_POST["latitude"]);
    }

    if (empty($_POST["provider"])) {
        $providerErr = "Data source is required";
    } else {
        $provider = test_input($_POST["provider"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>


<div class="row title-box">
    <div class="col">
        <h1 class="text-center">
            Get Started
        </h1>
        <h5 class="text-center text-muted">
            Select sources and integrate data
        </h5>
        <hr>
    </div>
</div>


<div class="get-started-form">
    <div class="jumbotron">
        <!--form action="/action_page.php"-->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="coordinates-form">
                <h3 class="text-center">Coordinates</h3>
                <div class="row" id="coordinates-row">
                    <label for="longitude" class="col-sm-2 col-form-label">Longitude</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="longitude" placeholder="Longitude" value="<?php echo $longitude; ?>">
                    </div>
                </div>
                <div class="row" id="coordinates-row">
                    <label for="latitude" class="col-sm-2 col-form-label">Latitude</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="Latitude" placeholder="Latitude" value="<?php echo $latitude; ?>">
                    </div>
                </div>
            </div>
            <hr>
            <div class="parent-block">
                <h3>Data Sources</h3>
                <div class="inside-block">
                    <div class="options">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="provider" id="darksky" <?php if (isset($provider) && $provider=="darksky") echo "checked";?>
                                       value="darksky"
                                       checked>
                                Dark Sky
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="provider" id="solcast"
                                       value="solcast">
                                Solcast
                            </label>
                        </div>
                        <div class="form-check-inline disabled">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="provider" id="openweather"
                                       value="openweather"
                                       disabled>
                                Open Weather
                            </label>
                        </div>
                        <div class="form-check-inline disabled">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="provider" id="ema"
                                       value="ema"
                                       disabled>
                                E.M.A.
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
echo $longitude;
echo "<br>";
echo $latitude;
echo "<br>";
echo $provider;
?>

</div>

