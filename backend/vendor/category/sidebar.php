<div class="sidebar">
    <div class="sidebar__top">
        <img src="/assets/images/filter.png" alt="">
        Фильтр
    </div>
    <form action="">

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
                            $parametrForName = $filter['column'] . '_' . $parametr[$filter['column'] . '_id'];
                            $isChecked = isset($_GET[$parametrForName]) && $_GET[$parametrForName] ? 1 : 0;
                            ?>
                            <label for="<?= $parametrForName; ?>" class="option">
                                <?= $parametr[$filter['column']]; ?>
                                <input type="checkbox" id="<?= $parametrForName; ?>" name="<?= $parametrForName; ?>"
                                       aria-checked="<?= $isChecked ? 'true' : 'false'; ?>" <?= $isChecked ? 'checked' : ''; ?>/>
                                <span class="checkbox checkbox1"></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="btn-form__inner">
            <button class="btn-form" type="submit">Применить</button>
            <button class="btn-form btn-form--reset" type="reset">Отменить</button>
        </div>
    </form>
</div>

<?php /*  ?>
<div class="sidebar">
    <div class="sidebar__top">
        <img src="/assets/images/filter.png" alt="">
        Фильтр
    </div>
    <?php
    $tableMaterials = get_filter_column('materials', 'material');
    $tableColors = get_filter_column('colors', 'color');
    $tableManufacturer = get_filter_column('makers', 'maker');

    debug($tableManufacturer);

    ?>

    <form action="">
        <div class="accordion">
            <div class="accordion-item active">
                <h2>
                    Материал
                    <img src="/assets/images/catalog-arrow.png" alt="">
                </h2>
                <div class="accordion-content" style="max-height: fit-content;">
                    <?php foreach ($tableMaterials as $parametr) :
                        $parametrForName = $parametr['table'] . '_' . $parametr['material_id'];
                        ?>
                        <label for="<?= $parametrForName; ?>" class="option">
                            <?= $parametr['material']; ?>
                            <input type="checkbox" id="<?= $parametrForName; ?>" name="<?= $parametrForName; ?>" aria-checked="false"/>
                            <span class="checkbox checkbox1"></span>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="accordion-item active">
                <h2>
                    Цвет
                    <img src="/assets/images/catalog-arrow.png" alt="">
                </h2>
                <div class="accordion-content" style="max-height: fit-content;">
                    <?php foreach ($tableColors as $parametr) :
                        $parametrForName = $parametr['table'] . '_' . $parametr['color_id'];
                        ?>
                        <label for="<?= $parametrForName; ?>" class="option">
                            <?= $parametr['color']; ?>
                            <input type="checkbox" id="<?= $parametrForName; ?>" name="<?= $parametrForName; ?>" aria-checked="false"/>
                            <span class="checkbox checkbox1"></span>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="accordion-item active">
                <h2>
                    Производитель
                    <img src="/assets/images/catalog-arrow.png" alt="">
                </h2>
                <div class="accordion-content" style="max-height: fit-content;">
                    <?php foreach ($tableManufacturer as $parametr) :
                        $parametrForName = $parametr['table'] . '_' . $parametr['maker_id'];
                        ?>
                        <label for="<?= $parametrForName; ?>" class="option">
                            <?= $parametr['maker']; ?>
                            <input type="checkbox" id="<?= $parametrForName; ?>" name="<?= $parametrForName; ?>" aria-checked="false"/>
                            <span class="checkbox checkbox1"></span>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>


        </div>

        <div class="btn-form__inner">
            <button class="btn-form" type="submit">Применить</button>
            <button class="btn-form btn-form--reset" type="reset">Отменить</button>
        </div>
    </form>

</div>
<?php // */ ?>