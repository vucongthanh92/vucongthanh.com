<script type="text/javascript">
<!--
function checkform(){

	var frm = document.frm;
	if(frm.idcat.value == ""){
		alert("Vui lòng chọn chủ đề");
		return false;
	}
}
//-->
</script>
<?php include('submenu_tintuc.php'); ?>
<div class="main_area">
    <div class="breakcrumb">
    <table border="0">
    <tbody>
    <tr>
    <td width="25">
    <img alt=""  src="<?=ADMIN_PATH_IMG ?>icon-48-square.png" style="width:23px; height: 23px">
    </td>
    <td> Quản lý nội dung / Hình ảnh / Sửa </td>
    </tr>
    </tbody>
    </table>
    </div>
</div>
        
<div class="content">
<div class="content_i">
<form name="frm" action='<?=BASE_URL_ADMIN."images/edit/".$data['info']['Id'];?>' method='post' enctype="multipart/form-data" onsubmit="return checkform();">
<table>
<tbody>
<tr>
   <td width="800">
   <table>
	<tr>
    	<td class = 'title_td'><strong>Chủ đề</strong></td>
		<td>
			<select name = 'idcat'>
				<option value = ''>- - Chọn chủ đề - -</option>
			<?php
			$mcatnews = new Models_MCatimages;
			$ldata = $mcatnews->listdata();
			echo $tmenu = TreeCat($ldata,0,"",$data['info']['idcat'],"--");
			?>
			</select>
		</td>
	</tr>
    <tr>
        <td class = 'title_td'><strong>Tên Hình Ảnh</strong></td>
        <td><input type = 'text' name = 'title_vn' size = '50'></td>
    </tr>
	<?php if($data['info']['images'] !=""){ ?>
   	<tr>
        <td class = 'title_td'></td>
        <td> <img src="<?=BASE_URL."data/Album/".$data['info']['images'];?>" height="100" /></td>
    </tr>
    <?php } ?>
    <tr>
        <td class = 'title_td'><?php echo IMAGES;?></td>
        <td><input type = 'file' name = 'images'></td>
    </tr>
    <tr>
        <td class = 'title_td'><?php echo SORT;?></td>
        <td><input type = 'text' name = 'sort' size = '30' value="<?=$data['info']['sort'] ?>"></td>
    </tr>
	<tr>
		<th align = 'center' colspan="2">
			<input type = 'submit' value = '<?php echo G_BUTTON_EDIT;?>' name = 'editnew' class="button" style="float:none">&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>'  class="button" style="float:none">
		</th>
	</tr>	
</table>

</td>
<td valign="top">
	<table class="right_new" > 
        <tr>
            <td class = 'title_td'>Bật / Tắt</td>
            <td>
            	<select name="ticlock">
                	<option value="0" <? if($data['info']['ticlock']==0) echo 'selected="selected"'; ?> >Bật</option>
                    <option value="1" <? if($data['info']['ticlock']==1) echo 'selected="selected"'; ?>>Tắt</option>
            	</select>
            </td>
        </tr>
    </table>
</td>
</tr>
</tbody>
</table>
</form>

</div>
</div>
