<div class="ui breadcrumb">
    <? foreach ($breadcrumbs as $crumb):?>
	    
    <?if ($crumb !== end($breadcrumbs)): ?>
	    <?=HTML::anchor($crumb['uri'], $crumb['title'], array('class'=>'section'))?>
            <i class="right chevron icon divider"></i>
    <?  else:?>
        <div class="active section"><?=$crumb['title']?></div>
	<? endif;?>
    <? endforeach;?>
</div>