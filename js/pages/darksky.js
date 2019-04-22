

$.ajax({
    url: 'http://13.58.176.181:8080/iot-data-retriever/getdata?providers=solcast,darksky&latitude=-21.758819,-22.458778&longitude=-43.350500,-44.848139'
    //url: 'http://localhost:8081/iot-data-retriever/darksky?latitude=-21.758819&longitude=-43.350500'
    //url: 'http://localhost:8081/iot-data-retriever/getdata?providers=solcast,darksky&latitude=-21.758819,-22.458778&longitude=-43.350500,-44.848139'
}).done(function (data) {

    //console.log(data.jsonData.measurements);

    var i = 0;
    $.each(data.jsonData.measurements, function (key, value) {

        //console.log("i = " + i + "; key " + key + " :: value " + value);

        characteristicName = data.jsonData.measurements[i].characteristic.name;
        characteristicValue = data.jsonData.measurements[i].characteristic.value;
        characteristicStandard = data.jsonData.measurements[i].standard;
        sensorName = data.jsonData.measurements[i].sensor.name;
        operatingPropertyName = data.jsonData.measurements[i].sensor.operatingProperty.name;
        operatingPropertyStandard = data.jsonData.measurements[i].sensor.operatingProperty.standard;
        operatingPropertyValue = data.jsonData.measurements[i].sensor.operatingProperty.value;
        operatingRangeName = data.jsonData.measurements[i].sensor.operatingRange.name;
        operatingRangeStandard = data.jsonData.measurements[i].sensor.operatingRange.standard;
        operatingRangeValue = data.jsonData.measurements[i].sensor.operatingRange.value;
        provider = data.jsonData.measurements[i].provider;
        definition = data.jsonData.measurements[i].definition;

        console.log(characteristicName + " " + characteristicValue + " " + characteristicStandard + " " + sensorName)


        var row = $('<tr>');
        row.append(
            $('<td>').text(i + 1),
            $('<td>').text(characteristicName),
            $('<td>').text(characteristicValue)
        );

        $('#tbl-sensordata tbody').append(row);


        row.click(function () {
            $("#modal-row").modal();
        });

        //additional info table header
        $("#additional-info-table thead").text(characteristicName);


        function Add() {
            $("#additional-info-table tbody").append(
                "<tr>" +
                "<td><input type='text'/></td>" +
                "<td><input type='text'/></td>" +
                "<td><input type='text'/></td>" +
                //"<td><img src='images/disk.png' class='btnSave'><img src='images/delete.png' class='btnDelete'/></td>"+
                "</tr>");

            /*$(".btnSave").bind("click", Save);
            $(".btnDelete").bind("click", Delete);*/
        };


        /* var additionalInfoRow = $('<tr>');


         //1st row
         $("#additional-info-table tbody tr td").text("value");
         $("#additional-info-table tbody tr td").text(characteristicValue);

         //2nd row
         $("#additional-info-table tbody tr td").text("unit");
         $("#additional-info-table tbody tr td").text(characteristicStandard);

         //3rd row
         $("#additional-info-table tbody tr td").text("sensor");
         $("#additional-info-table tbody tr td").text(sensorName);

         //4th row
         $("#additional-info-table tbody tr td").text("provider");
         $("#additional-info-table tbody tr td").text(sensorName);

         //5th row
         $("#additional-info-table tbody tr td").text("definition");
         $("#additional-info-table tbody tr td").text(definition);*/

        i++;

    })


});


