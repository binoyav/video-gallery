<?php
if(isset($this->Js))
{
    echo $this->Js->writeBuffer();
}
?>
</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<?php

	if(!isset($no_acl_links))
	{
	    $selected = isset($selected) ? $selected : $this->params['controller'];
    
        $links = array();
        $links[] = $this->Html->link(__d('acl', 'Permissions'), '/admin/acl/aros/index', array('class' => ($selected == 'aros' )? 'selected' : null));
        $links[] = $this->Html->link(__d('acl', 'Actions'), '/admin/acl/acos/index', array('class' => ($selected == 'acos' )? 'selected' : null));
        
        echo $this->Html->nestedList($links, array('class' => 'acl_links'));
	}
	?>
</div>