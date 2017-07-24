<script
  src='https://code.jquery.com/jquery-3.2.1.min.js'
  integrity='sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4='
  crossorigin='anonymous'></script>



<script type='text/javascript'>
$(function(){
    // $('#PageWrapper span:nth-child(ODD)').fadeIn();
});
var Counter = 0;
var State ="stopped"; //stopped or started
function StartStop(){
    if (State == 'stopped'){
    $('#StartStopButton').val("Stop");
    State = 'started'
    incrementCounter();
}
else{
    $('#StartStopButton').val("Start");
    State ="stopped"
}
}
function incrementCounter(){
    ///console.log("Incrementign counter")
    if (State == "stopped"){
        //do nothing
    }
    else{
        Counter += .1;
        $('#Counter').html(Counter);
        //{Counter:Counter} use this formate in {}
        setTimeout(function(){incrementCounter()},100);
        //setTimeout(incrementCounter,100)--> this syntax works too. either is good!!
        //$('#Counter').val(Counter:Counter);
    }
}
</script>
<style>
    #Counter{
        width:500px;
        background-color : #ddd;
        padding:10px;
    }
</style>

<div id='PageWrapper'>
    <div id='Counter'>
        0
    </div>
    <input id='StartStopButton' value='Start' type ='button' onclick='StartStop()'>
</div>
