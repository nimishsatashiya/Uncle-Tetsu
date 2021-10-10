<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item start active open">
                <a href="{{ route('admin_dashboard') }}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>
            <?php 
                $rowarray = session("admin_user_rights");
                $activeClass="active open";
                $arrowClass="open";
                $scriptdata=$active="";
                $closeflag  = true;
                $groupname  = "";
                $className  = "";
                $PageTitle  = "";
                $insubmenu  = "";
                $show_in_menu  = "";
                $trngrouptitle  = "";
                $trngroupclass  = "";
                $pageurl  = "";
                $trnname  = "";
                $trngroupurl  = "";
                $trngrouplinktype  = "";
                $trngroupid  = "";
                $pagelink_type  = "";
                $rowValArray=array();
                $mainUrlArr=array();
                $subUrlArr=array();
                $currntUrl1=\Request::segment(1);
                $currntUrl2=\Request::segment(2);
                $currntUrl=$currntUrl1."/".$currntUrl2;
                $dbPageId="";
                $DbPage = \App\Models\AdminGroupPage::select('admin_group_id')->where('url',$currntUrl)->first();
                if($DbPage){
                    $dbPageId=$DbPage->admin_group_id;
                }
                // $scriptdata = '<li class="nav-item  ">';
                $rowarray = session("admin_user_rights");

                foreach ($rowarray as $titleId => $pages)
                {
                   
                    if($PageTitle!=$pages[0]["title"]){
                        if($PageTitle==""){
                        $scriptdata =$scriptdata.'<li class="heading"><h3 class="uppercase">'.$pages[0]["title"].'</h3></li><li class="nav-item  ">';
                        }
                    }
                    foreach ($pages as $rowData)
                    {
                        foreach ($rowData as $key=>$row)
                        {   
                            $rowValArray[$key]=$row;
                            if($key=='trngrouptitle'){
                                $trngrouptitle=$row;
                                $mainUrlArr[]=$trngrouptitle;
                            }
                            if($key=='insubmenu'){
                                $insubmenu=$row;
                            }
                            if($key=='show_in_menu'){
                                $show_in_menu=$row;
                            }
                            if($key=='pageurl'){
                                $pageurl=$row;
                                
                            }
                            if($key=='trnname'){
                                $trnname=$row;
                            }
                            if($key=='trngroupclass'){
                                $trngroupclass=$row;
                            }
                            if($key=='trngroupurl'){
                                $trngroupurl=$row;
                            }
                            if($key=='trngrouplinktype'){
                                $trngrouplinktype=$row;
                            }
                            if($key=='trngroupid'){
                                $trngroupid=$row;
                            }
                            if($key=='pagelink_type'){
                                $pagelink_type=$row;
                            }                             
                        }
                        
                        if($pageurl!="" || $trngroupurl!=""){
                            if (!in_array($pageurl, $subUrlArr)){ 
                                if($trngroupurl!=""){
                                    $pageurl=$trngroupurl;
                                }
                                $subUrlArr[]=$pageurl;
                            }
                        }
                        // echo "<pre>"; print_r($subUrlArr);

                        if($groupname != $trngrouptitle)
                        {
                            if ($groupname == "") 
                            {
                                if($trngroupclass!=""){
                                    $className='<i class="'.$trngroupclass.'"></i>';
                                }
                                if($insubmenu == "Y"){
                                    $scriptdata = $scriptdata.'<a href="javascript:;" class="nav-link nav-toggle">'.$className.'<span class="title">'.trim($trngrouptitle).'</span><span class="arrow '.($trngroupid==$dbPageId?$arrowClass:'').'"></span></a>';
                                }else{
                                   if($trngroupurl!=""){
                                        if($trngrouplinktype==0){
                                            $pageurl=$trngroupurl;
                                            $traget='target="_blank"';
                                        }else{
                                            $pageurl=url($trngroupurl);
                                            $traget='';
                                        }
                                    }
                                    $scriptdata = $scriptdata .'<li class="nav-item '.($trngroupid==$dbPageId?$activeClass:'').'">';
                                    $scriptdata = $scriptdata."<a ".$traget." href=\"". $pageurl."\">".$className.trim($trngrouptitle)."</a></li>"; 
                                }
                                $scriptdata = $scriptdata . '<ul class="sub-menu">';
                                $closeflag = false;
                                $className  = "";
                            } 
                            else 
                            {
                                if($trngroupclass!=""){
                                    $className='<i class="'.$trngroupclass.'"></i>';
                                }

                                $scriptdata = $scriptdata . "</ul></li>";
                                if($PageTitle!=$pages[0]["title"]){
                                    
                                    $scriptdata =$scriptdata.'<li class="heading"><h3 class="uppercase">'.$pages[0]["title"].'</h3></li><li class="nav-item  ">';
                                }
                                if($insubmenu == "Y"){

                                    $scriptdata = $scriptdata .'<li class="nav-item '.($trngroupid==$dbPageId?$activeClass:'').'">';
                                    $scriptdata = $scriptdata.'<a href="javascript:;">'.$className.trim($trngrouptitle).'<span class="arrow '.($trngroupid==$dbPageId?$arrowClass:'').'"></span></a>';
                                }else{
                                    if($trngroupurl!=""){
                                        if($trngrouplinktype==0){
                                            $pageurl=$trngroupurl;
                                            $traget='target="_blank"';
                                        }else{
                                            $pageurl=url($trngroupurl);
                                            $traget='';
                                        }
                                    }
                                    $scriptdata = $scriptdata .'<li class="nav-item '.($currntUrl==$trngroupurl?$activeClass:'').'">';
                                    $scriptdata = $scriptdata."<a ".$traget." href=\"". $pageurl."\">".$className.trim($trngrouptitle)."</a></li>";
                                }

                                $scriptdata = $scriptdata . '<ul class="sub-menu">';
                                $closeflag = false;
                                $className  = "";
                            }
                            if($insubmenu == "Y" && $show_in_menu == "Y")
                            {
                                if($pagelink_type==1){
                                    $traget='';
                                }else{
                                    $traget='target="_blank"';
                                }
                                $scriptdata = $scriptdata . '<li class="nav-item '.($currntUrl==$pageurl?$activeClass:'').'">';
                                $scriptdata = $scriptdata."<a ".$traget." class='nav-link' href=\"". url($pageurl)."\"><span class='title'>".trim($trnname)."</span></a></li>";
                            }
                        }
                        else
                        {
                            if($insubmenu == "Y" && $show_in_menu == "Y")
                            {
                                if($pagelink_type==1){
                                    $traget='';
                                }else{
                                    $traget='target="_blank"';
                                }
                                if($trnnameOld!=$trnname){
                                    $scriptdata = $scriptdata . "<li class='nav-item ".($currntUrl==$pageurl?$activeClass:'')."'><a ".$traget." class='nav-link' href=\"".url($pageurl)."\"><span class='title'>".trim($trnname)."</span></a></li>";
                                }
                            }
                        }
                        $trnnameOld = $trnname;
                        $groupname  = $trngrouptitle;
                        $PageTitle  = $pages[0]["title"];
                    }
                }
                $scriptdata = $scriptdata . " </li>";

                echo $scriptdata;
            ?>
        </ul>
    </div>
</div>