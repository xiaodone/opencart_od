<?php
/**
 * @package he_: cc_hlp 
 * @author hsquare Tech Dev Team
 * @version 1.0
 */

function cc_hlp_breadcumbSetFirstStep($controller)
{
	if( !empty($_GET["dyo_bfs"]) )
	{
		$controller->session->data["dyo_breadcumb_first_step"] = $_GET["dyo_bfs"];	//D: diamond or S: setting
	}
}

function cc_hlp_breadcumbOrder($controller)
{
	if( $controller->session->data["dyo_breadcumb_first_step"] == "D" ) 
	{
		return array( "diamond", "setting", "preview" );
	}
	else 
	{
		return array( "setting", "diamond", "preview" );
	}
}

function cc_hlp_breadcumbMaxStepReachedTo($controller)
{
	if( 
	    ( $controller->session->data["dyo_breadcumb_first_step"] == "D" && ( isset( $controller->session->data["dyo_diamond_p_id"] ) && (int)$controller->session->data["dyo_diamond_p_id"] != 0 ) )
		||	
	    ( $controller->session->data["dyo_breadcumb_first_step"] == "S" && ( isset( $controller->session->data["dyo_setting_p_id"] ) && (int)$controller->session->data["dyo_setting_p_id"] != 0 ) )
	  )
	{
		if(
		    ( isset( $controller->session->data["dyo_diamond_p_id"] ) && (int)$controller->session->data["dyo_diamond_p_id"] != 0 )
			&&
		    ( isset( $controller->session->data["dyo_setting_p_id"] ) && (int)$controller->session->data["dyo_setting_p_id"] != 0 )
		  )
		{
			return 3; 
		}
		
		return 2;
	}
	
	return 1;
}

function cc_hlp_breadcumbCurrentStep($controller)
{
	if( !empty($_GET["dyo_bgs"]) )
	{
		return (int)$_GET["dyo_bgs"];
	}
	else 
	{
		return cc_hlp_breadcumbMaxStepReachedTo($controller);
	}
}

function cc_hlp_breadcumbIsCurrentStepDiamond($controller)
{
	$curr_step = cc_hlp_breadcumbCurrentStep();
	
	if( $curr_step < 3 )
	{
		$step_order = cc_hlp_breadcumbOrder($controller);
		if($step_order[$curr_step-1] == "diamond")
		{
			return true;
		}
	}
	
	return false; 
}

function cc_hlp_breadcumbIsCurrentStepSetting($controller)
{
	$curr_step = cc_hlp_breadcumbCurrentStep($controller);
	
	if( $curr_step < 3 )
	{
		$step_order = cc_hlp_breadcumbOrder($controller);
		if($step_order[$curr_step-1] == "setting")
		{
			return true;
		}
	}
	
	return false;
}

function breadCumbHtml( $data, $controller )
{
    //get first breadcumb url
    $listing = cc_hlp_breadcumbOrder( $controller );
    
    $hrefS = $hrefD = "";
    $styleS = $styleD = "";

    $hrefS1 = $hrefS2 = "";
    $hrefChange1 = $hrefChange2 = "";
    $styleS1 = $styleS2 = "";
    
    $maxStep = cc_hlp_breadcumbMaxStepReachedTo($controller);
    

    //change urls 
    if( $maxStep >  1 )
    {
        $hrefS = "href=".$data['base']."?".$data['setting_url_part'];
        $styleS = 'style="cursor:pointer"';
    }
    
    else
    {
        $hrefD = "href=".$data['base']."?".$data['diamond_url_part'];
        $styleD = 'style="cursor:pointer"';
    }
    
    
    //
    if( $maxStep >  1 )
    {
    	$hrefS1 = 'href="'.$controller->url->link('product/product', 'product_id='.($listing[0]=="setting" ? $controller->session->data["dyo_setting_p_id"] : $controller->session->data["dyo_diamond_p_id"]).'&dyo_bgs=1&is_dyo=1', IS_HTTPS ? 'SSL' : '').'"';
    	$styleS1 = 'style="cursor:pointer"';
    	$hrefChange1 = $controller->url->link('product/category', ($listing[0]=="setting" ? $data["setting_url_part_for_chng"] : $data["diamond_url_part_for_chng"])."&dyo_bgs=1", IS_HTTPS ? 'SSL' : '');
    }
    
    if( $maxStep >  2 )
    {
    	$hrefS2 = 'href="'.$controller->url->link('product/product', 'product_id='.($listing[1]=="setting" ? $controller->session->data["dyo_setting_p_id"] : $controller->session->data["dyo_diamond_p_id"]).'&dyo_bgs=2&is_dyo=1', IS_HTTPS ? 'SSL' : '').'"';
    	$styleS2 = 'style="cursor:pointer"';
    	$hrefChange2 = $controller->url->link('product/category', ($listing[1]=="setting" ? $data["setting_url_part_for_chng"] : $data["diamond_url_part_for_chng"])."&dyo_bgs=2", IS_HTTPS ? 'SSL' : '');
    }
    
    //select setting option
    $dyoS = '<a id="SettingFunnel" {styleS} container="#WidePane" {hrefS}>
					<span class="title_1">
						<span style="padding-left:0px !important">CHOOSE A</span>
						<br>SETTING
					</span>
				</a>
				<span class="noring1"></span>
				<span class="noring1" style="right:36px;font-size: 10px; margin-top: 42px !important; background-image:  none; cursor:pointer;" onclick="location.href=\''.$hrefChange1.'\'">Change</span>
			</span>';
    
    //select diamond option
    $dyoD = '<span class="title_2">
					<a id="DiamondFunnel" {styleS} container="#WidePane" {hrefS}>
						<span style="padding-left:0px !important">CHOOSE A</span>
						<br>DIAMOND
					</a>
				</span>
				<span class="nodiamond2"></span>
				<span class="noring1" style="right:50px;font-size: 10px; margin-top: 42px !important; background-image:  none; cursor:pointer;" onclick="location.href=\''.$hrefChange2.'\'">Change</span>
			</span>';
    
    $step_1 = ( cc_hlp_breadcumbCurrentStep( $controller ) > 2 ? 'step-active-cont' : ( cc_hlp_breadcumbCurrentStep( $controller ) > 1 ? 'step-active-cont' : 'step-active' ) );
    $step_2 = ( cc_hlp_breadcumbCurrentStep( $controller ) > 2 ? 'step-active-cont' : ( cc_hlp_breadcumbCurrentStep( $controller ) == 2 ? 'step-active' : '' ) );
    $step_3 = ( cc_hlp_breadcumbCurrentStep( $controller ) == 3 ? 'step-active' : '' );
    
    $html = '<div id="WidePane">
            	<div>
            		<span id="BreadCrumbsPane" class="BreadCrumbs">
            			<div id="SearchPane" style="padding-top:0;"></div>
                    	<div id="Filters">
                    		<div id="Funnel">
                    			<div style="display:none">
                    				<img src="image/banner/funnel-active-background.png">
                    			</div>
                        		<ul class="funnel-container" data-share-link="">
                        			<li data-shipping-date="" class="funnel-step '.$step_1.'">
                            			<div class="funnel-step-container">
                                            <span class="funnel-step-content">1';
    
                                        if( $listing[0] == "setting" )
                                        {
                                        	$dyoS = str_replace("{styleS}", $styleS1, $dyoS);
                                        	$dyoS = str_replace("{hrefS}", $hrefS1, $dyoS);
                                            $html .= $dyoS;
                                        }
                                        else
                                        {
                                        	$dyoD = str_replace("{styleS}", $styleS1, $dyoD);
                                        	$dyoD = str_replace("{hrefS}", $hrefS1, $dyoD);
                                            $html .= $dyoD;
                                        }
                                        
                                        $html .='</div>
                          			</li>
                          			<li data-shipping-date="" class="funnel-step '.$step_2.'">
                            			<div class="funnel-step-container">
                            				<span class="funnel-step-content">2';
    
                                            if( $listing[1] == "setting" )
                                            {
                                            	$dyoS = str_replace("{styleS}", $styleS2, $dyoS); 
                                            	$dyoS = str_replace("{hrefS}", $hrefS2, $dyoS);
                                            	$html .= $dyoS;
                                            }
                                            else
                                            {
                                            	$dyoD = str_replace("{styleS}", $styleS2, $dyoD);
                                            	$dyoD = str_replace("{hrefS}", $hrefS2, $dyoD);
                                            	$html .= $dyoD;
                                            }
                                            
                                            $html .= '</span>
                            			</div>
                          			</li>
                          			<li class="funnel-step '.$step_3.'">
                            			<div class="funnel-step-container">
                            				<span class="funnel-step-content">3</span>
                            				<span class="complete-ring completeFunnel"></span>
                            				<span class="title_3">
                            					<a id="CompleteFunnel" container="#WidePane" style="cursor:default">
                            						<span style="padding-left:0px !important">REVIEW</span>
                            						<br>
                                        			COMPLETE
                                            		RING
                                  				</a>
                                  			</span>
                                  			<span class="img_3"></span>
                                  			<span class="price_3"></span>
                                  		</div>
                          			</li>
                        		</ul>
                        		<br>
                        	</div>
                        </div>
                	</div>';
    return $html;
}

function cc_hlp_uncheckCheckoutSession($controller)
{
	unset($controller->session->data["dyo_maps"]);
}
