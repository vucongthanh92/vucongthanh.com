<?php if(!isset($_GET['mod'])) { ?>
<div class="default_saigon">
     <div class="saigon_box">
          <div class="saigon_main">
               <div style="clear:both; height:30px;"></div>
               <h2 class="saigon_label"><a href="<?=BASE_URL."sai-gon-viet-voi.html"?>"><?=SAIGON_INFO?></a></h2>
               <?php
			       $sql="select * from mn_comment where ticlock='0' and hot='1' order by sort desc, Id desc limit 3";
				   $ds=mysql_query($sql) or die(mysql_error());
				   while($item=mysql_fetch_assoc($ds)) {
			   ?>
               <div class="saigon_info">
                    <img class="saigon_img" src="<?=BASE_URL."data/SaiGon/".$item['images'];?>" alt="<?=$item['title_'.lang];?>" />
                    <div class="saigon_title"><a title="<?=$item['title_'.lang]?>" href="<?=BASE_URL."sai-gon/".$item['alias'].".html"?>">
					     <?=$item['title_'.lang]?>
                    </a></div>
                    <div class="saigon_mota"><a title="<?=$item['title_'.lang]?>" href="<?=BASE_URL."sai-gon/".$item['alias'].".html"?>">
					     <?=limit_text($item['description_'.lang],250);?>
                    </a></div>
               </div>
               <?php } ?>
          </div>
     </div>
</div>
<?php } ?>