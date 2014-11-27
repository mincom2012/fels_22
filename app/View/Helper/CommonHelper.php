<?php
/**
 * Created by PhpStorm.
 * User: Minh
 * Date: 11/25/14
 * Time: 2:28 PM
 */

App::uses('AppHelper', 'Helper');

class CommonHelper extends AppHelper {
    public function getImage($fileName) {
        if (!is_null($fileName) && !empty($fileName)) {
            return '/img/uploads/' . $fileName;
        }

    }

    public function displayPage($paginator) {
        $page = '<div class="view-page"><small>';
        $page .= $paginator->counter(__('Total {:count} records - Page {:page}/{:pages}'));
        $page .= '</small></div>';
        $params = $paginator->params();
        if ($params['pageCount'] > 1) {
            $page .= '<ul class="pagination pagination-sm">';
            $page .= $paginator->prev('&larr; Previous', array('class' => 'prev', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
            $page .= $paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentClass' => 'active', 'currentTag' => 'a'));
            $page .= $paginator->next('Next &rarr;', array('class' => 'next', 'tag' => 'li', 'escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled', 'tag' => 'li', 'escape' => false));
            $page .= '</ul>';
        }
        return $page;

    }

    public function resultLesson($result) {
        return __("%s/20", $result);
    }
}

