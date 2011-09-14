<?php
ini_set('display_errors',1);
error_reporting(E_ALL|E_STRICT);

$proxyURL = 'http://www.countrybrookdesign.com/api/soap/?wsdl';
$apiUserName = 'channeladvisor';
$apiPassword = 'advisor';

// $proxyURL = 'http://caninenomad.com/magento/api/soap/?wsdl';
// $apiUserName = 'ocm_api';
// $apiPassword = 'letmein';

try {
echo "Setting up proxy", "\n";
$proxy = new SoapClient($proxyURL);
} catch (Exception $e) {
echo "Error in setting up proxy", "\n";
echo $e->getMessage(), "\n";
}
try {
echo "Setting up session", "\n";
$sessionId = $proxy->login($apiUserName, $apiPassword);
} catch (Exception $e) {
echo "Error in setting up sessionid", "\n";
echo $e->getMessage(), "\n";
}
$all_categories = $proxy->call($sessionId, 'category.tree');
print_r($all_categories['children'][0]['children']);
?>