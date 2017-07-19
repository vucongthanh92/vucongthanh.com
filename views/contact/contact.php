<div class="defaul_main">
<div class="listprod_content">
    <h1 class="breakcum_box"><ol class="breakcum_label" itemscope itemtype="http://schema.org/BreadcrumbList"><?=$data['map_title'];?></ol></h1>
    <div class="default_tintuc">
	<form action="/lien-he.html" name="formlienhe" class="formlienhe" method="post">
       <div class="lienhe_row">
	       <div class="lienhe_tieude"><?=HOTEN?>:</div>
	       <div class="lienhe_noidung"><input name="hoten" class="form-control" value="<?=$data['hoten'] ?>" type="text" placeholder="<?=HOTEN?>"/></div>
           <div style="clear:both"></div>
       </div>
       
       <div class="lienhe_row"> 
           <div class="lienhe_tieude">Email</div>
           <div class="lienhe_noidung"><input name="email" value="<?=$data['email'] ?>" type="text" placeholder="Email"  class="form-control" /></div>
           <div style="clear:both"></div>
       </div>
       
       <div class="lienhe_row">
           <div class="lienhe_tieude"><?=NOIDUNG?>:</div>
           <div class="lienhe_noidung"><textarea name="noidung" class="form-content" id="noidung"></textarea></div>
           <div style="clear:both"></div>
       </div>
       
       <div class="lienhe_row">
           <div class="lienhe_tieude"></div>
           <div class="lienhe_noidung"><input type="submit" name="btngui" id="btngui" value="<?=GUILIENHE?>" class="btn btn-primary clear" /></div>
           <div style="clear:both"></div>
       </div>			
    </form>
    
    <h2 class="lienhe_info"><?=CONTACT_INFO?></h2>
    <div style="clear:both;"></div>
    </div>
</div>

<?php loadview('pagefixed/left',$left);?>
</div>