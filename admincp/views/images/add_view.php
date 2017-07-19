<script type="text/javascript">
function checkform(){
	var frm = document.frm;
	if(frm.idcat.value == ""){
		alert("Vui lòng chọn chủ đề");
		return false;
	}
}
</script>

<?php include('submenu_tintuc.php'); ?>
<div class="main_area">
    <div class="breakcrumb">
    <table border="0">
       <tr>
         <td width="25"><img alt=""  src="<?=ADMIN_PATH_IMG ?>icon-48-square.png" style="width:23px; height: 23px"></td>
         <td> Quản lý nội dung / Hình ảnh / Thêm mới</td>
       </tr>
    </table>
    </div>
</div>
        
<div class="content">
<div class="content_i">
<form name="frm" action='<?=BASE_URL_ADMIN;?>images/add' method='post' enctype="multipart/form-data" onsubmit="return checkform();">
<table>
<tr>
   <td width="800">
   <h2>
<img alt="" src="<?=ADMIN_PATH_IMG ?>icon-16-info.png">
Thông tin bài viết
</h2>
<table>
	<tr>
    	<td class = 'title_td'>Chủ đề</td>
		<td>
        <select name = 'idcat'>
            <option value = ''>- - Chọn chủ đề - -</option>
			<?php    
            $mcatnews = new Models_MCatimages;
            $ldata = $mcatnews->listdata();
            echo $tmenu = TreeCat($ldata,0,"","","--");
            ?>
        </select>
		</td>
	</tr>
    <tr>
        <td class = 'title_td'><strong>Tên Hình Ảnh</strong></td>
        <td><input type = 'text' name = 'title_vn' size = '50'></td>
    </tr>
	<tr>
        <td class = 'title_td'><?php echo IMAGES;?></td>
        <td><input type = 'file' name = 'images'></td>
    </tr>
	<tr>
		<th align = 'center' colspan="2">
			<input type = 'submit' value = '<?php echo G_BUTTON_ADD;?>' name = 'addnew' class="button" style="float:none">&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>' class="button" style="float:none" >
		</th>
	</tr>	
</table>
</td>
<td valign="top">
    <h2><img alt="" src="<?=ADMIN_PATH_IMG ?>icon-16-info.png">Thông tin thiết lập</h2>
	<table class="right_new" >
        <tr>
            <td class = 'title_td'><?php echo SORT;?></td>
            <td><input type = 'text' name = 'sort' size = '30'></td>
        </tr>
        <tr>
            <td class = 'title_td'>Bật / Tắt</td>
            <td>
            	<select name="ticlock">
                	<option value="0">Bật</option>
                    <option value="1">Tắt</option>
            	</select>
            </td>
        </tr>
    </table>
</td>
</tr>
</table>
</form>
</div>
</div>