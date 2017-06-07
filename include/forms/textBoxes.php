<?php
function singleLineTextBox($textTitle,$textName,$textPlaceholder, $value, $valueArray){
    return $textTitle.": ".returnRequireStatement($valueArray)."<br/><input type='text' name='$textName' id='$textName' placeholder='$textPlaceholder' value = '" . rememberedValue($value)."' /><br/><br/>";
}
function textareaTextBox ($textTitle, $textName, $textPlaceholder, $value, $valueArray){
    return $textTitle.": ".returnRequireStatement($valueArray)."<br/><textarea name='$textName' id='$textName' style='height:200px' placeholder ='$textPlaceholder'>". rememberedValue($value)."</textarea><br/><br/>";
}
function dropDownMenu ($textTitle, $tagName, $disabledOption, $dropDownChoices,$valueArray){
    return $textTitle.": ".returnRequireStatement($valueArray)."<br/><select id = '$tagName' name= '$tagName'><option disabled selected value> ---$disabledOption --- </option>".
            $dropDownChoices. "<option value='NULL'>NULL</option></select><br/><br/>";
}
function submitButton($buttonName){
    return "<input type='submit' name = 'submitItem' value='$buttonName' style='background-color: #b2e5a7'/>";
}
function deleteButton($buttonName){
    return "<input type='submit' name = 'deleteItem' value='$buttonName' style='background-color: #e5a7a7'/> </form> </div>";
}

 ?>
