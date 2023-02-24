document.addEventListener("DOMContentLoaded", () => {
	let login = localStorage.getItem("login");
	let login_name = document.getElementById("user_header");
	login_name.innerText = ` - ${login}`;

	// let email = localStorage.getItem("email");
	// let email_name = document.getElementById("email");
	// email_name.innerText = ` - ${email}`;
	//
	// let name = localStorage.getItem("name");
	// let user_name = document.getElementById("user_name");
	// user_name.innerText = ` - ${name}`;
	//
	// let image = localStorage.getItem("user_image");
	// let user_image = document.getElementById("user_image");
	// user_image.innerText = ` - ${user_image}`;
});
