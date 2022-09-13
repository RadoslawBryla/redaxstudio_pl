window.addEventListener('scroll', event => {
	const { scrollTop } = event.target.scrollingElement;
	var header = document.getElementById('header1');
	if (scrollTop > 50){
		header.classList.add("sticky");
	}   
	else{
		header.classList.remove("sticky");
	}
});