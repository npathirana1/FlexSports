function goBack() {
    window.history.back();
}

function seletced_option(value) {
    window.location.assign(`${value}.php`);
}

function gotoPage() {
    window.location.assign(`viewFacilities2.php`);
}

function facilityName(name) {
    if (name = 'basketball') {
        document.write('Basketball Court Facility Schedule')
    }
}