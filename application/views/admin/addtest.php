<form action="<?php echo URL::site('admin/tests/addtest');?>" method="POST">
    Название теста: <input type="text" name="test-name"/><br/>
    Описание: <input type="text" name="test-description"/><br/>
    Автор: <input type="text" name="test-author"/><br/>
    Категория:
    <select name="hero[]">
        <option disabled>Выберите героя</option>
        <option value="Чебурашка">Чебурашка</option>
        <option selected value="Крокодил Гена">Крокодил Гена</option>
        <option value="Шапокляк">Шапокляк</option>
        <option value="Крыса Лариса">Крыса Лариса</option>
    </select>
    <br />
    <br />

    <input type="button" id="add-task-button" value="Добавить задание"/>
    <div id="tasks-holder"></div>

    <input type="submit" value="Добавить"/>
</form>

