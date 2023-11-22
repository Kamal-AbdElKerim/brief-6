<?php
include 'layout/coon.php';
$isActive = "products.php";
  
?>



<!DOCTYPE html>
<html lang="en">

     <?php    include 'layout/head.php'; ?>

    <body>

  
    <!-- ***** Header Area Start ***** -->
    <?php include 'layout/navbar.php' ;
?>


      <!-- ***** Main Banner Area Start ***** -->
      <div class="page-heading" id="top">
     
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Products Area Starts ***** -->
    <section class="section " id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-heading">
                        <h2>Our Latest Products</h2>
                    </div>
                </div>
            </div>
            <form method="post" action="#">
            <div class="grid-container">

            <div class="item1 d-flex justify-content-end align-items-center">
                <span> Trier par : <span class="invisible">l</span> </span>
                <select id="mySelect" name="quantity" class="form-select w-25 " aria-label="Default select example" style="width:17% !important;">
                       
                        <option    value="0">All</option>
                        <option    value="2">Quantité, croissant </option>
                        <option    value="1">Quantité, décroissant </option>
                        <option    value="3">Prix, croissant </option>
                        <option    value="4">Prix, décroissant </option>

                        </select>
    
  

    
</div>
  <div class="item2 ">
    
  <div class="col-lg-12">
              
     <h5>Composants</h5>
    <!-- Checkbox inputs -->
    <ul class="list-group">
    <li class="list-group-item">
    <input id="firstCheckboxStretched" class="form-check-input me-1 min" type="checkbox" value="2" name="categories[]" >
    <label class="form-check-label stretched-link o1 small-text" for="firstCheckboxStretched">Processeurs</label>
    </li> 
    <li class="list-group-item">
    <input id="secondCheckboxStretched" class="form-check-input me-1 min"  type="checkbox" value="3" name="categories[]">
    <label class="form-check-label stretched-link o2 small-text" for="secondCheckboxStretched">Cartes graphiques</label>
    </li>
    
    
    <li class="list-group-item">
    <input  id="thirdCheckboxStretched" class="form-check-input me-1 min"  type="checkbox" value="1" name="categories[]"  >
    <label class="form-check-label stretched-link small-text" for="thirdCheckboxStretched">Boitiers PC</label>
    </li>
   <br>
    <h5>Quantité min</h5>
    <ul  class="list-group">
    <li class="list-group-item">
    <input  id="thirdCheckboxStretched2" class="form-check-input me-1 min"  type="checkbox" value="4" name="quantite_min"  >
    <label class="form-check-label stretched-link small-text" for="thirdCheckboxStretched2">Quantite min</label>
    </li>
    </ul>
    </ul>
    <br>

    
  
    <br>
    <button id="bu" type="submit" name="submit_checkbox" class="btn btn-info btn-lg invisible">
          <span class="glyphicon glyphicon-filter"><i class="fas fa-filter"></i></span> Filter </button>

</form>
                </div>
                </div>
                <div class="item3 row " >
               
             
            
                    <div class="col-lg-6">
                    <div class="item">
                    <div class="row g-0  mb-4 position-relative" style="    border-bottom: 2px #857979 solid;border-top: 2px #857979 solid;border-radius: 20%;">
                        <div class="col-md-6 mb-md-0 p-md-4">
                            <img src="" class="w-100" alt="...">
                        </div>
                        <div class="col-md-6 p-4 ps-md-0">
                            <h5 class="mb-4"></h5>
                            <h6 class="text-primary"> MAD</h6>
                            <h6 class="text-success">Produit en stock () </h6>
                               
                           
                            <h6 class="text-danger">Quantite min :  </h6>

                        
                                <h6 class="text-subtle">Quantite min :  </h6>

                            

                        </div>
                        </div>
                    </div>
                </div>

                    
               
            

       


                   
                  
             
            </div>  

                </div>
                        
                        </div>
    </section>



 
    
   
   
    
    <!-- ***** Footer Start ***** -->
    <?php include 'layout/footer.php' ; ?>
   



<?php include 'layout/js.php' ; ?>







  </body>

</html>
