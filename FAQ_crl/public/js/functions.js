
console.log('ready');
var cpt = 0;



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
    node = document.createElement('span');
    node.innerHTML = "<div id='field" + cpt + "'><input type='text' placeholder='Nom Prénom' class='form-control'><button class='form-control' type='button' onclick='removeField(this)'>removeField</button></div>";
    
    form.insertBefore(node, document.getElementById("button submit"));

}

function removeField(field){
    field.parentNode.remove();
}