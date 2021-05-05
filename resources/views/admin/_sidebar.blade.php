 <ul class="sidebar-menu">
    <li class="header">Главная навигация</li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-dashboard"></i> <span>Админ-панель</span>
      </a>
    </li>

    <?php if(Auth::user()->is_admin) : ?>
    <li class="header">Заявки</li>
    <li><a href="{{route('apartments.index')}}"><i class="fa fa-home"></i> <span>Заявки</span></a></li>
    <li><a href="{{route('apartments.index')}}"><i class="fa fa-home"></i> <span>Обратная связь</span></a></li>

    <li class="header">Квартиры</li>
    <li><a href="{{route('maps.index')}}"><i class="fa fa-home"></i> <span>Карты</span></a></li>
    <li><a href="{{route('apartments.index')}}"><i class="fa fa-home"></i> <span>Квартиры</span></a></li>
    <li><a href="{{route('apartments_finishs.index')}}"><i class="fa fa-list-ul"></i> <span>Категории отделки</span></a></li>
    <li><a href="{{route('apartments_categories.index')}}"><i class="fa fa-list-ul"></i> <span>Категории виды квартир</span></a></li>
    <li><a href="{{route('apartments_hometype.index')}}"><i class="fa fa-list-ul"></i> <span>Тип дома</span></a></li>
    <li><a href="{{route('apartments_zhk.index')}}"><i class="fa fa-list-ul"></i> <span>Жилищные комплексы</span></a></li>
    <li><a href="{{route('apartments_ocenka.index')}}"><i class="fa fa-list-ul"></i> <span>Оценки квартир</span></a></li>

    <li class="header">Квартал сдачи квартир, домов</li>
    <li><a href="{{route('quarters.index')}}"><i class="fa fa-home"></i> <span>Кварталы сдачи</span></a></li>

    <li class="header">Города</li>
    <li><a href="{{route('cities.index')}}"><i class="fa fa-cubes"></i> <span>Города</span></a></li>

    <?php endif ?>

    <li class="header">Застройщики</li>
    <li><a href="{{route('builders.index')}}"><i class="fa fa-building"></i> <span>Застройщики</span></a></li>
    
    <?php if(Auth::user()->is_admin) : ?>
    <li><a href="{{route('builders_type.index')}}"><i class="fa fa-building"></i> <span>Типы затройщиков</span></a></li>

    
    <li><a href="{{route('builders_accreditation.index')}}"><i class="fa fa-building"></i> <span>Аккредитация застройщиков</span></a></li>
    <li><a href="/admin/reviews"><i class="fa fa-building"></i> <span>Отзывы у застройщиков</span></a></li>

    <li class="header">Банки</li>
    <li><a href="{{route('banks.index')}}"><i class="fa fa-university"></i> <span>Банки</span></a></li>
    <li><a href="/admin/reviews_banks"><i class="fa fa-university"></i> <span>Отзывы у банков</span></a></li>
    
    <li class="header">Блог</li>
    <li><a href="{{route('posts.index')}}"><i class="fa fa-sticky-note-o"></i> <span>Посты в блоге</span></a></li>
    <li><a href="{{route('categories.index')}}"><i class="fa fa-list-ul"></i> <span>Категории для постов</span></a></li>
    <li><a href="{{route('tags.index')}}"><i class="fa fa-tags"></i> <span>Теги для постов</span></a></li>
    <li>
      <a href="/admin/comments">
        <i class="fa fa-commenting"></i> <span>Комментарии под постами</span>
        <span class="pull-right-container">
          <small class="label pull-right bg-green">{{$newCommentsCount}}</small>
        </span>
      </a>
    </li>
    
    <li class="header">Юзеры</li>
    <li><a href="{{route('users.index')}}"><i class="fa fa-users"></i> <span>Пользователи</span></a></li>
    <li><a href="{{route('subscribers.index')}}"><i class="fa fa-user-plus"></i> <span>Подписчики</span></a></li>
    <?php endif ?>
</ul>