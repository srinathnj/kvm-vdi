<?php
$vmname=$_GET['vmInfoToken'];
?>
<!DOCTYPE html>
<!--

eyeOS Spice Web Client
Copyright (c) 2015 eyeOS S.L.

Contact Jose Carlos Norte (jose@eyeos.com) for more information about this software.

This program is free software; you can redistribute it and/or modify it under
the terms of the GNU Affero General Public License version 3 as published by the
Free Software Foundation.
 
This program is distributed in the hope that it will be useful, but WITHOUT
ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
details.
 
You should have received a copy of the GNU Affero General Public License
version 3 along with this program in the file "LICENSE".  If not, see 
<http://www.gnu.org/licenses/agpl-3.0.txt>.
 
See www.eyeos.org for more details. All requests should be sent to licensing@eyeos.org
 
The interactive user interfaces in modified source and object code versions
of this program must display Appropriate Legal Notices, as required under
Section 5 of the GNU Affero General Public License version 3.
 
In accordance with Section 7(b) of the GNU Affero General Public License version 3,
these Appropriate Legal Notices must retain the display of the "Powered by
eyeos" logo and retain the original copyright notice. If the display of the 
logo is not reasonably feasible for technical reasons, the Appropriate Legal Notices
must display the words "Powered by eyeos" and retain the original copyright notice. 

-->
<html>
    <head>
        <title>KVM-VDI - <?php echo "$vmname";?></title>
        <meta charset="utf-8">
        <!-- libs -->
        <script src="lib/modernizr.js"></script>
        <script src="lib/jquery-2.0.3.js"></script>
        <script src="lib/jquery-mousewheel.js"></script>
        <script src="lib/jgestures.min.js"></script>
        <script src="lib/pixastic.js"></script>
        <script src="lib/base64.js"></script>
        <script src="lib/biginteger.js"></script>
        <script src="lib/virtualjoystick.js"></script>
        <script src="lib/prettyprint.js"></script>
        <!-- ticketing -->
        <script src="lib/jsbn.js"></script>
        <script src="lib/jsbn2.js"></script>
        <script src="lib/prng4.js"></script>
        <script src="lib/rng.js"></script>
        <script src="lib/sha1.js"></script>
        <script src="lib/encrypt.js"></script>
        <!-- end libs -->
        <!-- core -->
        <script src="swcanvas/swcanvas.js"></script>
        <script src="lib/bowser.js"></script>
        <script src="lib/utils.js"></script>
        <script src="lib/flipper.js"></script>
        <script src="lib/CollisionDetector.js"></script>
        <script src="lib/GlobalPool.js"></script>
        <script src="lib/GenericObjectPool.js"></script>
        <script src="lib/AsyncConsumer.js"></script>
        <script src="lib/AsyncWorker.js"></script>
        <script src="lib/PacketWorkerIdentifier.js"></script>
        <script src="spiceobjects/spiceobjects.js"></script>
        <script src="spiceobjects/generated/protocol.js"></script>
        <script src="lib/graphicdebug.js"></script>
        <script src="lib/images/lz.js"></script>
        <script src="lib/images/bitmap.js"></script>
        <script src="lib/images/png.js"></script>
        <script src="lib/runqueue.js"></script>
        <script src="lib/graphic.js"></script>
        <script src="lib/queue.js"></script>
        <script src="lib/ImageUncompressor.js"></script>
        <script src="lib/SyncAsyncHandler.js"></script>
        <script src="lib/IntegrationBenchmark.js"></script>
        <script src="lib/stuckkeyshandler.js"></script>
        <script src="lib/timelapsedetector.js"></script>
        <script src="lib/displayRouter.js"></script>
        <script src="lib/rasterEngine.js"></script>
        <script src="lib/DataLogger.js"></script>
        <script src="network/socket.js"></script>
        <script src="network/clusternodechooser.js"></script>
        <script src="network/socketqueue.js"></script>
        <script src="network/packetcontroller.js"></script>
        <script src="network/packetextractor.js"></script>
        <script src="network/packetreassembler.js"></script>
        <script src="network/reassemblerfactory.js"></script>
        <script src="network/sizedefiner.js"></script>
        <script src="network/packetlinkfactory.js"></script>
        <script src="network/spicechannel.js"></script>
        <script src="network/busconnection.js"></script>
        <script src="network/websocketwrapper.js"></script>
        <script src="network/connectioncontrol.js"></script>
        <script src="application/agent.js"></script>
        <script src="application/spiceconnection.js"></script>
        <script src="application/clientgui.js"></script>
        <script src="application/packetprocess.js"></script>
        <script src="application/packetfilter.js"></script>
        <script src="application/packetfactory.js"></script>
        <script src="application/application.js"></script>
        <script src="application/virtualmouse.js"></script>
        <script src="application/imagecache.js"></script>
        <script src="application/rasteroperation.js"></script>
        <script src="application/stream.js"></script>
        <script src="application/inputmanager.js"></script>
        <script src="process/busprocess.js"></script>
        <script src="process/displayprocess.js"></script>
        <script src="process/displaypreprocess.js"></script>
        <script src="process/inputprocess.js"></script>
        <script src="process/cursorprocess.js"></script>
        <script src="process/playbackprocess.js"></script>
        <script src="process/mainprocess.js"></script>
        <script src="keymaps/keymapes.js"></script>
        <script src="keymaps/keymaplt.js"></script>
        <script src="keymaps/keymapit.js"></script>
        <script src="keymaps/keymapus.js"></script>
        <script src="keymaps/keymap.js"></script>
        <script src="application/WorkerProcess.js"></script>
        <script src="run.js"></script>
        <!-- end core -->
        <meta content="yes" name="apple-mobile-web-app-capable" />

        <style type="text/css">
            body {
                background-color:black;
                padding:0;
                margin:0;
            }

            #integrationBenchmark {
                display: none;
                position:absolute;
                z-index: 10000000000000000000000000;
                top:0;
                right:0;
                bottom:0;
                left:0;
                text-align: center;
                background-color: rgba(0, 0, 0, 0.2);
            }

            #integrationBenchmark .closeButton {
                position: absolute;
                top: 0;
                right: 0;
                padding: 5px;
                background-color: #fff;
                color: #000;
                cursor: pointer;
            }

            #integrationBenchmark .result {
                font-size: 4em;
                font-weight: bold;
                position: absolute;
                top: 50%;
                left: 35%;
                color: #0f0;
                background-color: #fff;
            }

            #launchWordButton {
                position:absolute;
                top:50%;
            }

        </style>
    </head>
    <body>
        <div id="testVdi"></div>
        <input type="button" value="getStats" style="display:none;position:absolute;top:0px;right:0px;z-index:100;width:200px;height:200px;" id="getStats" />
        <input type="text" id="hiddeninput" style="display:none;opacity:0;font-size: 60px;color:transparent"/>
        <div id="canvasSpace" style="display: none; height: 1024px"></div>
        <div id="graphicDebug" style="display: none; background-color: white; font-family: Consolas,Lucida Console,Courier,mono">
            <button id="clearButton" type="button" onclick="$(debugInfo).html('');">Clear</button>
            <input id="logActive" type="checkbox" value="Log">Log
            <div id="debugInfo" style="background-color: white"></div>
        </div>
        <div id="integrationBenchmark"  style="" width=100% height=100%>
            <div class="closeButton" onclick="closeIntegrationBenchmark();">X</div>
            <button id="launchWordButton"  type="button" onclick=startBenchmark()>Start benchmark</button>
        </div>
    </body>
<script>
var vmname="<?php echo $vmname?>";
function vm_heartbeat(){
    $.ajax({
    	    type : 'POST',
    	    url : '../client_hb.php',
    	    data: {
    	    'vmname': vmname,
	    }
	})
}
$(document).ready(function(){
    var heartbeat_object = setInterval(function(){vm_heartbeat();},30000);
});
</script>
</html>
