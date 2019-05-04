let Form = function () {

    this.target = '.get-started-form';

    this.render = function () {
        var longitude =  $('#longitude').val();
        console.log(longitude);
        var latitude =  $('#latitude').val();

    $("button").click(function () {
        window.location = "index.php?page=documentation#semantic-iot";
    })

    };

};

(function () {
    let form = new Form();
    form.render();
})();