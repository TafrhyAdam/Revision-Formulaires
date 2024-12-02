<?php

//question 1
echo "<br>";
$employes = ["employe 1"=>["nom" => "Lilie", "poste" => "Développeur", "salaire" => 4],
    "employe 2"=>["nom" => "Adam", "poste" => "Chef de projet", "salaire" => 6],
    "employe 3"=>["nom" => "Alice", "poste" => "Designer", "salaire" => 4],
    "employe 4"=>["nom" => "Douaa", "poste" => "Administrateur système", "salaire" => 10],
    "employe 5"=>["nom" => "Nina","poste" => "Ressources humaines", "salaire" => 5]];


function moyenneSalaire($employes) {
    $somme = 0;
    foreach($employes as $k=>$v) {
        $somme += $v["salaire"];
    }


    return $somme/5;
}


echo "La moyenne des salaires: ",moyenneSalaire($employes);


//question 2
echo "<br>";

if($_SERVER["REQUEST_METHOD"]= "POST"){
    $nom = $_POST["nom"];
    

    foreach($employes as $k=>$v){
        if($v["nom"]==$nom){
            echo "<br>Nom: ", $v["nom"], "<br> Poste: ", $v["poste"], "<br>Salaire: ", $v["salaire"];
        }
    }
}


//question 3
echo "<br>";
$utilisateurs = ["tafrhyadam0@gmail.com"=> "adam"];

if($_SERVER["REQUEST_METHOD"]= "POST"){
    $email = $_POST["email"];
    $mdp = $_POST["mdp"];

    if(array_key_exists($email, $utilisateurs) && $utilisateurs["email"]= $mdp){
        echo "<br>Informations correctes";

    }
    else{
        echo "<br>Utilisateur saisi n;exsite pas ou informations incorrectes";

    }
}


//question 4 
echo "<br>";

$produits = ["produit 1"=> ["nom" => "Apple watch series 10" , "prix" => 2],
"produit 2"=> ["nom" => "Airpods 4" , "prix" => 1],
"produit 3"=> ["nom" => "Iphone 16" , "prix" => 3]];

$panier=[];

if($_SERVER["REQUEST_METHOD"]= "POST"){
    $produit = $_POST['produit'];
    $quantite = $_POST['quantite'];

    foreach($produits as $k=>$v){
        if($v['nom']== $produit){
            $panier[$k] = ["nom"=>$v["nom"],
            "prix"=> $v["prix"],
            "quantite"=> $quantite];
        }
    }

    echo "Total panier: ";
    $total = 0;
    foreach($panier as $v){
        $total += $v['prix']*$v['quantite'];
    }
    echo $total;
}
//question 5

echo "<br>"; 
$commentaires = [];
if($_SERVER["REQUEST_METHOD"]= "POST"){
    $commentaire= $_POST["commentaire"];

    $commentaires[date('d-m-Y H:i:s')]= $commentaire;
}

foreach($commentaires as $k=>$v){
    echo $k, "=>", $v;
}

//question 6
echo "<br>";
$villes = [
    "Paris" => 18,
    "Casablanca" => 30,
    "Londres" => 15,
    "Rabat" => 28,
    "Marrakech" => 35
];

$max_temp = 0;
$max_ville = "";

foreach($villes as $k=>$v){
    if($v>$max_temp){
        $max_temp=$v;
        $max_ville = $k;
    }
}

echo "La ville avec la plus haute temperature est: ", $max_ville, " avec une temp de: ", $max_temp, " degres";

//question 7


if($_SERVER["REQUEST_METHOD"]== "POST"){
if($_FILES["fichier"]==true){
$fichier = $_FILES["fichier"];

$tmp= fopen($fichier['tmp_name'], "r");


$pr =[];
$titres= fgetcsv($tmp);

while (($ligne = fgetcsv($tmp)) !== FALSE){
    $pr[]= [ 
        'nom' =>$ligne[0],
        'prix'=> $ligne[1],
        'quantite'=> $ligne[2]
    ];
}

echo "<h2>Liste des produits</h2><table border='1'>";

echo "<tr><th>Nom</th><th>Prix</th><th>Quantité</th></tr>";

foreach($pr as $v) {
    echo "<tr>";
    echo "<td>", $v['nom'], "</td>";
    echo "<td>",$v['prix'], "</td>";
    echo "<td>",$v['quantite'], "</td>";
    echo "</tr>";
}

echo "</table>";
fclose($tmp);}
else{echo "<br>Fichier non trouve";}
}


//question 8

if($_SERVER["REQUEST_METHOD"]== "POST"){
    $pro = [
        "Apple Watch" => 2,
        "Airpods" => 1,
        "iPhone 16" => 3,
        "Macbook Pro" => 5
    ];

    $prds=  $_POST['prds'];

    $s =0;

    echo "<br> Les produits selectionnes sont: <br>";
    echo "<ul>";
    foreach($prds as $v){
        echo "<li>", $v, "</li>";
    }
    echo "</ul>";

    foreach($prds as $v){
        $s += $pro[$v];
    }

    echo "Le total des produits est: ", $s;

}
//question 9



$etudiants = [
    "Adam" => ["maths" => 20, "francais" => 20,"histoire" => 20],
    "Lilie" => ["maths" => 18, "francais" => 14, "histoire" => 13],
    "Alice" => ["maths" => 10, "francais" => 8,"histoire" => 12]
];

foreach($etudiants as $k=>$v){
    $som = 0;
    foreach($v as $key=>$val){
        $som += $val;
    }

    echo "<br>La moyenne de ", $k, " est: ", $som/3;
}

//question 10

$users = ["adam"=> "adam@gmail.com", 
            "douaa"=> "douaa@gmail.com"];

$boutton = $_POST["envoyer"];
if($boutton == "ajouter"){
    $pseudo= $_POST["pseudo_nouveau"];
    $mail = $POST["mail_nouveau"];

    if(array_key_exists($pseudo,$users)){
        echo "<br>L'utilisateur existe deja";
    }
    else{
        $users[$pseudo]= $mail;
        echo "<br> Utilisateur cree";
    }
}
elseif($boutton == "modifier"){
    $pseudo_ancien= $_POST["pseudo_ancien"];
    $pseudo_nouveau = $_POST["pseudo_modifier"];
    $mail_nouveau = $_POST["mail_modifier"];


    if(array_key_exists($pseudo_ancien,$users)){
        foreach($users as $k=>$v){
            if($k == $pseudo_ancien){
                unset($users[$k]);
                $users[$pseudo_nouveau] = $mail_nouveau;
            }
        }
        echo "<br>Utilisateur modifie";
    }
    else{
        echo "<br>L'utilisateur n'existe pas";
    }
}
elseif($boutton == "supprimer"){
    $pseudo_supprimer = $_POST["pseudo_supprimer"];
    if(array_key_exists($pseudo_supprimer,$users)){
        unset($users[$pseudo_supprimer]);
        echo "<br>Utilisateur supprime";
    }
    else{
        echo "<br>L'utilisateur n'existe pas";
    }
}










