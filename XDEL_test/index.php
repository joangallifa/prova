<?php include $_SERVER["DOCUMENT_ROOT"].'/api/NETSecure.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<html lang="es">
	<meta charset="utf-8">

	<title>Panel Configuració</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- JQUERY -->
	<script type="text/javascript" src="assets/jquery/jquery-3.1.1.min.js"></script>

   <!-- BOOTSTRAP -->
	<link rel="stylesheet" href="assets/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="assets/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.5.0/bootstrap-table.min.css">
	<script type="text/javascript" src="js/bootstrap-table/bootstrap-table.js"></script>
	<script type="text/javascript" src="js/bootstrap-table/bootstrap-table-ca-ES.js"></script>
   
   <!-- Generic page styles -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/styleWizard.css">
	<link rel="stylesheet" href="css/styleBotones.css">
	<link rel="stylesheet" href="http://srv.net.fje.edu/net2/images/sprite/icons.data.svg.css">

   <!-- Fontawesome -->
	<link rel="stylesheet" href="assets/fontawesome/4.7.0/css/font-awesome.min.css">

   <!-- FUNCIONES DE BOTONES -->
   <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
   <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</head>
<body style="background-color: #3F6B78; color: white;">
   
   <!-- Capçalera -->
   <?php include 'cabecera/cap.php'; ?> 

   <div class="container cos">
       <div class="row">
           <div class="col-md-12">
               <h3 id="tituloGrup" >CONFIGURACIÓ del GRUP: </h3>
               <!-- <h5 id="subTituloGrup"></h5> -->
               <hr/>
           </div>
       </div>
       <div class="row">
           <!-- <div class="col-md-12">
               <h4 >Otros:</h4>
           </div> -->
           <div class="col-md-12" id="fix" style="color: white;">

           </div>

           <div class="col-md-12" style="margin-top: 15px;">
               <h4 >Serveis Inactius:</h4>
           </div>

           <div class="col-md-12" id="inactius" style="color: white;">
                   <!-- <h3 style="color: #4394d0;">Serveis Actius:</h3> -->
           </div>

           <div class="col-md-12" style="margin-top: 15px;">
               <h4 >Serveis Actius:</h4>
           </div>

           <div class="col-md-12" id="actius" style="color: white;">
                   <!-- <h3 style="color: #4394d0;">Serveis Actius:</h3> -->

           </div>
           <div class="col-md-12" style="margin-top: 15px;">
               <H4>Altres Serveis: <FONT SIZE=-2> (Pots configurar altres serveis que seran enllaços a llocs webs. Fes clic a Nou Servei)</FONT> </h4>
               <!-- <p style="font-size:10px; margin-top: -10px;"> Pots configurar altres serveis que seran enllaços a llocs webs. Fes clic a Nou Servei </p> -->
           </div>
           
           <div class="col-md-12" id="altres" style="color: white; margin-bottom: 40px;">
                   
                   <div class="col-md-4 text-center" id="nouServei" data-toggle="modal" data-target="#Modal" style="color: white;">
                       <div class="radio" style="background-color: #1E5FA5; border-style:dashed; border-width: 1px;">
                           <i class="fa fa-plus-square-o" style="font-size:35px; margin-top: 15px;" aria-hidden="true"></i> <br>Nou Servei
                       </div>
                   </div>
                   
           </div>
       </div>
   </div>

<!-- VENTANA MODAL NOU SERVEIS -->

<div id="Modal" class="modal fade" role="dialog" style="color: black;">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Nou Servei</h4>
            </div>

            <div class="modal-body">

                <form role="form">
                    <!-- <div class="form-group">
                        <label for="sel1">Serveis Tipus:</label>
                        <select class="form-control" id="sel1">
                            <option selected disabled>Tipus</option>
                            <option>Blog</option>
                            <option>Biblio</option>
                            <option>Enunciat</option>
                            <option>Altres</option>
                        </select>
                    </div> -->
                    
                    <div class="form-group">
                        <label for="formulario">Nom del Servei</label>
                        <input type="text" class="form-control" id="nomServei" 
                           placeholder="Nom del Servei">
                    </div>
                    <div class="form-group">
                        <label for="formulario">Enllaç (URL):</label>
                        <input type="url" class="form-control" id="url"
                           placeholder="URL">
                    </div>
     
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default">Enviar</button>
            </form>
            </div>
        </div>
    </div>
</div>

<!-- VENTANA MODAL OPCIONS SERVEIS -->

<div id="ModalOptions" class="modal fade" role="dialog" style="color: black;">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">OPCIONS</h4>
            </div>

            <div class="modal-body">

                <div class="stepwizard">
                    <div class="stepwizard-row setup-panel panel">

                        <div class="stepwizard-step">
                            <a href="#v-1" type="button" class="btn btn-primary btn-circle">1</a>
                            <p>Desactivar?</p>
                        </div>
                        
                        <div class="stepwizard-step">
                            <a href="#v-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                            <p>Meus?</p>
                        </div>
                        
                        <div class="stepwizard-step">
                            <a href="#v-3" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                            <p>Meus?</p>
                        </div>
                        
                        <div class="stepwizard-step">
                            <a href="#v-4" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                            <p>Curs?</p>
                        </div>

                        <div class="stepwizard-step">
                            <a href="#v-5" type="button" class="btn btn-default btn-circle fin" disabled="disabled">4</a>
                            <p>FIN</p>
                        </div>

                    </div>
                </div>

                <form id='wizardForm'>

                <div class="row setup-content" id="v-1">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <h3> Desactivar? </h3>
                                <div class="radio">
                                    <label>
                                        <input class="tipoServei" type="radio" name="tipoServei" value="nou">
                                    Desactivar Servei
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input class="tipoServei" type="radio" name="tipoServei" value="compartit">
                                        Compartit Servei
                                    </label>
                                </div>
                            <!-- content go here -->
                            <hr>
                            <div class="col-md-3 col-md-offset-9 divBtn">
                                <button  class="btn btn-primary btn-block pull-right nextBtn" type="button" ><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></button>
                            </div>
                            
                        </div>
                    </div>
               </div>

                <div class="row setup-content" id="v-2">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <h3> Nou?</h3>
                                <div class="radio">
                                    <label>
                                        <input class="tipoServeiiii" type="radio" name="tipoServei" value="nou">
                                    Servei NOU
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input class="tipoServeiiii" type="radio" name="tipoServei" value="compartit">
                                        Servei COMPARTIT
                                    </label>
                                </div>
                            <!-- content go here -->
                            <hr>
                            <div class="col-md-3 col-md-offset-9 divBtn">
                                <button class="next btn btn-primary btn-block pull-right nextBtn" type="button" ><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></button>
                            </div>
                            
                        </div>
                    </div>
               </div>

               <div class="row setup-content" id="v-3">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <h3>Meus?</h3>
                            <div class="radio">
                                    <label>
                                        <input class="tipoMeus" type="radio" name="tipoMeus" value="meus">
                                        Grups Meus
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input class="tipoMeus" type="radio" name="tipoMeus" value="altres">
                                        Grups on jo NO soc MEMBRE
                                    </label>
                                </div>
                                
                            <!-- content go here -->
                            <hr>
                            <div class="col-md-3 divBtn">
                                <button class="btn btn-primary btn-block antBtn pull-right" type="button" ><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></button>
                            </div>
                            <div class="col-md-3 col-md-offset-6 divBtn">
                                <button class="next btn btn-primary btn-block pull-right nextBtn" type="button"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></button>
                            </div>
                            <!-- <button class="btn btn-light btn-block nextBtn pull-right" type="button" >Sigüent</button> -->
                        </div>
                    </div>
               </div>

               <div class="row setup-content" id="v-4">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <h3>Curs</h3>
                        </div>
                        <div class="col-md-12 radio" id="meus" style="display: none;">
                            <label class="col-md-6">
                                <input class="tipoCurs" type="radio" name="meus"  value="opcion_1">
                                    Curs Actual
                            </label>
                            <label class="col-md-6">
                                <input class="tipoCurs" type="radio" name="meus"  value="opcion_2">
                                    Curs Antics
                            </label>
                        </div>

                        <div class="col-md-12 radio" id="altres" style="display: none;">
                            <label class="col-md-6">
                                <input class="tipoCurs" type="radio" name="altres"  value="opcion_1">
                                    Mateix Curs
                            </label>
                            <label class="col-md-6">
                                <input class="tipoCurs" type="radio" name="altres"  value="opcion_2">
                                    Altres
                            </label>
                        </div>

                        <div class="col-md-12 ">
                            <table id="taulaGrups" data-height="300" data-cookie="true" data-cookie-id-table="idgrup"  data-toolbar="#toolbar" ></table>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                            
                        <!-- </div> -->
                            <!-- content go here -->
                            
                        <div class="col-md-12">
                            <div class="col-md-3 divBtn">
                                <button class="btn btn-primary btn-block antBtn" type="button" ><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></button>
                            </div>
                            <div class="col-md-3 col-md-offset-6 divBtn">
                                <button class="next1 btn btn-primary btn-block pull-right nextBtn" type="button" ><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></button>
                            </div>
                        </div>
                    </div>
               </div>

               <div class="row setup-content" id="v-5">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <h4>És a punt d'activar el servei, per finalitzar faci clic a Activar Servei</h4>
                            <hr>
                            <div class="col-md-3 divBtn">
                                <button id="btnIniAnt" class="btn btn-primary btn-block antBtn pull-right" type="button" ><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></button>
                            </div>
                            <div class="col-md-3 col-md-offset-6 divBtn">
                                <button id="mandarFormulario" type="button" class="btn btn-block btn-primary">Guardar Configuració</button>
                                <!-- <button id="mandarFormulario" class="btn btn-primary btn-block nextBtn pull-right" type="button" ><span class="" aria-hidden="true">Activar Servei</span></button> -->
                            </div>
                        </div>
                    </div>
               </div>
				</form>
     
            </div>
            <!-- <div class="modal-footer">
                <button type="submit" class="btn btn-default">Enviar</button>
            </form>
            </div> -->
        </div>
    </div>
</div>

<!-- VENTANA MODAL ACTIVAR SERVEIS -->

<div id="Wizard" class="modal fade" role="dialog" style="color: black;">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Activar Servei:</h4>
            </div>
            <div class="modal-body">
                <div class="stepwizard">
                    <div class="stepwizard-row setup-panel1 panel">
                        <div class="stepwizard-step">
                            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                            <p>Nou?</p>
                        </div>
                        
                        <div class="stepwizard-step">
                            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                            <p>Meus?</p>
                        </div>
                        
                        <div class="stepwizard-step">
                            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                            <p>Curs?</p>
                        </div>

                        <div class="stepwizard-step">
                            <a id='fin' href="#step-4" type="button" class="btn btn-default btn-circle fin" disabled="disabled">4</a>
                            <p>FIN</p>
                        </div>
                    </div>
                </div>
				<form id='wizardForm'>
                <div class="row setup-content" id="step-1">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <h3> Nou?</h3>
                                <div class="radio">
                                    <label>
                                        <input class="tipoServei" type="radio" name="tipoServei" value="nou" checked>
                                    Servei NOU
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input class="tipoServei" type="radio" name="tipoServei" value="'NO' or 'SI'(indica si queremos que se muestre en el cuadro o no);">
                                        Servei COMPARTIT
                                    </label>
                                </div>
                            <!-- content go here -->
                            <hr>
                            <div class="col-md-3 col-md-offset-9 divBtn">
                                <button  id='btn_fin' class="btn btn-primary btn-block pull-right nextBtn" type="button" ><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></button>
                            </div>
                            
                        </div>
                    </div>
               </div>

               <div class="row setup-content" id="step-2">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <h3>Meus?</h3>
                            <div class="radio">
                                    <label>
                                        <input class="tipoMeus" type="radio" name="tipoMeus" value="meus">
                                        Grups MEUS
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input class="tipoMeus" type="radio" name="tipoMeus" value="altres">
                                        Grups on jo NO sóc MEMBRE
                                    </label>
                                </div>
                                
                            <!-- content go here -->
                            <hr>
                            <div class="col-md-3 divBtn">
                                <button class="btn btn-primary btn-block antBtn pull-right" type="button" ><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></button>
                            </div>
                            <div class="col-md-3 col-md-offset-6 divBtn">
                                <button class="next btn btn-primary btn-block pull-right nextBtn" type="button"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></button>
                            </div>
                            <!-- <button class="btn btn-light btn-block nextBtn pull-right" type="button" >Sigüent</button> -->
                        </div>
                    </div>
               </div>

               <div class="row setup-content" id="step-3">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <h3>Curs</h3>
                        </div>
                        <div class="col-md-12 radio" id="meus" style="display: none;">
                            <label class="col-md-6">
                                <input class="tipoCurs" type="radio" name="meus"  value="opcion_1">
                                    Curs Actual
                            </label>
                            <label class="col-md-6">
                                <input class="tipoCurs" type="radio" name="meus"  value="opcion_2">
                                    Curs Antics
                            </label>
                        </div>

                        <div class="col-md-12 radio" id="altres" style="display: none;">
                            <label class="col-md-6">
                                <input class="tipoCurs" type="radio" name="altres"  value="opcion_1">
                                    Mateix Curs
                            </label>
                            <label class="col-md-6">
                                <input class="tipoCurs" type="radio" name="altres"  value="opcion_2">
                                    Altres
                            </label>
                        </div>

                        <div class="col-md-12 ">
                            <table id="taulaGrups" data-height="300" data-cookie="true" data-cookie-id-table="idgrup"  data-toolbar="#toolbar" ></table>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                            
                        <!-- </div> -->
                            <!-- content go here -->
                            
                        <div class="col-md-12">
                            <div class="col-md-3 divBtn">
                                <button class="btn btn-primary btn-block antBtn" type="button" ><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></button>
                            </div>
                            <div class="col-md-3 col-md-offset-6 divBtn">
                                <button class="next1 btn btn-primary btn-block pull-right nextBtn" type="button" ><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></button>
                            </div>
                        </div>
                    </div>
               </div>

               <div class="row setup-content" id="step-4">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <h4>És a punt d'activar el servei, per finalitzar faci clic a Activar Servei</h4>
                        
                                
                            <!-- content go here -->
                            <hr>
                            <div class="col-md-3 divBtn">
                                <button id="btnIniAnt" class="btn btn-primary btn-block antBtn pull-right" type="button" ><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></button>
                            </div>
                            <div class="col-md-3 col-md-offset-6 divBtn text-center">
                                <button id="btnActivaServei" type="button" class="btn btn-primary">Activar Servei</button>
                                <!-- <button id="mandarFormulario" class="btn btn-primary btn-block nextBtn text-center" type="button" > Activar Servei </button> -->
                            </div>
                        </div>
                    </div>
               </div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- VENTANA MODAL MODIFICAR TÍTULO -->

<div id="modModifTitulo" class="modal fade" role="dialog" style="color: black;">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Nou Titol</h4>
            </div>

            <div class="modal-body">
                <form role="form" id="formModiTitulo">
                    <div class="form-group">
                        <label for="formulario">Nom del Group:</label>
                        <input type="hidden" id="idGroup" name='grupAula' value="">
                        <input type="text" class="form-control" name="nomGrup" value="" id="nomGroup" 
                           placeholder="Nom del Servei" required>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="submit" form="formModiTitulo" class="btn btn-default">Enviar</button>
            </div>

        </div>
    </div>
</div>





<script type="text/javascript">

//////////////////////////////////////////////////////
////// MODIFICAR NOMBRE DEL GRUPO:

// --- 1 Abrir ventana modal:

$("#tituloGrup").on('click','.editTitulo',function(){
    $("#modModifTitulo").modal('show');
    nomGroup = $(this).attr('data-nom');
    $('#nomGroup').val(nomGroup);
    $('#idGroup').val($.get("grupaula"));
});

$('#formModiTitulo').on('submit', function(e){
    e.preventDefault();
    form=$('#formModiTitulo').serializeArray(0);
    grupAula=form[0].value;
    nomGrup=form[1].value;

    $.ajax({
        type: "POST",
        // dataType: "json",
        url: 'http://srv.net.fje.edu/api2/configuracio/canvianomgrup/'+grupAula+'/'+nomGrup+'', 
        success : function(data) {
            alert(data);
        }
    })


})

function modificarTitulo(){
    this.preventDefault();
    form=$('#formModiTitulo').serializeArray(0);
    grupAula=form[0].value;
    nomGrup=form[1].value;
    $.ajax({
        type: "POST",
        dataType: "json",
        url: 'http://apis.net.fje.edu/api2/configuracio/canvianomgrup/'+grupAula+'/'+nomGrup+'', 
        success : function(data) {
            // $("#tituloGrup").html('CONFIGURACIÓ del GRUP: '+nomGrup+'  <a class="editTitulo" data-nom="'+nomGrup+'" href="#"> <span class="glyphicon glyphicon-pencil" style="font-size: 20px;"></span></a><FONT SIZE=-2> ('+$.get("grupaula")+') </FONT> ');
            alert(data);
        }
    })


}


//////////////////////////////////////////////////////
////// RECUPERAR PARÁMETROS DE LA URL:

(function($) {  
    $.get = function(key)   {  
        key = key.replace(/[\[]/, '\\[');  
        key = key.replace(/[\]]/, '\\]');  
        var pattern = "[\\?&]" + key + "=([^&#]*)";  
        var regex = new RegExp(pattern);  
        var url = unescape(window.location.href);  
        var results = regex.exec(url);  
        if (results === null) {  
            return null;  
        } else {  
            return results[1];  
        }  
    }  
})(jQuery);



//////////////////////////////////////////////////////
////// AÑADIR TÍTULO (grupo):
// CONFIGURACIÓ del GRUP: tutoria.5a.pri.15.claver

// $("#tituloGrup").html('CONFIGURACIÓ del GRUP: '+$.get("grupaula"));


// Ejemplo de recuperar variables:
            // var a = $.get("id");
            // var b = $.get("other");





//////////////////////////////////////////////////////
////// PINTAR DINÁMICAMENTE LOS CUADROS

// COLORES
//color =[];
// var colors=['#FFC544','#E8A23E','#E8713E','#E8713E','#FF6044','#FF5B33','#FC4F28','#E04D2C','#D34221'];
var colorsA=['#FF9E51','#FF8434','#FF7A32','#FF7033','#FF6633','#FF5B33','#FC4F28','#E04D2C','#D34221'];

var colorsB=['#1E56B2','#1C67BC','#226EA5','#1C88BC','#2491B2','#FF5B33','#FC4F28','#E04D2C','#D34221'];

a=0;
b=0;

$(document).ready(function(){
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "http://srv.net.fje.edu/api2/configuracio/serveisgrup/"+$.get("grupaula")+"", 
        success : function(data) {
            $.each(data,function(i,s){
                // $("#subTituloGrup").html($.get("grupaula"));
                nomGrup=s.nomgrup;
                titulo=s.nomServei.toUpperCase();
                estat=s.Actiu;
                ico=s.iconaServei;
                enlace='http://'+s.parametre1;
                visAlu="";
                    if(s.NomesVisibleAdministradors!='S'){visAlu="checked";};
                serCompartit=s.grupsServeiCompartit;
                manual="";
                    if(s.UrlManual!=""){manual='<i title="Guia" class="fa fa-info-circle url" url="'+s.UrlManual+'" aria-hidden="true"></i>';};

                if(s.tipusServei==='FIX'){

                    caja = '<div class="col-md-4 text-center caja"><div class="row"><div class="icono col-md-12 icon '+ico+'"></div></div><div class="row text-center"><p> '+titulo+" "+manual+' </p></div></div>';

                    estats= '<div class="col-md-8"><br/><div class="row" style="margin-top:5px; margin-bottom: 10px;"><div class="col-md-12"><a href="http://esic.fje.edu/informacions/Noticies/llistaNoticies.aspx?uid=<?php echo $usuari->login;  ?>&amp;idGrup='+$.get("grupaula")+'" target="_blank" class="actServ boton2 btn btn-default col-md-12"> Gestionar </a></div></div></div>';

                    explicacio='<div class="col-md-12 infor" style="height:30px; margin-bottom:5px"><p style="font-size: 80%; text-align: justify;" title="'+s.Descripcio+'">'+s.Descripcio+'</p></div>';

                    div =$('<div class="col-md-4" style="background-color: brown; border: 1px solid; border-color:#3F6B78;"><div class="row">'+caja+estats+'</div><div class="row">'+explicacio+'</div></div>');

                    divActualizar=$("#fix").append(div);

                }else{

                    if(estat!='S'){
                    caja = '<div class="col-md-4 text-center caja"><div class="row"><div class="icono col-md-12 icon '+ico+'"></div></div><div class="row text-center"><p> '+titulo+" "+manual+' </p></div></div>';

                    estats= '<div class="col-md-8"><br/><div class="row" style="margin-top:5px; margin-bottom: 10px;"><div class="col-md-12"><button type="button" class="actServ boton2 btn btn-default col-md-12" aria-label="Left Align" data-size="mini" data-toggle="modal" data-target="#Wizard">Activar <i class="fa fa-rocket" aria-hidden="true"></i></button></div></div></div>';

                    explicacio='<div class="col-md-12 infor" style="height:30px; margin-bottom:5px"><p style="font-size: 80%; text-align: justify;" title="'+s.Descripcio+'">'+s.Descripcio+'</p></div>';

                    div =$('<div class="col-md-4" style="background-color: grey; border: 1px solid; border-color:#3F6B78;"><div class="row">'+caja+estats+'</div><div class="row">'+explicacio+'</div></div>');



                    cajaAntic='<div class="col-md-4 text-center caja"><div class="radio"><div style=" height: 40px; background-position: center; background-size: contain;" class="col-md-12 icon '+ico+'"></div><div class="row"><p> <br> '+titulo+" "+manual+' </p></div></div></div>';

                    estatsAntic='<div class="col-md-8" style="margin-top:14px; border-left: 1px solid;"><div class="row" style="margin-top:10px;"><div class="col-md-12"><button type="button" class="actServ boton2 btn btn-default col-md-12" aria-label="Left Align" data-size="mini" data-toggle="modal" data-target="#Wizard">Activar <i class="fa fa-rocket" aria-hidden="true"></i></button></div></div></div>';

                    divAntic=$('<div class="col-md-4" style="background-color: grey; border: 1px solid; border-color:#3F6B78;"><div class="row">'+caja+estats+'</div><div class="row"><div class="col-md-12 infor" style="height:30px; margin-bottom:5px; font-size: 80%;" title="'+s.Descripcio+'">'+s.Descripcio+'</div></div></div>');

                    divActualizar=$("#inactius").append(div);

                }else{
                    
                    if(s.TipusGrup!="Especial"){
                        color=colorsA[a];

                        
                        caja='<div class="col-md-4 text-center caja" title="'+s.Descripcio+'"><div class="row" ><div class="divIcono col-md-12 icon '+ico+'"></div></div><div class="row text-center divTitulo"><div class="col-md-12"><p> '+titulo+" "+manual+' </p></div></div></div>';

                        options='<div class="row" style="margin-top:10px;"><div class="col-md-8">Opcions</div><div class="col-md-2"><button type="button" class="opcions boton btn btn-default btn-xs" aria-label="Left Align" data-size="mini" data-toggle="modal" data-target="#ModalOptions"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></button></div></div>';

                        if(s.Opcions!='S'){
                            options='<div class="row" style="margin-top:10px;"><div class="col-md-8"></br></div><div class="col-md-2"></div></div>';

                        }else{
                            options='<div class="row" style="margin-top:10px;"><div class="col-md-8">Opcions</div><div class="col-md-2"><button type="button" class="opcions boton btn btn-default btn-xs" aria-label="Left Align" data-size="mini" data-toggle="modal" data-target="#ModalOptions"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></button></div></div>';
                        }

                        visible='<div class="row divVisCom"><div class="col-md-8">Visible per als alumnes</div><div class="col-md-2"><input type="checkbox" '+visAlu+' data-toggle="toggle" data-on="<i class=\'fa fa-eye\' aria-hidden=\'true\'></i>" data-off=\'<i class="fa fa-eye-slash" aria-hidden="true"></i>\' data-style="ios" data-onstyle="success" data-width="60" data-size="mini"></div></div>';

                        if(s.EsCompartible!='N'){
                            compartit='<div class="row divVisCom"><div class="col-md-8">Servei compartit amb: </div><div class="col-md-2 compartit" title="'+serCompartit+'">'+serCompartit+'</div></div>';
                        }else{
                            compartit='';
                        }

                        estats='<div class="col-md-8"><div class="form">'+options+visible+compartit+'</div></div>';
                        a=a+1;

                        div=$('<div class="col-md-4" style="background-color: '+color+'; padding:10px;"><div class="row">'+caja+estats+'</div></div>');

                        divActualizar=$("#actius").append(div);

                    }else{

                        color=colorsB[b];

                        caja='<div class="col-md-4 text-center caja" title="'+s.Descripcio+'"><div class="row" ><div class="divIcono col-md-12 icon '+ico+'"></div></div><div class="row text-center divTitulo" style="min-height: 50px; display: flex; justify-content: center; align-content: center; flex-direction: column;"><p> '+titulo+" "+manual+' </p></div></div>';

                        // options='<div class="row"><div class="col-md-8">Opcions</div><div class="col-md-2"><button type="button" class="opcions boton btn btn-default btn-xs" aria-label="Left Align" data-size="mini" data-toggle="modal" data-target="#ModalOptions"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></button></div></div>';

                        if(s.Opcions!='S'){
                            options='<div class="row" style="margin-top:10px;"><div class="col-md-8"></br></div><div class="col-md-2"></div></div>';

                        }else{
                            options='<div class="row" style="margin-top:10px;"><div class="col-md-8">Opcions</div><div class="col-md-2"><button type="button" class="opcions boton btn btn-default btn-xs" aria-label="Left Align" data-size="mini" data-toggle="modal" data-target="#ModalOptions"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></button></div></div>';
                        }

                        visible='<div class="row divVisCom"><div class="col-md-8">Visible per als alumnes</div><div class="col-md-2"><input type="checkbox" '+visAlu+' data-toggle="toggle" data-on="<i class=\'fa fa-eye\' aria-hidden=\'true\'></i>" data-off=\'<i class="fa fa-eye-slash" aria-hidden="true"></i>\' data-style="ios" data-onstyle="success" data-width="60" data-size="mini"></div></div>';

                        if(s.EsCompartible!='N'){
                            compartit='<div class="row divVisCom"><div class="col-md-8">Servei compartit amb: </div><div class="col-md-2 compartit" title="'+serCompartit+'">'+serCompartit+'</div></div>';
                        }else{
                            compartit='';
                        }

                        estats='<div class="col-md-8"><div class="form">'+options+visible+compartit+'</div></div>';

                        div=$('<div class="col-md-4" style="background-color:'+color+'; padding: 10px;"><div class="row">'+caja+estats+'</div></div>');

                        divActualizar=$("#altres").prepend(div);

                        b=b+1;


                    }

                    $("#tituloGrup").html('CONFIGURACIÓ del GRUP: '+nomGrup+'  <a class="editTitulo" data-nom="'+nomGrup+'" href="#"> <span class="glyphicon glyphicon-pencil" style="font-size: 20px;"></span></a><FONT SIZE=-2> ('+$.get("grupaula")+') </FONT> ');
                    divActualizar=$("#contenedor").append(div);
                    

                }



                }

                
                

                divActualizar=$("#contenedor").append(div);
                
                div.find("[data-toggle='toggle']").bootstrapToggle();

            })
 
                //alert('hola');
 
            }
    })


})
//////////////////////////////////////////////////////
////// ABRIR EL ENLACE INFORMACIÓN DE QUEDA SERVEIS:

$('.caja').on('click',".url", function(){
    alert('hola');
    window.location.href = $(this).attr('url');
    $(this).attr('url');

});

/* Activa un servei */
$('#btnActivaServei').click(function(){
//$('#wizardForm').on('click',"#btnActivaServei", function(){
	variable = $('#taulaGrups').bootstrapTable('getSelections');
	grup=variable[0]["grup"];
	$.ajax({
		type: "POST",
		url: "hola/hola",
		data: $("#wizardForm").serialize()+'&grup=' + grup,
		success: function(data){

		}
	})
});

$( ".tipoServei" ).change(function() {
    var variable= $(this).val();
    if(variable!='nou'){
        $('#btn_fin').removeClass(' finBtn ').addClass('nextBtn');
        $('#btnIniAnt').removeClass(' iniBtn ').addClass('antBtn'); 
    }else{
        $('#btn_fin').removeClass(' nextBtn ').addClass('finBtn');
        $('#btnIniAnt').removeClass(' antBtn ').addClass('iniBtn');
    }
}) 

$( ".tipoMeus" ).change(function() {
    var variable= $(this).val();
    $('.divBtn').children('button.next').addClass('nextBtn');
    alert(variable);
    if(variable!='meus'){
        $('#altres').show();
        $('#meus').hide();
    }else{
        $('#meus').show();
        $('#altres').hide();
    }
    
})


$( ".tipoCurs" ).change(function() {

    $('.divBtn').children('button.next1').addClass('nextBtn');

}) 


$(document).ready(function () {
    //var navListItems = '',
    //var navListItems = $('div.setup-panel1 div a'), // tab nav items
            allWells = $('.setup-content'); // content div
            // allNextBtn = $('.nextBtn'); // next button
            // allAntBtn = $('.antBtn'); // ant button
            // allFinBtn =$('.finBtn'); // fin button

    allWells.hide(); // hide all contents by default

    $('.cos').on('click',".opcions", function(){
    //$(".opcions").click(function(){
        var navListItems = $('div.setup-panel div a');
        var itemIni= $('a.btn.btn-primary.btn-circle');
        $('div.setup-panel div a.btn-primary').trigger('click');
        return llamada(navListItems,itemIni);
    });

    $('.cos').on('click',".actServ", function(){
    //$(".actServ").click(function(){
        var navListItems = $('div.setup-panel1 div a');
        var itemIni= $('div.setup-panel1 div a.btn.btn-primary.btn-circle');
        $('div.setup-panel1 div a.btn-primary').trigger('click');
        return llamada(navListItems,itemIni);
    });

    /////////////////////////////////////////////////////////////////////

    /////////////////////////////////////////////////////////////////////


    function llamada(navListItems,itemIni){

            var $target = $($(itemIni).attr('href')),
                    $item = $(itemIni);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-primary').addClass('btn-default');
                $item.addClass('btn-primary');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
    }
    

    //////// NEXT BUTTON:

    $('.divBtn').on('click',".nextBtn", function(){ 
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            div =$(this).parents('.modal-body').find('.panel div a[href="#'+curStepBtn+'"]');

            nextStepWizard =div.parent().next().children("a"),

            navListItems = $(this).parents('.modal-body').find('.panel div a'),

            curInputs = curStep.find("input[type='text'],input[type='email'],input[type='password'],input[type='url']"),
            isValid = true;
           // Validation
        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }
        // move to next step if valid
        if (isValid)
            
            nextStepWizard.removeAttr('disabled');
            return llamada(navListItems,nextStepWizard);

    });



    //////// ANT BUTTON:

    $('.divBtn').on('click',".antBtn", function(){

        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel1 div a[href="#' + curStepBtn + '"]').parent().prev().children("a");
            navListItems = $(this).parents('.modal-body').find('.panel div a'),

            nextStepWizard.removeAttr('disabled');
            return llamada(navListItems,nextStepWizard);
    });



    //////// FIN BUTTON: (Hay que repensarlo)

    $('.divBtn').on('click',".finBtn", function(){
        var curStep = $(this).closest(".setup-content");
            curStepBtn = curStep.attr("id");



            navListItems = $(this).parents('.modal-body').find('.panel div a'),
            
            nextStepWizard=$('#fin');
            $('#fin').removeAttr('disabled').trigger('click');
            return llamada(navListItems,nextStepWizard);

    });


    //////// INI BUTTON: (Hay que repensarlo)

    $('.divBtn').on('click',".iniBtn", function(){
        var curStep = $(this).closest(".setup-content");
            curStepBtn = curStep.attr("id");

            //navListItems = $(this).parents('.modal-body').find('.panel div a'),
            
            //$('#ini').click();
            $('#ini').removeAttr('disabled').trigger('click');
            //return llamada(navListItems,nextStepWizard);
    });



});
</script>

            </body>
</html>

