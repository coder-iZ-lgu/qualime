$(function() {

    var tasksCount = 0;
    var tasksHolder = $('#tasks-holder');
    $('#add-task-button').bind('click', function(){
        tasksHolder.append(createTaskHolder());
        /*
        $('*[name=add-option]').unbind('click');
        $('*[name=add-option]').bind('click', function(){
            alert("HELO");
        });
        */
    });

    function createTaskHolder(){

        var taskHolder = $('<div>').attr({
            id: 'task-' + tasksCount
        });

        taskHolder.append(
            $('<div>').attr({
                class: 'task-stuff'
            }).append(
                $('<textarea>').attr({
                    name: 'text-' + tasksCount
                }),
                $('<textarea>').attr({
                    name: 'help-' + tasksCount
                }),
                $('<textarea>').attr({
                    name: 'attention-' + tasksCount
                })
            ),
            $('<div>').attr({
                class: 'options'
            }).append(
                    $('<div>').attr({
                        class:'items'
                    }),
                    $('<div>').attr({
                        class:'options-controls'
                    }).append(
                        $('<input>').attr({
                            type: 'button',
                            name: 'add-option',
                            value: 'Добавить вариант ответа'
                        }).bind('click', function() {
                                addOption(this);
                            })
                    )
                ),
            $('<div>').attr({
                class: 'controls'
            }).append(
                    $('<input>').attr({
                        type: 'button',
                        value: 'Удалить задание'
                    }).bind('click', function(){
                            $(this).parent().parent().remove();
                        })
                )
        );

        tasksCount++;
        return taskHolder;
    }

    function addOption(target){
        var trg = $(target);
        //console.log(trg.parent().parent().find('.items'));
        trg.parent().parent().find('.items').append(
            $('<div>').attr({
                class: 'option'
            }).append(
                    $('<input>').attr({
                        type: 'checkbox',
                        name: 'checked-options-' + tasksCount + '[]'
                    }),
                    $('<textarea>').attr({
                        name: 'option-' + tasksCount + '[]'
                    })
                )
        );
    }
/*
    function createOption(){
        var options =
            $('<div>').attr({
            class: 'option'
        }).append(
                $('<input>').attr({
                    type: 'checkbox'
                }),
                $('<textarea>').attr({
                    name: 'option-' + tasksCount
                }),
                $('<input>').attr({
                    type: 'button',
                    name: 'add-option',
                    value: 'Добавить вариант ответа'
                })
            ),
    }
    */
});