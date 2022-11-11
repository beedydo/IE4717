function checkname() {
    var name = document.getElementById("name");
    var namecheck = /^[a-zA-Z\s]+$/;
    if (!namecheck.test(name.value)) {
        alert("The name you entered (" + name.value +
            ") is not in the correct form. \n" +
            "The correct form contains alphabet characters and character spaces.");
        name.focus();
		name.select();
        return false;
    }
}

function checkemail() {
    var email = document.getElementById("email");
    var emailcheck = /^[\w.-]+@([\w]+\.){1,3}[\w]{2,3}$/;
    if (!emailcheck.test(email.value)) {
        alert("The email you entered (" + email.value +
            ") is not in the correct form. \n" +
            "The correct form contains a user name part follows by '@' and a domain name part. \n"+
			"The user name contains word characters including hyphen ('-') and period ('.'). \n"+
			"The domain name contains two to four address extensions. Each extension is string of word characters and separated from the others by a period ('.'). The last extension must have two to three characters.");
        email.focus();
        email.select();
        return false;
    }
}
