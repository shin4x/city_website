document.addEventListener("DOMContentLoaded", () => {
	let login = localStorage.getItem("login");
	let login_name_header = document.getElementById("user_header");
	login_name_header.innerText = ` - ${login}`;
});
