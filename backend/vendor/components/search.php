<?php if ($_SERVER['SCRIPT_NAME'] == '/category.php'): ?>
    <div class="search-boxq__inner">
        <div class="search-boxq">
            <div class="custom-select-search">

                <div class="select-button-search">
                    <button class="select-button">
                        <span class="selected-value-search">Всё</span>
                        <span class="arrow"></span>
                    </button>
                    <ul class="select-dropdown-search" role="listbox" id="select-dropdown-search">

                        <li role="option search_cat_all">
                            <input type="radio" id="search_cat_all" name=""/>
                            <label for="search_cat_all">
                                <i class="bx bxl-price-low"></i>
                                Всё
                            </label>
                        </li>

                        <li role="option search_project">
                            <input type="radio" id="search_project" name="project"/>
                            <label for="search_project">
                                <i class="bx bxl-price-low"></i>
                                По производителю
                            </label>
                        </li>

                        <li role="option search_name">
                            <input type="radio" id="search_name" name="searchName"/>
                            <label for="search_name">
                                <i class="bx bxl-price-low"></i>
                                По названию
                            </label>
                        </li>

                    </ul>
                </div>
            </div>

            <input class="search-inputq" type="search" placeholder="Поиск...">
            <button type="search" class="search-btnq">
                <img src="/assets/images/search.svg" alt="Поиск" class="search-img">
            </button>
        </div>
        <div class="search-boxq__result"></div>
    </div>
<?php endif; ?>
