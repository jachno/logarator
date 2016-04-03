@extends('layouts.master') @section('content')
<div class="container-fluid">
    <div class="row " style="padding-top:10px;">
        <h3 class="text-center">Log Agregator (1232 </h3>
        <div class="col-md-10">
            <div class="panel panel-info">

                <div class="panel-body">
                    <ul class="media-list" id="messagelist">

      

                    
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
                  <li class="">
                            <div class="">
    <div id="template" class= "message">
        <a class="pull-left" href="#">

        </a>
        <div class="media-body" style="color:${color}">
             ${logFile}:
             ${timeStamp}
             ${message}
        </div>
    </div>
            </div>
                        </li>
</script>





<script src="https://cdn.socket.io/socket.io-1.4.5.js"></script>

<script src="https://ajax.microsoft.com/ajax/jquery.templates/beta1/jquery.tmpl.js"></script>
<script type="text/javascript" src="">

    
</script>
<script>



    var socket = io('https://logsdashboard-jachno.c9users.io:8081');

    socket.on("test-channel:App\\Events\\EventName", function(msg) {

        var messages = [{
                            logFile: msg.data.logFile,
                            timeStamp: msg.data.timeStamp,
                            message: msg.data.message,
                            color: "red"
                  
            },

        ];
        
        if(activeState == true)
        {
            console.log('activeState: ' + activeState);
            var s = document.title;
            document.title =s.substring( 0, s.indexOf( "(" ) );
        }
        else
        {
            document.title =  'testtitl';
            console.log('activeState: ' + activeState);
        }



        var elem = $("#messageTemplate").tmpl(messages);

        elem.prependTo("#messagelist");

    });
    
    
    var activeState;
    
    setInterval(function () { visibilitychange() }, 200);

 visibilitychange = function () {

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

     if (document[BrowserState] == "hidden")
     {
       // document.title = "Inactive";
        activeState = false;
     }
     else
     {
        //document.title = "Active";
        activeState = true;
     }
  }
    
</script>



@stop