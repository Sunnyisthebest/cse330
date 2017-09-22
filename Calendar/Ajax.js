function loginAjax(event){
	var user_name = document.getElementById("user_name").value; // Get the username from the form
	var pwd = document.getElementById("pwd").value; // Get the password from the form
	
	console.log (username);
	
	$.ajax ({
		url: 'login.php',
		type: 'post',
		data: {
			'user_name': user_name,
			'pwd': pwd
		},
		success: function (responseData) {
			console.log(responseData);
			if(responseData["status"] == true){
				alert("You've registered!");
				
			}
		}
	});
 
	// Make a URL-encoded string for passing POST data:
	//var dataString = "username=" + encodeURIComponent(username) + "&password=" + encodeURIComponent(password);
 	/*
	var xmlHttp = new XMLHttpRequest(); // Initialize our XMLHttpRequest instance
	xmlHttp.open("POST", "login_ajax.php", true); // Starting a POST request (NEVER send passwords as GET variables!!!)
	//xmlHttp.setRequestHeader("Content-Type", "application/json"); // It's easy to forget this line for POST requests
	xmlHttp.addEventListener("load", function(event){
		var jsonData = JSON.parse(event.target.responseText); // parse the JSON into a JavaScript object
		if(jsonData.success){  // in PHP, this was the "success" key in the associative array; in JavaScript, it's the .success property of jsonData
			alert("You've been Logged In!");
		}else{
			alert("You were not logged in.  "+jsonData.message);
		}
	}, false); // Bind the callback to the load event
	xmlHttp.send(dataString); // Send the data
	*/
}
function logoutAjax(event){
	$.ajax ({
		url: 'log_out.php',
		type: 'post',
		success: function (responseData) {
			
			console.log(responseData);
			if(responseData["status"] == true){
				alert("You've Logged out!");
			}
		}
		});
}



function registerAjax(event){
	var user_name = document.getElementById("user_name").value; // Get the username from the form
	var pwd = document.getElementById("pwd").value; // Get the password from the form
	// Make a URL-encoded string for passing POST data:
	$.ajax ({
		url: 'registerpro.php',
		type: 'post',
		data: {
			'user_name': user_name,
			'pwd': pwd
		},
		success: function (responseData) {
			
			console.log(responseData);
			if(responseData["status"] == true){
				alert("You've registered!");
			}
		}
	});
	/* var dataString = "username=" + encodeURIComponent(username) + "&password=" + encodeURIComponent(password);
 
	var xmlHttp = new XMLHttpRequest(); // Initialize our XMLHttpRequest instance
	xmlHttp.open("POST", "register_ajax.php", true); // Starting a POST request (NEVER send passwords as GET variables!!!)
	xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // It's easy to forget this line for POST requests
	xmlHttp.addEventListener("load", function(event){
		var jsonData = JSON.parse(event.target.responseText); // parse the JSON into a JavaScript object
		if(jsonData.success){  // in PHP, this was the "success" key in the associative array; in JavaScript, it's the .success property of jsonData
			alert("You've been Logged In!");
		}else{
			alert("You were not logged in.  "+jsonData.message);
		}
	}, false); // Bind the callback to the load event
	xmlHttp.send(dataString); // Send the data */
}
 
document.getElementById("signin_btn").addEventListener("click", loginAjax, false); // Bind the AJAX call to button click
document.getElementById("register_btn").addEventListener("click", registerAjax, false); // Bind the AJAX call to button click
document.getElementById("signout_btn").addEventListener("click", logoutAjax, false); // Bind the AJAX call to button click