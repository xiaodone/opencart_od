<?php
class ModelToolUserupload extends Model {
	public function addUpload($uid, $file) {
		$res = $this->db->query("INSERT INTO `" . DB_PREFIX . "user_upload` SET `uid` = '" . (int)$uid . "', `file` = '" . $this->db->escape($file) . "'");

		return $res;
	}

	public function getUserImages($uid) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "user_upload` WHERE uid= '" . (int)$uid . "'");

		return $query->rows;
	}
}
