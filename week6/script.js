button = function toClick(){
	document.getElementById("tasks").textDecoration="line-through";
}
document.getElementById("tasks").addEventListener('click',toClick);