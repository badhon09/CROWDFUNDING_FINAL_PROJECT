function f1(){
	var fullname = document.getElementById('fullname').value;
	var password = document.getElementById('password').value;

	var error = false;
	if(fullname < 8){
		document.getElementById('nameMsg').innerHTML = "Username Can't left empty!";
		error = true;
	}else if(password == ""){
		document.getElementById('passMsg').innerHTML = "Password Can't left empty!";
		error =true;
	}

	if(error){
		return false;
	}else{
		return true;
	}
	
}

var f2 = function(){
	var username = document.getElementById('username').value;
	if(username != ''){
		document.getElementById('userMsg').innerHTML = "";
	}
}
