<?php
/**
 * Created by PhpStorm.
 * User: Minh
 * Date: 11/25/14
 * Time: 9:33 AM
 */

App::uses('Component', 'Controller');

class UploadComponent extends Component {

    public function upload($data = null) {
        if (!empty($data)) {
            $fileName = $data['name'];
            if (empty($fileName)) {
                return '';
            }

            $file_tmp_name = $data['tmp_name'];
            $dir = WWW_ROOT . 'img' . DS . 'uploads';
            $allowed = array('png', 'jpg', 'jpeg');
            $extension = pathinfo($fileName, PATHINFO_EXTENSION);

            if (!in_array(strtolower($extension), $allowed)) {
                throw new NotFoundException("Error processing", 1);
            } elseif (is_uploaded_file($file_tmp_name)) {
                $fileName = String::uuid() . '-' . $fileName;
                move_uploaded_file($file_tmp_name, $dir . DS . $fileName);
                return $fileName;
            }
        }

    }

    public function delete($fileName) {
        $dir = WWW_ROOT . 'img' . DS . 'uploads';
        $filePath = $dir . DS . $fileName;

        if (!empty($fileName) && file_exists($filePath)) {
            $file = new File($filePath);
            $file->delete();
        }
    }

}