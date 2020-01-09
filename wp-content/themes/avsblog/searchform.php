<?php 
  if(get_search_query() != ""){
    $formClass = "focus";
  }
?>

<form role="search" method="get" id="searchform" class="<?php echo $formClass ?>" action="<?php echo home_url( '/' ) ?>" >
  <input id="headerInputSearch" type="text" value="<?php echo get_search_query() ?>" name="s" id="s"/>
  <label id="searchLabel" for="headerInputSearch">Find item</label>
</form>