(function(){
  'use strict';
  
    $(document).ready(function(){

        let form = $('.bootstrap-form');
        // On every :input focusout validate if empty
        $(':input').blur(function(){
            Test.validarInputs(this);
        });       
        // On every :input focusin remove existing validation messages if any
        $(':input').click(function(){
            $(this).removeClass('is-valid is-invalid');
        });
        // On every :input focusin remove existing validation messages if any
        $(':input').keydown(function(){
            $(this).removeClass('is-valid is-invalid');
        });
        // Reset form and remove validation messages
        $(':reset').click(function(){
            $(':input, :checked').removeClass('is-valid is-invalid');
            $(form).removeClass('was-validated');
        });    
    });
})();
/*
//  controlarEnvio
    function enableSubmit (idbutton) {
        $(idbutton).removeAttr("disabled");
    }
         
    function disableSubmit (idbutton) {
        $(idbutton).attr("disabled", "disabled");
    }   
*/