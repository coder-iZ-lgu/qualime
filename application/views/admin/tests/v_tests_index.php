<?=$crumbs;?>
<h3><i class="asterisk icon"></i>Режим тестирования</h3>
<div class="ui vertical stripe quote segment" style="padding: 0 !important;"></div>
<div class="ui vertical stripe quote segment" style="padding: 0 !important;">
    <div class="ui equal width stackable internally celled grid">
        <div class="center aligned row">
            <div class="column" style="padding: 4rem 0;">
                <?=HTML::anchor('admin/tests/school', '<img src="/media/images/backpack.png" width="40%" height="54%"></i><span>Школьник</span>', array('class'=>'ui icon button tests-school blue'))?>
            </div>
            <div class="column" style="padding: 4rem 0;">
                <?=HTML::anchor('admin/tests/iq', '<i class="massive travel icon white"></i><span top=>Абитуриент</span>', array('class'=>'ui icon button tests-school blue'))?>
            </div>
            <div class="column" style="padding: 4rem 0;">
                <?=HTML::anchor('admin/tests/university', '<i class="massive student icon white"></i><span>Студент</span>', array('class'=>'ui icon button tests-university blue'))?>
            </div>
        </div>
    </div>
</div>
<div class="ui vertical stripe quote segment" style="padding: 0 !important;"></div>