
$(document).ready(function(){

    console.log('ready');
	var cpt;

	function revertClass(cat, item){
        if(item.className == "hidden"){
            item.className = "show";
            cat.innerHTML = cat.innerHTML.replace('▸', '▾');
        }
        else{
            item.className = "hidden";
            cat.innerHTML = cat.innerHTML.replace('▾', '▸');   
        }
    }

    function addField(form){
        cpt++;
        console.log(cpt);
        form.innerHTML = form.innerHTML + 
        "<div><input type='text' placeholder='Nom Prénom' class='form-control'><button class='form-control' type='button' onclick='removeField(this)'>removeField</button></div>";
    }
    
    function removeField(field){
        field.parentNode;
    }


})