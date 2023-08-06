<div class="brand-text  pl-0 text-bold 'h4'">
    <span class='text-primary'>
        FOLLOW FOR NOW
    </span> 
    <span class="text-primary">
        <i class="text-dark">LIFE SKILLS 101</i>
    </span>
</div>

<script>
    
 $("#nav_menu-2 .widget-title").click (function(){
  // Close all open windows
  let navItem = $(".menu-quick-links-container")
  if(navItem.hasClass('open')){
      navItem.removeClass('open');
      navItem.addClass("closed"); 
  }
  if(navItem.hasClass('closed')){
    navItem.removeClass('closed');
    navItem.addClass("open"); 
  }
  
});
</script>