<?php include 'layout/coon.php';

?>

<?php 
if (isset($_POST['submit'])) {
  // Retrieve form data
$Nom_Catégories = $_POST['Nom_Catégories'];
$Description = $_POST['Description'];

   // Check if file was uploaded without errors
   if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
      $uploadDir = "Dashboard/photo_Catégories/"; // Directory where you want to save the uploaded images

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
  if (!empty($Nom_Catégories) && !empty($Description) ) {

    if (!empty($uploadedFile)) {
      $stmt = $conn->prepare("INSERT INTO `categorie`( `Nom`, `Description`, `img`) VALUES ('$Nom_Catégories','$Description','$uploadedFile')");

       
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



// select sql  


$user_result = $conn->query("SELECT * FROM `categorie`");
$userData = $user_result->fetchAll(PDO::FETCH_ASSOC);







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
.img{
  width: 450px !important;
  height: 250px !important;
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
          <a class="active"  href="dashboard_Categories.php">Ajouter Catégories</a>
          </div>
          <div class="mb-5 chose">
          <a  href="dashboard_Products.php">Ajouter Produits</a>
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
              <form  method="post" enctype="multipart/form-data">
              <div class="col-12 col-sm-12  p-5 text-light text-start">
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label ">Nom de Catégories</label>
                <input name="Nom_Catégories" value="<?php   echo $Nom_Catégories ?? '';  ?>" placeholder="nom..." type="text" class="form-control " id="exampleFormControlInput1" >
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label  ">Description</label>
                <textarea name="Description"  placeholder="Description..." class="form-control" id="exampleFormControlTextarea1" rows="3"><?php   echo $Description ?? '';  ?></textarea>
              </div> 
              <label class="mb-2" for="">add img</label>
             <div class="row g-0 text-center  ms-1">
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
             <button type="submit" name="submit" class="btn btn-success">Ajouter Catégories</button>
        
             </div>
         
                    </form>
              </div>
            
            </div>

            <div class="row">
            <div class="col-12 col-sm-12  p-5 text-light text-start table-responsive">
            <label for="" class="form-label mb-4 ">Liste des Catégories : </label>
            <table class="table table-striped table-hover " >
                <thead >
                    <tr>
                    <th  scope="col">Nom de Catégories</th>
                    <th  scope="col">Description</th>
                    <th  scope="col">photo</th>
                    <th  scope="col">Opérations</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                  <?php foreach ($userData as  $value) {   ?>
                    
                 
                    <tr>
                    <th  scope="row"><?= $value['Nom'] ?></th>
                    <td ><?= $value['Description'] ?></td>
                    <td ><img src="<?= $value['img'] ?>" alt="" width="200px" height="100px"></td>
                    <td >
                    <a class="btn btn-success mb-2 ms-2" href="Dashboard/update_categorie.php?id=<?= $value['id'] ?>">update</a>
                    <a class="btn btn-danger mb-2 ms-2 modal-trigger" data-bs-toggle="modal" data-bs-id="<?= $value['id'] ?>" data-bs-name="<?= $value['Nom'] ?>" href="#">delete</a>


                    </td>
                    </tr>
               
              <?php } ?>
              
                </tbody>
                </table>
            
            </div>
          </div>
          </div>
        </div>
      </div>
      </div>
    

<!-- The Modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">delete Catégories</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
      </div>
      <div class="modal-footer">

        
      </div>
    </div>
  </div>
</div>

<?php include 'layout/js.php' ; ?>
<script>
    // JavaScript to handle modal trigger click event and set the modal target dynamically
    const modalTriggers = document.querySelectorAll('.modal-trigger');
    modalTriggers.forEach((trigger) => {
        trigger.addEventListener('click', (event) => {
            event.preventDefault();
            const id = trigger.getAttribute('data-bs-id');
            const nom = trigger.getAttribute('data-bs-name');
            const modal = document.getElementById('exampleModal');
            const body = modal.querySelector('.modal-body');
            const modalTrigger = modal.querySelector('.modal-footer');
            // Use the fetched 'id' to perform further actions or data retrieval
            modalTrigger.innerHTML = `<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <a class="btn btn-primary" href="Dashboard/delete_categorie.php?id=${id}">delete</a>`;
            body.innerHTML = `Do you want to delete : ${nom}`;
            // Set the 'data-bs-target' attribute of the modal dynamically
            modal.setAttribute('data-bs-target', `#exampleModal?id=${id}`);
            // Show the modal
            const myModal = new bootstrap.Modal(modal);
            myModal.show();
        });
    });
</script>
</body>
</html>