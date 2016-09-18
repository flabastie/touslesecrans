// Vérification de la saisie de l'utilisateur
function verif_F_inscri(){

    var nom = trim(document.forms["F_inscri"].nom.value);
    var prenom = trim(document.forms["F_inscri"].prenom.value);
    var adresse = trim(document.forms["F_inscri"].adresse.value);
    var cp = trim(document.forms["F_inscri"].cp.value);
    var ville = trim(document.forms["F_inscri"].ville.value);
    var pseudo = trim(document.forms["F_inscri"].pseudo.value);
    var mdp = trim(document.forms["F_inscri"].mdp.value);
    var cmdp = trim(document.forms["F_inscri"].cmdp.value);
    var mail = trim(document.forms["F_inscri"].mail.value);
    
    // Appel de la fonction qui enlève les messages d'erreurs
    efface_ERR_msg();
    
    // Dans cette version, on ajoute directement au document le commentaire d'erreur
    var msg_ERR_nom = "requis"; // Message d'erreur qui sera affiché
    var objControle;            // Objet Node qui va être contrôlé
    
    if (nom == ""){
        // On récupère l'objet contenant la zone de saisie du nom
        objControle = document.forms["F_inscri"].nom;
        // On appel la fonction qui va ajouter un noeud erreur
        new_ERR_node(objControle, msg_ERR_nom);
    }
    if (prenom == ""){
        objControle = document.forms["F_inscri"].prenom;
        new_ERR_node(objControle, msg_ERR_nom);
    }
    if (adresse == ""){
        objControle = document.forms["F_inscri"].adresse;
        new_ERR_node(objControle, msg_ERR_nom);
    }
    if (cp == ""){
        objControle = document.forms["F_inscri"].cp;
        new_ERR_node(objControle, msg_ERR_nom);
    }
    if (ville == ""){
        objControle = document.forms["F_inscri"].ville;
        new_ERR_node(objControle, msg_ERR_nom);
    }
    if (pseudo == ""){
        objControle = document.forms["F_inscri"].pseudo;
        new_ERR_node(objControle, msg_ERR_nom);
    }
    if (mdp == ""){
        objControle = document.forms["F_inscri"].mdp;
        new_ERR_node(objControle, msg_ERR_nom);
    }
    if (cmdp == ""){
        objControle = document.forms["F_inscri"].cmdp;
        new_ERR_node(objControle, msg_ERR_nom);
    }
    if (mail == ""){
        objControle = document.forms["F_inscri"].mail;
        new_ERR_node(objControle, msg_ERR_nom);
    }
    if (controle_mail(mail)){
        objControle = document.forms["F_inscri"].mail;
        new_ERR_node(objControle, "Mail incorrect");
    }
    
    // Utilisation d'AJAX pour le contrôle du pseudo
    test_pseudo(pseudo);
} 
// Fonction qui élimine les espaces dans une chaîne de caractères
function trim(chaine){
    chaine = chaine.replace(/(^\s*)|(\s*$)/g, "");
    return chaine;
}
// Fonction qui crée un nouveau noeud d'erreur
function new_ERR_node(noeud, msg){
    // On récupère le noeud parent pour y ajouter le commentaire d'erreur ensuite
    parent = noeud.parentNode;
    // On crée dans le parent un nouveau noeud de type erreur
    erreur = parent.appendChild(document.createElement("erreur"));
    // On y ajoute un attribut pour y appliquer le style de la classe erreur
    erreur.setAttribute("class","erreur");
    // On crée un noeud de type texte pour y mettre le commentaire "requis"
    erreur.appendChild(document.createTextNode(msg));
}
// Fonction qui efface les messages d'erreurs pour éviter leur répétition
function efface_ERR_msg(){
    var liste_ERR = document.getElementsByTagName("erreur");
    var node2sup;
    var parent;
    for (var i = (liste_ERR.length-1); i >= 0; i=i-1){
        node2sup = liste_ERR[i];
        parent = node2sup.parentNode;
        parent.removeChild(node2sup);
    }
}
// Fonction qui contrôle la validité d'un email
function controle_mail(mail){
    if(mail.search(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9]+)*$/) == -1){
        return true;
    }else{
        return false;
    }
}
// Fonction de test du pseudo via AJAX
function test_pseudo(chaine){
    var req = null;
    if(window.XMLHttpRequest)  req = new XMLHttpRequest();
    else
      if (window.ActiveXObject)  req = new ActiveXObject(Microsoft.XMLHTTP);
    
    //req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");  
    req.onreadystatechange = function()
    {
        if(req.readyState == 4)
        {
            // On va parcourir le fichier reçu et extraire les pseudos
            var doc = req.responseXML;
            var element = doc.getElementsByTagName('pseudo');
            for (var i = 0; i < element.length; i++){
                // On teste si le pseudo correspond à celui qui a été saisi
                if (chaine == element[i].firstChild.data){
                    objControle = document.forms["F_inscri"].pseudo;
                    new_ERR_node(objControle, " Pseudo indisponible ! ");
                }
            }
        }
    };
    req.open("GET", "utilisateurs.xml", true);
    req.send(null);
}
