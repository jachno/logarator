
socket.on("test-channel:App\\Events\\EventName", function(msg) {

    var messages = [{
            logFile: msg.data.logFile,
            timeStamp: msg.data.timeStamp,
            message: msg.data.message

        },

    ];

    if (activeState == true) {
        var s = document.title;

        document.title = s.substring(0, s.indexOf("("));
    }
    else {
        document.title = document.title + ' (2)';

    }



    if ($("#" + msg.data.logFile).length == 0) {
        messages[0].color = randomColor({luminosity: 'dark'});
        var elem = $("#logTemplate").tmpl(messages);
        elem.prependTo("#logFiles");
    }
    else {
        //ned to get the color        

        color = hexc($("#" + msg.data.logFile).css("color"))
      
    }



    var elem = $("#messageTemplate").tmpl(messages);
    elem.addClass(msg.data.logFile);
    elem.prependTo("#messagelist");


});




setInterval(openUrl, 5000);


function openUrl(){



}

    var activeState;
    
    setInterval(function() {
        visibilitychange()
    }, 200);

    visibilitychange = function() {

    var BrowserState;
    if (typeof document.hidden !== "undefined") {
        BrowserState = "visibilityState";
    }
    else if (typeof document.webkitHidden !== "undefined") {
        BrowserState = "webkitVisibilityState";
    }
    else if (typeof document.mozHidden !== "undefined") {
        BrowserState = "mozVisibilityState";
    }
    else if (typeof document.msHidden !== "undefined") {
        BrowserState = "msVisibilityState";
    }

    if (document[BrowserState] == "hidden") {
        // document.title = "Inactive";
        activeState = false;
    }
    else {
        //document.title = "Active";
        activeState = true;
    }
}


function hexc(colorval) {
    var parts = colorval.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
    delete(parts[0]);
    for (var i = 1; i <= 3; ++i) {
        parts[i] = parseInt(parts[i]).toString(16);
        if (parts[i].length == 1) parts[i] = '0' + parts[i];
    }
    color1 = '#' + parts.join('');

    return color1;
}

function toggleCheckbox(check) {


    $('.message.' + check.id).toggle();
}




