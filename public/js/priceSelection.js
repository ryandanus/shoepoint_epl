var selectedService, selectedServiceId, price, target, finalPrice;

function checkONS() {
    if(selectedService.indexOf("Premium") != -1)
    {
        $('#onenightservice').prop('disabled', false);
    }
    else
    {
        $('#onenightservice').prop('disabled', true);
        $('#onenightservice').prop('checked', false);
    }

    target = "#" + selectedServiceId + "serviceprice";
    price = $(target).val();
    finalPrice = parseFloat(price);
}

function changeONSPrice()
{
    if($('#onenightservice').prop('checked'))
    {
        finalPrice = parseFloat(price) + 30000;
    }
    else if(!$('#onenightservice').prop('checked') && finalPrice != price)
    {
        finalPrice = parseFloat(finalPrice) - 30000;
    }
}

function changeFinalPrice()
{
    $('#total').val(finalPrice);
}

$(function() {
    selectedServiceId = $('#servicetype').children("option:selected").val()
    selectedService = $('#servicetype').children("option:selected").text();
    checkONS();
    changeONSPrice();
    changeFinalPrice();

    $('#servicetype').on('change', function() {
        selectedServiceId = $(this).children("option:selected").val();
        selectedService = $(this).children("option:selected").text();
        checkONS();
        changeONSPrice();
        changeFinalPrice();
    });

    $('#onenightservice').on('change', function() {
        changeONSPrice();
        changeFinalPrice();
    });
});