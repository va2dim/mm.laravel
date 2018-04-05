<aside class="col-sm-3 ml-sm-auto blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h4>
            <span class="oi oi-info" title="Статистика пользователей" aria-hidden="true"
                  aria-label="Статистика пользователей"></span>
            Статистика пользователей
        </h4>
        <ol class="list-unstyled">
            @foreach($statistic as $userStatistic)
                <li>{{ $userStatistic->user_browser }} ({{ $userStatistic->user_browser_count }})</li>
            @endforeach

        </ol>
    </div>
</aside><!-- /.blog-sidebar -->