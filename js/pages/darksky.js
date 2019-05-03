let SensorData = function () {

    this.target = '#tbl-sensordata';

    this.render = function () {
        let target = this.target;

        $.ajax({
            //url: 'http://13.58.176.181:8080/iot-data-retriever/getdata?providers=solcast,darksky&latitude=-21.758819,-22.458778&longitude=-43.350500,-44.848139'
            url: 'http://localhost:8081/iot-data-retriever/getdata?providers=solcast,darksky&latitude=-21.758819,-22.458778&longitude=-43.350500,-44.848139'
            //url: 'http://localhost:8081/iot-data-retriever/darksky?latitude=-21.758819&longitude=-43.350500'
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
                    $('<tr>').append(
                        $('<td>').text("Sensor"),
                        $('<td>').text(sensorName)
                    ).data('toggle', 'collapse').data('target','#text'),
                    $('<tr>').append(
                        $('<td>').text("Provider"),
                        $('<td>').text(provider)
                    ),
                    $('<tr>').append(
                        $('<td>').text("Definition"),
                        $('<td>').text(definition)
                    )
                );


                modal.modal();

            });


        });


    };


};


(function () {
    let sd = new SensorData();

    sd.render();
})();


