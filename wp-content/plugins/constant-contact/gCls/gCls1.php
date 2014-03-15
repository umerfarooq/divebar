<?php
/**
 *     Constant Contact
 *     Copyright (C) 2011 - 2014 www.gopiplus.com
 * 
 *     This program is free software: you can redistribute it and/or modify
 *     it under the terms of the GNU General Public License as published by
 *     the Free Software Foundation, either version 3 of the License, or
 *     (at your option) any later version.
 * 
 *     This program is distributed in the hope that it will be useful,
 *     but WITHOUT ANY WARRANTY; without even the implied warranty of
 *     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *     GNU General Public License for more details.
 * 
 *     You should have received a copy of the GNU General Public License
 *     along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
	
require_once('../../../../wp-config.php');
$Email=@$_GET["txt_email_newsletter"];
require_once 'gCls2.php';
$ConstantContact = new ConstantContact();
$ConstantContact->setUsername(get_option('gConstantcontact_widget_username')); /* set the constant contact username */
$ConstantContact->setPassword(get_option('gConstantcontact_widget_password')); /* set the constant contact password */
$ConstantContact->setCategory(get_option('gConstantcontact_widget_group')); /* set the constant contact interest category */
if($ConstantContact->add($Email)):
	echo "succ";
else:
	echo "err";
endif;
?>
