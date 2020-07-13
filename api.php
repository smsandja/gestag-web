<?php
class JobsOpening {
    private $apikey;

 public function __construct(string $apikey)
 {
     $this->apiKey = $apikey;   
 }
 public function getForecast(string $jobList): ?array 
 {
    $curl = curl_init('https://recruit.zoho.com/recruit/private/json/JobOpenings/getRecords?authtoken=($this->apikey)&scope=recruitapi');
    $curl = curl_init('https://recruit.zoho.com/recruit/private/json/JobOpenings/getRecords?authtoken=ba4903c1db395db9a52ec3ac35b6df17&scope=recruitapi');
curl_setopt_array($curl, [
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_RETURNTRANSFER => true,
    //CURLOPT_TIMEOUT => 1
]);

$data = curl_exec($curl);
if ($data === false){
    var_dump(curl_error($curl));
} else { 
    //affichage du resultat
    if(curl_getinfo($curl, CURLINFO_HTTP_CODE) === 200){
        $results=[];
      $data = json_decode($data, true);
       foreach($data['list'] as $jobs)
      /* 
      echo'liste des offres'. $data['main'][''];
    
      echo '</pre>';
      */
    }
}
//fermeture de session
curl_close($curl);
 }

}

$testClientGetRecords = function () use ($client) {

    print_r($client->getRecords('JobOpenings', array(
        'selectColumns' => 'JobOpenings(Posting Title,Job Description,Salary)'
    )));

    print_r($client->getRecords('Clients', array(
        'selectColumns' => 'Clients(CLIENTID)'
    )));

    print_r($client->getRecords('Candidates', array(
        'selectColumns' => 'Candidates(First Name)'
    )));
};

$testClientGetRecordById = function () use ($client) {

    $jobList = $client->getRecords('JobOpenings', array(
        'selectColumns' => 'JobOpenings(JOBOPENINGID)'
    ));

    if (isset($jobList[0]['JOBOPENINGID'])) {
        print_r($client->getRecordById('JobOpenings', $jobList[0]['JOBOPENINGID']));
    }

    $clientList = $client->getRecords('Clients', array(
        'selectColumns' => 'Clients(CLIENTID)'
    ));

    if (isset($clientList[0]['CLIENTID'])) {
        print_r($client->getRecordById('Clients', $clientList[0]['CLIENTID']));
    }

    $candidateList = $client->getRecords('Candidates', array(
        'selectColumns' => 'Candidates(CANDIDATEID)'
    ));

    if (isset($candidateList[0]['CANDIDATEID'])) {
        print_r($client->getRecordById('Candidates', $candidateList[0]['CANDIDATEID']));
    }
};
 

