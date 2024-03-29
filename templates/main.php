    <main  class="container">
        <section class="promo">
            <h2 class="promo__title">Нужен стафф для катки?</h2>
            <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
            <ul class="promo__list">
                <!--заполните этот список из массива категорий-->
                <?php foreach ($categories as $category): ?>
                    <li class="promo__item promo__item--<?= $category['code']; ?>">
                        <a class="promo__link" href="/?lot"><?= esc($category['name']); ?></a>
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
                <?php foreach ($products as $product):?>
                    <li class="lots__item lot">
                        <div class="lot__image">
                            <img src="<?=esc($product['image']); ?>" width="350" height="260" alt="<?=esc($product['name']); ?>">
                        </div>
                         <div class="lot__info">
                            
                            <span class="lot__category"><?=esc($product['category_name']); ?></span>
                            <h3 class="lot__title"><a class="text-link" href="/lot.php?id=<?=esc($product['id']); ?>"><?=esc($product['name']); ?></a></h3>
                            <div class="lot__state">
                                <div class="lot__rate">
                                    <span class="lot__amount">Стартовая цена</span>
                                    <span class="lot__cost">
                                 <?=price(esc($product['start_price'])); ?>
                            </span>
                                </div>
                                <div class="lot__timer timer
                                    <?=$seconds=take_seconds($product['last_date']);
                                       $seconds <  3600 ? print_r(' timer--finishing') : print_r(''); ?> ">
                                    <?=formate_seconds($seconds); ?>

                                </div>

                                
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
    </main>