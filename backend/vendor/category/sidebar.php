    <div class="sidebar">
    <div class="sidebar__top">
        <img src="/assets/images/filter.png" alt="">
        Фильтр
    </div>
    <form METHOD="post">
        <div class="accordion">
            <div class="accordion-item active">
                <h2>
                    Цена
                </h2>
                <div class="accordion-price">
                    <div class="accordion-price_item">
                        <span>от</span>
                        <input type="text" name="price_min" value="" class="accordion-price_input">
                        <span> $ </span>
                    </div>
                    <div class="accordion-price_item">
                        <span> - до </span>
                        <input type="text" name="price_max" value="" class="accordion-price_input">
                        <span> $ </span>
                    </div>
                </div>

            </div>
        </div>
        <?php
        $filters = [
            ['table' => 'materials', 'column' => 'material', 'name' => 'Материал'],
            ['table' => 'colors', 'column' => 'color', 'name' => 'Цвет'],
            ['table' => 'makers', 'column' => 'maker', 'name' => 'Производитель']
        ];

        foreach ($filters as $filter) :
            $tableFilterColumn = get_filter_column($filter['table'], $filter['column']);
            ?>
            <div class="accordion">
                <div class="accordion-item active">
                    <h2>
                        <?= $filter['name']; ?>
                        <img src="/assets/images/catalog-arrow.png" alt="">
                    </h2>
                    <div class="accordion-content" style="max-height: fit-content;">
                        <?php foreach ($tableFilterColumn as $parametr) :

                            $isChecked = isset($_GET[$parametr['filter_column']]) && $_GET[$parametr['filter_column']] ? 1 : 0;
                            ?>
                            <label for="<?= $parametr['filter_column']; ?>" class="option">
                                <?= $parametr[$filter['column']]; ?>
                                <input type="checkbox" id="<?= $parametr['filter_column']; ?>" name="<?= $parametr['filter_column']; ?>"
                                       aria-checked="<?= $isChecked ? 'true' : 'false'; ?>" <?= $isChecked ? 'checked' : ''; ?>/>
                                <span class="checkbox checkbox1"></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="btn-form__inner">
            <button class="btn-form btn-form--reset" type="reset">Отменить</button>
        </div>
    </form>
</div>
