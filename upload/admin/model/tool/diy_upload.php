<?php
class ModelToolDiyUpload extends Model {
	public function addUpload($groupid, $file) {

		$res = $this->db->query("INSERT INTO `" . DB_PREFIX . "diy_upload` SET groupid='" .(int)$groupid ."', `file` = '" . $this->db->escape($file) ."'");

		return $res;
	}
		
	public function deleteUpload($id) {
		$res = $this->db->query("DELETE FROM " . DB_PREFIX . "diy_upload WHERE id = '" . (int)$id . "'");
		return $res;
	}

	public function getUpload($id) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "diy_upload` WHERE id = '" . (int)$id . "'");

		return $query->row;
	}

	public function getUploads($groupid, $start=0, $limit=20) {
		$sql = "SELECT * FROM " . DB_PREFIX . "diy_upload ";
		$groupid = (int)$groupid;
		$start   = (int)$start;
		$limit   = (int)$limit;

		if($groupid > 0){
			$sql .= " WHERE groupid=" . $groupid;
		}
		$sql .= " ORDER BY id desc LIMIT {$start}, {$limit}";

		$query = $this->db->query($sql);

		return $query->rows;
	}

	public function getTotalUploads($groupid) {
		$sql = "SELECT COUNT(*) AS total FROM " . DB_PREFIX . "diy_upload";
		if($groupid > 0){
			$sql .= " WHERE groupid=" . $groupid;
		}

		$query = $this->db->query($sql);

		return $query->row['total'];
	}
}
