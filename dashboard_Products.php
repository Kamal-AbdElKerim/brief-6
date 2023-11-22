<?php 
 include 'layout/coon.php';



$user_result = $conn->query("SELECT * FROM `categorie`");
$userData = $user_result->fetchAll(PDO::FETCH_ASSOC);


if (isset($_POST["submit"])) {

  $etiquette = $_POST['Etiquette'];
  $code = $_POST['Code'];
  $description = $_POST['Description'];
  $prixAchat = $_POST['PrixAchat'];
  $prixFinal = $_POST['PrixFinal'];
  $offreDePrix = $_POST['OffreDePrix'];
  $quantiteMin = $_POST['QuantiteMin'];
  $quantiteStock = $_POST['QuantiteStock'];
  $categories = $_POST['Categories'];
  $img = $_FILES['image'] ;

     // Check if file was uploaded without errors
     if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
      $uploadDir = "Dashboard/photo_Products/"; // Directory where you want to save the uploaded images

             // Get file extension
             $fileExtension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        
             // Generate a unique filename
             $uniqueFilename = uniqid('image_', true) . '.' . $fileExtension;
     
             $uploadedFile = $uploadDir . $uniqueFilename;
      
      
         
      
      // Move the uploaded file to the specified directory
      if (!move_uploaded_file($_FILES["image"]["tmp_name"], $uploadedFile)) {
        $error_file = "Error uploading the image.";
        $color = "danger";
      } 
  } else {
    $error_file = "Invalid file upload. Please select an image.";
    $color = "danger";
  }
  if (!empty($etiquette) && !empty($code)  && !empty($description)  && !empty($prixAchat)  && !empty($prixFinal)   ) {

    if (!empty($uploadedFile)) {
      $stmt = $conn->prepare("INSERT INTO `produit`( `Etiquette`, `Code à barres`, `PrixAchat`, `img`, `PrixFinal`, `OffreDePrix`, `Description`, `QuantiteMin`, `QuantiteStock`, `CategorieID`) VALUES ('$etiquette','$code','$description','$prixAchat','$img','$prixFinal','$offreDePrix','$quantiteMin','$quantiteStock','$categories')");

       
    if (  $stmt->execute()) {
      $error_input = "yes";
      $color = "success";
      $Nom_Catégories = "";
      $Description = "";
  

    }
    }


 

  }else {
    $error_input = "Nom and Description are required.";
    $color = "danger";
  }   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php    include 'layout/head.php'; ?>
    <title>Ajouter Catégories</title>
    <style>
     
     @import url('https://fonts.googleapis.com/css2?family=Arvo:ital@1&display=swap');
     *{
  margin: 0;
  padding: 0;
  font-family: 'Arvo', serif;
  

}
.chose a{
  text-decoration: none;
  padding: 20px 30px !important;
  color: #f9f9f9;
  border-radius: 25px;

}
.chose a:hover{
 
  background-color: #8e8a8a47;
 
}
.active{
  background-color: #8e8a8a47;

}
/* .width{
  width: 21% !important;
} */

.form{
  background-color: #495057;
  
}
.label_file {
	display: block;
	width: 60vw;
	max-width: 300px;

	background-color: slateblue;
	border-radius: 2px;
	font-size: 1em;
	line-height: 2.5em;
	text-align: center;
}

.label_file:hover {
	background-color: cornflowerblue;
}

.label_file:active {
	background-color: mediumaquamarine;
}

#apply {
	border: 0;
    clip: rect(1px, 1px, 1px, 1px);
    height: 1px; 
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
}


</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light fixed-top " style="background-color: #f9f9f9;">
    <div class="container-fluid">
      <a href="index.php" class="navbar-brand ms-5" >
                        <img src="assets\images\logo_1.png">
                    </a>
  
      <button class="navbar-toggler" style="margin-right:5px !important;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                  <span class="navbar-toggler-icon"></span>
                </button>
      <div class="collapse navbar-collapse top_nav" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto ">
   
        </ul>
        <ul class="navbar navbar-nav navbar-right" style="display:flex;">
                                                                        
          <li class="nav-item me-4"><a class="nav-link <?php if ($isActive === "products.php") echo ' activee'; ?>" href="products.php" >Products</a></li>

                    </ul>
        </ul>
      </div>
    </div>
  </nav>
  <div class="page-dashboard" id="top">


  <div class=" text-center ">
        <div class="row">
          <div class="col-sm-3 bg-black p-5 width" >
          <div class="mb-5 chose">
          <a   href="dashboard_Categories.php">Ajouter Catégories</a>
          </div>
          <div class="mb-5 chose">
          <a class="active" href="dashboard_Products.php">Ajouter Produits</a>
          </div>
          <div class="mb-5 chose">
          <a  href="dashboard_Utilisateurs.php">Liste des Utilisateurs</a>
          </div>
          <div class="mb-5 chose">
          <a  href="dashboard_Visiteurs.php">Liste des Visiteurs</a>  
          </div>
          
          </div>
          <div class="col-sm-9 form">
            <div class="row">
            <div class="col-12 col-sm-12  p-5 text-light text-start">
            <form method="post" enctype="multipart/form-data">
           <div class="row  ">
           <div class="col-6 mb-4">
                <label for="exampleFormControlInput1" class="form-label ">Etiquette</label>
                <input type="text" class="form-control" name="Etiquette" id="exampleFormControlInput1" placeholder="name..." >
              </div>
              <div class="col-6">
                <label for="exampleFormControlInput1" class="form-label ">Code à barres	</label>
                <input type="text" class="form-control " name="Code" id="exampleFormControlInput1" >
              </div>
              <div class="mb-4 col-12 ">
                <label for="exampleFormControlTextarea1" class="form-label  ">Description	</label>
                <textarea placeholder="Description..." class="form-control" name="Description" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div> 
              <div class="row justify-content-center ">
              <div class="col-lg-2  mb-4">
                <label for="exampleFormControlInput1" class="form-label ">PrixAchat</label>
                <input type="number" class="form-control " name="PrixAchat" id="exampleFormControlInput1" >
              </div>
              <div class=" col-lg-2 mb-4">
                <label for="exampleFormControlInput1" class="form-label ">PrixFinal</label>
                <input type="number" class="form-control " name="PrixFinal" id="exampleFormControlInput1" >
              </div>
              <div class="col-lg-2 mb-4">
                <label for="exampleFormControlInput1" class="form-label ">OffreDePrix</label>
                <input type="number" class="form-control " name="OffreDePrix" id="exampleFormControlInput1" >
              </div>
             
              <div class="col-lg-2 mb-4">
                <label for="exampleFormControlInput1" class="form-label ">QuantiteMin</label>
                <input type="number" class="form-control " name="QuantiteMin" id="exampleFormControlInput1" >
              </div>
              <div class="col-lg-2 mb-4">
                <label for="exampleFormControlInput1" class="form-label ">QuantiteStock</label>
                <input type="number" class="form-control " name="QuantiteStock" id="exampleFormControlInput1" >
              </div>
              </div>
              <div class="col-lg-3 mb-4">
              <label for="exampleFormControlTextarea1" class="form-label">Categories</label>
              <select class="form-select" name="Categories" aria-label="Default select example">
                <option selected>Choose Categories</option>
                <?php foreach ($userData as  $value) {    ;?>

                <option value="<?= $value["id"] ?>"><?= $value["Nom"] ?></option>
               
                <?php   }  ?>
              </select>
              </div>
              </div>
            
              <!-- <div>
                <label for="formFileLg" class="form-label">add photo</label>
                <input class="form-control form-control-lg" id="formFileLg" type="file">
              </div> -->
          
             <label class="mb-2" for="apply">add img</label>
             <div class="row justify-content-start ">
             <div class="col-6 col-xl-4">  <label class="label_file col-sm-4" for="apply"><input type="file"  name="image" id="apply" accept="image/*">Get file</label></div>
             </div>
             <?php if (isset($error_file , $_POST['submit'])  ) { ?>
                        <div class="alert alert-<?= $color ?> mt-4" role="alert">
                            <?php echo $error_file; ?>
                        </div> 

                    <?php    } ?> 
             <?php if (isset($error_input , $_POST['submit'])  ) { ?>
                        <div class="alert alert-<?= $color ?> mt-4" role="alert">
                            <?php echo $error_input; ?>
                        </div> 

                    <?php    } ?> 
           
             <div class="mt-5">
             <button type="submit" name="submit" class="btn btn-success">Ajouter Produits</button>
             </div>
             </form> 

              </div>
            
            </div>
            <div class="row">
            <div class="col-12 col-sm-12  p-5 text-light text-start table-responsive">
            <label for="" class="form-label mb-4 ">Liste des Produits : </label>
            <table class="table table-striped table-hover " >
                <thead >
                    <tr>
                    <th  scope="col">Etiquette</th>
                    <th  scope="col">PrixFinal</th>
                    <th  scope="col">QuantiteMin</th>
                    <th  scope="col">QuantiteStock</th>
                    <th  scope="col">Categories</th>
                    <th  scope="col">photo</th>
                    <th  scope="col">Opérations</th>
                 
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                    <th  scope="row">1</th>
                    <td >Mark</td>
                    <td >Otto</td>
                    <td >Mark</td>
                    <td >Otto</td>
                    <td >Mark</td>
                   
                    
                   
                    <td >
                    <button type="button" class="btn btn-success mb-2 ms-2">Success</button><br>
                    <button type="button" class="btn btn-danger mb-2 ms-2">Danger</button>

                    </td>
                    </tr>
                
             
              
                </tbody>
                </table>
            
            </div>
          </div>
          </div>
        </div>
      </div>
      </div>
    

<?php include 'layout/js.php' ; ?>
</body>
</html>