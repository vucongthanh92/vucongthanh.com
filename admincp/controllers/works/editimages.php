<?php
$db = new Models_MWorks;
$mpicture = new Models_MPicture;
$id = varGet('p');
$idimages = varGet('id');
$data['pic'] = $mpicture ->getOneNews($idimages);
if(isset($_POST['addnew'])){
		if($_FILES['images1']['name'] != ''){
			@unlink('../data/Works/'.$data['pic']['images']);
			$tenhinh = strtoseo(varPost('title_vn')).rand_string(5);
			$cimg = new uploadImg;
			$hinh = $cimg -> Upload_NoReSize($_FILES['images1'],$tenhinh,"../data/Works/",$error);
			if($hinh != "") $mpicture->editNews(array('idpro'=>$id,'images'=>$hinh,'ticlock'=>'0'),$idimages);
		}
		redirect(BASE_URL_ADMIN. "works/edit/".$id);
		return;

}
$data['info'] = $db -> getOneProduct($id);
loadview('works/edit_images',$data);

?>