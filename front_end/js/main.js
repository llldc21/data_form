/* JavaScript Time */
// JS Bootstrap 
// JS DataForm
// TCC Project
// MARK FrontEnd
// WESLLEN FrontEnd
// :D
/*================================================================== */
( function ($) {
    "use strict";


     /*==================================================================
    [ Focus input ]*/
    $('.input100').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })    
    })
  
  
    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    /*==================================================================
    [ USER AREA ]*/
    
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
            
    var total = 1;
    $(document).on('click',"#add",function(){
    	total++;	
    	if(total<=6){
    		var campo = '<div class="col-md-3 col-sm-8" id="box1"><span style="margin-bottom:10px;" class="fas fa-file-alt fa-4x"></span><h5 styl="padding-left:40px;">Heading</h5><button class="remove button">excluir</button></div>';
    		$('#form').append(campo);
    	}
    });
    
    	$(document).on('click', ".remove", function(){
    	    $(this).parent().remove();
    });
    
})(jQuery);
