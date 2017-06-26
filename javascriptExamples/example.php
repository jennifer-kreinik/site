<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

<script type='text/javascript'>

function ShowText(){
    var Test = 'asdf';
    $('.HiddenText').fadeIn(5);
}
function ChangeColor(){
    $.post('endpoint.php', {}, function(Data){
        $('.HiddenText').html(Data);
    });
}



</script>

<div>
    <a href='#' onclick='ShowText();'>Click here</a>
    <a href='#' onclick='ChangeColor();'>Click here</a>
</div>
<div class='HiddenText' style='display:none;'>
    this is some text
</div>
