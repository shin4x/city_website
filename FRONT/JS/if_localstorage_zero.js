if (localStorage.length !== 0) {
	let delete_button = document.getElementById("login_or_signup");
	delete_button.classList.remove("box", "header-button");
}

if (localStorage.length === 0) {
	let delete_button = document.getElementById("user_page");
	delete_button.classList.remove("box", "header-button");
}
