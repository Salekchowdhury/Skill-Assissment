const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
    navigator.userAgent
);
const startEvent = isMobile ? "touchstart" : "mousedown";
const endEvent = isMobile ? "touchend" : "mouseup";

//add styles to stylesheet
const sheet = document.styleSheets[0];
sheet.insertRule(
    ".hf_noSelect {-webkit-touch-callout: none;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none; user-select: none; -webkit-tap-highlight-color: transparent; }",
    sheet.cssRules.length
);
sheet.insertRule(
    ".hf_buttfill { height: 100%;width: 100%;position: absolute;-webkit-clip-path: inset(0% 50%);clip-path: inset(0% 50%); }",
    sheet.cssRules.length
);
sheet.insertRule(
    ".hf_clicked .hf_buttfill {-webkit-clip-path: inset(0% 0%);clip-path: inset(0% 0%); }",
    sheet.cssRules.length
);

let holdFill = function (element, fillColor, textColor, holdTime, callBack) {
    //add the noselect class to the element to prevent browser BS
    element.classList.add("hf_noSelect");

    //add the style for the timing to the element
    element.setAttribute(
        "style",
        "-webkit-transition: " +
        holdTime +
        "ms ease-in-out;transition: " +
        holdTime +
        "ms ease-in-out;"
    );

    //create the backfill element and add it to the DOM.
    let newDiv = document.createElement("div");
    newDiv.classList.add("hf_buttfill");
    element.insertBefore(newDiv, element.firstChild);

    //add color and timing styles to .hf_buttfill
    element
        .querySelector(".hf_buttfill")
        .setAttribute(
            "style",
            "background-color: " +
            fillColor +
            ";-webkit-transition: " +
            holdTime +
            "ms ease-in-out;transition: " +
            holdTime +
            "ms ease-in-out;"
        );

    //define the functions to be used
    let addClickClass = function (e) {
        element.classList.add("hf_clicked");
        element.setAttribute(
            "style",
            "color: " +
            textColor +
            ";-webkit-transition: " +
            holdTime +
            "ms ease-in-out;transition: " +
            holdTime +
            "ms ease-in-out;"
        );
        element.addEventListener("transitionend", callBack);
    };
    let removeClickClass = function (e) {
        element.classList.remove("hf_clicked");
        element.setAttribute(
            "style",
            "-webkit-transition: " +
            holdTime +
            "ms ease-in-out;transition: " +
            holdTime +
            "ms ease-in-out;"
        );
        element.removeEventListener("transitionend", callBack);
    };

    //prevent context menu on longpress for mobile devices
    if (isMobile) {
        element.oncontextmenu = function (event) {
            event.preventDefault();
            event.stopPropagation();
            event.stopImmediatePropagation();
            return false;
        };
    }

    //add or remove the clicked classes on the button
    element.addEventListener(startEvent, addClickClass);
    document.body.addEventListener(endEvent, removeClickClass);
};

holdFill(
    document.getElementById("theButton"),
    "#fff",
    "#303030",
    800,
    function () {
        document.querySelector(".callbackdiv").classList.add("show");
        document.getElementById("theButton").classList.add("clickedClone");

        setTimeout(() => {
            document.querySelector(".callbackdiv").classList.remove("show");
            document.getElementById("theButton").classList.remove("clickedClone");
        }, 4000);
    }
);
