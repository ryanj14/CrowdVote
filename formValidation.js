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
    var radios1 = document.getElementsByName("choice1");
    var radios2 = document.getElementsByName("choice2");
    var radios3 = document.getElementsByName("choice3");
    var radios4 = document.getElementsByName("choice4");
    var formValid = false;

    if(this.radios1.checked == true){
        formValid = true;    
    }
    if(this.radios2.checked == true){
        formValid = true;    
    }
    if(this.radios3.checked == true){
        formValid = true;    
    }
    if(this.radios4.checked == true){
        formValid = true;    
    }

    if (!formValid){  
        alert("Select one!");
        return formValid;
    } else {
        return formValid;
    } 
}
