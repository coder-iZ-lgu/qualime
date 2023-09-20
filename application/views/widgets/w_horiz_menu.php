<? foreach ($menu as $menuTitle => $menuItem){
    if (in_array($select, $menuItem)){
        echo HTML::anchor($menuItem[0], $menuTitle, array('class' => 'item active'));
    } else {
        echo HTML::anchor($menuItem[0], $menuTitle, array('class' => 'item'));
    }
} ?>
