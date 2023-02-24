let exit = () => {
	localStorage.clear();
	window.location.href("../HTML/index.html");
};

let end_session = document.getElementById("end_session");

end_session.addEventListener("click", exit);
