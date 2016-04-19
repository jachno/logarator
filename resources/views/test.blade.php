@extends('layouts.master') @section('content')
<div class="container-fluid">
    <div class="row " style="padding-top:10px;">
        <h3 class="text-center">logGregator</h3>
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
                                         <input type="checkbox" checked="checked" id="${logFile}" onchange="toggleCheckbox(this)">     ${logFile}
                                         </h5>
                                    </div>
                                </div>
                            </div>
                        </li>
</script>

<script src="https://cdn.socket.io/socket.io-1.4.5.js"></script>
<script src="https://ajax.microsoft.com/ajax/jquery.templates/beta1/jquery.tmpl.js"></script>
<script type="text/javascript"src="https://cdnjs.cloudflare.com/ajax/libs/randomcolor/0.4.4/randomColor.js"></script>


<script type="text/javascript">var socket = io('{{ url('/')}}:8081');</script>

<script type="text/javascript"src="/js/logagregattor.js"></script>

@stop