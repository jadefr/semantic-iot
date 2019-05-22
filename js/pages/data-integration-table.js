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

                operatingPropertyName = sensorInfo.sensor.operatingProperty.name;
                operatingPropertyStandard = sensorInfo.sensor.operatingProperty.standard;
                operatingPropertyValue = sensorInfo.sensor.operatingProperty.value;

                operatingRangeName = sensorInfo.sensor.operatingRange.name;
                operatingRangeStandard = sensorInfo.sensor.operatingRange.standard;
                operatingRangeValue = sensorInfo.sensor.operatingRange.value;

                let modal = $("#modal-row");


                modal.find('.modal-title').text(characteristicName);

                let additionalInfoTableTbody = modal.find('#additional-info-table tbody').html("");


                additionalInfoTableTbody.append(
                    $('<tr>').append(
                        $('<td>').text("Value"),
                        $('<td>').text(characteristicValue)
                    )
                );

                if (!characteristicStandard.includes("does not")) {
                    additionalInfoTableTbody.append(
                        $('<tr>').append(
                            $('<td>').text("Unit"),
                            $('<td>').text(characteristicStandard)
                        )
                    )
                }

                if (!sensorName.includes("does not")) {

                    let sensorInfo = $('<td>').text(sensorName);

                    if (!operatingPropertyName.includes("does not")) {
                        sensorInfo.append(
                            $('<i>').addClass('fa fa-plus-circle').attr('data-toggle', 'collapse').attr('data-target', '.sensor-details'),

                            $('<div>').addClass('sensor-details collapse').append(
                                $('<table>').append(


                                    $('<tr>').append(
                                    $('<th>').text(""),
                                    $('<th>').text("Value"),
                                    $('<th>').text("Unit"),
                                    ),
                                    $('<tr>').append(
                                        $('<td>').text(operatingPropertyName),
                                        $('<td>').text(operatingPropertyValue),
                                        $('<td>').text(operatingPropertyStandard)
                                    ),
                                    $('<tr>').append(
                                        $('<td>').text(operatingRangeName),
                                        $('<td>').text(operatingRangeValue),
                                        $('<td>').text(operatingRangeStandard)
                                    )
                                )

                            )
                        )
                    }


                    additionalInfoTableTbody.append(
                        $('<tr>').addClass('sensor').append(
                            $('<td>').text("Sensor"),
                            sensorInfo

                            /*.append(

                            $('<i>').addClass('fa fa-plus-circle').attr('data-toggle', 'collapse').attr('data-target', '.sensor-details')
                        ).append(


                            $('<div>').addClass('sensor-details collapse').append(
                                $('<th>').text(""),
                                $('<th>').text("Value"),
                                $('<th>').text("Unit"),

                                $('<tr>').append(
                                    $('<td>').text("Unit"),
                                    $('<td>').text(characteristicStandard)
                                ),
                                $('<tr>').append(
                                    $('<td>').text("Unit"),
                                    $('<td>').text(characteristicStandard)
                                )
                            )
                        )*/
                        )
                    )

                }


                additionalInfoTableTbody.append(
                    $('<tr>').append(
                        $('<td>').text("Provider"),
                        $('<td>').text(provider)
                    )
                );


                if (!definition.includes("does not")) {
                    additionalInfoTableTbody.append(
                        $('<tr>').append(
                            $('<td>').text("Definition"),
                            $('<td>').text(definition)
                        )
                    )
                }

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


