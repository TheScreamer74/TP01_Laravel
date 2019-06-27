
console.log('ready');
var cptperson = 0;
var cptnote = 0;


function incrementNotes(){
    cptnote++;
}

function incrementPeople(){

    cptperson++;
}

function revertClass(cat, item){
    if(item.className == "hidden question"){
        item.className = "show question";
        cat.innerHTML = cat.innerHTML.replace('▸', '▾');
    }
    else{
        item.className = "hidden question";
        cat.innerHTML = cat.innerHTML.replace('▾', '▸');   
    }
}

function addField(form){

    if(form.parentNode.parentNode.id === "person"){
        node = document.createElement('span');
        node.innerHTML =  "<div class='form-group flexColumn' id='personne" + cptperson +"'>" + "<label class='col-lg-2'>Personne " + (cptperson+1) + " : </label>" + "<div class='col-lg-10'>" + "<label class='col-lg-1 control-label'>Nom: </label>" + "<input type='text' class='form-control' name='personne[" + cptperson + "][name] placeholder='Nom Prénom' Required style='margin-top: 5px;'>" + "</div>" + "<div class='col-lg-10'>" + "<label class='col-lg-1 control-label'>Description: </label>" + "<textarea class='form-control' name='personne[" + cptperson + "][desc] placeholder='Description' Required style='margin-top: 5px;'></textarea>" + "</div></div>";
        form.parentNode.appendChild(node);
        cptperson++;
        
        if(cptperson === 1){
            $('#btnpersonsuppr').prop('disabled', false);
            $('#btnpersonsuppr').prop('hidden', false);
        }
    }
    else{

        node = document.createElement('span');
        node.innerHTML = "<div class='form-group flexColumn' id='notes" + cptnote +"'>" + "<label class='col-lg-2'>Note importante " + (cptnote+1) + " : </label>" + "<div class='col-lg-10'>" + "<label class='col-lg-1 control-label'>Titre: </label>" + "<input type='text' class='form-control' name='notes[" + cptnote + "][titre]' placeholder='Note importante' Required style='margin-top: 5px;'>" + "</div>" + "<div class='col-lg-10'>" + "<label class='col-lg-1 control-label'>Description: </label>" + "<textarea class='form-control' name='notes[" + cptnote + "][desc] placeholder='Description' Required style='margin-top: 5px;'></textarea>" + "</div></div>";
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