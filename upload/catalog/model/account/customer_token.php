<?php
class ModelAccountCustomerToken extends Model {
	public function getUidByToken($token) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "customer_token where `token`='{$token}' order by id desc limit 1");

		return $query->row;
	}

	public function addUserToken($uid) {
	    $token = md5($uid . time());
	    $etime = time() + 86400;
		$res = $this->db->query("insert into " . DB_PREFIX . "customer_token(`uid`,`token`,`etime`) values('{$uid}','{$token}',{$etime})");

		return $token;
	}

	public function checkToken($token){
	    $tokenInfo = $this->getUidByToken($token);
	    if (empty($tokenInfo)){
	        return false;
        }
	    if ($tokenInfo['etime'] < time()){
	        return false;
        }
	    return $tokenInfo['uid'];
    }
}