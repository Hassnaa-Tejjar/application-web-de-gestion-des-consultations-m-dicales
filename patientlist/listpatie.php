<!DOCTYPE html>
<html>
<head>
	<div>
    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    
    <link rel='stylesheet prefetch' href='http://cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css'>


    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    
</div>



</head>
<body>
	
<!--Formulaire -->
<div id="add_data_Modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h2 class="modal-title">Fiche patients</h2>
            </div>
            <div class="modal-body">

                <br/>

                <form method="post" id="insert_form" action="ajouterPatient.php">
                	<thead>
        <tr>
            <th id="id" role="gridcell" >Informations patient :</th><br>
                <label>N° Dossier</label>s
                    <input type="text" name="nom" id="nom" class="form-control" />
                    <br/>
                    <label>Nom</label>
                    <input type="text" name="nom" id="nom" class="form-control" />
                    <br/>

                    <label>Prénom</label>
                    <input type="text" name="prenom_p" id="prenom" class="form-control" />
                    <br/>

                    <label>Date de naissance</label>
                    <input type="date" name="DateNaissance_p" id="dateN" class="form-control"/>
                    <br/>
                    <label>Age</label>
                    <input type="text" name="age" id="age" class="form-control"/>
                    <br/>
                    <label>sexe Patient</label>
                    <input type="text" name="sexe" id="sexe" class="form-control" />
                    <br/>
                    <label>Groupe_singuin</label>
                    <textarea name="adresse_p" id="adresse" class="form-control"></textarea>
                    <br/>

                    <label>Téléphone</label>
                    <input type="text" name="numTel_p" id="numTel" class="form-control" />
                    <br/>

                    

                    <label>Date de rendez-vous</label>
                    <input type="date" name="DateRdv" id="dateR" class="form-control"/>
                    <br/>


                    <input type="hidden" name="id" id="id" />
                    <input type="submit" name="insert" id="insert" value="Valider" class="btn btn-primary"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>

            </div>
            <th id="nom"role="gridcell">Coordonnees patient :</th>
            <th id="prenom" role="gridcell">Antecedants:</th>
           </tr>
           </thead>         
           <!--<h4><b><u><i class="fas fa-user-circle"></i>Informations patient :</u></b></h4>-->
               
        </div>
    </div>
</div>


<!-- la liste patients "table" -->

<div align="center">
    <h2>Liste Patients</h2>
</div>
<div align="right">

    <!--btn ajouter-->
    <button type="button" name="ajout" id="ajout" class="btn btn-primary" onclick="$('#add_data_Modal ('show');">
        <i class="fas fa-plus"></i>imprimer</button>
        <!--btn imprimer-->
    <button type="button" name="ajout" id="imprimer" class="btn btn-primary" onclick="$('#add_data_Modal').modal('show');">
        <i class="fas fa-print"></i>Ajouter</button>
</div>
<br/>
<div class="table-responsive" id="table_patient">

    <table id="autoGeneratedID" role="grid" class="table table-striped table-bordered">
        <!-- le head du tableau-->
        <thead>
        <tr>
            <th id="id" role="gridcell" >N°</th>
            <th id="nom"role="gridcell">Nom</th>
            <th id="prenom" role="gridcell">Prénom</th>
            <th id="sex" role="gridcell">Sex</th>
             <th id="datedenaissance" role="gridcell">Date de naissance</th>
             <th id="email" role="gridcell">email</th>
            <th id="age" role="gridcell">Age</th>
            <th id="telephone" role="gridcell">telephone</th>-->
             <th id="operation" role="gridcell">Operation</th>
            <th id="adresse" role="gridcell">Action</th>
           
          
        </tr>
        </thead>
        <tbody>
                <!--ici on recupere les donnee du tab de la bdd -->
        <?php
        try{
            $bdd = new PDO('mysql:host=localhost;dbname=db_healthcare;charset=utf8','root','') ;

        }catch(Exception $e){
            echo "errreur" ;
        }

        $r=$bdd->query('SELECT * FROM patient');
        $row_count = 1;
        while($donne=$r->fetch()){
            ?>
            <tr>

                <td id="id" role="gridcell" ><?php echo $donne['Id_patient'];?></td>
                <td id="nom" role="gridcell"><?php echo $donne['Nom_patient'];?></td>
                <td id="prenom" role="gridcell"><?php echo $donne['Prénom_patient'];?></td>
                <td id="sexe" role="gridcell"><?php echo $donne['Sexe_patient'];?></td>
                <td id="datedenaissance" role="gridcell"><?php echo $donne['Date_naissance_patient'];?></td>
                <td id="email" role="gridcell"><?php echo $donne['Email_patient'];?></td>
                <td id="adresse" role="gridcell"><?php echo $donne['Age_patient'];?></td>
                <!--<td id="telephone" role="gridcell"><?php //echo $donne['numTel_p'];?></td>-->
                
                <!--<td id="DateRdv" role="gridcell"><?php //echo $donne['DateRdv'];?></td> -->
                
               
                <td>

                    <div class="btn-group">
                        <button type="button"
                                class="btn btn-primary btn-lm dropdown-toggle" data-toggle="dropdown">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">

                            <li><input type="button" name="edit" value="Modifier" id="<?php echo $donne["id"];?>"
                                       class="btn btn-warning btn-md edit_data btn-block"/></li>


                            <li><input type="button" name="delete" value="Supprimer" id="<?php echo $donne["id"];?>"
                                       class="btn btn-danger btn-md delete_data btn-block"/></li>
                        </ul>
                    </div>


                </td>
               
                <td ><a class="btn btn-info" href="details.php?idp=<?php echo $donne['id'];?>">Details</a></td>
            </tr>
            <?php
            $row_count ++ ;
        }
        ?>

        <tbody>
    </table>
    <!-- pose problème 
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src='http://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js'></script>
<script src='http://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js'></script>
-->
<!--ce script pour le fonctionnement des deux btn delete & edit il prend en parametre #idDuTABLEAU et fait appelle à modifier.php 
<script>

    $(document).ready(function(){


        /* ici c'est le script de dataTable au lieu de faire appelle à index.js on l'a copié ici pour que ça fonctionne*/

        $('#autoGeneratedID').dataTable({
            "columnDefs": [
                { "orderable": false, "targets": 0 }/*il y'avait 3 pour le double clique et modifier*/
            ]
        } );
        $('#autoGeneratedID td').attr('role', 'gridcell');
        $('#autoGeneratedID tr').attr('role', 'row');
        $('#autoGeneratedID th').attr('role', 'gridcell');
        $('#autoGeneratedID table').attr('role', 'grid');
         $('#autoGeneratedID td:nth-of-type(-n+3)').attr('contenteditable', 'true');

    });

    //bouton ajouter

    $('#ajout').click(function () {
        $('#insert').val("Valider");
        $('#insert_form')[0].reset();
    });

    /******************** bouton modifier*********************/

    $(document).on('click', '.edit_data', function () {
        var id = $(this).attr("id");
        $.ajax({
            url: "modierPatient.php",
            method: "POST",
            data: {id: id},
            dataType: "json",
            success: function (data) {
                //remplir les cases avec les anciens données
                $('#nom').val(data.nom);
                $('#prenom').val(data.prenom);
                $('#sexe').val(data.sexe);
                $('#adresse').val(data.adresse);
                $('#telephone').val(data.telephone);
                $('#datedenaissance').val(data.datedenaissance);
               // $('#dateR').val(data.DateRdv);
                //$('#debut').val(data.dateD);
               // $('#fin').val(data.dateF);
                //$('#nlit').val(data.lit);

                $('#id').val(data.id);

                $('#insert').val("Modifier");
                $('#add_data_Modal').modal('show');


            }

        });
    });


    /*********************** pour le bouton ajouter ******************/
    
        $('#insert_form').on("submit", function (event) {
            event.preventDefault();
             if ($('#nom').val() == "") {          // si le champs nom n'est pas vide

                 alert("Le nom est obligatoire!");  //ç n marche pas .. j v essayer les sweet alert!
             }
             else {
            $.ajax({
                url: "ajouterPatient.php",
                method: "POST",
                data: $('#insert_form').serialize(),
                beforeSend: function () {
                    $('#insert').val("Valider");
                },
                success: function (data) {
                    $('#insert_form')[0].reset();
                    $('#add_data_Modal').modal('hide');
                    $('#table_patient').html(data);
                }
            });
            }
        });
         /******************************* SUPPRIMER Patient********************/

    $(document).on('click', '.delete_data', function(){
        var id = $(this).attr("id");
        if(confirm("êtes vous sûr de supprimer ce patient?"))
        {
            $.ajax({
                url:"SupprimerPatient.php",
                method:"POST",
                data:{id:id},
                success:function(data){
                    $('#table_patient').html('<div class="alert alert-success">'+data+'</div>');
                    $('#autoGeneratedID').DataTable().destroy();
                    window.location.reload();

                }
            });
            setInterval(function(){
                $('#table_patient').html('');
            }, 5000);
        }
    });
</script>
</div>

<?php
 // include 'layout2.php';
  ?>-->
</body>
</html>