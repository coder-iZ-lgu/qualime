<? foreach ($menu as $menuItem){
    if (in_array($select, $menuItem['selected'])){
        echo HTML::anchor($menuItem['url'], $menuItem['title'], array('class' => 'item active'));
    } else {
        echo HTML::anchor($menuItem['url'], $menuItem['title'], array('class' => 'item'));
    }
} ?>