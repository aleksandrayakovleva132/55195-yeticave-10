<main>
<nav class="nav">
    <ul class="nav__list container">
      <?php foreach ($categories as $category): ?>
                  <li class="nav__item">
                      <a href="pages/all-lots.html"><?= esc($category['name']); ?></a>
                  </li>
          <?php endforeach; ?>
    </ul>
  </nav>
  <form class="form form--add-lot container form--invalid" action="add.php" method="post" enctype="multipart/form-data" > <!-- form--invalid -->
      <h2>Добавление лота</h2>
      <div class="form__container-two">
        <div class="form__item form__item--invalid"> <!-- form__item--invalid -->
          <label for="lot-name">Наименование <sup>*</sup></label>
          <input id="lot-name" type="text" name="name" placeholder="Введите наименование лота" value="<?=getPostVal('name'); ?>">
          <span class="form__error">Введите наименование лота</span>
        </div>
        <div class="form__item">
          <label for="category">Категория <sup>*</sup></label>
          <select id="category" name="category_id">
            <option>Выберите категорию</option>
            <?php foreach ($categories as $category): ?>
              <option value="<?=esc($category['id']); ?>"><?= esc($category['name']); ?></option>
            <?php endforeach; ?>
          </select>
          <span class="form__error">Выберите категорию</span>
        </div>
      </div>
      <div class="form__item form__item--wide">
        <label for="description">Описание <sup>*</sup></label>
        <textarea id="description" name="description" placeholder="Напишите описание лота">
         <?=getPostVal('description'); ?>
        </textarea>
        <span class="form__error">Напишите описание лота</span>
      </div>
      <div class="form__item form__item--file">
        <label>Изображение <sup>*</sup></label>
        <div class="form__input-file">
          <input class="visually-hidden" name="image" type="file" id="image" value="">
          <label for="image">
            Добавить
          </label>
        </div>
      </div>
      <div class="form__container-three">
        <div class="form__item form__item--small">
          <label for="lot-rate">Начальная цена <sup>*</sup></label>
          <input id="lot-rate" type="text" name="start_price" placeholder="0" value="<?=getPostVal('start_price'); ?>">
          <span class="form__error">Введите начальную цену</span>
        </div>
        <div class="form__item form__item--small">
          <label for="step_rate">Шаг ставки <sup>*</sup></label>
          <input id="step_rate" type="text" name="step_rate" placeholder="0" value="<?=getPostVal('step_rate'); ?>">
          <span class="form__error">Введите шаг ставки</span>
        </div>
        <div class="form__item">
          <label for="last_date">Дата окончания торгов <sup>*</sup></label>
          <input class="form__input-date" id="last_date" type="text" name="last_date" placeholder="Введите дату в формате ГГГГ-ММ-ДД" 
          value="<?=getPostVal('last_date'); ?>">
          <span class="form__error">Введите дату завершения торгов</span>
        </div>
      </div>
      <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
      <button type="submit" class="button">Добавить лот</button>
    </form>
</main>