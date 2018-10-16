$(function(){
    
    function onSuccess(){
        $("#cp_photo").parent("a").find("span").html("Escolher outra Foto");
        
        var img = $("#cp_target").find("#crop_image");
        var imgn = $("#cp_target").find("#cp_name_img");
        
        if(img.length === 1){            
            $("#cp_img_path").val(imgn.attr("value"));
            img.cropper({aspectRatio: 1,
                        crop: function(data) {
                            $("#ic_x").val(data.x);
                            $("#ic_y").val(data.y);
                            $("#ic_h").val(data.height);
                            $("#ic_w").val(data.width);
                        }
            });
            
            $("#cp_accept").prop("disabled",false).removeClass("disabled");
            
            $("#cp_accept").on("click",function(){                
                $("#user_image").html('<img src="../assets/images/loaders/default.gif"/>');
                $("#profile_mini").html('<img src="../assets/images/loaders/default.gif"/>');
                $("#modal_change_photo").modal("hide");
                $("#cp_crop").ajaxForm({target: '#user_image'}).submit();
                $("#cp_target").html("Use o formulário abaixo para carregar o arquivo. Somente arquivos .jpg .");
                $("#cp_photo").val("").parent("a").find("span").html("Select file");
                $("#cp_accept").prop("disabled",true).addClass("disabled");
                $("#cp_img_path").val("");
            });           
        }
    }
    
    $("#cp_photo").on("change",function(){
        
        if($("#cp_photo").val() == '') return false;
        
        $("#cp_target").html('<img src="../assets/images/loaders/default.gif"/>');        
        $("#cp_upload").ajaxForm({target: '#cp_target',success: onSuccess}).submit();        
    });
    
    
});      