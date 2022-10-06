class Attempt {
    constructor(x, y, r) {
        this.x = x
        this.y = y
        this.r = r
    }
}

function drawCoordinates(stage, width, height, xMiddle, yMiddle, r) {
    var linePath = stage.path()
    var textStyle = {fontSize: Math.round(r / 13), fontFamily: "Roboto", color: graphColor}

    //drawing vertical arrow
    linePath.moveTo(xMiddle, 0)
    linePath.lineTo(xMiddle, height)
    linePath.moveTo(xMiddle - r / 30, r / 20)
    linePath.lineTo(xMiddle, 0)
    linePath.lineTo(xMiddle + r / 30, r / 20)
    stage.text(xMiddle + r / 30, 0, "Y", textStyle)

    //drawing horizontal arrow
    linePath.moveTo(0, yMiddle)
    linePath.lineTo(width, yMiddle)
    linePath.moveTo(width - r / 20, yMiddle - r / 30)
    linePath.lineTo(width, yMiddle)
    linePath.lineTo(width - r / 20, yMiddle + r / 30)
    stage.text(width - r / 20, yMiddle + r / 30, "X", textStyle)

    //drawing marks
    linePath.moveTo(xMiddle - r / 40, yMiddle - r / 2)
    linePath.lineTo(xMiddle + r / 40, yMiddle - r / 2)
    stage.text(xMiddle + r / 40, yMiddle - r / 2, "R/2", textStyle)
    
    linePath.moveTo(xMiddle - r / 40, yMiddle - r)
    linePath.lineTo(xMiddle + r / 40, yMiddle - r)
    stage.text(xMiddle + r / 40, yMiddle - r, "R", textStyle)

    linePath.moveTo(xMiddle - r / 40, yMiddle + r / 2)
    linePath.lineTo(xMiddle + r / 40, yMiddle + r / 2)
    stage.text(xMiddle + r / 40, yMiddle + r / 2, "-R/2", textStyle)

    linePath.moveTo(xMiddle - r / 40, yMiddle + r)
    linePath.lineTo(xMiddle + r / 40, yMiddle + r)
    stage.text(xMiddle + r / 40, yMiddle + r, "-R", textStyle)

    linePath.moveTo(xMiddle + r / 2, yMiddle - r / 40)
    linePath.lineTo(xMiddle + r / 2, yMiddle + r / 40)
    stage.text(xMiddle + r / 2, yMiddle + r / 40, "R/2", textStyle)

    linePath.moveTo(xMiddle + r, yMiddle - r / 40)
    linePath.lineTo(xMiddle + r, yMiddle + r / 40)
    stage.text(xMiddle + r, yMiddle + r / 40, "R", textStyle)

    linePath.moveTo(xMiddle - r / 2, yMiddle - r / 40)
    linePath.lineTo(xMiddle - r / 2, yMiddle + r / 40)
    stage.text(xMiddle - r / 2, yMiddle + r / 40, "-R/2", textStyle)

    linePath.moveTo(xMiddle - r, yMiddle - r / 40)
    linePath.lineTo(xMiddle - r, yMiddle + r / 40)
    stage.text(xMiddle - r, yMiddle + r / 40, "-R", textStyle)

    linePath.stroke(graphColor)
}


function drawShape(stage, width, height, xMiddle, yMiddle, r) {
    var linePath = stage.path()

    //drawing rectangle
    linePath.moveTo(xMiddle, yMiddle)
    linePath.lineTo(xMiddle, yMiddle - r / 2)
    linePath.lineTo(xMiddle + r, yMiddle - r / 2)
    linePath.lineTo(xMiddle + r, yMiddle)

    //drawing arc
    linePath.arcTo(r, r, 0, 90)

    //drawing triangle
    linePath.moveTo(xMiddle, yMiddle + r)
    linePath.lineTo(xMiddle - r / 2, yMiddle)
    linePath.lineTo(xMiddle, yMiddle)

    linePath.stroke(transparentGraphColor)
    linePath.fill(transparentGraphColor)
}


function drawAttempt(stage, width, height, xMiddle, yMiddle, r, result) {
    stage.circle(xMiddle + (result.x / result.r) * r, yMiddle - (result.y / result.r) * r, 2).stroke(graphColor).fill(graphColor)
}


function plotGraph() {
    stage.removeChildren()
    const width = document.getElementById("graph").clientWidth
    const height = document.getElementById("graph").clientHeight
    const xMiddle = width / 2
    const yMiddle = height / 2
    const r = Math.min(width, height) * 0.4

    console.log(width)
    console.log(height)

    drawCoordinates(stage, width, height, xMiddle, yMiddle, r)

    drawShape(stage, width, height, xMiddle, yMiddle, r)

    if (attempt != NaN) drawAttempt(stage, width, height, xMiddle, yMiddle, r, attempt)
}