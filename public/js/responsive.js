window.onload = function (){
	document.getElementById("header__icon").addEventListener("click", function(event){
		event.preventDefault()
		document.body.classList.toggle("with-sidebar")
	})
}