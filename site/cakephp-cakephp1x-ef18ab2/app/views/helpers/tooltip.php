<?php

class TooltipHelper extends AppHelper {

    var $helpers = array('Javascript', 'Html');
    var $uniq_nr = 0;

    function beforeRender() {
        $this->Javascript->link('jquery-1.4.2.min', false);
        $this->Javascript->link('jquery.simpletip.min', false);
    }

    function add($element_class, $tip) {
        return $this->Javascript->codeBlock("
            $(document).ready(function () {
                $('.$element_class').simpletip({
                    content: '".addcslashes($tip, "'")."',
                    persistent: true,
                });
            });
        ");
    }

    function create($text, $tip, $element_class = null) {
        $uniq_id = $element_class;
        if ($uniq_id === null) {
            $uniq_id = sprintf('tooltip-%d', $this->uniq_nr);
        }
        return "<span class='$uniq_id tooltipped'>$text</span>\n" . $this->add($uniq_id, $tip);
    }

    function lookup($element_class, $text = '?') {
        App::import('Model', 'Tooltip');
        $Tooltip = new Tooltip();
        $firsttip = $Tooltip->find('first', array('conditions' => array('element_class' => $element_class)));
        $tip = $firsttip['Tooltip']['tooltip'];
        if (substr($tip, -1, 1) != '.') {
            $tip .= '.';
        }
        if ($firsttip['Tooltip']['readmore_link']) {
            $tip .= "&nbsp;";
            $tip .= $this->Html->link('read more?', $firsttip['Tooltip']['readmore_link']);
        }

        return $this->create($text, $tip, $element_class);
    }

}

?>
