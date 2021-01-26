function changeImage(id) 
{ 
	var imagePath= document.getElementById(id). getAttribute('src');
	document.getElementById('change').setAttribute('src',imagePath);
	// body...
}