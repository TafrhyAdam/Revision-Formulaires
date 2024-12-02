<?php
//question 1
echo "<br>";
$etudiant = ["nom"=> "John", "prenom"=> "Johnny", "matricule"=>"1999"];

foreach($etudiant as $k=>$v){
    echo $k, " : ", $v, "<br>";
}
//question 2
echo "<br>";
$etudiant["note"]= "20";

//question 3
echo "<br>";
$produits = ["produit 1"=> ["nom" => "Apple watch series 10" , "prix" => "2$"],
"produit 2"=> ["nom" => "Airpods 4" , "prix" => "1$"],
"produit 3"=> ["nom" => "Iphone 16" , "prix" => "3$"]];

foreach($produits as $k=>$v){
    foreach($v as $key=>$val){
        echo $key, " : ", $val, " ";
    }
    echo "<br>";
}

//question 4
echo "<br>";

$scores= ["etudiant 1"=> 20,
"etudiant 2"=> 19,
"etudiant 3"=> 18, 
"etudiant 4"=> 19,
"etudiant 5"=> 20];
$somme= 0;
foreach($scores as $k=>$val){
    $somme+= $val;
}
echo "Moyenne des scores: ", $somme/5;

//question 5
echo "<br>";

$pays = [
    "Chine" => 1444216107,
    "Inde" => 1393409038,
    "États-Unis" => 332915073,
    "Russie" => 145912025
    
];



$tab= [];
while(count($pays)>0){
    $max_pop = 0;
    $max_pays="";
    foreach($pays as $k=>$v){
        if($pays[$k]>$max_pop){
            $max_pop = $pays[$k];
            $max_pays = $k;
      }
    }
    $tab[$max_pays]= $max_pop;
    unset($pays[$max_pays]);


}

$pays =  $tab;

foreach($pays as $k=>$v){
    echo"<br>";    
    echo $k, " : ", $v;
}

//question 6 et 7
echo "<br>";

if($_SERVER['REQUEST_METHOD']= 'POST'){
    $nom= $_POST['nom'];
    $age= $_POST['age'];
    settype($age, "integer");
    if(gettype($age) == "integer" && $age>0){
        echo "<br>Bienvenue, ", $nom, ", vous avez ", $age," ans.";
    }
    else{
        echo "Entrez un age valide";
    }

// question 8
echo "<br>";
if($_SERVER['REQUEST_METHOD']= 'POST'){
    $couleur = $_POST['couleur'];

    echo "<br>Votre couleur preferee est, ", $couleur;

}
    
//question 9
echo "<br>";

if($_SERVER['REQUEST_METHOD']= 'GET'){
    $nombres = $_GET['nombres'];

    echo "La somme des deux nombres est, ", $nombres[0]+$nombres[1];
}

//question 10 
echo "<br>";

if($_SERVER['REQUEST_METHOD']= 'POST'){
    $type_compte = $_POST['type_compte'];

    if($type_compte[0] == 'Administrateur'){
        echo "<br>Bienvenue administrateur";
    }
    else{
        echo"<br>Bienvenue, simple utilisateur";
    }
}

    
}
