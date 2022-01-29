<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>{{ $page->getSeoOptions()->getPageTitle() }}</title>
        <meta name="description" content="{{ $page->getSeoOptions()->getPageDescription() }}" />
        <link rel="stylesheet" href="css/edit-button.css" as="style">
        <link rel="stylesheet" href="css/index.css" as="style">
    </head>

    <body>
        <div class="wrapper js-app-container">
            <div class="content">
                <div class="main-section">
                    <div class="top-menu">
                        <div class="top-menu__logo">
                            <a href="#">
                                <img src="img/logo.png">
                            </a>
                        </div>
                        <div class="top-menu__center">
                            <div class="top-menu__items js-editable-block" edit-url="{{ $page->getTopMenu()->getEditFormUrl() }}">
                                @foreach ($page->getTopMenu()->getItems() as $item)
                                    <div class="top-menu__item">
                                        <a href="{{ $item->getHref() }}" class="href">{{ $item->getItemTitle() }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="top-menu__button">
                            <div class="btn grad1">
                                <a href="#" class="btn-href">Зайти в кабинет</a>
                            </div>
                        </div>
                    </div>
                    <div class="content-wrapper main-section__content-wrapper">
                        <div class="main-section__content js-editable-block" edit-url="{{ $page->getHeader()->getEditFormUrl() }}">
                            <h1 class="page-header main-section__page-header">
                                {{ $page->getHeader()->getHeader() }}
                            </h1>
                            <div class="time">
                                <div class="time__rect">
                                    <div>
                                        <div class="time__digit">
                                            18
                                        </div>
                                        <div class="time__label opacity-label">
                                            Дней
                                        </div>
                                    </div>
                                </div>
                                <div class="time__rect">
                                    <div>
                                        <div class="time__digit">
                                            18
                                        </div>
                                        <div class="time__label opacity-label">
                                            Часов
                                        </div>
                                    </div>
                                </div>
                                <div class="time__rect">
                                    <div>
                                        <div class="time__digit">
                                            18
                                        </div>
                                        <div class="time__label opacity-label">
                                            Минут
                                        </div>
                                    </div>
                                </div>
                                <div class="time__rect">
                                    <div>
                                        <div class="time__digit">
                                            18
                                        </div>
                                        <div class="time__label opacity-label">
                                            Секунд
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="statistics">
                        <div class="content-wrapper statistics__content-wrapper js-editable-block" edit-url="{{ $page->getInfo()->getEditFormUrl() }}">
                            <div class="statistics__button">
                                <div class="btn grad2">
                                    <a href="#" class="btn-href">Заказать курс</a>
                                </div>
                            </div>
                            <div class="statistics__items">
                                <div class="statistics__row">
                                    <div class="statistics__key opacity-label">
                                        Учеников всего
                                    </div>
                                    <div class="statistics__value bold-label">
                                        {{ $page->getInfo()->getLearners() }}
                                    </div>
                                </div>
                                <div class="statistics__row">
                                    <div class="statistics__key opacity-label">
                                        Успешно закончили курс
                                    </div>
                                    <div class="statistics__value bold-label">
                                        {{ $page->getInfo()->getGraduates() }}
                                    </div>
                                </div>
                            </div>
                            <div class="statistics__progress">
                                <div class="progress">
                                    <div class="progress-header">
                                        <div class="opacity-label">Заработанно учениками:</div>
                                        <div class="progress-header__value bold-label">{{ $page->getInfo()->getCurrentMoney() }}Р</div>
                                    </div>
                                    <div class="progress-bar">
                                        <div class="progress-line">
                                            <div class="progress-value grad2"></div>
                                        </div>
                                        <div class="progress-legend">
                                            <div class="progress-legend__min opacity-label">0</div>
                                            <div class="progress-legend__max opacity-label">1 000 000Р</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="about-section">
                    <div class="content-wrapper about-section__content-wrapper">
                        <div class="about-section__content js-editable-block" edit-url="{{ $page->getTopic()->getEditFormUrl() }}">
                            <div class="about-picture">
                                <img src="img/computer.png" class="about-picture-img">
                            </div>
                            <div class="about-text">
                                <h2 class="section-header about-text__section-header">
                                    {{ $page->getTopic()->getHeader() }}
                                </h2>
                                <div class="section-text">
                                    {{ $page->getTopic()->getText() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="footer-section">
                    <h2 class="section-header footer-section__header">Статьи каждую неделю</h2>
                    <div class="footer-section__text opacity-label">
                        Больше 90% учеников прошли полный курс и смогли собрать свой первый компьютер
                    </div>
                    <div class="footer-section__subscription">
                        <form class="footer-section__subscription-form">
                            <input type="text" name="email" placeholder="email">
                            <button class="btn grad2">Подписаться</button>
                        </form>
                    </div>
                    <div class="footer-section__social-links">
                        <a href="#" class="circle-btn grad1 footer-section__social-link">
                            <svg width="24" height="14" viewBox="0 0 24 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M21.3625 9.75765C21.3625 9.75765 23.3029 11.6741 23.7829 12.5609C23.7922 12.5736 23.7995 12.5878 23.8045 12.6029C24.0001 12.9305 24.0481 13.1873 23.9521 13.3769C23.7901 13.6901 23.2417 13.8473 23.0557 13.8605H19.6261C19.3873 13.8605 18.8905 13.7981 18.2857 13.3805C17.8237 13.0577 17.3641 12.5261 16.9189 12.0065C16.2541 11.2349 15.6793 10.5653 15.0973 10.5653C15.0238 10.5651 14.9508 10.5773 14.8813 10.6013C14.4409 10.7405 13.8817 11.3681 13.8817 13.0397C13.8817 13.5629 13.4689 13.8605 13.1797 13.8605H11.6089C11.0737 13.8605 8.28731 13.6733 5.81651 11.0681C2.78891 7.87845 0.0697081 1.48005 0.0433081 1.42365C-0.125892 1.00965 0.229308 0.784049 0.613308 0.784049H4.07651C4.54091 0.784049 4.69211 1.06485 4.79771 1.31685C4.92011 1.60605 5.37371 2.76285 6.11771 4.06245C7.32251 6.17685 8.06291 7.03725 8.65451 7.03725C8.76566 7.03758 8.87492 7.0086 8.97131 6.95325C9.74411 6.52845 9.60011 3.76845 9.56411 3.19965C9.56411 3.08925 9.56291 1.96725 9.16691 1.42485C8.88371 1.03605 8.40131 0.884848 8.10971 0.829648C8.18771 0.716848 8.35331 0.544048 8.56571 0.442048C9.09491 0.178048 10.0513 0.139648 11.0005 0.139648H11.5273C12.5569 0.154048 12.8233 0.220048 13.1977 0.314848C13.9513 0.494848 13.9657 0.983249 13.8997 2.64645C13.8805 3.12165 13.8601 3.65685 13.8601 4.28685C13.8601 4.42125 13.8541 4.57125 13.8541 4.72365C13.8313 5.57685 13.8013 6.53805 14.4037 6.93285C14.4818 6.98152 14.5721 7.0073 14.6641 7.00725C14.8729 7.00725 15.4981 7.00725 17.1937 4.09725C17.9377 2.81205 18.5137 1.29645 18.5533 1.18245C18.5869 1.11885 18.6877 0.940048 18.8101 0.868048C18.8972 0.821723 18.9947 0.798581 19.0933 0.800849H23.1673C23.6113 0.800849 23.9125 0.868049 23.9713 1.03605C24.0697 1.30845 23.9521 2.14005 22.0921 4.65525C21.7789 5.07405 21.5041 5.43645 21.2629 5.75325C19.5769 7.96605 19.5769 8.07765 21.3625 9.75765Z" fill="white" />
                            </svg>
                        </a>
                        <a href="#" class="circle-btn grad1 footer-section__social-link">
                            <svg width="24" height="14" viewBox="0 0 24 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M21.3625 9.75765C21.3625 9.75765 23.3029 11.6741 23.7829 12.5609C23.7922 12.5736 23.7995 12.5878 23.8045 12.6029C24.0001 12.9305 24.0481 13.1873 23.9521 13.3769C23.7901 13.6901 23.2417 13.8473 23.0557 13.8605H19.6261C19.3873 13.8605 18.8905 13.7981 18.2857 13.3805C17.8237 13.0577 17.3641 12.5261 16.9189 12.0065C16.2541 11.2349 15.6793 10.5653 15.0973 10.5653C15.0238 10.5651 14.9508 10.5773 14.8813 10.6013C14.4409 10.7405 13.8817 11.3681 13.8817 13.0397C13.8817 13.5629 13.4689 13.8605 13.1797 13.8605H11.6089C11.0737 13.8605 8.28731 13.6733 5.81651 11.0681C2.78891 7.87845 0.0697081 1.48005 0.0433081 1.42365C-0.125892 1.00965 0.229308 0.784049 0.613308 0.784049H4.07651C4.54091 0.784049 4.69211 1.06485 4.79771 1.31685C4.92011 1.60605 5.37371 2.76285 6.11771 4.06245C7.32251 6.17685 8.06291 7.03725 8.65451 7.03725C8.76566 7.03758 8.87492 7.0086 8.97131 6.95325C9.74411 6.52845 9.60011 3.76845 9.56411 3.19965C9.56411 3.08925 9.56291 1.96725 9.16691 1.42485C8.88371 1.03605 8.40131 0.884848 8.10971 0.829648C8.18771 0.716848 8.35331 0.544048 8.56571 0.442048C9.09491 0.178048 10.0513 0.139648 11.0005 0.139648H11.5273C12.5569 0.154048 12.8233 0.220048 13.1977 0.314848C13.9513 0.494848 13.9657 0.983249 13.8997 2.64645C13.8805 3.12165 13.8601 3.65685 13.8601 4.28685C13.8601 4.42125 13.8541 4.57125 13.8541 4.72365C13.8313 5.57685 13.8013 6.53805 14.4037 6.93285C14.4818 6.98152 14.5721 7.0073 14.6641 7.00725C14.8729 7.00725 15.4981 7.00725 17.1937 4.09725C17.9377 2.81205 18.5137 1.29645 18.5533 1.18245C18.5869 1.11885 18.6877 0.940048 18.8101 0.868048C18.8972 0.821723 18.9947 0.798581 19.0933 0.800849H23.1673C23.6113 0.800849 23.9125 0.868049 23.9713 1.03605C24.0697 1.30845 23.9521 2.14005 22.0921 4.65525C21.7789 5.07405 21.5041 5.43645 21.2629 5.75325C19.5769 7.96605 19.5769 8.07765 21.3625 9.75765Z" fill="white" />
                            </svg>
                        </a>
                        <a href="#" class="circle-btn grad1 footer-section__social-link">
                            <svg width="24" height="14" viewBox="0 0 24 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M21.3625 9.75765C21.3625 9.75765 23.3029 11.6741 23.7829 12.5609C23.7922 12.5736 23.7995 12.5878 23.8045 12.6029C24.0001 12.9305 24.0481 13.1873 23.9521 13.3769C23.7901 13.6901 23.2417 13.8473 23.0557 13.8605H19.6261C19.3873 13.8605 18.8905 13.7981 18.2857 13.3805C17.8237 13.0577 17.3641 12.5261 16.9189 12.0065C16.2541 11.2349 15.6793 10.5653 15.0973 10.5653C15.0238 10.5651 14.9508 10.5773 14.8813 10.6013C14.4409 10.7405 13.8817 11.3681 13.8817 13.0397C13.8817 13.5629 13.4689 13.8605 13.1797 13.8605H11.6089C11.0737 13.8605 8.28731 13.6733 5.81651 11.0681C2.78891 7.87845 0.0697081 1.48005 0.0433081 1.42365C-0.125892 1.00965 0.229308 0.784049 0.613308 0.784049H4.07651C4.54091 0.784049 4.69211 1.06485 4.79771 1.31685C4.92011 1.60605 5.37371 2.76285 6.11771 4.06245C7.32251 6.17685 8.06291 7.03725 8.65451 7.03725C8.76566 7.03758 8.87492 7.0086 8.97131 6.95325C9.74411 6.52845 9.60011 3.76845 9.56411 3.19965C9.56411 3.08925 9.56291 1.96725 9.16691 1.42485C8.88371 1.03605 8.40131 0.884848 8.10971 0.829648C8.18771 0.716848 8.35331 0.544048 8.56571 0.442048C9.09491 0.178048 10.0513 0.139648 11.0005 0.139648H11.5273C12.5569 0.154048 12.8233 0.220048 13.1977 0.314848C13.9513 0.494848 13.9657 0.983249 13.8997 2.64645C13.8805 3.12165 13.8601 3.65685 13.8601 4.28685C13.8601 4.42125 13.8541 4.57125 13.8541 4.72365C13.8313 5.57685 13.8013 6.53805 14.4037 6.93285C14.4818 6.98152 14.5721 7.0073 14.6641 7.00725C14.8729 7.00725 15.4981 7.00725 17.1937 4.09725C17.9377 2.81205 18.5137 1.29645 18.5533 1.18245C18.5869 1.11885 18.6877 0.940048 18.8101 0.868048C18.8972 0.821723 18.9947 0.798581 19.0933 0.800849H23.1673C23.6113 0.800849 23.9125 0.868049 23.9713 1.03605C24.0697 1.30845 23.9521 2.14005 22.0921 4.65525C21.7789 5.07405 21.5041 5.43645 21.2629 5.75325C19.5769 7.96605 19.5769 8.07765 21.3625 9.75765Z" fill="white" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/edit-button.js"></script>
        <script src="js/index.js"></script>
    </body>

</html>