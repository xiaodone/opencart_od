<?php
class ModelToolDiyUpload extends Model {

	public function getList($groupid) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "diy_upload` WHERE groupid = '" . (int)$groupid . "'");

		return $query->rows;
	}
}
