function isXOk(value) {
    return(value != "")
}


function validateX() {
    var x = document.forms["xyr_form"]["x"].value
    if (isXOk(x)) document.getElementById("x_label").style.color = okColor
    else document.getElementById("x_label").style.color = transparentOkColor
    setButtonColor()
}


function isYOk(value) {
    var floatValue = parseFloat(value)
    if (floatValue != NaN) {
        if ((5 > floatValue) & (floatValue > -3)) {
            return(true)
        }
    }
    return(false)
}

function validateY() {
    var y = parseInt(document.forms["xyr_form"]["y"].value)
    if (isYOk(y)) {
        document.getElementById("y_label").style.color = okColor
        document.getElementById("y_selector").style.backgroundColor = okColor
        document.getElementById("y_selector").style.color = secondOkColor
    }
    else {
        document.getElementById("y_label").style.color = transparentOkColor
        document.getElementById("y_selector").style.backgroundColor = secondOkColor
        document.getElementById("y_selector").style.color = okColor
    }
    setButtonColor()
}


function isROk(value) {
    return(value != "")
}

function validateR() {
    var r = document.forms["xyr_form"]["r"].value
    if (isROk(r)) document.getElementById("r_label").style.color = okColor
    else document.getElementById("r_label").style.color = transparentOkColor
    setButtonColor()
}


function setButtonColor() {
    var submitButton = document.getElementById("submit_button")
    if (isXOk(document.forms["xyr_form"]["x"].value) & isYOk(document.forms["xyr_form"]["y"].value) & isROk(document.forms["xyr_form"]["r"].value)) {
        submitButton.style.backgroundColor = okColor
        submitButton.disabled = false
    }
    else {
        submitButton.style.backgroundColor = transparentOkColor
        submitButton.disabled = true
    }

}