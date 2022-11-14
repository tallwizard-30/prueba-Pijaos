function editarPacientes(gestion) {
    let datos = {"ID":gestion.value}
    $.ajax({
        type: 'POST',
        url: 'ajax/pacientes.ajax.php',
        data: datos,
      success: function(resp) {
       console.log(resp)
          let json = JSON.parse(resp);

         let id = json["id"];
          let tipo = json["tipo_documento"];
          let numeDocu = json["NO_DOCUENTO"];
          let nombres = json["nombres"];
          let apellidos = json["apellidos"];
          let fechaNac = json["fec_nacimiento"];
          let email = json["email"];
          
        
          $('#tipo').val(tipo);
          $('#numeDocu').val(numeDocu);
          $('#numeDocuOCU').val(numeDocu);
          $('#nombres').val(nombres.toUpperCase());
          $('#apellidos').val(apellidos.toUpperCase());
          $('#fechaNac').val(fechaNac);
          $('#email').val(email);
          document.getElementById("id").disabled=false;
          $('#id').val(id);
          
          document.getElementById("BtnNuevo").disabled=false;
          document.getElementById("eliminar").disabled=false;
          document.getElementById("modificar").disabled=false;
        let disable = true;
        document.getElementById("numeDocu").disabled=true;
        modificarPaciente(disable)
      }
    });
}



  
  function modificarPaciente(desab) {


    
    document.getElementById("tipo").disabled=desab;
   
    document.getElementById("nombres").disabled=desab;
    document.getElementById("apellidos").disabled=desab;
    document.getElementById("fechaNac").disabled=desab;
    document.getElementById("email").disabled=desab;
    document.getElementById("Guardar").disabled=false;

    
  }

  function GuardarPaciente(){

    let formdata = new FormData(document.getElementById("addPaciente"));
   
    $.ajax({
     type: 'POST',
     url: 'ajax/pacientes.ajax.php',
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
            'Su paciente se a guardado Correctamente.',
            'success'
          )
    }
   
   }
   
   });
   
   }


   function DeletePaciente(){

    let formdata = new FormData(document.getElementById("addPaciente"));
   
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
       
                
                if (resp !="ok") {
                    Swal.fire(
                        'ERROR!',
                        resp
                        
                      )
                }
              if (resp === "ok") {
              
              window.location.reload();
                
                }
              }
              
              });
          
        }
      })
   }



  function NuevoPaciente(){

    document.getElementById("tipo").value="";
    document.getElementById("numeDocu").value="";
    document.getElementById("nombres").value="";
    document.getElementById("apellidos").value="";
    document.getElementById("fechaNac").value="";
    document.getElementById("email").value="";
    document.getElementById("id").value="";
    document.getElementById("id").disabled=true;
    document.getElementById("numeDocu").disabled=false;
    document.getElementById("BtnNuevo").disabled=true;
    document.getElementById("modificar").disabled=true;
    document.getElementById("eliminar").disabled=true;
    document.getElementById("Guardar").disabled=false;
    let disable = false;


    modificarPaciente(disable)
    }