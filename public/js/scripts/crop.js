$(function(){
    var gifUrl = window.Laravel.appUrl + "/images/pages/default.gif";

    function onSuccess(){
        $("#cp_photo").parent("a").find("span").html("Select other image");
        
        var img = $("#cp_target").find("#crop_image")
        
   
        if(img.length === 1){            


            // $("#cp_img_path").val(img.attr("src"));
            $("#cp_img_path").val(img.data("filename"));
            
          let cropper=   img.cropper({aspectRatio: 1, 
                minWidth: 100,
                minHeight: 100,
                maxWidth: 1000,
                maxHeight: 1000,
                        done: function(data) {
                            $("#ic_x").val(data.x);
                            $("#ic_y").val(data.y);
                            $("#ic_h").val(data.height);
                            $("#ic_w").val(data.width);
                        }
            });
            
            $("#cp_accept").prop("disabled",false).removeClass("disabled");
            $('.close-model').on('click',function (e) { 
                cropper.cropper('reset')
                cropper.cropper('destroy')
                $("#cp_target").html("Select a file. Only .jpg, .jpeg, .png files are allowed.");
                $("#cp_photo").val("").parent("a").find("span").html("Select file");
                $("#cp_accept").prop("disabled",true).addClass("disabled");
                $("#cp_img_path").val("");
            });     
            $("#cp_accept").off().on("click",function(){                
                $("#user_image").html('<img src="' + gifUrl + '"/>');
                $("#modal_change_photo").modal("hide");
                
                $("#cp_crop").ajaxForm({target: '#user_image',success: (res)=>{
                       let profileUrl = $('.rounded-circle').prop('src');
                        $('.round, .rounded, .rounded-circle').prop('src',`${profileUrl}?t=`+new Date().getTime());
                }}).submit();   
                $("#cp_target").html("Select a file. Only .jpg, .jpeg, .png files are allowed.");
                $("#cp_photo").val("").parent("a").find("span").html("Select file");
                $("#cp_accept").prop("disabled",true).addClass("disabled");
                $("#cp_img_path").val("");
            });
      
        }
    }
    
    $("body").on("change", "#cp_photo", function() {
        if($("#cp_photo").val() == '') return false;
        $("#cp_target").html('<img src="' + gifUrl + '"/>');        
        $("#cp_upload").ajaxForm({target: '#cp_target',success: onSuccess}).submit();   
    });
    
});   