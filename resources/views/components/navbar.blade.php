<!-- resources/views/components/navbar.blade.php -->
<nav class="navbar is-transparent navbar-transparent" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item is-size-3" href="/">
            <strong>WeatherVIS</strong>
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a class="button is-light" href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                    <a class="button is-light" href="{{ route('graph') }}">
                        Graph
                    </a>
                    <a class="button is-light" href="/map">
                        Map
                    </a>
                    <a class="button is-light" href="{{ route('about') }}">
                        About Us
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Bulma's JavaScript for navbar burger functionality -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Get all "navbar-burger" elements
        const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

        // Check if there are any navbar burgers
        if ($navbarBurgers.length > 0) {
            // Add a click event on each of them
            $navbarBurgers.forEach(el => {
                el.addEventListener('click', () => {
                    // Get the target from the "data-target" attribute
                    const target = el.dataset.target;
                    const $target = document.getElementById(target);

                    // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                    el.classList.toggle('is-active');
                    $target.classList.toggle('is-active');
                });
            });
        }
    });
</script>
