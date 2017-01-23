window.onload = function(){
	var input = document.getElementsByTagName('input');
	var pas = document.getElementById('password');
	if (input[1].checked == true ){
		pas.style.display = 'none';
	}
	if (input[2].checked == true){
		pas.style.display = 'block';
	}
	input[1].onclick = function(){
		pas.style.display = 'none';
	}
	input[2].onclick = function(){
		pas.style.display = 'block';
	}
}