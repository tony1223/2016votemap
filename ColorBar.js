function ColorBar(value) {
    if (value == 0)
        return "white";
    else if (value <= 50)
        return "#000044";
    else if (value <= 100)
        return "#000066";
    else if (value <= 200)
        return "#000099";
    else if (value <= 500)
        return "#0000BB";
    else if (value <= 1000)
        return "#0000DD";
    else
        return "#2222FF";

    //return "rgb("+r+","+g+","+b+")";
}
