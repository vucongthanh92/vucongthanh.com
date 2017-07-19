<header class="slidebar">
    <div class="grid">
        <!--phần logo trên banner-->
        <div class="site-logo"><a href="<?=BASE_URL;?>">
           <img id="logo_img" src="<?=PATH_IMG_FLASH.$data['logo']['file_vn'];?>" alt="<?=$_SESSION['title_page']?>">
        </a></div>
        <!------------------------->
        
        <div class="topbar">
            <div class="text-right">
                <form method="post" action="" name="frmLang">
                   <div class="lang_box" onclick="javascript:setLang('vn')">
                      <img alt="<?=$_SESSION['title_page']?>" title="Vietnamese" src="public/template/images/vn.png"> <div>Vietnamese</div>
                   </div>
                   <div class="lang_box" onclick="javascript:setLang('en')">
                      <img alt="<?=$_SESSION['title_page']?>" title="English" src="public/template/images/en.png"> <div>English</div>
                   </div>
                   <input type="hidden" value="vi" name="lang">
                </form>
            </div>
            
            <div class="hotline_top"><a href="tel:<?=$_SESSION['hotline']?>"><?=$_SESSION['hotline']?></a></div>
        </div>
        
        <!--thanh tìm kiếm-->
        <div class="div_search">
            <div class="search_box">
                 <button class="search_submit" id="gh-search-submit" type="submit">
                        <span class="gh-text-replace"></span>
                 </button>
                 <input type="text" placeholder="Search " name="q" class="search_tukhoa" id="gh-search-input">
            </div>   
        </div>
        <!------------------>
        <div style="clear:both"></div>
    </div>
</header>