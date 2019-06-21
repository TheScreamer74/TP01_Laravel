
console.log('ready');
var cptperson = 0;
var cptnote = 0



function revertClass(cat, item){
    if(item.className == "hidden question"){
        item.className = "show question";
        item.slideDown('slow');
        cat.innerHTML = cat.innerHTML.replace('▸', '▾');
    }
    else{
        item.className = "hidden question";
        item.slideUp('slow');
        cat.innerHTML = cat.innerHTML.replace('▾', '▸');   
    }
}

function addField(form){

    if(form.parentNode.parentNode.id === "person"){
        node = document.createElement('span');
        node.innerHTML = "<div class='form-group' id='personne" + cptperson +"'>" + "<label class='col-lg-1 control-label'>Personne " + (cptperson+1) + "</label>" + "<div class='col-lg-10'>" + "<input type='text' class='form-control' name='personne[" + cptperson + "]' placeholder='Nom Prénom' Required style='margin-top: 5px;'>" + "</div></div>";
        form.parentNode.appendChild(node);
        cptperson++;
        
        if(cptperson === 1){
            $('#btnpersonsuppr').prop('disabled', false);
            $('#btnpersonsuppr').prop('hidden', false);
        }
    }
    else{

        node = document.createElement('span');
        node.innerHTML = "<div class='form-group' id='notes" + cptnote +"'>" + "<label class='col-lg-1 control-label'>Note importante " + (cptnote+1) + "</label>" + "<div class='col-lg-10'>" + "<input type='text' class='form-control' name='notes[" + cptnote + "]' placeholder='Note importante' Required style='margin-top: 5px;'>" + "</div></div>";
        form.parentNode.appendChild(node);
        cptnote++;
        
        if(cptnote === 1){
            $('#btnnotesuppr').prop('disabled', false);
            $('#btnnotesuppr').prop('hidden', false);
        }

    }
}

function removeField(form){

    if (form === "personne") {
        var name = form + "" + (cptperson-1);
        var node = document.getElementById(name);
        node.remove();
        cptperson--;

        if(cptperson === 0){
            $('#btnpersonsuppr').attr('disabled', true);
            $('#btnpersonsuppr').attr('hidden', true);
        }
    }else{
        var name = form + "" + (cptnote-1);
        var node = document.getElementById(name);
        node.remove();
        cptnote--;

        if(cptnote === 0){
            $('#btnnotesuppr').attr('disabled', true);
            $('#btnnotesuppr').attr('hidden', true);
        }
    }

}