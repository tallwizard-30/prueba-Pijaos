const mobileMenu = document.querySelector('.mobile-menu');
const IconMenu = document.querySelector('.menu');
const Fecha_Ingreso = document.querySelector('#fechaIngre');
const Fecha_Salida = document.querySelector('#Fecha_Salida');
const Hospital = document.querySelector('#Hospital');
IconMenu.addEventListener('click', toggleMobileMenu);


function toggleMobileMenu() {
  
    const accion= mobileMenu.classList.toggle('inactive');
     
   
   
   }


function buscadorpacientes() {

   
        var key = $("#numeDocu").val();		
        var dataString = 'key='+key;
        
    $.ajax({
            type: "POST",
            url: "ajax/pacientes.ajax.php",
            data: dataString,
            success: function(data) {
            
                $('#suggestions').fadeIn(1000).html(data);
                //Al hacer click en alguna de las sugerencias
                $('.suggest-element').on('click', function(){
                        //Obtenemos la id unica de la sugerencia pulsada
                        var id = $(this).attr('id');
                        //Editamos el valor del input con data de la sugerencia pulsada

                        const split = $('#'+id).attr('data').split("-");

                        const numedocu = split[0];
                        const nombre =  split[1];
                        const TipoDoc =  split[2];
                        
                        $('#numeDocu').val(numedocu);
                        $('#TipoDoc').val(TipoDoc);
                        
                        $('#nombreCom').val(nombre.toUpperCase());
                        //Hacemos desaparecer el resto de sugerencias
                        $('#suggestions').fadeOut(1000);

                        fechas(numedocu);
                       
                        return false;
                });
            }
        });
    
}





function editar(gestion) {
      let datos = {"ID":gestion.value}
      $.ajax({
          type: 'POST',
          url: 'ajax/Gestion.ajax.php',
          data: datos,
        success: function(resp) {
         
            let json = JSON.parse(resp);


            let numeDocu = json["No_Doc_Paciente"];
            let Id_hospitalizacion = json["Id_hospitalizacion"];
            let Nombrecomp = json["Nombre"];
            let Cod_Hospital = json["Cod_Hospital"];
            let nombHospital = json["hospital"];
            let estado = json["estado"];
            let Fecha_Ingres = json["Fecha_Ingreso"];
            let Fecha_Salid = json["Fecha_Salida"];
            document.getElementById("CodeGestion").disabled=false;
          
            $('#numeDocu').val(numeDocu);
            $('#nombreCom').val(Nombrecomp.toUpperCase());
            $('#estado').val(estado);
            $('#CodeGestion').val(Id_hospitalizacion);

           
           if (estado==1) {
            document.getElementById("modificar").disabled=true;
           }if (estado==0){
            document.getElementById("modificar").disabled=false;
           }
            const option = document.createElement('option');
            option.value = Cod_Hospital;
            option.text = nombHospital.toUpperCase();
            option.selected = true;
            

            $("#Hospital").find(`option[value='${Cod_Hospital}']`).remove();
           
            Hospital.append(option);
     
             $('#fechaSali').val(Fecha_Salid);
            
            $('#fechaIngreso').val(Fecha_Ingres);
            
            document.getElementById("BtnNuevo").disabled=false;
            document.getElementById("eliminar").disabled=false;
            $('#fechaIngre').show();
            $('#Fecha_Salida').show();
               let disable = true;
                deshabilitar(disable)

        }
      });
  }

  function modificar() {

    
    let disable = false;
    deshabilitar(disable)

    document.getElementById("numeDocu").disabled=true;
    document.getElementById("Hospital").disabled=true;
    document.getElementById("Guardar").disabled=false;
    
  }






  function deshabilitar(desab) {


    document.getElementById("numeDocu").disabled=desab;
    document.getElementById("Hospital").disabled=desab;
    document.getElementById("fechaIngreso").disabled=desab;
    document.getElementById("fechaSali").disabled=desab;  
    
  }

  function Nuevo(){

    document.getElementById("numeDocu").value="";
    document.getElementById("PacienteGest").value="";
    document.getElementById("nombreCom").value="";
    document.getElementById("Hospital").value="";
    document.getElementById("CodeGestion").value="";
    document.getElementById("fechaIngreso").value="";
    document.getElementById("fechaSali").value="";
    document.getElementById("estado").value="0";
    let disable = false;
    deshabilitar(disable)
    Fecha_Ingreso.classList.add('inactive');
    Fecha_Salida.classList.add('inactive');
    document.getElementById("BtnNuevo").disabled=true;
    document.getElementById("modificar").disabled=true;
    document.getElementById("eliminar").disabled=true;
    document.getElementById("Guardar").disabled=false;
    }



    function Guardar(){

        let formdata = new FormData(document.getElementById("addGestion"));
       
        $.ajax({
         type: 'POST',
         url: 'ajax/registrar.ajax.php',
         data: formdata,
         dataType:"HTML",
         cache:false,
         contentType:false,
         processData:false,
        
       success: function(resp) {
        if (resp !="ok") {
            Swal.fire(
                'ERROR!',
                resp
                
              )
        }else{
            Swal.fire(
                'guardado!',
                'Su Hospitalizcion  se a guardado Correctamente.',
                'success'
              )
        }
       }
       
       });
       
       }


       function Delete(formulario){

        let formdata = new FormData(document.getElementById(formulario));
       
        Swal.fire({
            title: 'esta seguro?',
            text: "Este cambio es irreversible!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si ,eliminar'
          }).then((result) => {
            if (result.isConfirmed) {


                $.ajax({
                    type: 'POST',
                    url: 'ajax/eliminar.ajax.php',
                    data: formdata,
                    dataType:"HTML",
                    cache:false,
                    contentType:false,
                    processData:false,
                   
                  success: function(resp) {
           
           
                  if (resp = "ok") {
                  
                  window.location.reload();
                    
                    }
                  }
                  
                  });
              
            }
          })
       
       
       }




function fechas(numedocu) {

    
                Fecha_Ingreso.classList.toggle('inactive');
              
           
                Fecha_Salida.classList.toggle('inactive');

               
          
    
}



