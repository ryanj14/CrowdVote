function validateForm() {
    if(validateTitle() == false) {
      return false;
    } else if(validateOption1() == false) {
      return false;
    } else if(validateOption2() == false) {
      return false;
    } else {
        return true;
    }
}

function validateTitle() {
    var title = document.forms["crowdForm"]["title"];
    var titleValue = document.forms["crowdForm"]["title"].value;
    if (titleValue == "") {
        title.focus();
        return false;
    } else {
      return true;
    } 
}

function validateOption1() {
    var option1 = document.forms["crowdForm"]["option1"];
    var option1Value = document.forms["crowdForm"]["option1"].value;
    if (option1Value == "") {
        option1.focus();
        return false;
    } else {
      return true;
    } 
}


function validateOption2() {
    var option2 = document.forms["crowdForm"]["option2"];
    var option2Value = document.forms["crowdForm"]["option2"].value;
    if (option2Value == "") {
        option2.focus();
        return false;
    } else {
      return true;
    } 
}

function validateRadio(){
    var radios = document.getElementsByName("choice");
    var formValid = false;

    if(this.radios.checked == true){
        formValid = true;    
        return formValid;
    } else {
        alert("Select one!");
        return formValid;
    } 
}
