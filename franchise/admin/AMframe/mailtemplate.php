<?php
class mailtemplate extends common {
	
	public $from;
	
	public function __construct(){
	$this->cobj=new common();
	$from = database::singlerec("SELECT admin_email from general_setting where id='1'");
	$this->from=$from[0];
	}
	
	public function  getFrom(){
		return $this->from;
	}
	
	public function signup_mail($email,$url){
		$from=database::singlerec("SELECT admin_email from general_setting where id='1'");
		$sub = "Confirm your account for Exclusivescript";
		$amsg ="<body bgcolor='#E1E1E1' leftmargin='0' marginwidth='0' topmargin='0' marginheight='0' offset='0'><center style='background-color:#f1f1f1;'> <table bgcolor='#FFFFFF' border='0' cellpadding='0' cellspacing='0' width='620' style='color:#FFFFFF; background:#1976D2;'> <tr > <td align='center' valign='top' class='textContent' style='font-size:12px; font-family: Helvetica,Arial,sans-serif; padding:10px;'> Support Email: support@exclusivescript.com </td> </tr> </table><table bgcolor='#FFFFFF' border='0' cellpadding='0' cellspacing='0' width='620' id='emailBody'> <tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:#FFFFFF;' bgcolor='#ffffff'><tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' width='500' class='flexibleContainer'><tr><td align='center' valign='top' width='600' class='flexibleContainerCell'> <!-- // CONTENT TABLE --> <table border='0' cellpadding='15' cellspacing='0' width='100%'><tr><td align='center' valign='top' class='textContent'> <a href='http://www.exclusivescript.com/' target='_blank'> <img src='http://www.exclusivescript.com/admin/uploads/general_setting/logo.png' class='img-responsive'></a></td></tr></table><!-- // CONTENT TABLE --></td></tr></table><!-- // FLEXIBLE CONTAINER --></td></tr></table><table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:#FFFFFF; border:0px solid #000; padding: 40px; background:#D3E6F9;' bgcolor='#ffffff'><tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' width='500' class='flexibleContainer'><tr><td align='center' valign='top' width='600' class='flexibleContainerCell'><table border='0' cellpadding='0' cellspacing='0' width='100%' style='font-size:16px;'><tr><td align='center' valign='top' class='textContent' style='font-size: 16px; font-family: Helvetica,Arial,sans-serif; color:#4C4C4C; font-weight: 600;'>To activate, click below link. If you believe this is an error, ignore this message and we'll never bother you again.</td></tr> <tr><td align='center' valign='top' class='textContent' style='padding-top: 30px;' ><a style='color:#FFFFFF;text-decoration:none;font-family:Helvetica,Arial,sans-serif;font-size:20px;line-height:135%; padding: 10px 20px; background: #F79118; border-radius: 30px;' href='$url' target='_blank'>Click here</a></td></tr></table><!-- // CONTENT TABLE --></td></tr></table><!-- // FLEXIBLE CONTAINER --></td></tr></table><!-- // CENTERING TABLE --> <table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:#FFFFFF; border:0px solid #000; padding: 10px; background:#1976D2;'> <tr> <td></td> </tr> </table> <table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:#FFFFFF; border:0px solid #000; padding:26px; background:#d8dde4;'> <tr> <td align='center' style='color:#999;'> <table width='200' border='0' cellspacing='2' cellpadding='0'> <tr> <td><a href='www.facebook.com' target='_blank'><img src='http://www.exclusivescript.com/images/social/facebook.png' width='32'></a></td> <td><a href='https://twitter.com' target='_blank'><img src='http://www.exclusivescript.com/images/social/twitter.png' width='32'></a></td> <td><a href='https://plus.google.com/' target='_blank'><img src='http://www.exclusivescript.com/images/social/google-plus.png' width='32'></a></td> <td><a href='https://www.linkedin.com/' target='_blank'><img src='http://www.exclusivescript.com/images/social/linkedin.png' width='32'></a></td> </tr> </table> </td> </tr> <tr> <td align='center' style='color:#999; font-family: Helvetica,Arial,sans-serif; font-size: 12px;'> Copyright &copy; 2016 www.exclusivescript.com. All rights reserved. If you do not want to recieve emails from us, you can <a href='#'>unsubscribe</a>. </td> </tr> </table> </td></tr><!-- // MODULE ROW --> </table> </center> </body>";
		common::email($this->from,$email,$sub,$amsg);
	}
	public function forget_pass($to){
		$new_pass = common::randuniq(rand(11,99));
		$new_pass_md5 = md5($new_pass);
		$upid=database::insertrec("update register set password='$new_pass_md5',decript_password='$new_pass',chngdt='".date('Y-m-d H:i:s')."' where email='$to'"); 
		$from=database::singlerec("SELECT admin_email from general_setting where id=1");
		$message1="<body bgcolor='#E1E1E1' leftmargin='0' marginwidth='0' topmargin='0' marginheight='0' offset='0'> <center style='background-color:#f1f1f1;'> <table bgcolor='#FFFFFF' border='0' cellpadding='0' cellspacing='0' width='620' style='color:#FFFFFF; background:#1976D2;'> <tr > <td align='center' valign='top' class='textContent' style='font-size:12px; font-family: Helvetica,Arial,sans-serif; padding:10px;'> Support Email: support@exclusivescript.com </td> </tr> </table> <table bgcolor='#FFFFFF' border='0' cellpadding='0' cellspacing='0' width='620' id='emailBody'> <tr> <td align='center' valign='top'> <table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:#FFFFFF;' bgcolor='#ffffff'> <tr> <td align='center' valign='top'> <table border='0' cellpadding='0' cellspacing='0' width='500' class='flexibleContainer'> <tr> <td align='center' valign='top' width='600' class='flexibleContainerCell'> <!-- // CONTENT TABLE --> <table border='0' cellpadding='15' cellspacing='0' width='100%'> <tr> <td align='center' valign='top' class='textContent'> <a href='http://www.exclusivescript.com/' target='_blank'> <img src='http://www.exclusivescript.com/admin/uploads/general_setting/logo.png' class='img-responsive'></a></td> </tr> </table> <!-- // CONTENT TABLE --> </td> </tr> </table> <!-- // FLEXIBLE CONTAINER --> </td> </tr> </table> <table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:#FFFFFF; border:0px solid #000; padding: 40px; background:#D3E6F9;' bgcolor='#ffffff'> <tr> <td align='center' valign='top'> <table border='0' cellpadding='0' cellspacing='0' width='500' class='flexibleContainer'> <tr> <td align='center' valign='top' width='600' class='flexibleContainerCell'> <table border='0' cellpadding='0' cellspacing='0' width='100%' style='font-size:16px;'> <tr> <td align='center' valign='top' class='textContent' style='font-size: 16px; font-family: Helvetica,Arial,sans-serif; color:#4C4C4C; font-weight: 600;'>Your username $to and password $new_pass don't share it with anyone. <a href='http://www.exclusivescript.com/user/login' target='_blank'>click here</a></td> </tr> </table> <!-- // CONTENT TABLE --> </td> </tr> </table> <!-- // FLEXIBLE CONTAINER --> </td> </tr> </table> <!-- // CENTERING TABLE --> <table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:#FFFFFF; border:0px solid #000; padding: 10px; background:#1976D2;'> <tr> <td></td> </tr> </table> <table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:#FFFFFF; border:0px solid #000; padding:26px; background:#d8dde4;'> <tr> <td align='center' style='color:#999; font-family: Helvetica,Arial,sans-serif; font-size: 12px;'> Copyright &copy; 2016 www.exclusivescript.com. All rights reserved.</td> </tr> </table> </td> </tr> <!-- // MODULE ROW --> </table> </center></body>";
		$sub="Exclusive Scriprt password re-set request";
		common::email($this->from,$to,$sub,$message1); 
	}
	
	public function order_placed_vendor($to){
		$message1 = "<body bgcolor='#E1E1E1' leftmargin='0' marginwidth='0' topmargin='0' marginheight='0' offset='0'> <center style='background-color:#f1f1f1;'> <table bgcolor='#FFFFFF' border='0' cellpadding='0' cellspacing='0' width='620' style='color:black; background:#1976D2;'> <tr > <td align='center' valign='top' class='textContent' style='font-size:12px; font-family: Helvetica,Arial,sans-serif; padding:10px;'> Support Email: support@exclusivescript.com </td> </tr> </table> <table bgcolor='#FFFFFF' border='0' cellpadding='0' cellspacing='0' width='620' id='emailBody'> <tr> <td align='center' valign='top'> <table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:black;' bgcolor='#ffffff'> <tr> <td align='center' valign='top'> <table border='0' cellpadding='0' cellspacing='0' width='500' class='flexibleContainer'> <tr> <td align='center' valign='top' width='600' class='flexibleContainerCell'> <!-- // CONTENT TABLE --> <table border='0' cellpadding='15' cellspacing='0' width='100%'> <tr> <td align='center' valign='top' class='textContent'> <a href='http://www.exclusivescript.com/' target='_blank'> <img src='http://www.exclusivescript.com/admin/uploads/general_setting/logo.png' class='img-responsive'></a></td> </tr> </table> <!-- // CONTENT TABLE --> </td> </tr> </table> <!-- // FLEXIBLE CONTAINER --> </td> </tr> </table> <table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:black; border:0px solid #000; padding: 40px; background:#D3E6F9;' bgcolor='#ffffff'> <tr> <td align='center' valign='top'> <table border='0' cellpadding='0' cellspacing='0' width='500' class='flexibleContainer'> <tr> <td align='center' valign='top' width='600' class='flexibleContainerCell'> <table border='0' cellpadding='0' cellspacing='0' width='100%' style='font-size:16px;'> <tr> <td align='center' valign='top' class='textContent' style='font-size: 16px; font-family: Helvetica,Arial,sans-serif; color:#4C4C4C; font-weight: 600;'>".$user['name']." purchased your product ".$cart_info['name']."and the purchase code is $order_code.</td> </tr> </table> <!-- // CONTENT TABLE --> </td> </tr> </table> <!-- // FLEXIBLE CONTAINER --> </td> </tr> </table> <!-- // CENTERING TABLE --> <table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:black; border:0px solid #000; padding: 10px; background:#1976D2;'> <tr> <td></td> </tr> </table> <table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:black; border:0px solid #000; padding:26px; background:#d8dde4;'> <tr> <td align='center' style='color:#999; font-family: Helvetica,Arial,sans-serif; font-size: 12px;'> Copyright &copy; 2016 www.exclusivescript.com. All rights reserved. If you do not want to recieve emails from us, you can <a href='#'>unsubscribe</a>. </td> </tr> </table> </td> </tr> <!-- // MODULE ROW --> </table> </center></body>";
		$sub1="Yor product purchased";
		common::email($this->from,$to,$sub1,$message1); 
	}
	public function order_placed_user($to){
		$ct_time=date("d M Y",time());
		$message2 = "<body bgcolor='#E1E1E1' leftmargin='0' marginwidth='0' topmargin='0' marginheight='0' offset='0'><center style='background-color:#f1f1f1;'> <table bgcolor='#FFFFFF' border='0' cellpadding='0' cellspacing='0' width='620' style='color:black; background:#1976D2;'> <tr > <td align='center' valign='top' class='textContent' style='font-size:12px; font-family: Helvetica,Arial,sans-serif; padding:10px;'> Support Email: support@exclusivescript.com </td> </tr> </table><table bgcolor='#FFFFFF' border='0' cellpadding='0' cellspacing='0' width='620' id='emailBody'> <tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:black;' bgcolor='#ffffff'><tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' width='500' class='flexibleContainer'><tr><td align='center' valign='top' width='600' class='flexibleContainerCell'> <!-- // CONTENT TABLE --> <table border='0' cellpadding='15' cellspacing='0' width='100%'><tr><td align='center' valign='top' class='textContent'> <a href='http://www.exclusivescript.com/' target='_blank'> <img src='http://www.exclusivescript.com/admin/uploads/general_setting/logo.png' class='img-responsive'></a></td></tr></table><!-- // CONTENT TABLE --></td></tr></table><!-- // FLEXIBLE CONTAINER --></td></tr></table><table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:black; border:0px solid #000; padding:15px; background:#D3E6F9;' bgcolor='#ffffff'><tr><td align='center' valign='top'><table border='0' cellpadding='0' cellspacing='0' width='100%' class='flexibleContainer'><tr><td align='center' valign='top' width='100%' class='flexibleContainerCell'> <table width='100%' style=' background: #fff; padding:5px'> <tr> <td style='font-family: Helvetica,Arial,sans-serif; text-align:left;'> <strong style='color:#9A9A9A;'>Seller</strong><br> <strong>".$vendor['sname']."</strong><br> <address style='font-size: 12px; font-style: normal;'> <strong>".ucfirst($vendor['name'])."</strong><br> ".$vendor['email']."<br> ".$vendor['address1'].",<br> ".$vendor['address2']."<br> ".$vendor['mobile']." </address> </td> <td colspan='4' style='font-family: Helvetica,Arial,sans-serif; text-align:right; '> <strong style='color:#9A9A9A;'>Buyer</strong><br> <address style='font-size: 12px; font-style: normal;'> <strong>".$user['name']."</strong><br> ".$user['email']."<br> ".$user['address1'].", <br> ".$user['address2']."<br> ".$user['mobile']." </address> </td> </tr> <tr> <td colspan='3'> </td> <td height='20' align='right' style='font-family: Helvetica,Arial,sans-serif; font-size:12px; '></td> </tr> <tr> <td colspan='3'> </td> <td align='right' style='font-family: Helvetica,Arial,sans-serif; font-size:12px; '><strong>Purchase Code</strong> : $order_code</td> </tr> <tr> <td colspan='3'> </td> <td align='right' style='font-family: Helvetica,Arial,sans-serif; font-size:12px; '><strong>Order Date</strong> : $ct_time</td> </tr> <tr > <td colspan='3'> </td> <td align='right' style='font-family: Helvetica,Arial,sans-serif; font-size:12px; '><strong>Order Amount</strong> : <strong> $price </strong></td> </tr> <tr > <td colspan='3'> </td> <td height='20' align='right' style='font-family: Helvetica,Arial,sans-serif; font-size:12px; '></td> </tr> <tr> <th colspan='2'align='left' style='font-family: Helvetica,Arial,sans-serif; text-align:left; '><strong>Item</strong></th> <th align='left' style='font-family: Helvetica,Arial,sans-serif; text-align:left; '><strong>Category</strong></th> <th align='left' style='font-family: Helvetica,Arial,sans-serif; text-align:center; '><strong>Total Price</strong></th> </tr> <tr> <td height='30' colspan='2' align='left' style='font-family: Helvetica,Arial,sans-serif; text-align:left; font-size:12px; '>".$cart_item['name']."</td> <td align='left' style='font-family: Helvetica,Arial,sans-serif; text-align:left; font-size:12px;'>Wordpress</td> <td align='left' style='font-family: Helvetica,Arial,sans-serif; text-align:center; font-size:14px; padding:10px;background:#D8DDE4;'><strong>$price</strong></td></tr> </table> </td></tr><tr> <td align='center' valign='top' class='flexibleContainerCell'>&nbsp;</td> </tr><tr> <td align='center' valign='top' class='flexibleContainerCell'> <strong style='font-family: Helvetica,Arial,sans-serif;'>Note</strong><br> <i style='font-family: Helvetica,Arial,sans-serif; font-size:12px;'>Thank you for your order!</i> </td> </tr></table></td></tr></table> <table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:black;' border:0px solid #000; padding: 10px; background:#1976D2;'> <tr> <td></td> </tr> </table> <table border='0' cellpadding='0' cellspacing='0' width='100%' style='color:black; border:0px solid #000; padding:26px; background:#d8dde4;'> <tr> <td align='center' style='color:#999; font-family: Helvetica,Arial,sans-serif; font-size: 12px;'> Copyright &copy; 2016 www.exclusivescript.com. All rights reserved. If you do not want to recieve emails from us, you can <a href='#'>unsubscribe</a>. </td> </tr> </table> </td></tr><!-- // MODULE ROW --> </table> </center> </body>";
		$sub2="Order confirmation from Exclusive Script ";
		common::email($this->from,$to,$sub2,$message2); 
	}
	public function cart_intimate($user_id,$siteurl){
		
		$cart_infos = database::get_all_assoc("select cart.upload_id,register.email,upload.randuniq,upload.main_category,upload.name,upload.product_img,upload.cat1,upload.price from cart,register,upload where cart.upload_id = upload.id AND cart.user_id=register.id AND cart.user_id = '$user_id' AND cart.pay_status='0' AND register.id='$user_id'");
		
		$msg  ="<html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'><title>Cart list</title><style type='text/css'> div.text a{ color:#5286b3; } div.text p{ margin-top:0px; margin-bottom:10px; } div.text ul,div.text ol{ margin-top:0px; margin-bottom:10px; } div.text ul li,div.text ol li{ margin-top:0px; margin-bottom:5px; } ReadMsgBody{ width:100%; background-color:#f3f3f3; } .ExternalClass{ width:100%; background-color:#f3f3f3; } .ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div{ line-height:150%; } body{ margin:0; padding:0; } body,table,td,p,a,li{ -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; } table td{ border-collapse:collapse; } table{ border-spacing:0; border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; } table,td{ mso-table-lspace:0pt; mso-table-rspace:0pt; } /*]]>*/</style></head><body cz-shortcut-listen='true'><div style='background:#023261'> <table style='table-layout:fixed' width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td valign='top' align='center'> <table style='background:#023261' width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td valign='top' align='center'> <table width='620' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td valign='top' align='center'> <table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td width='600' valign='top' align='center'> <table width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='padding-top:35px;line-height:0px'></td> </tr> </tbody> </table> <table width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='line-height:0px!important;font-size:1px;line-height:1px' width='350' valign='top' align='center'><a style='text-decoration:none;display:inline-block' href='http://www.exclusivescript.com' target='_blank' ><img src='http://www.exclusivescript.com/admin/uploads/general_setting/logo.png' border='0'></a></td> </tr> </tbody> </table> </td> </tr> </tbody> </table> <table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style=' ' width='600' valign='top' align='center'> <table width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td valign='top' align='center'> <table width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='padding-top:10px;line-height:0px'></td> </tr> </tbody> </table> <table style='background:#ffffff' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td width='600' valign='top' align='center'> <table width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='padding:0 20px' valign='top' align='center'> <table width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='padding-top:44px;line-height:0px'></td> </tr> </tbody> </table> <table width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='color:#7a828c;font-family:Arial,Helvetica,sans-serif;font-size:16px;line-height:18px;font-weight:400' valign='top' align='center'>You forgot something really important!</td> </tr> </tbody> </table> <table width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='padding-top:16px;line-height:0px'></td> </tr> </tbody> </table> <table width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='color:#7a828c;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px;font-weight:400' valign='top' align='center'>Your shopping cart was left full on Exclusivescript.com and our billing officers didn't find it in the orders' data. You can proceed with it right from this email</td> </tr> </tbody> </table> <table width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='padding-top:19px;line-height:0px'></td> </tr> </tbody> </table> <table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td width='580' valign='top' align='center'> <table width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td width='9' valign='top' align='center'></td> <td colspan='3' style='padding-top:1px;line-height:0px;background:#d8d8d8' valign='top' align='center'></td> <td width='9' valign='top' align='center'></td> </tr> <tr> <td width='9' valign='top' align='center'></td> <td style='background:#d8d8d8' width='1' valign='top' align='center'></td> <td style='background:#f1f1f1' valign='top' align='center'> <table width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='padding:0 20px' valign='top' align='center'> <table width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='padding-top:18px;line-height:0px'></td> </tr> </tbody> </table> <table width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='color:#5e5652;font-family:Arial,Helvetica,sans-serif;font-size:16px;line-height:22px;font-weight:700' valign='top' align='center'>Cart Summary</td> </tr> </tbody> </table> <table width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='padding-top:18px;line-height:0px'></td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> <td style='background:#d8d8d8' width='1' valign='top' align='center'></td> <td width='9' valign='top' align='center'></td> </tr> </tbody> </table>";
			
		$to="";
		$price_sum = 0;
		foreach($cart_infos as $info){
		$to = $info['email'];
		$name = ucfirst($info['name']);
		$pimg = $info['product_img'];
		$main_cat = ucfirst($info['main_category']);
		$sub_cat = ucfirst($info['cat1']);
		$price = $info['price'];
		
		$price_sum += $price;
		
		$main_cat_r = strtolower(str_replace(" ","-",$main_cat));
		$sub_cat_r = str_replace(" ","-",$sub_cat);
		
		$titl="$siteurl/product/".$info['randuniq']."/".strtolower($info['main_category'])."/".strtolower($info['name']);	
		$titl=str_replace(" ","-",$titl);
		$msg .= "<table width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td width='9' valign='top' align='center'></td> <td colspan='3' style='padding-top:1px;line-height:0px;background:#d8d8d8' valign='top' align='center'></td> <td width='9' valign='top' align='center'></td> </tr> <tr> <td width='9' valign='top' align='center'></td> <td style='background:#d8d8d8' width='1' valign='top' align='center'></td> <td style='background:#ffffff' valign='top' align='center'> <table width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='padding:0 20px' valign='top' align='center'> <table width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='padding-top:7px;line-height:0px'></td> </tr> </tbody> </table> <table width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='padding:5px 0 0 0;text-align: left; line-height:0px!important;font-size:1px;line-height:1px' width='146' valign='top' align='center'><a href='' target='_blank' ><img src='http://www.exclusivescript.com/uploads/product_image/300x300/$pimg' style='border: 2px solid #E0E0E0;' alt='' width='100' ></a></td> <td style='color:#5e5652;font-family:Arial,Helvetica,sans-serif;font-size:16px;line-height:18px;font-weight:700' valign='top' align='left'><a style='text-decoration:underline!important; color:#5e5652' href='$titl' target='_blank' >$name</a> <br/><br/> <span style='font-size:12px; '> Category : <a style='color:#1976D2;' href='http://www.exclusivescript.com/category/$main_cat_r/$sub_cat_r' target='_blank'>$sub_cat</a></span> </td> <td style='color:#5e5652;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:14px;font-weight:400' width='54' valign='middle' align='right'><span style='color:#1976D2; font-size:24px; font-weight:bold;'>+$price</span></td> </tr> </tbody> </table> <table width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='padding-top:19px;line-height:0px'></td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> <td style='background:#d8d8d8' width='1' valign='top' align='center'></td> <td width='9' valign='top' align='center'></td> </tr> </tbody> </table>";
		}
		
		$msg .="<table width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td width='9' valign='top' align='center'></td> <td colspan='3' style='padding-top:1px;line-height:0px;background:#d8d8d8' valign='top' align='center'></td> <td width='9' valign='top' align='center'></td> </tr> <tr> <td width='9' valign='top' align='center'></td> <td style='background:#d8d8d8' width='1' valign='top' align='center'></td> <td style='background:#ffffff' valign='top' align='center'> <table width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='padding:0 20px' valign='top' align='right'> <table width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='padding-top:14px;line-height:0px'></td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> <td style='background:#d8d8d8' width='1' valign='top' align='center'></td> <td width='9' valign='top' align='center'></td> </tr> <tr> <td width='9' valign='top' align='center'></td> <td width='1' valign='top' align='center'></td> <td valign='top' align='right'> <table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='padding:0 12px 0 0;color:#5e5652;font-family:Arial,Helvetica,sans-serif;font-size:18px;line-height:22px;font-weight:700' valign='middle' align='center'>Order Total:</td> <td style='line-height:0px!important;font-size:1px;line-height:1px' valign='top' align='center'></td> <td style='color:#000;font-family:Arial,Helvetica,sans-serif;font-size:18px;line-height:18px;font-weight:700;' width='61' valign='middle' align='center'>$$price_sum</td></tr></tbody> </table> </td> </tr> <tr> <td width='9' valign='top' align='center'></td> <td style='background:#d8d8d8' width='1' valign='top' align='center'></td> <td style='background:#ffffff' valign='top' align='center'> <table width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='padding:0 20px' valign='top' align='center'> <table width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='padding-top:19px;line-height:0px'></td> </tr> </tbody> </table> <table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='background:#18A3FB;color:#ffffff' width='200' valign='middle' height='45' align='center'><a style='display:block;text-decoration:none;padding-left:10px;padding-right:10px;padding-top:11px;padding-bottom:11px;font-family:Arial,Helvetica,sans-serif;font-size:18px;line-height:22px;font-weight:700;color:#ffffff' href='http://www.exclusivescript.com/exclusivescript-user-portal/checkout-confirm' target='_blank'>Checkout Now</a></td> </tr> </tbody> </table> <table width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='padding-top:16px;line-height:0px'></td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> <td style='background:#d8d8d8' width='1' valign='top' align='center'></td> </tr> <tr> <td width='9' valign='top' align='center'></td> <td style='background:#d8d8d8' width='1' valign='top' align='center'></td> <td style='background:#ffffff' valign='top' align='center'> </td> <td style='background:#d8d8d8' width='1' valign='top' align='center'></td> <td width='9' valign='top' align='center'></td> </tr> <tr> <td width='9' valign='top' align='center'></td> <td style='background:#d8d8d8' width='1' valign='top' align='center'></td> <td style='background:#f1f1f1' valign='top' align='center'> <table width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='padding:0 20px' valign='top' align='center'> <table width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='padding-top:10px;line-height:0px'></td> </tr> </tbody> </table> <table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='line-height:0px!important;font-size:1px;line-height:1px' valign='top' align='center'><a style='text-decoration:none;display:inline-block' href='#'><img src='http://www.exclusivescript.com/images/pay1.png' alt='' width='51' ></a></td> <td style='line-height:0px!important;font-size:1px;line-height:1px' valign='top' align='center'><a style='text-decoration:none;display:inline-block' href='#'><img src='http://www.exclusivescript.com/images/pay2.png' alt='' width='43' ></a></td> <td style='line-height:0px!important;font-size:1px;line-height:1px' valign='top' align='center'><a style='text-decoration:none;display:inline-block' href='#'><img src='http://www.exclusivescript.com/images/pay3.png' alt='' width='31' ></a></td> <td style='line-height:0px!important;font-size:1px;line-height:1px' valign='top' align='center'><a style='text-decoration:none;display:inline-block' href='#'><img src='http://www.exclusivescript.com/images/pay4.png' alt='' width='51' ></a></td> </tr> </tbody> </table> <table width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='padding-top:10px;line-height:0px'></td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> <td style='background:#d8d8d8' width='1' valign='top' align='center'></td> <td width='9' valign='top' align='center'></td> </tr> <tr> <td width='9' valign='top' align='center'></td> <td colspan='3' style='padding-top:1px;line-height:0px;background:#d8d8d8' valign='top' align='center'></td> <td width='9' valign='top' align='center'></td> </tr> </tbody> </table> </td> </tr> </tbody> </table> <table width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='padding-top:39px;line-height:0px'></td> </tr> </tbody> </table> <table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='padding-top:1px;line-height:0px;background:#d2d5d8' width='454' valign='top' align='center'></td> </tr> </tbody> </table> <table width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='padding-top:26px;line-height:0px'></td> </tr> </tbody> </table> <table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='color:#7a828c;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:12px;font-weight:400' width='420' valign='top' align='center'>If you are not interested in TemplateMonster products and find no use in the template you have browsed, you may <a href=''>unsubscribe here</a></td> </tr> </tbody> </table> <table width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='padding-top:32px;line-height:0px'></td> </tr> </tbody> </table> <table cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='padding-top:1px;line-height:0px;background:#d2d5d8' width='454' valign='top' align='center'></td> </tr> </tbody> </table> <table width='100%' cellspacing='0' cellpadding='0' border='0'> <tbody> <tr> <td style='padding-top:46px;line-height:0px'></td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table></div></body></html>";

		
		$sub="You forgot something really important!";
		common::email($this->from,$to,$sub,$msg); 
		
		//return $msg;
	}
	
	public function version_upgrade($updated_pid){
		$bp_infos = database::get_all_assoc("select distinct register.name as uname,register.email,upload.name as pname, upload.product_img from orders,register,upload where orders.user_id = register.id AND orders.product_id = upload.id AND orders.product_id='$updated_pid' AND upload.id='$updated_pid'");
		foreach($bp_infos as $bp_info){
			$uname = ucfirst($bp_info['uname']);
			$pname = ucfirst($bp_info['pname']);
			$email = $bp_info['email'];
			$pimg = $bp_info['product_img'];
			$today = date("d M Y",time());
			
			$sub = "New Release available for $pname";
			$amsg ="<html xmlns='http://www.w3.org/1999/xhtml'><head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
			<title>Add to cart </title>
			<style type='text/css'>div.text a{color:#5286b3}div.text p{margin-top:0;margin-bottom:10px}div.text ul,div.text ol{margin-top:0;margin-bottom:10px}div.text ul li,div.text ol li{margin-top:0;margin-bottom:5px}ReadMsgBody{width:100%;background-color:#f3f3f3}.ExternalClass{width:100%;background-color:#f3f3f3}.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div{line-height:150%}body{margin:0;padding:0}body,table,td,p,a,li{-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%}table td{border-collapse:collapse}table{border-spacing:0;border-collapse:collapse;mso-table-lspace:0;mso-table-rspace:0}table,td{mso-table-lspace:0;mso-table-rspace:0}</style>
			</head>
			<body cz-shortcut-listen='true'>
			<div bgcolor='#023261' style='margin:0;padding:0;width:100%!important'>
			<table style='height:100%!important;margin:0;padding:0;width:100%!important' cellspacing='0' cellpadding='0' border='0' bgcolor='#023261' align='center'>
			<tbody>
			<tr>
			<td style='border-collapse:collapse'>
			<table width='620' cellspacing='0' cellpadding='0' border='0' align='center'>
			<tbody><tr>
			<td style='border-collapse:collapse'>
			<table width='620' cellspacing='0' cellpadding='0' border='0'>
			<tbody>
			<tr>
			<td style='border-collapse:collapse' width='190' align='center'>
			<a href='http://www.exclusivescript.com/' target='_blank'>
			<img alt='' src='http://www.exclusivescript.com/admin/uploads/general_setting/logo.png' style='border:none;display:block;line-height:100%;outline:none;text-decoration:none' border='0'>
			</a>
			</td>
			<td style='border-collapse:collapse' width='10'></td>
			</tr>
			</tbody></table>
			</td>
			</tr>
			<tr>
			<td style='border-collapse:collapse'>
			<table width='620' cellspacing='0' cellpadding='0' border='0'>
			<tbody><tr>
			<td style='border-collapse:collapse' width='10'></td>
			<td style='border-collapse:collapse;color:#fff;font-family:Tahoma,Geneva,sans-serif;font-size:14px;line-height:18px'>
			<table width='600' cellspacing='0' cellpadding='0' border='0' bgcolor='#1976D2'>
			<tbody><tr height='15'></tr>
			<tr>
			<td style='border-collapse:collapse'>
			<table width='600' cellspacing='0' cellpadding='0' border='0'>
			<tbody><tr>
			<td style='border-collapse:collapse' width='20' height='20'></td>
			<td style='border-collapse:collapse;color:#fff;font-family:Tahoma,Geneva,sans-serif;font-size:14px;line-height:14px' width='520'>
			$today
			</td>
			<td style='border-collapse:collapse;color:#aeaea9;font-family:Tahoma,Geneva,sans-serif;font-size:14px;line-height:14px' width='40'>
			<table width='40' cellspacing='0' cellpadding='0' border='0'>
			<tbody><tr>
			<td style='border-collapse:collapse'>
			</td>
			<td style='border-collapse:collapse'>
			</td>
			</tr>
			</tbody></table>
			</td>
			<td style='border-collapse:collapse' width='20'>&nbsp;</td>
			</tr>
			</tbody></table>
			</td>
			</tr>
			<tr height='15'></tr>
			</tbody></table>
			<table width='600' cellspacing='0' cellpadding='0' border='0' bgcolor='#FFFFFF'>
			<tbody><tr height='30'><td style='border-collapse:collapse' width='600'></td></tr>
			<tr>
			<td style='border-collapse:collapse'>
			<table width='600' cellspacing='0' cellpadding='0' border='0'>
			<tbody><tr>
			<td style='border-collapse:collapse' width='20'></td>
			<td style='border-collapse:collapse;font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#000;' width='560'>
			<p> Hi $uname,
			</p>
			We'd like to let you know that an update to your item <a href='http://www.exclusivescript.com/' style='color:#F79118;font-weight:bold;text-decoration:underline' target='_blank'>Exclusivescript</a> is now available in your Downloads page.
			<p></p>
			Remember: you need to be logged in to download the update.
			</td>
			<td style='border-collapse:collapse' width='20'></td>
			</tr>
			</tbody></table>
			</td>
			</tr>
			<tr height='20'><td style='border-collapse:collapse' width='600'></td></tr>
			</tbody></table>
			<table width='600' cellspacing='0' cellpadding='0' border='0' bgcolor='#FFFFFF'>
			<tbody><tr>
			<td style='border-collapse:collapse'>
			<table width='600' cellspacing='0' cellpadding='0' border='0'>
			<tbody><tr height='80'>
			<td style='border-collapse:collapse' width='20'></td>
			<td style='border-collapse:collapse'>
			<a href=''>
			<img src='http://www.exclusivescript.com/uploads/product_image/300x300/$pimg' style='border:none;display:block;line-height:100%;outline:none;text-decoration:none' width='100' height='100' border='0'>
			</a>
			</td>
			<td style='border-collapse:collapse' width='20'></td>
			<td style='border-collapse:collapse' width='390' valign='middle' align='center' bgcolor='#1976D2'>
			<a href='http://www.exclusivescript.com/exclusivescript-vendor-portal/downloads' target='_blank' style='text-decoration:none;color:#fff;font-weight:bold'>$pname</a>
			</td>
			<td style='border-collapse:collapse' bgcolor='#1976D2' align='center'>
			<a href='http://www.exclusivescript.com/exclusivescript-vendor-portal/downloads' target='_blank'>
			<img src='http://www.exclusivescript.com/images/d.png' border='0' style='border:none;display:block;line-height:100%;outline:none;text-decoration:none' width='50'>
			</a>
			</td>
			<td style='border-collapse:collapse' width='20'></td>
			</tr>
			</tbody></table>
			</td>
			</tr>
			<tr height='30'><td style='border-collapse:collapse' width='300'></td></tr>
			</tbody></table>
			<table width='600' cellspacing='0' cellpadding='0' border='0' bgcolor='#FFFFFF'>
			<tbody><tr>
			<td style='border-collapse:collapse'>
			<table width='600' cellspacing='0' cellpadding='0' border='0'>
			<tbody><tr height='25'>
			<td style='border-collapse:collapse' width='20'></td>
			<td style='border-collapse:collapse;font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#000;' width='560'>
			You may manage notifications for your items from <a style='color:#F79118;font-weight:bold;text-decoration:underline' href='http://www.exclusivescript.com/exclusivescript-vendor-portal/downloads' target='_blank'>your downloads</a>.
			</td>
			<td style='border-collapse:collapse' width='20'></td>
			</tr>
			</tbody></table>
			</td>
			</tr>
			<tr height='25'><td style='border-collapse:collapse' width='600'></td></tr>
			</tbody></table>
			<table width='600' cellspacing='0' cellpadding='0' border='0' bgcolor='#FFFFFF'>
			<tbody><tr>
			<td style='border-collapse:collapse'>
			<table width='600' cellspacing='0' cellpadding='0' border='0'>
			<tbody><tr>
			<td style='border-collapse:collapse' width='20'></td>
			<td style='border-collapse:collapse;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:12px;color:#000' valign='bottom'>
			&copy; Copyright Exclusivescript 2016
			</td>
			<td style='border-collapse:collapse;font-size:12px;font-family:Arial,Helvetica,sans-serif;line-height:12px' valign='bottom' align='right'>
			<span style='color:#d4d4d4'>|</span>
			<a href='http://www.exclusivescript.com/home/about' target='_blank' style='color:#ad410e;text-decoration:underline'>About Us</a>
			<span style='color:#d4d4d4'>|</span>
			<a href='http://www.exclusivescript.com/home/terms' target='_blank'>Terms of Use</a>
			</td>
			<td style='border-collapse:collapse' width='20'></td>
			</tr>
			</tbody></table>
			</td>
			</tr>
			<tr height='25'></tr>
			</tbody></table>
			<table width='600' cellspacing='0' cellpadding='0' border='0' bgcolor='#FFFFFF'>
			<tbody><tr>
			<td style='border-collapse:collapse'>
			<table width='600' cellspacing='0' cellpadding='0' border='0'>
			<tbody><tr height='25'>
			<td style='border-collapse:collapse' width='20'></td>
			<td style='border-collapse:collapse;font-size:12px;line-height:16px;font-family:Arial,Helvetica,sans-serif;color:#000' width='560'>
			<strong style='color:#C30'>Remember</strong> - this is not a marketing email. Since you have an Exclusivescript Account, we want to keep you informed about transactions, operational updates or changes to our websites.
			</td>
			<td style='border-collapse:collapse' width='20'></td>
			</tr>
			</tbody></table>
			</td>
			</tr>
			<tr height='25'><td style='border-collapse:collapse' width='600'></td></tr>
			</tbody></table>
			</td>
			<td style='border-collapse:collapse' width='10'></td>
			</tr>
			</tbody></table>
			</td>
			</tr>
			<tr height='20'></tr>
			</tbody></table>
			</td>
			</tr>
			</tbody></table>
			</div>
			</body>
			</html>";
			
			common::email($this->from,$email,$sub,$amsg);
		}
	}
}
?>