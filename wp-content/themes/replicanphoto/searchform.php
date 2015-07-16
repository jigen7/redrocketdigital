<form role="search" method="get" id="search" class="searchform" action="<?php echo home_url('/'); ?>">
    <div class="clearfix"></div>
        <input type="text" placeholder="Search" name="s" />
        <a href="#" onclick="submitForm(this);return false;" class="btn btn-1">Search</a> 
</form>
<div class="clear"></div>
<br/>
<script>
function submitForm(elem){
  while (elem.parentNode && elem.parentNode.tagName != "FORM"){
     elem = elem.parentNode;
  }
  var oForm = elem.parentNode;
  oForm.submit();
}
</script>
