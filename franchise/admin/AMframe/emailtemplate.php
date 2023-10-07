<?php
class emailtemplate {
	
	function signup($url,$siteinfo){
		$sitetitle = $siteinfo['sitetitle'];
		$siteurl = $siteinfo['siteurl'];
		$sitelogo = $siteurl."/admin/uploads/general_setting/".$siteinfo['sitelogo'];
		$siteemail = $siteinfo['siteemail'];
		$_fb = $siteinfo['fburl'];
		$_tw = $siteinfo['twurl'];
		$_gp = $siteinfo['gpurl'];
		$_ln = $siteinfo['lnurl'];
		
		$msg = "<body bgcolor='#E1E1E1' leftmargin='0' marginwidth='0' topmargin='0' marginheight='0' offset='0'>
		<center style='background-color:#f1f1f1;'>
		   <table bgcolor='#FFFFFF'  border='0' cellpadding='0' cellspacing='0' width='620' style='color:#FFFFFF; background:#1976D2;'>
			   <tr >
				  <td align='center' valign='top' class='textContent' style='font-size:12px; font-family: Helvetica,Arial,sans-serif; padding:10px; color:white;font-weight:bold'>
				   Support Email : $siteemail
				  </td>
			  </tr>
			</table>

			<table bgcolor='#FFFFFF'  border='0' cellpadding='0' cellspacing='0' width='620' id='emailBody'>
				<tr>
					<td align='center' valign='top'>
						<table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:#FFFFFF;' bgcolor='#ffffff'>
							<tr>
								<td align='center' valign='top'>
									<table border='0' cellpadding='0' cellspacing='0' width='500' class='flexibleContainer'>
										<tr>
											<td align='center' valign='top' width='600' class='flexibleContainerCell'>
												<!-- // CONTENT TABLE -->
												<table border='0' cellpadding='15' cellspacing='0' width='100%'>
													<tr>
														<td align='center' valign='top' class='textContent'>
														  <a href='$siteurl' target='_blank'>
															<img src='$sitelogo' class='img-responsive'></a>
														</td>
													</tr>
												</table>
												<!-- // CONTENT TABLE -->
											</td>
										</tr>
									</table>
									<!-- // FLEXIBLE CONTAINER -->
								</td>
							</tr>
						</table>
						<table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:#FFFFFF; border:0px solid #000; padding: 40px;     background:#D3E6F9;' bgcolor='#ffffff'>
							<tr>
								<td align='center' valign='top'>
									<table border='0' cellpadding='0' cellspacing='0' width='500' class='flexibleContainer'>
										<tr>
											<td align='center' valign='top' width='600' class='flexibleContainerCell'>
												<table border='0' cellpadding='0' cellspacing='0' width='100%' style='font-size:16px;'>
													<tr>
														<td align='center' valign='top' class='textContent' style='font-size: 16px; font-family: Helvetica,Arial,sans-serif; color:#4C4C4C; font-weight: 600;'>
															To activate, click below link. Do not share this mail with anyone else. If you wrongly received this mail simply skip this.
														</td>
													</tr>
													<tr>
														<td align='center' valign='top' class='textContent' style='padding-top: 30px;' >
															<a style='color:#FFFFFF;text-decoration:none;font-family:Helvetica,Arial,sans-serif;font-size:20px;line-height:135%; padding: 10px 20px;background: #F79118; border-radius: 30px;' href='$url' target='_blank'>Click here</a>
														</td>
													</tr>
												</table>
												<!-- // CONTENT TABLE -->
											</td>
										</tr>
									</table>
									<!-- // FLEXIBLE CONTAINER -->
								</td>
							</tr>
						</table>
						<!-- // CENTERING TABLE -->
					 <table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:#FFFFFF; border:0px solid #000; padding: 10px; background:#1976D2;'>
						<tr>
						   <td></td>
						</tr>
					 </table>   
					  <table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:#FFFFFF; border:0px solid #000; padding:26px; background:#d8dde4;'>
					  <tr>
						   <td align='center' style='color:#999;'>
							<table width='200' border='0' cellspacing='2' cellpadding='0'>
							  <tr>
								<td><a href='$_fb' target='_blank'><img src='http://www.exclusivescript.com/images/social/facebook.png' width='32'></a></td>
								<td><a href='$_tw' target='_blank'><img src='http://www.exclusivescript.com/images/social/twitter.png' width='32'></a></td>
								<td><a href='$_gp' target='_blank'><img src='http://www.exclusivescript.com/images/social/google-plus.png' width='32'></a></td>
								<td><a href='$_ln' target='_blank'><img src='http://www.exclusivescript.com/images/social/linkedin.png' width='32'></a></td>
							  </tr>
							</table>
						   </td>
						</tr>
						<tr>
						   <td align='center' style='color:#999; font-family: Helvetica,Arial,sans-serif; font-size: 12px;'>
							  Copyright &copy; ".date("Y")." $sitetitle. All rights reserved.
						   </td>
						</tr>
					 </table>
				</td>
			</tr>
			</table>
		</center>
		</body>";                          

		return $msg;
	}
	function forget_pass($to){
		$new_pass = common::randuniq(rand(11,99));
		$new_pass_md5 = md5($new_pass);
		$upid=database::insertrec("update register set password='$new_pass_md5',decript_password='$new_pass',chngdt='".date('Y-m-d H:i:s')."' where email='$to'"); 
		$from=database::singlerec("SELECT admin_email from general_setting where id=1");
		$message1="<body bgcolor='#E1E1E1' leftmargin='0' marginwidth='0' topmargin='0' marginheight='0' offset='0'> <center style='background-color:#f1f1f1;'> <table bgcolor='#FFFFFF' border='0' cellpadding='0' cellspacing='0' width='620' style='color:#FFFFFF; background:#1976D2;'> <tr > <td align='center' valign='top' class='textContent' style='font-size:12px; font-family: Helvetica,Arial,sans-serif; padding:10px;'> Support Email: support@exclusivescript.com </td> </tr> </table> <table bgcolor='#FFFFFF' border='0' cellpadding='0' cellspacing='0' width='620' id='emailBody'> <tr> <td align='center' valign='top'> <table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:#FFFFFF;' bgcolor='#ffffff'> <tr> <td align='center' valign='top'> <table border='0' cellpadding='0' cellspacing='0' width='500' class='flexibleContainer'> <tr> <td align='center' valign='top' width='600' class='flexibleContainerCell'> <!-- // CONTENT TABLE --> <table border='0' cellpadding='15' cellspacing='0' width='100%'> <tr> <td align='center' valign='top' class='textContent'> <a href='http://www.exclusivescript.com/' target='_blank'> <img src='http://www.exclusivescript.com/admin/uploads/general_setting/logo.png' class='img-responsive'></a></td> </tr> </table> <!-- // CONTENT TABLE --> </td> </tr> </table> <!-- // FLEXIBLE CONTAINER --> </td> </tr> </table> <table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:#FFFFFF; border:0px solid #000; padding: 40px; background:#D3E6F9;' bgcolor='#ffffff'> <tr> <td align='center' valign='top'> <table border='0' cellpadding='0' cellspacing='0' width='500' class='flexibleContainer'> <tr> <td align='center' valign='top' width='600' class='flexibleContainerCell'> <table border='0' cellpadding='0' cellspacing='0' width='100%' style='font-size:16px;'> <tr> <td align='center' valign='top' class='textContent' style='font-size: 16px; font-family: Helvetica,Arial,sans-serif; color:#4C4C4C; font-weight: 600;'>Your username $to and password $new_pass don't share it with anyone. <a href='http://www.exclusivescript.com/user/login' target='_blank'>click here</a></td> </tr> </table> <!-- // CONTENT TABLE --> </td> </tr> </table> <!-- // FLEXIBLE CONTAINER --> </td> </tr> </table> <!-- // CENTERING TABLE --> <table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:#FFFFFF; border:0px solid #000; padding: 10px; background:#1976D2;'> <tr> <td></td> </tr> </table> <table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:#FFFFFF; border:0px solid #000; padding:26px; background:#d8dde4;'> <tr> <td align='center' style='color:#999; font-family: Helvetica,Arial,sans-serif; font-size: 12px;'> Copyright &copy; 2016 www.exclusivescript.com. All rights reserved.</td> </tr> </table> </td> </tr> <!-- // MODULE ROW --> </table> </center></body>";
		$sub="Exclusive Scriprt password re-set request";
		common::email($this->from,$to,$sub,$message1); 
	}
	
	function standered($siteinfo,$text){
		$sitetitle = $siteinfo['sitetitle'];
		$siteurl = $siteinfo['siteurl'];
		$sitelogo = $siteinfo['sitelogo'];
		$sitelogo = $siteurl."/admin/uploads/general_setting/".$sitelogo;
		$siteemail = $siteinfo['siteemail'];
		$_fb = $siteinfo['fburl'];
		$_tw = $siteinfo['twurl'];
		$_gp = $siteinfo['gpurl'];
		$_ln = $siteinfo['lnurl'];
				
		$msg = "<body bgcolor='#E1E1E1' leftmargin='0' marginwidth='0' topmargin='0' marginheight='0' offset='0'>
		<center style='background-color:#f1f1f1;'>
		   <table bgcolor='#FFFFFF'  border='0' cellpadding='0' cellspacing='0' width='620' style='color:#FFFFFF; background:#1976D2;'>
			   <tr >
				  <td align='center' valign='top' class='textContent' style='font-size:12px; font-family: Helvetica,Arial,sans-serif; padding:10px; color:white;font-weight:bold'>
				   Support Email : $siteemail
				  </td>
			  </tr>
			</table>

			<table bgcolor='#FFFFFF'  border='0' cellpadding='0' cellspacing='0' width='620' id='emailBody'>
				<tr>
					<td align='center' valign='top'>
						<table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:#FFFFFF;' bgcolor='#ffffff'>
							<tr>
								<td align='center' valign='top'>
									<table border='0' cellpadding='0' cellspacing='0' width='500' class='flexibleContainer'>
										<tr>
											<td align='center' valign='top' width='600' class='flexibleContainerCell'>
												<!-- // CONTENT TABLE -->
												<table border='0' cellpadding='15' cellspacing='0' width='100%'>
													<tr>
														<td align='center' valign='top' class='textContent'>
														  <a href='$siteurl' target='_blank'>
															<img src='$sitelogo' class='img-responsive'></a>
														</td>
													</tr>
												</table>
												<!-- // CONTENT TABLE -->
											</td>
										</tr>
									</table>
									<!-- // FLEXIBLE CONTAINER -->
								</td>
							</tr>
						</table>
						<table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:#FFFFFF; border:0px solid #000; padding: 40px;     background:#D3E6F9;' bgcolor='#ffffff'>
							<tr>
								<td align='center' valign='top'>
									<table border='0' cellpadding='0' cellspacing='0' width='500' class='flexibleContainer'>
										<tr>
											<td align='center' valign='top' width='600' class='flexibleContainerCell'>
												<table border='0' cellpadding='0' cellspacing='0' width='100%' style='font-size:16px;'>
													<tr>
														<td align='center' valign='top' class='textContent' style='font-size: 16px; font-family: Helvetica,Arial,sans-serif; color:#4C4C4C; padding-top: 30px; font-weight: 600;'>
															$text
														</td>
													</tr>
													<tr>
														<td align='center' valign='top' class='textContent' style='padding-top: 30px;' >
															<a style='color:#FFFFFF;text-decoration:none;font-family:Helvetica,Arial,sans-serif;font-size:20px;line-height:135%; padding: 10px 20px;background: #F79118; border-radius: 30px;' href='$siteurl' target='_blank'>Login</a>
														</td>
													</tr>
												</table>
												<!-- // CONTENT TABLE -->
											</td>
										</tr>
									</table>
									<!-- // FLEXIBLE CONTAINER -->
								</td>
							</tr>
						</table>
						<!-- // CENTERING TABLE -->
					 <table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:#FFFFFF; border:0px solid #000; padding: 10px; background:#1976D2;'>
						<tr>
						   <td></td>
						</tr>
					 </table>   
					  <table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:#FFFFFF; border:0px solid #000; padding:26px; background:#d8dde4;'>
						<!--<tr>
						   <td align='center' style='color:#999;'>
							<table width='200' border='0' cellspacing='2' cellpadding='0'>
							  <tr>
								<td><a href='$_fb' target='_blank'><img src='http://www.exclusivescript.com/images/social/facebook.png' width='32'></a></td>
								<td><a href='$_tw' target='_blank'><img src='http://www.exclusivescript.com/images/social/twitter.png' width='32'></a></td>
								<td><a href='$_gp' target='_blank'><img src='http://www.exclusivescript.com/images/social/google-plus.png' width='32'></a></td>
								<td><a href='$_ln' target='_blank'><img src='http://www.exclusivescript.com/images/social/linkedin.png' width='32'></a></td>
							  </tr>
							</table>
						   </td>
						</tr>-->
						<tr>
						   <td align='center' style='color:#999; font-family: Helvetica,Arial,sans-serif; font-size: 12px;'>
							  Copyright &copy; ".date("Y")." $sitetitle. All rights reserved.
						   </td>
						</tr>
					 </table>
				</td>
			</tr>
			</table>
		</center>
		</body>";
		
		return $msg;
	}
	function style_green($siteinfo,$text,$username){
		$sitetitle = $siteinfo['sitetitle'];
		$siteurl = $siteinfo['siteurl'];
		$sitelogo = $siteinfo['sitelogo'];
		$sitelogo = $siteurl."/admin/uploads/general_setting/".$sitelogo;
		$siteemail = $siteinfo['siteemail'];
		$_fb = $siteinfo['fburl'];
		$_tw = $siteinfo['twurl'];
		$year = date("Y");
		
		
		$msg = "<div class='msg'>
<u></u>
<div bgcolor='#d9dfe' marginheight='0' marginwidth='0' style='width:100%!important;background-color:#d9dfe2;background-image:none;background-repeat:repeat;background-position:top left'>
<p></p>
<table style='font-family:'Segoe UI',Arial,sans-serif;font-size:15px;line-height:20px;color:#555555;width:100%' bgcolor='#d9dfe2' border='0' cellpadding='0' cellspacing='0'>
<tbody>
   <tr>
      <td bgcolor='#d9dfe2' width='100%'></td>
   </tr>
   <tr></tr>
</tbody>
</table>
<table style='width:600px;margin-top: 20px;border: 5px solid #00a651;' class='m_912290503791684992content_wrap' align='center' border='0' cellpadding='0' cellspacing='0'>
   <tbody>
      <tr>
      </tr>
      <tr>
         <td bgcolor='#2CA9F9' style='
            background: #2CA9F9;
            '>
            <table style='width:100%;background: #00a651;border-bottom: 5px solid #00a651;' border='0' cellpadding='10' cellspacing='0'>
               <tbody>
                  <tr>
                     <td class='m_912290503791684992text-center' bgcolor='#FFF' width='100%' style='
                        text-align: center;
                        '><a href='$siteurl' target='_blank' data-saferedirecturl='#'> <img src='$sitelogo' alt='logo' border='0' height='55' width='178' class='CToWUd'> </a></td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
      <tr>
         <td width='100%'>
            <table style='background:none repeat scroll 0% 0% #ffffff;width:100%' align='center' border='0' cellpadding='0' cellspacing='0'>
               <tbody>
                  <tr>
                     <td bgcolor='#fff' valign='top' width='100%'>
                        <table style='width:100%' bgcolor='#fff' border='0' cellpadding='15' cellspacing='0'>
                           <tbody>
                              <tr>
                                 <td style='text-align:center;background:#ffffff' bgcolor='#fff'>
                                    <table style='width:592px;height:auto' class='m_912290503791684992full_width' border='0' cellpadding='0' cellspacing='0'>
                                       <tbody>
                                          <tr>
                                             <td style='text-align:left;padding-left:15px;padding-top:25px;padding-bottom:25px;'>
                                                <p dir='ltr' style='line-height:1.15;margin-top:0pt;margin-bottom:0pt;color:#333333;text-align:left'><span style='color:#333333;font-size:1.17em;line-height:1.15'>Hello $username,</span></p>
                                                <p><span style='color:#333333;font-size:1.17em;line-height:1.15'>$text</span></p>
                                                <p style='font-size:1.17em;line-height:1.15'><span style='color:#333333;'>Thank you,</span><br> <span><a href='$siteurl' target='_blank' style='color: #00a651;font-size:18px; text-decoration:none;'>$sitetitle</a><span></span></span></p>
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                     <td width='4'></td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
      <tr></tr>
      <tr></tr>
      <tr>
         <td width='100%'></td>
      </tr>
      <tr>
         <td width='100%'>
            <table style='width:100%' align='left' border='0' cellpadding='0' cellspacing='0'>
               <tbody>
                  <tr height='10'>
                     <td bgcolor='#d9dfe2' width='4'></td>
                     <td bgcolor='#ECF0F5' width='100%'>
                        <table style='width:100%' bgcolor='#fff' border='0' cellpadding='15' cellspacing='0'>
                           <tbody>
                              <tr style='background:#ecf0f5;'>
                                 <td style='font-family:'Segoe UI',Arial,sans-serif;font-size:12px;line-height:17px;color:#555;'><br><center>All Rights reserved  $sitetitle © $year.</center> <br><a style='color:#4c83c3;font-family:Calibri,'Segoe UI',Arial,sans-serif;font-size:12px;line-height:17px'></a> <a href='$_fb' style='color:#4c83c3;font-family:Calibri,'Segoe UI',Arial,sans-serif;font-size:12px;line-height:17px' target='_blank' data-saferedirecturl='$_fb'>&nbsp;&nbsp;Facebook</a> | <a href='$_tw' style='color:#4c83c3;font-family:Calibri,'Segoe UI',Arial,sans-serif;font-size:12px;line-height:17px' target='_blank' data-saferedirecturl='$_tw'>Twitter</a> | <a href='$siteurl' style='color:#4c83c3;font-family:Calibri,'Segoe UI',Arial,sans-serif;font-size:12px;line-height:17px' target='_blank' data-saferedirecturl='#'>View in Browser</a><strong style='float:right;'>Support :<a href='#' target='_blank' style='color:#2CA9F9;text-decoration:none; padding-left:10px;'>$siteemail &nbsp;&nbsp;&nbsp;&nbsp;</a></strong></td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
   </tbody>
</table>
<p></p>
<p><span style='color:#333333;font-size:17.5499992370605px;line-height:20.1824989318848px;background-color:#ffffff'>&nbsp;</span></p>";
return $msg;
	}
	
	function style_blue($siteinfo,$username,$title,$text,$contact_num,$url){
		$sitetitle = $siteinfo['sitetitle'];
		$siteurl = $siteinfo['siteurl'];
		$sitelogo = $siteinfo['sitelogo'];
		$sitelogo = $siteurl."/admin/uploads/general_setting/".$sitelogo;
		$siteemail = $siteinfo['siteemail'];
		$_fb = $siteinfo['fburl'];
		$_tw = $siteinfo['twurl'];
		$year = date("Y");
		$username = ucwords($username);
		
		$msg = "<div style='background:#f5f5f5;margin:0 auto'>
   <table cellspacing='0' cellpadding='0' border='0' bgcolor='' width='600' style='margin:0 auto; 100%'>
      <tbody>
         <tr>
            <td valign='top' style='padding-left:0px'></td>
         </tr>
         <tr>
            <td>
               <table width='600' style='background:rgba(200, 223, 243, 0.78);border:1px solid #42bfe8;border-radius: 6px;'>
                  <tbody>
                     <tr>
                        <td>
                           <table style='width:100%'>
                              <tbody>
                                 <tr style='border-bottom:1px solid #a2a2a2;'>
                                    <td valign='top' style='padding:2px 6px;border:0px'>
                                       <table cellspacing='0' cellpadding='0' border='0' bgcolor='' width='100%'>
                                          <tbody>
                                             <tr>
                                                <!--<td valign='top' style='padding:0px'> <a href='#' target='_blank' data-saferedirecturl='#'> <img border='0' src='img/logo.png' alt='' style='display:block' > </a> </td>-->
                                                
												<td align='left' valign='top' style='padding:0px;padding:12px 10px 5px 5px'>
                                                   <table cellspacing='0' cellpadding='0' border='0'>
                                                      <tbody>
                                                         <tr>
                                                            <td align='left' valign='middle' style='width:50%;vertical-align:middle;padding-left:0px;font:bold 11px arial; color:##1420AF;'> Email: <span align='left' valign='middle' style='vertical-align:middle;padding-left:5px;font:normal 11px arial;color:#a2a2a2;line-height:20px'>$siteemail</span></td>
                                                            
                                                         </tr>
														 
                                                      </tbody>
                                                   </table>
                                                </td>
												
												<td align='right' valign='top' style='padding:0px;padding:12px 10px 5px 5px'>
                                                   <table cellspacing='0' cellpadding='0' border='0'>
                                                      <tbody>
                                                         <tr>
                                                            <td align='right' valign='middle' style='width:50%;vertical-align:middle;padding-left:0px;font:bold 11px arial; color:##1420AF;'> Call Us: <span align='right' valign='middle' style='vertical-align:middle;padding-left:5px;font:normal 11px arial;color:##1420AF;line-height:20px'>$contact_num</span></td>
                                                            
                                                         </tr>
														 
                                                      </tbody>
                                                   </table>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td valign='top' style='padding:0px;border:0px'>
                                       <table cellspacing='0' cellpadding='0' border='0' bgcolor='#a2a2a2' width='100%' height='1'>
                                          <tbody>
                                             <tr></tr>
                                          </tbody>
                                       </table>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                     <tr> </tr>
                     <tr style=''>
                       <td align='' >                          
						   <div style='font:bold 30px arial;padding:10px 5px 15px;color:#00bff5;text-align:center; '>
                              <!--Logo Here
							  <br>-->
							  <img src='$sitelogo' style='max-width:250px;'>
                           </div>
						   <div style='font:bold 14px arial;padding:5px;color:#333; '>
                             Hello $username,
                           </div>
                        </td>
                     </tr>
                     <tr style=''>
                        <td align='center' >
                           <div style='font:normal 22px arial;padding:10px 5px 15px;color:##1420AF; '> 
							$title
                           </div>
                        </td>
                     </tr>          
                   <tr>
                        <td align='center'>
                           <table>
                              <tbody>
                                 <tr>
                                    <td align='center' bgcolor='#00bff5' style='background:#00bff5; padding:15px 18px;-webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;'>
                                       <div >
                                          <div  align='center'> <a target='_blank' href='$url' style='color:#ffffff;font:bold 12px arial;text-decoration:none;'>Click Here</a> </div>
                                       </div>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                        </tr>
                     
					 
					<tr style=''>
                        <td>
							<p style='color: #333;font:normal 14px arial; padding:30px;text-align:center;'>$text</p>
                        </td>
                     </tr>
					 
                     <tr style='border-bottom:1px solid #dadada;'>
                        <td valign='top' style='padding:15px 1px 15px 18px;font:normal 14px arial;color:#000;    border-bottom: 1px solid #dadada;'>Warm Regards,<br><br> <span style='color:#00bff5'><b>Team $sitetitle</b></span> </td>
                     </tr>
                     <tr>
                        <td valign='top' style='padding: 5px 1px 5px 18px;font:normal 14px arial;color:#000;'>
                           <table style='width: 100%;' cellspacing='0' cellpadding='0' border='0'>
                              <tbody>
                                 <tr>
                                    <td valign='top' style='padding-left:0px'>
                                       <table cellspacing='0' cellpadding='0' border='0' height='75'>
                                          <tbody>
                                             <tr>
                                                <td valign='middle' style='vertical-align:middle;padding-left:6px;color:#000000;font:bold 16px arial;line-height:20px;text-align: center;'> CALL <br> <span style='font:bold 12px arial;color:#00bff5;line-height:20px'> $contact_num </span> <br> </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
                                    <td valign='middle' style='padding-left:20px'> <img border='0' width='1' height='60' alt='' style='display:block'> </td>
                                    <td valign='middle' style='vertical-align:middle;padding-left:0px'>
                                       <table cellspacing='0' cellpadding='0' border='0' height='75'>
                                          <tbody>
                                             <tr>
                                                <td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000000;line-height:23px;text-align: center;'> EMAIL <br> <a href='mailto:info@smartb2b.com' style='color:#00bff5;font:bold 12px arial;text-decoration:none;' target='_blank'> $siteemail </a> </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
                                    <td valign='middle' style='vertical-align:middle;padding-left:15px'> <img border='0' width='1' height='60' alt='' style='display:block'> </td>
                                    <td valign='top' style='padding-left:15px'>
                                       <table cellspacing='0' cellpadding='0' border='0' height='75'>
                                          <tbody>
                                             <tr>
                                                <td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000000;line-height:23px;text-align: center;'> Website <br> <span style='color:#006fb4;text-decoration:none;font:normal 12px arial'> <a href='$siteurl' style='color:#00bff5;font:bold 12px arial;text-decoration:none' target='_blank' data-saferedirecturl='$siteurl'> $siteurl </a> </span> </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </td>
         </tr>
         <!--<tr>
            <td>
               <table>
                  <tbody>
                     <tr>
                        <td>
                           <table width='600'>
                              <tbody>
                                 <tr>
                                    <td align='center' valign='top' style='padding:10px 23px 20px;font:normal 10px arial;color:#8e8e8e'> Want to Unsubscribe? We are sorry to see you go, but happy to make it easy on you.<a href='#' target='_blank'>Unsubscribe</a> </td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </td>
         </tr>-->
      </tbody>
   </table>

</div>";
return $msg;
	}
	
	function notice_mail($siteinfo,$username,$title,$text,$contact_num){		
		$sitetitle = $siteinfo['website_title'];
		$siteurl = $siteinfo['website_url'];
		$sitelogo = $siteurl."/admin/uploads/general_setting/".$siteinfo['img'];
		$siteemail = $siteinfo['admin_email'];
		$_fb = $siteinfo['fburl'];
		$_tw = $siteinfo['twurl'];
		$_gp = $siteinfo['gplusurl'];
		$_ln = $siteinfo['linkedinurl'];		
		$username = ucwords($username);		
		$msg = "<div style='background:#f5f5f5;margin:0 auto'>
   <table cellspacing='0' cellpadding='0' border='0' bgcolor='' width='600' style='margin:0 auto; 100%'>
      <tbody>
         <tr>
            <td valign='top' style='padding-left:0px'></td>
         </tr>
         <tr>
            <td>
               <table width='600' style='background:rgba(200, 223, 243, 0.78);border:1px solid #42bfe8;border-radius: 6px;'>
                  <tbody>
                     <tr>
                        <td>
                           <table style='width:100%'>
                              <tbody>
                                 <tr style='border-bottom:1px solid #a2a2a2;'>
                                    <td valign='top' style='padding:2px 6px;border:0px'>
                                       <table cellspacing='0' cellpadding='0' border='0' bgcolor='' width='100%'>
                                          <tbody>
                                             <tr>
                                                <!--<td valign='top' style='padding:0px'> <a href='#' target='_blank' data-saferedirecturl='#'> <img border='0' src='img/logo.png' alt='' style='display:block' > </a> </td>-->
                                                
												<td align='left' valign='top' style='padding:0px;padding:12px 10px 5px 5px'>
                                                   <table cellspacing='0' cellpadding='0' border='0'>
                                                      <tbody>
                                                         <tr>
                                                            <td align='left' valign='middle' style='width:50%;vertical-align:middle;padding-left:0px;font:bold 11px arial; color:##1420AF;'> Email: <span align='left' valign='middle' style='vertical-align:middle;padding-left:5px;font:normal 11px arial;color:#a2a2a2;line-height:20px'>$siteemail</span></td>
                                                            
                                                         </tr>
														 
                                                      </tbody>
                                                   </table>
                                                </td>
												
												<td align='right' valign='top' style='padding:0px;padding:12px 10px 5px 5px'>
                                                   <table cellspacing='0' cellpadding='0' border='0'>
                                                      <tbody>
                                                         <tr>
                                                            <td align='right' valign='middle' style='width:50%;vertical-align:middle;padding-left:0px;font:bold 11px arial; color:##1420AF;'> Call Us: <span align='right' valign='middle' style='vertical-align:middle;padding-left:5px;font:normal 11px arial;color:##1420AF;line-height:20px'>$contact_num</span></td>
                                                            
                                                         </tr>
														 
                                                      </tbody>
                                                   </table>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td valign='top' style='padding:0px;border:0px'>
                                       <table cellspacing='0' cellpadding='0' border='0' bgcolor='#a2a2a2' width='100%' height='1'>
                                          <tbody>
                                             <tr></tr>
                                          </tbody>
                                       </table>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                     <tr> </tr>
                     <tr style=''>
                       <td align='' >                          
						   <div style='font:bold 30px arial;padding:10px 5px 15px;color:#00bff5;text-align:center; '>
                              <!--Logo Here
							  <br>-->
							  <img src='$sitelogo' style='max-width:250px;'>
                           </div>
						   <div style='font:bold 14px arial;padding:5px;color:#333; '>
                             Hi $username,
                           </div>
                        </td>
                     </tr>
                     <tr style=''>
                        <td align='center' >
                           <div style='font:normal 22px arial;padding:10px 5px 15px;color:#1420AF; '> 
							$title
                           </div>
                        </td>
                     </tr>          
                  
					<tr style=''>
                        <td style='padding:10px;'>
							<p style='color: #333;font:normal 14px arial; text-align:center;'>$text</p>
                        </td>
                     </tr>
					 
                     <tr style='border-bottom:1px solid #dadada;'>
                        <td valign='top' style='padding:15px 1px 15px 18px;font:normal 14px arial;color:#000;    border-bottom: 1px solid #dadada;'>Warm Regards,<br><br> <span style='color:#00bff5'><b>Team $sitetitle</b></span> </td>
                     </tr>
                     <tr>
                        <td valign='top' style='padding: 5px 1px 5px 18px;font:normal 14px arial;color:#000;'>
                           <table style='width: 100%;' cellspacing='0' cellpadding='0' border='0'>
                              <tbody>
                                 <tr>
                                    <td valign='top' style='padding-left:0px'>
                                       <table cellspacing='0' cellpadding='0' border='0' height='75'>
                                          <tbody>
                                             <tr>
                                                <td valign='middle' style='vertical-align:middle;padding-left:6px;color:#000000;font:bold 16px arial;line-height:20px;text-align: center;'> CALL <br> <span style='font:bold 12px arial;color:#00bff5;line-height:20px'> $contact_num </span> <br> </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
                                    <td valign='middle' style='padding-left:20px'> <img border='0' width='1' height='60' alt='' style='display:block'> </td>
                                    <td valign='middle' style='vertical-align:middle;padding-left:0px'>
                                       <table cellspacing='0' cellpadding='0' border='0' height='75'>
                                          <tbody>
                                             <tr>
                                                <td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000000;line-height:23px;text-align: center;'> EMAIL <br> <a href='mailto:info@smartb2b.com' style='color:#00bff5;font:bold 12px arial;text-decoration:none;' target='_blank'> $siteemail </a> </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
                                    <td valign='middle' style='vertical-align:middle;padding-left:15px'> <img border='0' width='1' height='60' alt='' style='display:block'> </td>
                                    <td valign='top' style='padding-left:15px'>
                                       <table cellspacing='0' cellpadding='0' border='0' height='75'>
                                          <tbody>
                                             <tr>
                                                <td valign='middle' style='vertical-align:middle;padding-left:8px;font:bold 16px arial;color:#000000;line-height:23px;text-align: center;'> Website <br> <span style='color:#006fb4;text-decoration:none;font:normal 12px arial'> <a href='$siteurl' style='color:#00bff5;font:bold 12px arial;text-decoration:none' target='_blank' data-saferedirecturl='#'> $siteurl </a> </span> </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </td>
         </tr>
         <!--<tr>
            <td>
               <table>
                  <tbody>
                     <tr>
                        <td>
                           <table width='600'>
                              <tbody>
                                 <tr>
                                    <td align='center' valign='top' style='padding:10px 23px 20px;font:normal 10px arial;color:#8e8e8e'> Want to Unsubscribe? We are sorry to see you go, but happy to make it easy on you.<a href='#' target='_blank'>Unsubscribe</a> </td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </td>
         </tr>-->
      </tbody>
   </table>

</div>";
		
		return $msg;
	}
}
?>