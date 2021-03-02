
/*Nav Bar JS top menu/

/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction1() {
    var x = document.getElementById("myTopnav1");
    if (x.className === "topnav1") {
        x.className += " responsive";
    } else {
        x.className = "topnav1";
    }
}


/*Nav Bar JS main menu*/

/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

