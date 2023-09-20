<?=$crumbs;?>

<div class="ui container">
    <a href="javascript:;" id="add-section" class="circular ui button blue icon add" data-qlty-audience="<?=$audience_type?>" ><i class="icon plus"></i></a>
    <div id="sections-list" class="kili">
        <? foreach ($sections as $section):?>
            <div data-qlty-section="<?=$section->id?>" data-qlty-title="<?=$section->title?>" class="ui link card">
                <div class="content">
                    <div class="header">
                        <?=$section->title?>
                    </div>
                </div>
                <div class="extra content" style="padding: .5em 1em 1.5em !important;">
                    <a href="javascript:;" class="right floated ui tiny inverted blue button edit-section" data-qlty-audience="<?=$audience_type?>" >Редактировать</a>
                    <a href="javascript:;" class="left floated ui tiny inverted button delete-section red" data-qlty-audience="<?=$audience_type?>" >Удалить</a>
                </div>
            </div>
    <? endforeach;?>
    </div>
</div>
