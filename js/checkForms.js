function checkForm(){
    var estValide = true;
    var inputsForm = $("form .form-group input[type!='checkbox']")
    inputsForm.css("background-color","white").css("color","black");
    var i = 0;
    inputsForm.each(function(){             //On parcourt tous les formulaires
        if($(this).val() == ""){
            $(this).css("background-color","red").css("color","white");
            estValide = false;
            i++;                            //Nombre de inputs vides 
        }     
});
    if (i > 0)
    {
        alert("Des champs n'ont pas été remplis !")
    }
    else{
        if($("#id_mdp").val() != $("#id_confmdp").val()){
            alert("Le mot de passe saisie ne correspond pas");
            $("#id_mdp,#id_confmdp ").css("background-color","red");
            estValide = false;
        } 
    }
    return estValide; // Si false le formulaire ne sera pas commit
}