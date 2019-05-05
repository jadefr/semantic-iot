let SensorData = function (options) {

    //this.target = '#tbl-sensordata';

    this.latitude = options.latitude;
    this.longitude = options.longitude;
    this.providers = options.providers;
    this.target = options.target;

    this.render = function () {
        let target = this.target;

        let serviceUrl = 'http://200.131.219.85:8080/iot-data-retriever/getdata?';
        serviceUrl += 'providers=' + this.providers;
        serviceUrl += '&latitude=' + this.latitude;
        serviceUrl += '&longitude=' + this.longitude;



        $.ajax({
            url: serviceUrl
        }).done(function (data) {

            // Create the rows of the table
            $.each(data.jsonData.measurements, function (key, value) {

                characteristicName = value.characteristic.name;
                characteristicValue = value.characteristic.value;

                var row = $('<tr>');
                row.append(
                    $('<td>').text(key + 1),
                    $('<td>').text(characteristicName),
                    $('<td>').text(characteristicValue)
                );

                row.data('sensor-info', value);

                $(target + ' tbody').append(row);

            });

            // Add behaviour
            $(target + ' tbody tr').on('click', function () {
                let sensorInfo = $(this).data('sensor-info');

                console.log(sensorInfo);

                characteristicName = sensorInfo.characteristic.name;
                characteristicValue = sensorInfo.characteristic.value;
                characteristicStandard = sensorInfo.standard;
                sensorName = sensorInfo.sensor.name;
                provider = sensorInfo.provider;
                definition = sensorInfo.definition;

                /*
                operatingPropertyName = value.sensor.operatingProperty.name;
                operatingPropertyStandard = value.sensor.operatingProperty.standard;
                operatingPropertyValue = value.sensor.operatingProperty.value;
                operatingRangeName = value.sensor.operatingRange.name;
                operatingRangeStandard = value.sensor.operatingRange.standard;
                operatingRangeValue = value.sensor.operatingRange.value;*/

                let modal = $("#modal-row");

                let sensorRow = $("sensor-row");


                modal.find('.modal-title').text(characteristicName);
                modal.find('#additional-info-table tbody').html("").append(
                    $('<tr>').append(
                        $('<td>').text("Value"),
                        $('<td>').text(characteristicValue)
                    ),
                    $('<tr>').append(
                        $('<td>').text("Unit"),
                        $('<td>').text(characteristicStandard)
                    ),
                    $('<tr>').addClass('sensor').append(
                        $('<td>').text("Sensor"),
                        $('<td>').text(sensorName).append(
                            $('<i>').addClass('fa fa-plus-circle').attr('data-toggle', 'collapse').attr('data-target', '.sensor-details')
                        ).append(
                            $('<div>').addClass('sensor-details collapse').text('sensor details')
                        )
                    ),
                $('<tr>').append(
                    $('<td>').text("Provider"),
                    $('<td>').text(provider)
                ),
                    $('<tr>').append(
                        $('<td>').text("Definition"),
                        $('<td>').text(definition)
                    )
            )
                ;


                modal.modal();

            });


        });


    };


};


(function () {
    let sd = new SensorData({
        latitude: $('#latitude').val(),
        longitude: $('#longitude').val(),
        providers: $('#providers').val(),
        target: '#tbl-sensordata'
    });

    sd.render();
})();


