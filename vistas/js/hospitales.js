function editarHospitales(gestion) {
    let datos = {"ID":gestion.value}
    $.ajax({
        type: 'POST',
        url: 'ajax/Hospitales.ajax.php',
        data: datos,
      success: function(resp) {
       console.log(resp)
          let json = JSON.parse(resp);


          let codHospi = json["Cod_Hospital"];
          let NombreH = json["Nombre"];
          
          
          $('#HospiId').val(codHospi);
          $('#codHospi').val(codHospi);
          $('#NombreH').val(NombreH.toUpperCase());
          
          document.getElementById("BtnNuevo").disabled=false;
          document.getElementById("eliminar").disabled=false;
          document.getElementById("modificar").disabled=false;
        let disable = true;
          modificarHospital(disable)
      }
    });
}



  
  function modificarHospital(desab) {


    document.getElementById("codHospi").disabled=desab;
    document.getElementById("NombreH").disabled=desab;
    document.getElementById("Guardar").disabled=false;
    
  }

  function GuardarHospital(){

    let formdata = new FormData(document.getElementById("addHospital"));
   
    $.ajax({
     type: 'POST',
     url: 'ajax/Hospitales.ajax.php',
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
            'Su Hospital se a registrado Correctamente.',
            'success'
          )
    }
   }
   
   });
   
   }


   function DeleteHospital(){

    let formdata = new FormData(document.getElementById("addHospital"));
   
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



  function NuevoHospital(){

    document.getElementById("codHospi").value="";
    document.getElementById("NombreH").value="";
    document.getElementById("HospitalId").value="";

    document.getElementById("BtnNuevo").disabled=true;
    document.getElementById("modificar").disabled=true;
    document.getElementById("eliminar").disabled=true;
    document.getElementById("Guardar").disabled=false;
    let disable = false;


    modificarHospital(disable)
    }