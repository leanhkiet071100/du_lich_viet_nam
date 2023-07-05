import itemOption from '../Tour/Model/OptionOrderViewModel.js';
var TotalPrice = 0;
var TotalOptionPrice = 0;
let _tourId = document.getElementById("tourId").value;
let _btnOrder = document.getElementById("btn-order");
let TotalService = 0;
$(window).on('load', function() {
    GetTotalPricelOption(_tourId, false);
});
$(document).on('click', '.form-check-input', function(e) {
    TotalService = 0;
    GetTotalPricelOption(_tourId);
});
$(document).on('click', '.btn-click', function(e) {
    GetTotalPriceService(e);
});
if (_btnOrder != null) {
    document.getElementById("btn-order").addEventListener("click", function() {
        event.preventDefault();
        var lstBooking = GetListServiceOrder();
        var json = JSON.stringify(lstBooking);
        $('#btn-order').prop('disabled', true);
        ActionBookingTour(_tourId, json);
    });
} else {
    document.getElementById("btn-order-combo").addEventListener("click", function() {
        event.preventDefault();
        let _comboCode = document.getElementById("macombo").value;
        var lstBooking = GetListServiceOrder();
        var json = JSON.stringify(lstBooking);
        $('#btn-order-combo').prop('disabled', true);
        ActionComboBookingTour(_comboCode, _tourId, json);
    });
}
function GetTotalPriceService(e) {
    var TotalOptionPrice = 0;
    let btnName = e.currentTarget.getElementsByTagName('i')[0].id;
    let iIndex = btnName.lastIndexOf('_');
    let iIndexId = btnName.slice(iIndex + 1);
    var vCheckQuantityOtherService = document.getElementById("quantity_OtherService_" + iIndexId);
    if (vCheckQuantityOtherService != null) {
        let iQuantity = parseInt(document.getElementById("quantity_OtherService_" + iIndexId).innerText);
        let OtherService_SellingPrice = document.getElementById("OtherService_SellingPrice_" + iIndexId).value;
        if (btnName === "adultMinus_OtherService_" + iIndexId) {
            if (iQuantity > 0) {
                TotalOptionPrice = (iQuantity - 1) * OtherService_SellingPrice;
            }
        } else if (btnName === "adultPlus_OtherService_" + iIndexId) {
            TotalOptionPrice = (iQuantity + 1) * OtherService_SellingPrice;
        }
        document.getElementById("OtherService_" + iIndexId).innerText = formatNumber(TotalOptionPrice) + "₫";
        document.getElementById("OtherServiceResult_" + iIndexId).value = TotalOptionPrice;
        GetOptionQuantity(0);
    }
}
function GetTotalPricelOption(tourId, onLoad=true) {
    let selectedSize = GetOptionOrder();
    let iOptionNumber = GetOptionOrder(2);
    TotalOptionPrice = parseInt(selectedSize);
    if (selectedSize > 0) {
        LoadListOptionServiceByOption(tourId, iOptionNumber);
        if (onLoad == true) {
            GetOptionQuantity(1);
        }
    }
}
function GetOptionQuantity(iSelectChange) {
    TotalService = 0;
    let lstOptionService = document.getElementsByClassName("optionservice");
    for (var i = 0; i < lstOptionService.length; i++) {
        let getServiceId = lstOptionService[i].getAttribute('id');
        let serviceIndex = getServiceId.lastIndexOf('_');
        let serviceId = getServiceId.slice(serviceIndex + 1);
        let OtherServiceResult = document.getElementById("OtherServiceResult_" + serviceId).value;
        if (parseFloat(OtherServiceResult) > 0) {
            TotalService = parseFloat(TotalService) + parseFloat(OtherServiceResult);
        }
    }
    if (parseInt(TotalOptionPrice) === 0) {
        TotalOptionPrice = parseInt(GetOptionOrder());
    }
    if (iSelectChange === 1) {
        TotalPrice = TotalOptionPrice;
    } else {
        TotalPrice = TotalOptionPrice + TotalService;
    }
    document.getElementById("TotalPriceService").innerText = formatNumber(TotalPrice) + "₫";
}
function GetOptionOrder(valueOption=1) {
    const radioButtons = document.querySelectorAll('input[name="flexRadioDefault"]');
    let selectedSize = 0;
    for (const radioButton of radioButtons) {
        if (radioButton.checked) {
            switch (valueOption) {
            case 1:
                selectedSize = radioButton.value;
                break;
            case 2:
                console.log('1');
                let OptionId = radioButton.id;
                let iIndexOption = OptionId.lastIndexOf('_');
                selectedSize = OptionId.slice(iIndexOption + 1);
                break;
            default:
            }
        }
    }
    return selectedSize;
}
function GetListServiceOrder() {
    let LstOrderService = new itemOption();
    let optionId = GetOptionOrder(2);
    if (parseInt(optionId) > 0) {
        let optionPrice = document.getElementById("option_" + optionId).value;
        let OptionName = document.getElementById("OptionName_" + optionId).innerText;
        LstOrderService.newOptionOrder(optionId, OptionName, optionPrice, 1, "option");
    }
    let lstOptionService = document.getElementsByClassName("optionservice");
    for (var i = 0; i < lstOptionService.length; i++) {
        let getServiceId = lstOptionService[i].getAttribute('id');
        let serviceIndex = getServiceId.lastIndexOf('_');
        let serviceId = getServiceId.slice(serviceIndex + 1);
        let ServiceName = document.getElementById("OtherServiceName_" + serviceId).innerText;
        let ServiceQuantity = document.getElementById("quantity_OtherService_" + serviceId).innerText;
        let ServicePrice = document.getElementById("OtherService_SellingPrice_" + serviceId).value;
        if (parseInt(ServiceQuantity) > 0) {
            LstOrderService.newOptionOrder(serviceId, ServiceName, ServicePrice, ServiceQuantity, "otherService");
        }
    }
    return LstOrderService.allOptionOrder();
}
function LoadListOptionServiceByOption(tourId, optionNumber) {
    $.ajax({
        url: '/Tour/_GetOptionServiceByOption',
        data: {
            TourId: tourId,
            OptionNumber: optionNumber
        },
        success: function(data) {
            $('#showlistoptionservice').html(data);
        }
    });
}
;function ActionBookingTour(tourId, ListOrderService) {
    $.ajax({
        type: "POST",
        url: '/Booking/GetOptionTour',
        data: {
            tourId: tourId,
            ListOrderService: ListOrderService
        },
        success: function(data) {
            if (data.length === 0) {
                var currentLocation = window.location.origin + "/Booking/TourBooking?tourId=" + tourId;
                window.location.href = currentLocation;
            }
        }
    });
}
function ActionComboBookingTour(maCombo, tourId, ListOrderService) {
    $.ajax({
        type: "POST",
        url: '/Booking/GetOptionTour',
        data: {
            tourId: tourId,
            ListOrderService: ListOrderService
        },
        success: function(data) {
            if (data.length === 0) {
                var currentLocation = window.location.origin + "/Booking/ComboBooking?maCombo=" + maCombo + "&tourId=" + tourId;
                window.location.href = currentLocation;
            }
        }
    });
}
