const auth_form = document.getElementById("auth_form");
auth_form.addEventListener("submit", async (event) => {
	event.preventDefault();

	let login = document.getElementById("login").value;
	let password = document.getElementById("password").value;
	// const output = document.getElementById('output');

	//
	let user = {
		login: login,
		password: password,
	};

	let response = await fetch("/BACK/PHP/auth.php", {
		method: "POST",
		headers: {
			"Content-Type": "application/json;charset=utf-8",
		},
		body: JSON.stringify(user),
	});

	//
	console.log(login + " " + password);
	// let response = await fetch('/BACK/PHP/auth.php');
	if (response.ok) {
		console.log(response.statusText);
		let json = await response.json();
		// console.log(json);
		if (json["result"] === "ERROR") {
			alert(`ERROR: ${json["message"]}`);
		} else if (json["result"] === "SUCCESS") {
			localStorage.setItem("login", json["login"]);
			let role = json["role"];
			if (role === "user") {
				alert("login success");
				window.location.href = "../HTML/user_dashboard.html";
			} else if (role === "admin") {
				alert("logged in as administrator");
				window.location.href = "../HTML/admin_dashboard.html";
			}
		}
		// let json = await response.json();
	} else {
		alert("Ошибка HTTP: " + response.status);
	}
});
