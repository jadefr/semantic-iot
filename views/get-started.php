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
        <form method="post" action="index.php?page=data-integration">
            <div class="coordinates-form">
                <h3 class="text-center">Coordinates</h3>
                <div class="row" id="coordinates-row">
                    <label for="longitude" class="col-sm-2 col-form-label">Longitude</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="longitude" placeholder="Longitude">
                    </div>
                </div>
                <div class="row" id="coordinates-row">
                    <label for="latitude" class="col-sm-2 col-form-label">Latitude</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="latitude" placeholder="Latitude">
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
                                <input class="form-check-input" type="checkbox" name="provider2"
                                       id="solcast"
                                       value="solcast" checked>
                                Solcast
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="provider1"
                                       id="darksky"
                                       value="darksky">
                                Dark Sky
                            </label>
                        </div>
                        <div class="form-check-inline disabled">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="provider3" id="openweather"
                                       value="openweather">
                                Open Weather
                            </label>
                        </div>
                        <div class="form-check-inline disabled">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="provider4" id="ema" value="ema">
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

