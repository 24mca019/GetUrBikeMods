// to get current year
function getYear() {
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    document.querySelector("#displayYear").innerHTML = currentYear;
}

getYear();


/** google_map js NOT IMP **/
function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(40.712775, -74.005973),
        zoom: 18,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}
// Function to redirect to the selected page
function redirectPage() {
    var selectedOption = document.getElementById("redirectDropdown").value;
        if (selectedOption) {
            window.location.href = selectedOption;
    }
}
//profile
function redirectToEditProfile() {
    console.log('Redirecting to profile_edit.php');
    // Redirect to profile_edit.php
    window.location.href = 'profile_edit.php';
}

function redirectToEditcheckout() {
    console.log('Redirecting to checkout.php');
    // Redirect to profile_edit.php
    window.location.href = 'checkout.php';
}