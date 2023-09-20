<?foreach ($options as $key => $option):?>

    <input type="checkbox" id="option-<?=$option->id?>" />
    <label for="option-<?=$option->id?>"><?=$option->text?></label>
    <br/>
    
    <?=$type?>
<? endforeach; ?>
