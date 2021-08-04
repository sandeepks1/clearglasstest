
<!DOCTYPE html>
<html lang="en">
<head>
  <title>clear glass</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
  <script>
         $('select').selectpicker();
  function  buildapi()
  {
      clientid = Array.from(document.getElementById("clients").options).filter(option => option.selected).map(option => option.value);
      costtypesid = Array.from(document.getElementById("cost_types").options).filter(option => option.selected).map(option => option.value);
      projectid = Array.from(document.getElementById("projects").options).filter(option => option.selected).map(option => option.value);
      console.log(clientid);
      console.log(costtypesid);
      console.log(projectid);
      clienturl = "";
      costtypesidurl= "";
      projectidurl= "";

      if (clientid.length != 0)
      clienturl = "client_id[]="+clientid.join("&client_id[]=");

      if (costtypesid.length != 0)
      {
        if(clienturl=="")
        costtypesidurl = "cost_type_id[]="+costtypesid.join("&cost_type_id[]=");
        else
        costtypesidurl = "&cost_type_id[]="+costtypesid.join("&cost_type_id[]=");
      }
      

      if (projectid.length != 0)
      {
        if(clienturl==""&&costtypesidurl=="")
        projectidurl = "project_id[]="+projectid.join("&project_id[]=");
        else
        projectidurl = "&project_id[]="+projectid.join("&project_id[]=");
      }
      
      
      //alert(clienturl+costtypesidurl+projectidurl);
      window.open("/explorer?"+clienturl+costtypesidurl+projectidurl);

  }
  </script>
</head>
<body>

<div class="container">
  <div class="jumbotron">
    <h1>Acme Studio</h1>      
  </div>
   
</div>
<div class ="container">

<?php 
 $clients = DB::table('clients')->get();
 $cost_types = DB::table('cost_types')->get();
 $projects = DB::table('projects')->get();
?>
  <div class="row">
    <div class="col-sm-4">
        <h1>Clients</h1>
        <select class="selectpicker" id="clients" multiple data-live-search="true">
        @foreach ($clients as $client)
            <option value="{{ $client->id }}">{{ $client->name }}</option>
        @endforeach
        </select>
    </div>

    <div class="col-sm-4">
        <h1>Cost types</h1>
        <select class="selectpicker" id="cost_types" multiple data-live-search="true">
        @foreach ($cost_types as $cost_type)
            <option value="{{ $cost_type->id }}">{{ $cost_type->name }}</option>
        @endforeach
        </select>
    </div>

    <div class="col-sm-4">
        <h1>Projects</h1>
        <select class="selectpicker" id="projects" multiple data-live-search="true">
        @foreach ($projects as $project)
            <option value="{{ $project->id }}" >{{ $project->title }}</option>
        @endforeach
        </select>
    </div>
  
  </div>
  
  <div class="row" style="margin-top:100px;">
  <div class="col-sm-4"></div>    
  <div class="col-sm-4"><button type="button" onclick ="buildapi()" class="btn btn-primary btn-lg">Get API</button></div>
  <div class="col-sm-4"></div>
  </div>

</div>    

</body>
</html>
