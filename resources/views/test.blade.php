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
                    <ul class="media-list" id="logFiles">

             
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
@stop @section('footer')




<script id="messageTemplate" type="text/x-jquery-tmpl">
<li class="message">
    <div class="">
        <div id="template" class="message">
            <a class="pull-left" href="#">

            </a>
            <div class="media-body" style="color:${color}">
                ${logFile}: ${timeStamp} ${message}
            </div>
        </div>
    </div>
</li>
</script>


<script id="logTemplate" type="text/x-jquery-tmpl">
               <li class="media" id="${logFile}" style="color:${color}">
                            <div class="media-body">
                                <div class="media">
                                    <div class="media-body">
                                        <h5>
                                         ${logFile}</h5>
                                    </div>
                                </div>

                            </div>
                        </li>
</script>



<script src="https://cdn.socket.io/socket.io-1.4.5.js"></script>

<script src="https://ajax.microsoft.com/ajax/jquery.templates/beta1/jquery.tmpl.js"></script>

<script type="text/javascript"src="https://cdnjs.cloudflare.com/ajax/libs/randomcolor/0.4.4/randomColor.js"></script>


    

<script>



    var socket = io('https://logsdashboard-jachno.c9users.io:8081');

    socket.on("test-channel:App\\Events\\EventName", function(msg) {
        
        var messages = [{
                            logFile: msg.data.logFile,
                            timeStamp: msg.data.timeStamp,
                            message: msg.data.message
                           
            },

        ];
        
        
        
        
        
        //$('.khkl11').fadeIn()
        
        if(activeState == true)
        {
            console.log('activeState: ' + activeState);
            var s = document.title;
            console.log(' test' +s.substring( 0, s.indexOf( "(" ) ));
            document.title =s.substring( 0, s.indexOf( "(" ) );
        }
        else
        {
            document.title =  document.title + ' (2)';
         
         
         
         
            console.log('activeState: ' + activeState);
        }






        
        
        
    if($("#" + msg.data.logFile).length == 0) 
    {
        messages[0].color = randomColor();
        var elem = $("#logTemplate").tmpl(messages);
        elem.prependTo("#logFiles");
    }
    else
    {
//ned to get the color        

color = hexc($("#" + msg.data.logFile).css("color"))
    console.log (hexc($("#" + msg.data.logFile).css("color")));
        console.log($("#" + msg.data.logFile).css("color"));
    
        
        
        
        
    }
        
   
        
        var elem = $("#messageTemplate").tmpl(messages);
       elem.addClass(msg.data.logFile);
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
    
</script>



@stop