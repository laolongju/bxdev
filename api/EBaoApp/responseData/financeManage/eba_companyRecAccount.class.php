<?php
/**
 * 公司收款账号
 * $Author: dingchaoyang $
 * 2014-12-8 $
 */
$ROOT_PATH_= str_replace ( 'api/EBaoApp/responseData/financeManage/eba_companyRecAccount.class.php', '', str_replace ( '\\', '/', __FILE__ ) ) ;

include_once ($ROOT_PATH_ . 'api/EBaoApp/constant.php');
include_once ($ROOT_PATH_ . 'api/EBaoApp/responseData/resUser.php');
include_once ($ROOT_PATH_ . 'api/EBaoApp/responseData/resMessage.php');
include_once ($ROOT_PATH_ . 'api/EBaoApp/responseData/resStatus.php');
include_once ($ROOT_PATH_ . 'api/EBaoApp/responseData/baseResponse.php');
include_once ($ROOT_PATH_ . 'api/EBaoApp/responseData/iResponse.php');

class CompanyRecAccount extends BaseResponse implements IResponse{
	function __construct(){
		parent::__construct();
		$message = new ResMessage();
		$message->title = APP_ALERT_TITLE;
		$message->content = APP_RECACCOUNTSUCCESS_CONTENT;
		$this->status = new ResStatus('0', $message);
		$this->command = APP_COMMAND_RECACCOUNT;
	}
	
	function responseResult(){
		global $GLOBALS;
		// 		$filter = "in ('12','6','18')";
		$set = $GLOBALS ['db']->getOne ( "SELECT pay_desc FROM bx_payment where pay_id = 2 ");
// 		$payDesc = $set['pay_desc'];

		$account = array('recAccount'=>$set);
		return array_merge(parent::responseResult(),$account) ;
	}
}

?>