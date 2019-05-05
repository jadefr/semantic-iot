<?php
// define variables and set to empty values
$longitude = $latitude = $provider1 = $provider2 = $provider3 = $provider4 = $provider = "";
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

    /*if (isset($_POST["provider1"])) {
        $provider1 = test_input($_POST["provider1"]);
    }

    if (isset($_POST["provider2"])) {
        $provider2 = test_input($_POST["provider2"]);
    }

    if (isset($_POST["provider3"])) {
        $provider3 = test_input($_POST["provider3"]);
    }

    if (isset($_POST["provider4"])) {
        $provider4 = test_input($_POST["provider4"]);
    }*/

    $provider = isset($_POST['provider1']) ? $_POST['provider1']."," : "";
    $provider .= isset($_POST['provider2']) ? $_POST['provider2']."," : "";
    $provider .= isset($_POST['provider3']) ? $_POST['provider3']."," : "";
    $provider .= isset($_POST['provider4']) ? $_POST['provider4']."," : "";
    $provider = rtrim($provider, ','); // remover possível última virgula
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>


<input id="latitude" name="latitude" type="hidden" value="<?php echo $latitude; ?>">
<input id="longitude" name="longitude" type="hidden" value="<?php echo $longitude; ?>">
<input id="providers" name="providers" type="hidden" value="<?php echo $provider; ?>">

<div class="row">
    <div class="col-md-12">
        <div class="table">
            <table id="tbl-sensordata" class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Measurement</th>
                    <th>Value</th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>


<p class="text-right">
    <a href="#" class="btn">Download</a>
</p>

<!-- Modal -->
<div class="modal fade" id="modal-row" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modal Header</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="table-responsible">
                <table id="additional-info-table" class="table table-hover">
                    <tbody></tbody>
                </table>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
