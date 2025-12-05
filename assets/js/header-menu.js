document.addEventListener('DOMContentLoaded', function () {
    var openBtn = document.getElementById('menu-open');
    var closeBtn = document.getElementById('menu-close');
    var dialog = document.getElementById('menu-dialog');
    var body = document.body;

    if (!openBtn || !closeBtn || !dialog) return;

    function openMenu() {
        dialog.setAttribute('aria-hidden', 'false');
        body.classList.add('menu-open');
        
        setTimeout(function () {
            var firstLink = dialog.querySelector('a, button[type="button"]');
            if (firstLink && firstLink.focus) {
                firstLink.focus();
            }
        }, 300);
    }

    function closeMenu() {
        dialog.setAttribute('aria-hidden', 'true');
        body.classList.remove('menu-open');
        
        if (openBtn && openBtn.focus) {
            openBtn.focus();
        }
    }

    openBtn.addEventListener('click', openMenu);
    closeBtn.addEventListener('click', closeMenu);

    dialog.addEventListener('click', function (e) {
        if (e.target === dialog) {
            closeMenu();
        }
    });

    window.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && dialog.getAttribute('aria-hidden') === 'false') {
            closeMenu();
        }
    });

    var dropdownToggles = dialog.querySelectorAll('.header__nav-link--toggle');
    dropdownToggles.forEach(function (toggle) {
        toggle.addEventListener('click', function (e) {
            var parent = toggle.closest('.header__nav-item--dropdown');
            if (parent) {
                var dropdown = parent.querySelector('.header__dropdown');
                if (dropdown) {
                    e.preventDefault();
                    var isExpanded = parent.classList.contains('header__nav-item--expanded');
                    if (isExpanded) {
                        parent.classList.remove('header__nav-item--expanded');
                        toggle.setAttribute('aria-expanded', 'false');
                    } else {
                        parent.classList.add('header__nav-item--expanded');
                        toggle.setAttribute('aria-expanded', 'true');
                    }
                }
            }
        });
    });
});








