<table class="table table-striped table-bordered table-vcenter table-condensed table-responsive table-hover" id="example-datatable" style="height: 50px;">
    <thead>
        <tr>
    <center>
        <?php foreach ($columns as $column) {?>
            <th><?php echo $column->display_as;?></th>
        <?php }
?>
        <?php if (!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)) {?>
            <th class="text-center actions" title="Actions" data-sortable="false"><i class="fa fa-flash"></i></th>
        <?php }
?>
    </center>
</tr>
</thead>
<tbody>
    <?php foreach ($list as $num_row => $row) {
	?>
        <tr id='row-<?php echo $num_row?>'>
            <?php foreach ($columns as $column) {?>
                <td><?php echo $row->{$column->field_name}?></td>
            <?php }
	?>
            <?php if (!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)) {
		?>
                <td class="text-center">
                    <?php
if (!empty($row->action_urls)) {
			foreach ($row->action_urls as $action_unique_id => $action_url) {
				$action = $actions[$action_unique_id];
				?>
                            <a href="<?php echo $action_url;?>" class="edit_button btn btn-small btn-effect-ripple btn-ripple btn-default row col-sm-4 col-xs-4" role="button">
                                <span class="ui-button-icon-primary ui-icon <?php echo $action->css_class;?> <?php echo $action_unique_id;?>"></span><span class="ui-button-text">&nbsp;<?php echo $action->label?></span>
                            </a>
                            <?php
}
		}
		?>
                    <?php if (!$unset_read) {?>
            <!--					<a href="<?php // echo $row->read_url              ?>" class="edit_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" role="button">
            <span class="ui-button-icon-primary ui-icon ui-icon-document"></span>
            <span class="ui-button-text">&nbsp;<?php // echo $this->l('list_view');                ?></span>
            </a>-->
                        <a href="#modal-fadeView" class="btn btn-effect-ripple btn-xs btn-primary viewBtn" data-toggle="modal" title="<?php echo $this->l('list_view');?>" role="button" style="overflow: hidden; position: relative;">
                            <i class="fa fa-info-circle"></i>
                        </a>
                    <?php }
		?>

                    <?php if (!$unset_edit) {?>
                                                                                                                                                                                    <!--					<a href="<?php // echo $row->edit_url              ?>" class="edit_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" role="button">
                                                                                                                                                                                                                                    <span class="ui-button-icon-primary ui-icon ui-icon-pencil"></span>
                                                                                                                                                                                                                                    <span class="ui-button-text">&nbsp;<?php // echo $this->l('list_edit');                ?></span>
                                                                                                                                                                                                                            </a>-->
                        <a href="#modal-fadeEdit" class="edit_button btn btn-effect-ripple btn-xs btn-success editBtn" data-toggle="modal" title="<?php echo $this->l('list_edit');?>" role="button" style="overflow: hidden; position: relative;">
                            <i class="fa fa-pencil"></i>
                        </a>
                    <?php }
		?>
                    <?php if (!$unset_delete) {?>
            <!--					<a onclick = "javascript: return delete_row('<?php // echo $row->delete_url               ?>', '<?php // echo $num_row              ?>')"
                                href="javascript:void(0)" class="delete_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" role="button">
                                <span class="ui-button-icon-primary ui-icon ui-icon-circle-minus"></span>
                                <span class="ui-button-text">&nbsp;<?php // echo $this->l('list_delete');                ?></span>
                        </a>-->
                        <a onclick = "javascript: return delete_row('<?php echo $row->delete_url?>', '<?php echo $num_row?>')"
                           href="javascript:void(0)" class="delete_button btn btn-effect-ripple btn-xs btn-danger" title="<?php echo $this->l('list_delete');?>" role="button">
                            <i class="fa fa-times"></i>
                        </a>
                    <?php }
		?>
                </td>
            <?php }
	?>
        </tr>
    <?php }
?>
</tbody>
<!--    <tfoot>
    <tr>
<?php foreach ($columns as $column) {?>
                                        <th><input type="text" name="<?php echo $column->field_name;?>" placeholder="<?php echo $this->l('list_search') . ' ' . $column->display_as;?>" class="search_<?php echo $column->field_name;?>" /></th>
<?php }
?>
<?php if (!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)) {?>
                                        <th>
                                            <button class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only floatR refresh-data" role="button" data-url="<?php echo $ajax_list_url;?>">
                                                <span class="ui-button-icon-primary ui-icon ui-icon-refresh"></span><span class="ui-button-text">&nbsp;</span>
                                            </button>
                                            <a href="javascript:void(0)" role="button" class="clear-filtering ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary floatR">
                                                <span class="ui-button-icon-primary ui-icon ui-icon-arrowrefresh-1-e"></span>
                                                <span class="ui-button-text"><?php echo $this->l('list_clear_filtering');?></span>
                                            </a>
                                        </th>
<?php }
?>
    </tr>
</tfoot>-->
</table>

<!--<script type="text/javascript" src="<?=base_url()?>assets/Backend/grocery_crud/js/jquery_plugins/jquery.fancybox.pack-2.1.5.js"></script>-->
<script type="text/javascript">
    var editUrl = "<?php echo $row->edit_url;?>",
        readUrl = "<?php echo $row->read_url;?>";

    var $ = jQuery.noConflict();

    $(document).ready(function () {
        $(".fancybox").fancybox();
    });
</script>
