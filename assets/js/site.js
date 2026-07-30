(function () {
    'use strict';

    var menuButton = document.querySelector('.ca-menu-toggle');
    var nav = document.querySelector('.ca-nav');
    if (menuButton && nav) {
        menuButton.addEventListener('click', function () {
            var isOpen = menuButton.getAttribute('aria-expanded') === 'true';
            menuButton.setAttribute('aria-expanded', String(!isOpen));
            nav.classList.toggle('is-open', !isOpen);
            document.body.classList.toggle('ca-menu-open', !isOpen);
        });
    }

    var searchButton = document.querySelector('.ca-search-toggle');
    var searchPanel = document.querySelector('.ca-search-panel');
    if (searchButton && searchPanel) {
        searchButton.addEventListener('click', function () {
            var isOpen = searchButton.getAttribute('aria-expanded') === 'true';
            searchButton.setAttribute('aria-expanded', String(!isOpen));
            searchPanel.hidden = isOpen;
            if (!isOpen) {
                var input = searchPanel.querySelector('input[type="search"]');
                if (input) input.focus();
            }
        });
    }

    var clubTrack = document.querySelector('[data-club-track]');
    var clubButtons = document.querySelectorAll('[data-club-scroll]');
    if (clubTrack && clubButtons.length) {
        clubButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var direction = Number(button.getAttribute('data-club-scroll')) || 1;
                clubTrack.scrollBy({
                    left: direction * Math.max(320, clubTrack.clientWidth * 0.72),
                    behavior: 'smooth'
                });
            });
        });
    }

    document.addEventListener('keydown', function (event) {
        if (event.key !== 'Escape') return;
        if (menuButton && nav) {
            menuButton.setAttribute('aria-expanded', 'false');
            nav.classList.remove('is-open');
            document.body.classList.remove('ca-menu-open');
        }
        if (searchButton && searchPanel) {
            searchButton.setAttribute('aria-expanded', 'false');
            searchPanel.hidden = true;
        }
    });
}());
