         <section class="promo">
            <h2 class="promo__title">Нужен стафф для катки?</h2>
            <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
            <ul class="promo__list">
                <!--заполните этот список из массива категорий-->
                <?php foreach ($categories as $category): ?>
                    <li class="promo__item promo__item--boards">
                        <a class="promo__link" href="pages/all-lots.html"><?=esc($category); ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
        <section class="lots">
            <div class="lots__header">
                <h2>Открытые лоты</h2>
            </div>
            <ul class="lots__list">
                <!--заполните этот список из массива с товарами-->
                <?php foreach ($products as $key => $product):?>
                    <li class="lots__item lot">
                        <div class="lot__image">
                            <img src="<?=esc($product['image']); ?>" width="350" height="260" alt="<?=esc($product['name']); ?>">
                        </div>
                        <div class="lot__info">
                            <span class="lot__category"><?=esc($product['category']); ?></span>
                            <h3 class="lot__title"><a class="text-link" href="pages/lot.html"><?=esc($product['name']); ?></a></h3>
                            <div class="lot__state">
                                <div class="lot__rate">
                                    <span class="lot__amount">Стартовая цена</span>
                                    <span class="lot__cost">
                                 <?=price(esc($product['price'])); ?>
                            </span>
                                </div>
                                <div class="lot__timer timer
                                    <?=$seconds=take_seconds($product['date']);
                                       $seconds < 3600 ? 'timer——finishing' : ''?> ">
                                    <?=formate_seconds($seconds); ?>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>