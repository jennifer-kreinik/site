<script type='text/javascript'>
var counterSecs = 0;
var counterMins =0;
var state ="stopped"; //stopped or started
function startStop(){
    counterSecs = parseInt($('#secs').val());
    counterMins =parseInt($('#mins').val());
    if (counterSecs == NaN || counterMins == NaN){
        alert("Please enter only numbers into the timer");
    }
    if (state == 'stopped'){
        $('#startStopButton').val("Pause");
        state = 'started'
        $('#reset').fadeIn();
        
            incrementCounterSecs();
            incrementCounterMins();

    }
    else{
        $('#startStopButton').val("Start");
        state ="stopped"
    }
}
function resetBtn(){
        $('#reset').click(function(){
        $('#mins, #secs').val('');

    });
}
function incrementCounterSecs(){
    if (state == "stopped"){
        //do nothing
    }
    else{
        if(counterSecs>= 0){
        $('#secs').val(counterSecs);
        setTimeout(function(){incrementCounterSecs()},1000);
        counterSecs -= 1;
    }

}
}
function incrementCounterMins(){
    if (state == "stopped"){
        //do nothing
    }
    else{
        if(counterMins> 0){
        counterMins -= 1;
        $('#mins').val(counterMins);
        setTimeout(function(){incrementCounterMins()},60001);
        counterSecs+=59;
    }
    }
}
</script>
