//User registration request
/**
 * Handles the click on a register link
 * @returns {boolean}
 */
function getRegistrationForm() {
    getRequest(
        './templates/register.php',
        drawRegistrationOutput,
        drawRegistrationError
    );
    return false;
}
/**
 * Handles drawing of an error message when user can not access the registration form
 */
function drawRegistrationError() {
    var container = document.getElementById('welcome');
    container.innerHTML = "<span class='error'>Registration form couldn't load!</span>" + container.innerHTML;
}
/**
 * Handles drawing of the registration form
 * @param responseText
 */
function drawRegistrationOutput(responseText) {
    var container = document.getElementById('welcome');
    container.innerHTML = responseText;
}
/**
 * Helper function to send cross browser http request to server
 * @param url
 * @param success
 * @param error
 * @returns {boolean}
 */
function getRequest(url, success, error) {
    var req = false;
    try {
        //most browsers
        req = new XMLHttpRequest();
    } catch (e) {
        //IE
        try {
            req = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            //older IE
            try {
                req = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                return false;
            }
        }
    }
    if (!req) return false;
    if (typeof success != "function") {
        success = function () {
        }
    }
    ;
    if (typeof error != "function") {
        error = function () {
        }
    }
    ;
    //attaches event handler function to the ready state event of the request
    req.onreadystatechange = function () {
        if (req.readyState === 4) {
            if (req.status === 200) {
                return success(req.responseText);
            } else {
                return error(req.status);
            }
        }
    };

    req.open('post', url, true);
    req.send(null);
    return req;
}

