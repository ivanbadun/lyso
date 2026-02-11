<style>
    /* Контейнер для точек */
    .quotes-pagination-wrapper {
        text-align: center;
        margin-top: 30px;
    }

    .quotes-pagination-wrapper .pagination {
        display: inline-flex;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    /* Стилизация каждой точки */
    .quotes-pagination-wrapper .pagination li a,
    .quotes-pagination-wrapper .pagination li span.current {
        display: block;
        width: 14px; /* Чуть увеличил для удобства клика */
        height: 14px;
        margin: 0 6px;
        border-radius: 50%;
        background: #D1D8E0; /* Цвет неактивной точки */
        text-indent: -9999px; /* Прячем цифры */
        overflow: hidden;
        border: none;
        transition: all 0.3s ease;
    }

    /* Активная точка */
    .quotes-pagination-wrapper .pagination li.current span.current,
    .quotes-pagination-wrapper .pagination li span.current {
        background: #00A8FF !important;
        transform: scale(1.1);
    }

    /* Ховер */
    .quotes-pagination-wrapper .pagination li a:hover {
        background: #A5B1BE;
    }
</style>

<div class="quote-card">
    <div class="quote-mark-icon">
        <svg width="60" height="40" viewBox="0 0 45 35" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 20.3V0H19.6V20.3C19.6 28.5 13 35 4.9 35H0.7V29.4H4.9C9.9 29.4 14 25.3 14 20.3H0ZM25.2 20.3V0H44.8V20.3C44.8 28.5 38.2 35 30.1 35H25.9V29.4H30.1C35.1 29.4 39.2 25.3 39.2 20.3H25.2Z" fill="#00A8FF"/>
        </svg>
    </div>

    <div class="quote-content">
        <div class="quote-text-body">
            <?php the_content(); ?>
        </div>
        <h4 class="quote-author"><?php the_title(); ?></h4>
    </div>
</div>
