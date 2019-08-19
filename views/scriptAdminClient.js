
/**********************************************************CHECK USENAME**********************************************************/
/*
function CheckId() {

var adminid = document.getElementById("id");

if ( adminid.value == "" ) {
    adminid.style.borderColor = "red";
    return false;
}

check=adminid.value.matches("^[a-zA-Z0-9]+$");
   
else if ( adminid.value != "" ) {
   	for (i=0;i<adminid.value.length;i++) {
   		if ( ( adminid.value.charAt(i)<"0" || adminid.value.charAt(i)>"9" ) && ( adminid.value.charAt(i)<"a" || adminid.value.charAt(i)>"z" )
			&& ( adminid.value.charAt(i)<"A" || adminid.value.charAt(i)>"Z" ) && ( adminid.value.charAt(i)!="_") ) {
				adminid.style.borderColor = "red";
				return false;
		}
		else {
			adminid.style.borderColor = "transparent";
			return true;	
		}	
   	}
}

return true;
}
*/


function CheckId()
{ 
var lettersNum = /^[0-9a-zA-Z]+$/;
var adminid = document.getElementById("id");
	
	if ( adminid.value == "" ) {

	    adminid.style.borderColor = "red";
	    return false;
	}

	if(adminid.value.match(lettersNum)) {
		
		adminid.style.borderColor = "transparent";
		return true;
	}
	
	else {
		adminid.style.borderColor = "red";
		return false;
	}
}
/**********************************************************CHECK PASSWORD**********************************************************/

function CheckPassword() {

var password = document.getElementById("password");
var password2 = document.getElementById("password2");

if ( ( password.value == "" ) || ( password2.value == "" ) ){
    password.style.borderColor = "red";
    password2.style.borderColor = "red";
    return false;
}

else if ( password.value != "" && password2.value != ""){
	if (password.value.length < 8) {
		alert("password too short, please enter > 8 caracters.");
		return false;	
	}

	else if (password2.value != password.value ) {
		password2.style.borderColor = "red";
		return false;
	}

	else {
		password.style.borderColor = "transparent";
		password2.style.borderColor = "transparent";
		return true;
	}
}

return true;

}

/**********************************************************CHECK MAIL**********************************************************/

/*
function CheckMail() {

var email = document.getElementById("email");
var email2 = document.getElementById("email2");


if ( ( email.value == "" ) || ( email2.value == "" ) ){
    email.style.borderColor = "red";
    email2.style.borderColor = "red";
    return false;
}

else if (email.value != "" && email2.value != "") {

	if (email2.value != email.value){
		email2.style.borderColor = "red";
		email.style.borderColor = "red";
		return false;
	}

	else if (email2.value == email.value){

		for(j=1;j<(email.value.length);j++) {

			if(email.value.charAt(j)=='@') {

				if(j<(email.value.length-4)) {

					for(var k=j;k<(email.value.length-2);k++) {

						if(email.value.charAt(k)=='.') {
							email.style.borderColor = "transparent";
							email2.style.borderColor = "transparent";
							return true;
							
						}						
					}
				}
			}
		}
	}
	
}
return true;
} 
*/

function CheckMail()
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
var email = document.getElementById("email");
var email2 = document.getElementById("email2");

	if ( ( email.value == "" ) || ( email2.value == "" ) ){
	    email.style.borderColor = "red";
	    email2.style.borderColor = "red";
	    return false;
	}

	else if(email.value.match(mailformat))
	{
		if (email2.value != email.value){
			email2.style.borderColor = "red";
			email.style.borderColor = "red";
			return false;
		}
		else {
			email.style.borderColor = "transparent";
			email2.style.borderColor = "transparent";
			return true;
		}
	}

	else
	{
	alert("You have entered an invalid email address!");
	email2.style.borderColor = "red";
			email.style.borderColor = "red";
			return false;
	}
}

/**********************************************************CHECK ALL**********************************************************/

function CheckAll(){
	CheckId();
	CheckPassword();
	CheckMail();
  	window.location.href ="C:\Users\mia\Desktop\AdminPanelClients\register.html";
}
