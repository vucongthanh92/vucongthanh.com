<?php
$db = new Models_MWorks;
$mpicture = new Models_MPicture;
$id = varGet('id');
if(isset($_POST['addnew'])){
		if($_FILES['images1']['name'] != ''){
			$tenhinh = strtoseo(varPost('title_vn')).rand_string(5);
			$cimg = new uploadImg;
			$hinh = $cimg -> Upload_NoReSize($_FILES['images1'],$tenhinh,"../data/Works/",$error);
			if($hinh != "") $mpicture->addNew(array('idpro'=>$id,'images'=>$hinh,'ticlock'=>'0'));
		}
		if($_FILES['images2']['name'] != ''){
			$tenhinh2 = strtoseo(varPost('title_vn')).rand_string(5);
			$cimg = new uploadImg;
			$hinh2 = $cimg -> Upload_NoReSize($_FILES['images2'],$tenhinh2,"../data/Works/",$error);
			if($hinh2 != "") $mpicture->addNew(array('idpro'=>$id,'images'=>$hinh2,'ticlock'=>'0'));
		}
		if($_FILES['images3']['name'] != ''){
			$tenhinh3 = strtoseo(varPost('title_vn')).rand_string(5);
			$cimg = new uploadImg;
			$hinh3 = $cimg -> Upload_NoReSize($_FILES['images3'],$tenhinh3,"../data/Works/",$error);
			if($hinh3 != "") $mpicture->addNew(array('idpro'=>$id,'images'=>$hinh3,'ticlock'=>'0'));
		}
		if($_FILES['images4']['name'] != ''){
			$tenhinh4 = strtoseo(varPost('title_vn')).rand_string(5);
			$cimg = new uploadImg;
			$hinh4 = $cimg -> Upload_NoReSize($_FILES['images4'],$tenhinh4,"../data/Works/",$error);
			if($hinh4 != "") $mpicture->addNew(array('idpro'=>$id,'images'=>$hinh4,'ticlock'=>'0'));
		}
	
		if($_FILES['images5']['name'] != ''){
			$tenhinh5 = strtoseo(varPost('title_vn')).rand_string(5);
			$cimg = new uploadImg;
			$hinh5 = $cimg -> Upload_NoReSize($_FILES['images5'],$tenhinh5,"../data/Works/",$error);
			if($hinh5 != "") $mpicture->addNew(array('idpro'=>$id,'images'=>$hinh5,'ticlock'=>'0'));
		}
	
		if($_FILES['images6']['name'] != ''){
			$tenhinh6 = strtoseo(varPost('title_vn')).rand_string(5);
			$cimg = new uploadImg;
			$hinh6 = $cimg -> Upload_NoReSize($_FILES['images6'],$tenhinh6,"../data/Works/",$error);
			if($hinh6 != "") $mpicture->addNew(array('idpro'=>$id,'images'=>$hinh6,'ticlock'=>'0'));
		}
		if($_FILES['images7']['name'] != ''){
			$tenhinh7 = strtoseo(varPost('title_vn')).rand_string(5);
			$cimg = new uploadImg;
			$hinh7 = $cimg -> Upload_NoReSize($_FILES['images7'],$tenhinh7,"../data/Works/",$error);
			if($hinh7 != "") $mpicture->addNew(array('idpro'=>$id,'images'=>$hinh7,'ticlock'=>'0'));
		}
		if($_FILES['images8']['name'] != ''){
			$tenhinh8 = strtoseo(varPost('title_vn')).rand_string(5);
			$cimg = new uploadImg;
			$hinh8 = $cimg -> Upload_NoReSize($_FILES['images8'],$tenhinh8,"../data/Works/",$error);
			if($hinh8 != "") $mpicture->addNew(array('idpro'=>$id,'images'=>$hinh8,'ticlock'=>'0'));
		}
		if($_FILES['images9']['name'] != ''){
			$tenhinh9 = strtoseo(varPost('title_vn')).rand_string(5);
			$cimg = new uploadImg;
			$hinh9 = $cimg -> Upload_NoReSize($_FILES['images6'],$tenhinh9,"../data/Works/",$error);
			if($hinh9 != "") $mpicture->addNew(array('idpro'=>$id,'images'=>$hinh9,'ticlock'=>'0'));
		}
		if($_FILES['images10']['name'] != ''){
			$tenhinh10 = strtoseo(varPost('title_vn')).rand_string(5);
			$cimg = new uploadImg;
			$hinh10 = $cimg -> Upload_NoReSize($_FILES['images10'],$tenhinh10,"../data/Works/",$error);
			if($hinh10 != "") $mpicture->addNew(array('idpro'=>$id,'images'=>$hinh10,'ticlock'=>'0'));
		}


		redirect(BASE_URL_ADMIN. "works/edit/".$id);
		return;

}else{

	$data = "";
}
$data['info'] = $db -> getOneProduct($id);
loadview('works/add_images',$data);

?>