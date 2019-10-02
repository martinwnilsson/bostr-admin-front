<nav class="nav flex-column">
    <?php
        LinkFactory::mainNavLink("Konfigurationer", "conf","database");
        LinkFactory::mainNavLink("Front-användare", "conf","user");
        LinkFactory::mainNavLink("Ekonomier", "conf","euro-sign", true);
        LinkFactory::mainNavLink("Bostadsobject", "conf","home", true);
        LinkFactory::mainNavLink("Matchningsparametrar", "conf","tasks", true);
    ?>
</nav>