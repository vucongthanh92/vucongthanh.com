<?php
	$db = new Models_MWebsite;
	$row_web = $db->getOneWebsite(1);
	$mod = $_GET['mod'];
	$act = $_GET['act'];
	$_SESSION['title_page'] = $row_web['title_'.lang];
	$_SESSION['description_page'] = $row_web['description_'.lang];
	
	//phần meta của website
	if($mod=='san-pham')
	{
		$mcatelog = new Models_MCatelog;
	    $mproduct = new Models_MProduct;
		$manufacturer = new Models_MManufacturer;
		if($act=='danh-muc')
		{
			$val = varGet("id");
			$id = $mcatelog ->getalias($val);
			$info_cat = $mcatelog->getOneCatelog($id);
			if($info_cat['meta_title']!="") {$meta['title'] = $info_cat['meta_title'];}
			else {$meta['title'] = $info_cat['title_'.lang];}	
			if($info_cat['meta_keyword']!=""){$meta['keyword'] = $info_cat['meta_keyword'];}
			else {$meta['keyword'] = $row_web['keyword_'.lang];}
			if($info_cat['meta_description']!="") {$meta['description'] = $info_cat['meta_description'];}
			else {$meta['description'] = $row_web['description_'.lang];}
			$meta['images'] = BASE_URL."public/template/images/facebook_img.jpg";
		}
		else if($act=='chi-tiet')
		{
			$val = varGet("id");
			$id = $mproduct ->getalias($val);
			$infopro = $mproduct->getOneProduct($id);
			if($infopro['title_'.lang]==""){$meta['title'] = $row_web['title_'.lang];}
			else {$meta['title'] = $infopro['title_'.lang];}
			if($infopro['meta_keyword']==""){$meta['keyword']=$row_web['keyword_'.lang];}
			else{$meta['keyword']=$infopro['meta_keyword'];}
			if($infopro['meta_description']==""){$meta['description'] = $row_web['description_'.lang];}
			else{$meta['description'] = $infopro['meta_description'];}
			$meta['images'] = BASE_URL."data/Product/".$infopro['images'];
		}
		else if($act=='theme')
		{
			$meta['title']="Kho Giao Diện Website";
			$meta['keyword']=$row_web['keyword_'.lang];
			$meta['description']=$row_web['description_'.lang];
			$meta['images'] = BASE_URL."public/template/images/facebook_img.jpg";
		}
		else if($act=='chi-tiet-theme')
		{
			$val = varGet("id");
			$id = $manufacturer ->getAlias($val);
			$infopro = $manufacturer->getOneRows($id);
			if($infopro['title_'.lang]==""){$meta['title'] = $row_web['title_'.lang];}
			else {$meta['title'] = $infopro['title_'.lang];}
			if($infopro['meta_keyword']==""){$meta['keyword']=$row_web['keyword_'.lang];}
			else{$meta['keyword']=$infopro['meta_keyword'];}
			if($infopro['meta_description']==""){$meta['description'] = $row_web['description_'.lang];}
			else{$meta['description'] = $infopro['meta_description'];}
			$meta['images'] = BASE_URL."data/Product/".$infopro['images'];
		}
		else if($act=='allprod')
		{
			$meta['title']="Thiết Kế Website";
			$meta['keyword']=$row_web['keyword_'.lang];
			$meta['description']=$row_web['description_'.lang];
			$meta['images'] = BASE_URL."public/template/images/facebook_img.jpg";
		}
		else
		{
			$meta['title']=$row_web['title_'.lang];
			$meta['keyword']=$row_web['keyword_'.lang];
			$meta['description']=$row_web['description_'.lang];
			$meta['images'] = BASE_URL."public/template/images/facebook_img.jpg";
		}
	}
	//-----------------------
	
	//phần meta của seo
	else if($mod=='works')
	{
		$mcatworks = new Models_MCatworks;
	    $mworks = new Models_MWorks;
		if($act=='danh-muc')
		{
			$val = varGet("id");
			$id = $mcatworks -> getalias($val);
			$info_cat = $mcatworks -> getOneCatelog($id);
			if($info_cat['meta_title']!="") {$meta['title'] = $info_cat['meta_title'];}
			else {$meta['title'] = $info_cat['title_'.lang];}	
			if($info_cat['meta_keyword']!=""){$meta['keyword'] = $info_cat['meta_keyword'];}
			else {$meta['keyword'] = $row_web['keyword_'.lang];}
			if($info_cat['meta_description']!="") {$meta['description'] = $info_cat['meta_description'];}
			else {$meta['description'] = $row_web['description_'.lang];}
			$meta['images'] = BASE_URL."public/template/images/facebook_img.jpg";
		}
		else if($act=='chi-tiet')
		{
			$val = varGet("id");
			$id = $mworks -> getalias($val);
			$infopro = $mworks -> getOneProduct($id);
			if($infopro['title_'.lang]==""){$meta['title'] = $row_web['title_'.lang];}
			else {$meta['title'] = $infopro['title_'.lang];}
			if($infopro['meta_keyword']==""){$meta['keyword']=$row_web['keyword_'.lang];}
			else{$meta['keyword']=$infopro['meta_keyword'];}
			if($infopro['meta_description']==""){$meta['description'] = $row_web['description_'.lang];}
			else{$meta['description'] = $infopro['meta_description'];}
			$meta['images'] = BASE_URL."data/Product/".$infopro['images'];
		}
		else if($act=='allprod')
		{
			$meta['title']="Seo Website Chuyên Nghiệp";
			$meta['keyword']="dịch vụ seo website, seo web giá rẻ, seo từ khóa giá rẻ, dịch vụ seo chuyên nghiệp, dịch vụ seo từ khoá";
			$meta['description']="dịch vụ seo website chuyên nghiệp, uy tín, seo từ khóa giá rẻ nhanh lên top đạt thứ hạng cao trên google bền vững";
			$meta['images']=BASE_URL."public/template/images/facebook_img.jpg";
		}
		else
		{
			$meta['title']=$row_web['title_'.lang];
			$meta['keyword']=$row_web['keyword_'.lang];
			$meta['description']=$row_web['description_'.lang];
			$meta['images'] = BASE_URL."public/template/images/facebook_img.jpg";
		}
	}
	//-----------------------
	
	//phần meta của nhiếp ảnh
	else if($mod=='tin-tuc')
	{
		$mcatnews = new Models_MCatnews;
	    $mnews = new Models_MNews;
		$mcatimg = new Models_MCatimages;
	    $mimg = new Models_MImages;
		if($act=='danh-muc')
		{
			$val = $_GET['id'];
			$id = $mcatnews->getAlias($val);
			$info = $mcatnews->getOneCatnews($id);
			if($info['title_'.lang]==""){$meta['title'] = $row_web['title_'.lang];}
			else {$meta['title'] = $info['title_'.lang];}
			if($info['meta_keyword']==""){$meta['keyword']=$row_web['keyword_'.lang];}
			else{$meta['keyword']=$info['meta_keyword'];}
			if($info['meta_description']==""){$meta['description']=$row_web['description_'.lang];}
			else{$meta['description'] = $info['meta_description'];}
			$meta['images'] = BASE_URL."public/template/images/facebook_img.jpg";
		}
		else if($act=='chi-tiet')
		{
			$val=$_GET['id'];
			$id=$mnews->getAlias($val);
			$info=$mnews->getOneNews($id,"*");
			if($info['title_'.lang]==""){$meta['title'] = $row_web['title_'.lang];}
			else {$meta['title'] = $info['title_'.lang];}
			if($info['meta_keyword']==""){$meta['keyword'] = $row_web['keyword_'.lang];}
			else{$meta['keyword'] = $info['meta_keyword'];}
			if($info['meta_description']==""){$meta['description'] = $row_web['description_'.lang];}
			else{$meta['description'] = $info['meta_description'];}
			$meta['images'] = BASE_URL."data/Product/".$info['images'];
		}
		else if($act=='album')
		{
			$meta['title'] = "Những Album Ảnh Đẹp";
			$meta['keyword'] = "nhiếp ảnh, chụp ảnh nghệ thuật, cách chụp ảnh đẹp, nhiếp ảnh cơ bản, web ảnh đẹp";
			$meta['description'] = "kiến thức cơ bản về nhiếp ảnh cũng như hướng dẫn chụp những bức ảnh nghệ thuật và độc đáo, web còn chia sẽ nhiều bộ ảnh đẹp theo chủ đề";
			$meta['images'] = BASE_URL."public/template/images/facebook_img.jpg";
		}
		else if($act=='chi-tiet-album')
		{
			$val = varGet("id");
			$id = $mcatimg -> getalias($val);
			$info_cat = $mcatimg -> getOneCatelog($id);
			if($info_cat['title_'.lang]==""){$meta['title'] = $row_web['title_'.lang];}
			else {$meta['title'] = $info_cat['title_'.lang];}
			if($info_cat['meta_keyword']==""){$meta['keyword']=$row_web['keyword_'.lang];}
			else{$meta['keyword']=$info_cat['meta_keyword'];}
			if($info_cat['meta_description']==""){$meta['description'] = $row_web['description_'.lang];}
			else{$meta['description'] = $info_cat['meta_description'];}
			$meta['images'] = BASE_URL."data/Product/".$info_cat['images'];
		}
		else
		{
			$meta['title']="Chuyên Mục Nhiếp Ảnh";
			$meta['keyword']=$row_web['keyword_'.lang];
			$meta['description']=$row_web['description_'.lang];
			$meta['images'] = BASE_URL."public/template/images/facebook_img.jpg";
		}
	}
	//-----------------------
	
	//phần meta của sài gòn viết vội
	else if($mod=='sai-gon')
	{
		$msaigon = new Models_MSaiGon;
		if($act=='danh-muc')
		{
			$meta['title'] = 'Sài Gòn Viết Vội';
			$meta['keyword'] = "cuộc sống sài gòn, sài gòn chuyện đời của phố, người sài gòn, sài gòn trong tôi, đi chơi sài gòn, đường phố sài gòn";
			$meta['description'] = "cuộc sống sài gòn hiện lên một cách mộc mạc và bình dị qua con người nơi đây, những đường phố gắn liền với ký ức và đi đâu người ta cũng thương sài gòn";
			$meta['images'] = BASE_URL."public/template/images/facebook_img.jpg";
		}
		else if($act=='chi-tiet')
		{
			$val = varGet("id");
			$id = $msaigon -> getalias($val);
			$infopro = $msaigon -> getOneNews($id,"*");
			if($infopro['title_'.lang]==""){$meta['title'] = $row_web['title_'.lang];}
			else {$meta['title'] = $infopro['title_'.lang];}
			if($infopro['meta_keyword']==""){$meta['keyword']=$row_web['keyword_'.lang];}
			else{$meta['keyword']=$infopro['meta_keyword'];}
			if($infopro['meta_description']==""){$meta['description'] = $row_web['description_'.lang];}
			else{$meta['description'] = $infopro['meta_description'];}
			$meta['images'] = BASE_URL."data/Product/".$infopro['images'];
		}
		else
		{
			$meta['title'] = $row_web['title_'.lang];
			$meta['keyword'] = $row_web['keyword_'.lang];
			$meta['description'] = $row_web['description_'.lang];
			$meta['images'] = BASE_URL."public/template/images/facebook_img.jpg";
		}
	}
	//-----------------------
	
	//phần meta của khóa học trực tuyến
	else if($mod=='khoa-hoc')
	{
		$mkhoahoc = new Models_MWeblink;
		if($act=='danh-muc')
		{
			$meta['title'] = 'Khóa Học Trực Tuyến';
			$meta['keyword'] = "khóa học, khóa học trực tuyến, khóa học online, khóa học trực tuyến giá rẻ, khóa học online chất lượng";
			$meta['description'] = "Cung cấp các khóa học trực tuyến chất lượng, học viên có thể học online bất kì lúc nào rảnh. Giá mỗi khóa học rẻ cực shock và được bảo đảm về chất lượng";
			$meta['images'] = BASE_URL."public/template/images/facebook_img.jpg";
		}
		else if($act=='chi-tiet')
		{
			$val = varGet("id");
			$id = $mkhoahoc -> getalias($val);
			$infopro = $mkhoahoc -> getOneNews($id,"*");
			if($infopro['title_'.lang]==""){$meta['title'] = $row_web['title_'.lang];}
			else {$meta['title'] = $infopro['title_'.lang];}
			if($infopro['meta_keyword']==""){$meta['keyword']=$row_web['keyword_'.lang];}
			else{$meta['keyword']=$infopro['meta_keyword'];}
			if($infopro['meta_description']==""){$meta['description'] = $row_web['description_'.lang];}
			else{$meta['description'] = $infopro['meta_description'];}
			$meta['images'] = BASE_URL."data/Product/".$infopro['images'];
		}
		else
		{
			$meta['title'] = $row_web['title_'.lang];
			$meta['keyword'] = $row_web['keyword_'.lang];
			$meta['description'] = $row_web['description_'.lang];
			$meta['images'] = BASE_URL."public/template/images/facebook_img.jpg";
		}
	}
	//-----------------------
	
	elseif($mod=="bai-viet")
	{
		$mpagehtml = new Models_MPagehtml;
		$id = varGet("id");
		$info = $mpagehtml->getpagehtmlid($id);
		$meta['title'] = $info['title_vn'];
		$meta['keyword'] = $row_web['keyword_'.lang];
		$meta['description'] = $row_web['description_'.lang];
		$meta['images'] = BASE_URL."public/template/images/facebook_img.jpg";
	}
	
	else if($mod=="lien-he")
	{
		$meta['title'] = 'Liên hệ với chúng tôi';
		$meta['keyword'] = $row_web['keyword_'.lang];
		$meta['description'] = $row_web['description_'.lang];
		$meta['images'] = BASE_URL."public/template/images/facebook_img.jpg";
	}
	
	else 
	{
		$meta['title'] = $row_web['title_'.lang];
		$meta['keyword'] = $row_web['keyword_'.lang];;
		$meta['description'] =  $row_web['description_'.lang];
		$meta['images'] = BASE_URL."public/template/images/facebook_img.jpg";
	}
?>