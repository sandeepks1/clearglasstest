<?php

if(isset($_SERVER['QUERY_STRING']))
{

$query  = explode('&', $_SERVER['QUERY_STRING']);
$params = array();

foreach( $query as $param )
{
  if (strpos($param, '=') === false) $param += '=';

  list($name, $value) = explode('=', $param, 2);
  $params[urldecode($name)][] = urldecode($value);
}

echo "<pre>";
print_r($params);
echo "</pre>";
echo "<h1>Response</h1>";
$clients = DB::table('clients')->join('projects', 'clients.id', '=', 'projects.client_id')->join('cost_types', 'clients.id', '=', 'cost_types.parent_id')->get();
$cost_types = DB::table('cost_types')->get();
$projects = DB::table('projects')->get();


$out = array();
foreach ($clients as $client)
{
  //echo $client->id;
  $out[] =  $client;
}

echo "<pre>";
echo json_encode($out, JSON_PRETTY_PRINT);
echo "</pre>";  
// Display the output


}
else{
 $clients = DB::table('clients')->join('projects', 'clients.id', '=', 'projects.client_id')->join('cost_types', 'clients.id', '=', 'cost_types.parent_id')->get();
 $cost_types = DB::table('cost_types')->get();
 $projects = DB::table('projects')->get();

 $out = array();
 foreach ($clients as $client)
 {
   //echo $client->id;
   $out[] =  $client;
 }

 echo "<pre>";
 echo json_encode($out, JSON_PRETTY_PRINT);
echo "</pre>";  
// Display the output
  
}
?>