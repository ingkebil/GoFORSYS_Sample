<?php

class DataTableHelper extends AppHelper {

    var $helpers = array('Html');

    function beforeRender() {    
        $this->Html->css('datatables.css', null, array('inline' => false));
        $this->Html->script('jquery-1.4.2.min', false);
        $this->Html->script('dataTables-1.6/media/js/jquery.dataTables', false);
    }

    function create($selector) {
        return $this->Html->scriptBlock("
            $(document).ready(function () {
                $('$selector').each(function () {
                    //$(this).find('tr:last').children('td').css('border-bottom', 'none');
                    $(this).find('tbody').after('<tfoot />');
                    $(this).find('tr:first').clone().appendTo($(this).find('tfoot'));
                    $(this).addClass('display');
                    $(this).dataTable( {
                        'bStateSave': true,
                        'sPaginationType': 'full_numbers'
                    } );
                });
            });");
    }

}

?>
