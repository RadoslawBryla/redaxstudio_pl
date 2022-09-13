function pushError(box, txt){
	box.innerHTML = txt;
}

	
	
function validate(e) {
	e.preventDefault();
	
    var textBox = document.getElementById('validate_error');
    var names = document.querySelector("input[name=name]");
    var mail = document.querySelector("input[name=mail]");
    var tele = document.querySelector("input[name=tel]");
    var topic = document.querySelector("input[name=topic]");
    var desc = document.querySelector("textarea[name=desc]");
	
	let formErrors = [];
	const regNoNumber = /^[a-zA-Z-zżźćńółęąśŻŹĆĄŚĘŁÓŃ]+$/;
	console.log(name.value);
	if (names.value.replace(/ |	/ig, '').length <= 3 || !regNoNumber.test(names.value.replace(/ /ig, ''))) {
        pushError(textBox, "Nazwa powinna zawierać minimum 4 znaki oraz składać się tylko z liter i spacji.");
		return 0;	
    }
	
	const reg = /^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*(\.\w{2,})+$/;
    if (!reg.test(mail.value)) {
        pushError(textBox, "Wypełnij poprawnie pole z emailem.");
		return 0;
    }
	
	if (topic.value.replace(/ |	/ig, '').length < 10 || !regNoNumber.test(topic.value.replace(/ /ig, ''))) {
        pushError(textBox, "Temat powinnien zawierać minimum 10 znaków oraz składać się tylko z liter i spacji.");
		return 0;
    }
	const regDesc = / |\n|\,|\.|\?|\!|\(|\)|\-|\:/ig;
	if (desc.value.replace(/ |	/ig, '').length < 30 || !regNoNumber.test(desc.value.replace(/ |\n|\,|\.|\?|\!|\(|\)|\-|\:/ig, ''))) {
        pushError(textBox, "Opis powinien zawierać minimum 30 znaków oraz składać się tylko z liter, spacji oraz znaków: ',.?!'");
		return 0;
    }
	
	// wszystko git, mozna przesyłac do serwera
	pushError(textBox, "");
	e.preventDefault();  
    
	let xhr = new XMLHttpRequest();
    let url = "./sites/mailer.php";
    xhr.open("POST", url, true);
	xhr.setRequestHeader("Content-Type", "application/json");
	xhr.onreadystatechange = function () {
		if (xhr.readyState === 4 && xhr.status === 200) {
			textBox.innerHTML = this.responseText;
		}
    };
	var data = JSON.stringify({ 
		"name": names.value, 
		"email": mail.value,
		"topic": topic.value,
		"desc": desc.value,
		"tele": tele.value
	});
	xhr.send(data); 
}
window.onload=function(){
var button = document.getElementById('contact__form');
//button.addEventListener('submit', validate);
	
button.addEventListener('submit', validate)
}


