 <!DOCTYPE html>>
<html>
    <head>
        <title>ZOHO TEST</title>
    </head>
<body>
<?php 
//initialisation
$curl = curl_init('https://recruit.zoho.com/recruit/private/json/JobOpenings/getRecords?authtoken=ba4903c1db395db9a52ec3ac35b6df17&scope=recruitapi');
curl_setopt_array($curl, [
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_RETURNTRANSFER => true,
    //CURLOPT_TIMEOUT => 1
]);
//curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false );
//curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//execution
$data = curl_exec($curl);
if ($data === false){
    //retour d'erreur
    var_dump(curl_error($curl));
} else { 
    //affichage du resultat
    if(curl_getinfo($curl, CURLINFO_HTTP_CODE) === 200){
      $data = json_decode($data, true);
      //foreach($data['list'] as $jobs){
        //$results = 
       // print_r($data->getRecords('JobOpenings', array(
            // 'selectColumns' => 'JobOpenings(Posting Title,Job Description,Salary)')));
        
    //}  
    //echo $results;
      // pour avoir toutes les infos
         //echo '<pre>';
         //var_dump($data); 
         //echo '</pre>'; 
         
        // recupérer un enregistrement spécifique
         // var_dump($data['main']['temp']);

      /* 
      echo'liste des offres'. $data['main'][''];
    
      echo '</pre>';
      */
    }
}
//fermeture de session
curl_close($curl);
?>

</body>
</html>
