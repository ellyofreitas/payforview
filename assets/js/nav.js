var open = false;
function handler(id){
	wrapper = document.getElementById(id);
	if(!open){
		classie.add(wrapper, 'opened-nav');
	}
	else{
		classie.remove(wrapper, 'opened-nav');
	}
	open = !open;
}
function closeWrapper(){
	classie.remove(wrapper, 'opened-nav');
}