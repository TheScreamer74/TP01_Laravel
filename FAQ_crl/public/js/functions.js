
console.log('ready');
var cpt = 0;



function revertClass(cat, item){
    if(item.className == "hidden questions"){
        item.className = "show questions";
        cat.innerHTML = cat.innerHTML.replace('▸', '▾');
    }
    else{
        item.className = "hidden questions";
        cat.innerHTML = cat.innerHTML.replace('▾', '▸');   
    }
}

function addField(form){

    node = document.createElement('span');
    node.innerHTML = "<div class='form-group' id='personne" + cpt +"'>" + "<label class='col-lg-1 control-label'>Personne " + (cpt+1) + "</label>" + "<div class='col-lg-10'>" + "<input type='text' class='form-control' name='personne[" + cpt + "]' placeholder='Nom Prénom' Required>" + "</div></div>";
    form.parentNode.appendChild(node);
    cpt++;
    
    if(cpt === 1){
        $('#btnsuppr').prop('disabled', false);
        $('#btnsuppr').prop('hidden', false);
    }

}

function removeField(){


    var name = 'personne' + (cpt-1);
    var node = document.getElementById(name);
    console.log(node);
    node.remove();
    cpt--;

    if(cpt === 0){
        $('#btnsuppr').attr('disabled', true);
        $('#btnsuppr').attr('hidden', true);
    }

}