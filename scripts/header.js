window.addEventListener('scroll', event => {
	const { scrollTop } = event.target.scrollingElement;
	var header = document.getElementById('header1');
	var logo = document.getElementById('logo');
	if (scrollTop > 50){
		header.classList.add("sticky");
		logo.classList.add("sticky");
	}   
	else{
		header.classList.remove("sticky");
		logo.classList.remove("sticky");
	}
});