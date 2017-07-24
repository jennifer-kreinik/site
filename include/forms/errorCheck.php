<?php
function rememberedValue($value){
    return $value ? $value : "";
}

function returnRequireStatement ($valueArray){
    return $valueArray ? "<span class='Error'>".$valueArray."</span>" : "";
}
