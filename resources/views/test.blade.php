@extends('layouts.master') @section('content')
<div class="container-fluid">
    <div class="row " style="padding-top:10px;">
        <h3 class="text-center">Log Agregator </h3>
        <div class="col-md-10">
            <div class="panel panel-info">

                <div class="panel-body">
                    <ul class="media-list" id="messagelist">

                        <li class="media">
                            <div class="media-body">

                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="col-md-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Logfiles
                </div>
                <div class="panel-body">
                    <ul class="media-list">

                        <li class="media">

                            <div class="media-body">

                                <div class="media">
                                    <a class="pull-left" href="#">
                                        
                                    </a>
                                    <div class="media-body">
                                        <h5>Jhon Rexa | User </h5>

                                        <small class="text-muted">Active From 3 hours</small>
                                    </div>
                                </div>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
@stop @section('footer')




<script id="messageTemplate" type="text/x-jquery-tmpl">
    <div id="template" class= "message">
sdasdadas
        <a class="pull-left" href="#">

        </a>
        <div class="media-body" style="color:${color}">
             ${logFile}:
             ${timeStamp}
             ${message}
        </div>
    </div>
</script>





<script src="https://cdn.socket.io/socket.io-1.4.5.js"></script>

<script src="http://ajax.microsoft.com/ajax/jquery.templates/beta1/jquery.tmpl.js"></script>
<script type="text/javascript" src="">

    
</script>
<script>
    //var socket = io('http://localhost:3000');
    var socket = io('http://logsdashboard-jachno.c9users.io:8081');
    //      var socket = io.connect("/");


    socket.on("test-channel:App\\Events\\EventName", function(msg) {




//on the way in see if we know about the log file, if not add it to the right hand menu and then sent its color
//

//do a logfile color look up

        var messages = [{
                            logFile: msg.data.logFile,
                            timeStamp: msg.data.timeStamp,
                            message: msg.data.message,
                            color: "red"
                  
            },

        ];

        var elem = $("#messageTemplate").tmpl(messages);
        elem.addClass(msg.data.logFile);
        elem.prependTo("#messagelist");




//localStorage.setItem('test',1);

var sheet = document.createElement('style')
sheet.innerHTML = msg.data.logFile + " {border: 2px solid black; color: red;}";
console.log(sheet.innerHTML);
document.body.appendChild(sheet);

        //$('.media-body').append('<p>' + message.data.power);

        console.log('test');
        //$("#template")
        // .clone()
        // .show()
        // .appendTo("#messagelist");

    });
    
    
    
</script>


<style type="text/css">

thislogfile{
    color:red;
}
</style>

@stop