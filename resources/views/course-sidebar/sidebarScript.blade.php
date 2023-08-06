<script>
        var menu_btn = document.querySelector("#menu-btn");
        var sidebar = document.querySelector("#sidebar");
        var container = document.querySelector(".my-container");

        if($('.side-navbar').length){

            $('.side-navbar').height($('.content-body').height());
            $('.side-navbar').css({
                'overflow-y' : 'scroll'
            })
        }

        if(window.innerWidth <= 786){

            $(container).removeClass('active-cont');
            $('#small-menu-toggler').removeClass('d-none');
            $('#small-open-menu-closer').removeClass('d-none');
            $(sidebar).addClass('d-none');
            $(sidebar).css({
                'position':"relative", 
                'width': '100%',
                'height' : '400px', 
                'opacity':0, 
                'overflow-y' : 'scroll'
            })
            
        }
        


        $('#small-open-menu-opener').click(() => {
            $('#small-open-menu-opener').attr("disabled", true)
            if($(sidebar).hasClass('d-none')){
                $(sidebar).toggleClass('d-none');
                $(sidebar).animate({
                    'opacity' : 1
                }, {
                    'duration' : 400,
                    complete: () => {
                        $('#small-open-menu-opener').attr("disabled", false);
                    }
                })


            }else{

                $(sidebar).animate(
                    {
                        'opacity' : 0
                    }, 
                    {
                        'duration' : 400,
                        complete: () => {
                            $('#small-open-menu-opener').attr("disabled", false);
                            $(sidebar).toggleClass('d-none');    
                        }
                    }
                )
                
            }
        })

        // dblclickoff( "dblclick" )
        $('#small-open-menu-closer').click(() => {
            $('#small-open-menu-closer').attr("disabled", true)
            $(sidebar).animate({
                    'opacity' : 0
                },{
                    'duration' : 400,
                    complete: () => {
                        $(sidebar).toggleClass('d-none');
                        $('#small-open-menu-closer').attr("disabled", false)
                }
            })
        })


  
</script>