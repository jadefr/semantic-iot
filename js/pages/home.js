$(document).ready(function () {
    $("#learn-more-button").click(function () {
        window.location = "index.php?page=documentation#semantic-iot";
    });

    $("#get-started-button").click(function () {
        window.location.replace("index.php?page=get-started");
    });

});