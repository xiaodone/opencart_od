<?php
class ControllerToolDiyUpload extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('tool/upload');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('tool/diy_upload');

		$this->getList();
	}

	public function delete() {
		$this->load->language('tool/upload');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('tool/diy_upload');
/*
		if (isset($this->request->post['selected']) && $this->validateDelete()) {
			foreach ($this->request->post['selected'] as $upload_id) {
				// Remove file before deleting DB record.
				$upload_info = $this->model_tool_upload->getUpload($upload_id);

				if ($upload_info && is_file(DIR_UPLOAD . $upload_info['filename'])) {
					unlink(DIR_UPLOAD . $upload_info['filename']);
				}

				$this->model_tool_upload->deleteUpload($upload_id);
			}
*/
		if( isset($this->request->get['id']) && $this->validateDelete()){

			$id = (int)$this->request->get['id'];	
			$res = $this->model_tool_diy_upload->deleteUpload($id);
			if($res){
				return $this->response->setOutput(json_encode([
					'code'=> 0,
				]));
			}
			else {
				return $this->response->setOutput(json_encode([
					'code'=> 0,
				]));
			}
		}
	}

	public function save(){
		$this->load->language('tool/upload');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('tool/diy_upload');
		if(!empty($this->request->post) && is_file(DIR_IMAGE . $this->request->post['file'])){
			$file = $this->request->post['file'];
			$background = $this->request->post['background'];
			$inthumb = json_encode($this->request->post['inthumb']);
			$groupid = (int)$this->request->post['groupid'];
			$id = (int)$this->request->post['id'];
			if(!empty($file) && $groupid>0){
				$res = $this->model_tool_diy_upload->addUpload($id, $groupid, $file, $inthumb, $background);
				if($res){
					echo 'success';
					exit;
				}
			}
		}
		echo "failed";
		exit;
	}
	protected function getList() {
		if (isset($this->request->get['groupid'])) {
			$groupid = (int)$this->request->get['groupid'];
		} else {
			$groupid = 0;
		}
		
		$pagesize = 20;
		if (isset($this->request->get['page'])) {
			$page = (int)$this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

		if (isset($this->request->get['groupid'])) {
			$url .= '&groupid=' . $groupid; 
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('tool/diy_upload', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);

		$data['delete'] = $this->url->link('tool/diy_upload/delete', 'user_token=' . $this->session->data['user_token'] . $url, true);

		$data['uploads'] = array();

		$filter_data = array(
			'groupid'	    => $groupid,
			'start'             => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit'             => $this->config->get('config_limit_admin')
		);

		$this->load->model('tool/image');
		$data['placeholder'] = $this->model_tool_image->resize('no_image.png', 100, 100);

		$upload_total = $this->model_tool_diy_upload->getTotalUploads($groupid);

		$results = $this->model_tool_diy_upload->getUploads($groupid, ($page -1) * $pagesize, $pagesize);

		$groupList = array(
			'1' => [
				'name'=> '分割1',
				'num'=> 1,
			],
			'2' => [
				'name'=> '分割2',
				'num'=> 2,
			],
			'3' => [
				'name'=> '分割3',
				'num'=> 3,
			],
			'4' => [
				'name'=> '中间四方',
				'num'=> 1,
			],
			'6' => [
				'name'=> '中间圆形',
				'num'=> 1,
			],
			'7' => [
				'name'=> '分割8',
				'num'=> 8,
			],
			'8' => [
				'name'=> '分割6',
				'num'=> 6,
			],
			'9' => [
				'name'=> '2-8分割6',
				'num'=> 6,
			],
		);
		foreach ($results as $result) {
			$inthumb = json_decode($result['inthumb']);
			$arr = [];
			if($inthumb) {
				foreach ($inthumb as $key=>$value) {
					if(!$value) {
						$arr[$key] = '';
					}else{
						$arr[$key] = [
							'url'=>  $this->model_tool_image->resize( $value, 100,100),
							'thumb'=> $value
						];
					}
					
				}
			}
			
			$data['uploads'][] = array(
				'id'  => $result['id'],
				'groupid'   => $result['groupid'],
				'inthumb'   => $arr,
				'group'   => $groupList[$result['groupid']]['name'],
				'file'   => ( $result['file']),
				'thumb'   => $this->model_tool_image->resize( $result['file'], 100,100),
				'background'   => $result['background'],
				'backgrounds'   => $this->model_tool_image->resize( $result['background'], 100,100),
			);
		}
		$data['groupList'] = $groupList;

		if(isset($this->request->get['ajax']) && $this->request->get['ajax'] == 1) {
			return $this->response->setOutput(json_encode([
				'code'=> 0,
				'msg'=> '',
				'count'=> $upload_total,
				'data'=> $data['uploads']
			]));
		}

		$data['user_token'] = $this->session->data['user_token'];

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}

		if (isset($this->request->post['selected'])) {
			$data['selected'] = (array)$this->request->post['selected'];
		} else {
			$data['selected'] = array();
		}

		$pagination = new Pagination();
		$pagination->total = $upload_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('tool/diy_upload', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', true);

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($upload_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($upload_total - $this->config->get('config_limit_admin'))) ? $upload_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $upload_total, ceil($upload_total / $this->config->get('config_limit_admin')));

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('tool/background', $data));
	}


	protected function validateDelete() {
		if (!$this->user->hasPermission('modify', 'tool/diy_upload')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}

	public function download() {
		$this->load->model('tool/upload');

		if (isset($this->request->get['code'])) {
			$code = $this->request->get['code'];
		} else {
			$code = 0;
		}

		$upload_info = $this->model_tool_upload->getUploadByCode($code);

		if ($upload_info) {
			$file = DIR_UPLOAD . $upload_info['filename'];
			$mask = basename($upload_info['name']);

			if (!headers_sent()) {
				if (is_file($file)) {
					header('Content-Type: application/octet-stream');
					header('Content-Description: File Transfer');
					header('Content-Disposition: attachment; filename="' . ($mask ? $mask : basename($file)) . '"');
					header('Content-Transfer-Encoding: binary');
					header('Expires: 0');
					header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
					header('Pragma: public');
					header('Content-Length: ' . filesize($file));

					readfile($file, 'rb');
					exit;
				} else {
					exit('Error: Could not find file ' . $file . '!');
				}
			} else {
				exit('Error: Headers already sent out!');
			}
		} else {
			$this->load->language('error/not_found');

			$this->document->setTitle($this->language->get('heading_title'));

			$data['breadcrumbs'] = array();

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_home'),
				'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
			);

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('error/not_found', 'user_token=' . $this->session->data['user_token'], true)
			);

			$data['header'] = $this->load->controller('common/header');
			$data['column_left'] = $this->load->controller('common/column_left');
			$data['footer'] = $this->load->controller('common/footer');

			$this->response->setOutput($this->load->view('error/not_found', $data));
		}
	}

	public function preview() {
		$this->load->model('tool/upload');

		if (isset($this->request->get['code'])) {
			$code = $this->request->get['code'];
		} else {
			$code = 0;
		}

		$upload_info = $this->model_tool_upload->getUploadByCode($code);

		if ($upload_info) {
			$file = DIR_UPLOAD . $upload_info['filename'];
			$mask = basename($upload_info['name']);
			$fileInfo = getimagesize($file);
			if($fileInfo){
				$imgExt = image_type_to_extension($fileInfo[2], false);  //获取文件后缀
				$fun = "imagecreatefrom{$imgExt}";
				$imgInfo = $fun($file);//1.由文件或 URL 创建一个新图象。如:imagecreatefrompng ( string $filename )
				$mime = $fileInfo['mime'];
				//$mime = image_type_to_mime_type(exif_imagetype($file)); //获取图片的 MIME 类型
				header('Content-Type:'.$mime);
				$quality = 100;
				if($imgExt == 'png') $quality = 9;        //输出质量,JPEG格式(0-100),PNG格式(0-9)
				$getImgInfo = "image{$imgExt}";
				$getImgInfo($imgInfo, null, $quality);    //2.将图像输出到浏览器或文件。如: imagepng ( resource $image )
				imagedestroy($imgInfo);
			} else {
				exit('Error: file is not image!');
			}
		} else {
			$this->load->language('error/not_found');

			$this->document->setTitle($this->language->get('heading_title'));

			$data['breadcrumbs'] = array();

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_home'),
				'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
			);

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('error/not_found', 'user_token=' . $this->session->data['user_token'], true)
			);

			$data['header'] = $this->load->controller('common/header');
			$data['column_left'] = $this->load->controller('common/column_left');
			$data['footer'] = $this->load->controller('common/footer');

			$this->response->setOutput($this->load->view('error/not_found', $data));
		}
	}

	public function upload() {
		$this->load->language('sale/order');

		$json = array();

		// Check user has permission
		if (!$this->user->hasPermission('modify', 'tool/upload')) {
			$json['error'] = $this->language->get('error_permission');
		}

		if (!$json) {
			if (!empty($this->request->files['file']['name']) && is_file($this->request->files['file']['tmp_name'])) {
				// Sanitize the filename
				$filename = html_entity_decode($this->request->files['file']['name'], ENT_QUOTES, 'UTF-8');

				if ((utf8_strlen($filename) < 3) || (utf8_strlen($filename) > 128)) {
					$json['error'] = $this->language->get('error_filename');
				}

				// Allowed file extension types
				$allowed = array();

				$extension_allowed = preg_replace('~\r?\n~', "\n", $this->config->get('config_file_ext_allowed'));

				$filetypes = explode("\n", $extension_allowed);

				foreach ($filetypes as $filetype) {
					$allowed[] = trim($filetype);
				}

				if (!in_array(strtolower(substr(strrchr($filename, '.'), 1)), $allowed)) {
					$json['error'] = $this->language->get('error_filetype');
				}

				// Allowed file mime types
				$allowed = array();

				$mime_allowed = preg_replace('~\r?\n~', "\n", $this->config->get('config_file_mime_allowed'));

				$filetypes = explode("\n", $mime_allowed);

				foreach ($filetypes as $filetype) {
					$allowed[] = trim($filetype);
				}

				if (!in_array($this->request->files['file']['type'], $allowed)) {
					$json['error'] = $this->language->get('error_filetype');
				}

				// Check to see if any PHP files are trying to be uploaded
				$content = file_get_contents($this->request->files['file']['tmp_name']);

				if (preg_match('/\<\?php/i', $content)) {
					$json['error'] = $this->language->get('error_filetype');
				}

				// Return any upload error
				if ($this->request->files['file']['error'] != UPLOAD_ERR_OK) {
					$json['error'] = $this->language->get('error_upload_' . $this->request->files['file']['error']);
				}
			} else {
				$json['error'] = $this->language->get('error_upload');
			}
		}

		if (!$json) {
			$file = $filename . '.' . token(32);

			move_uploaded_file($this->request->files['file']['tmp_name'], DIR_UPLOAD . $file);

			// Hide the uploaded file name so people can not link to it directly.
			$this->load->model('tool/upload');

			$json['code'] = $this->model_tool_upload->addUpload($filename, $file);

			$json['success'] = $this->language->get('text_upload');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}
