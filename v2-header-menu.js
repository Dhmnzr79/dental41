document.addEventListener('DOMContentLoaded', function () {
    var openBtn = document.getElementById('v2-menu-open');
    var closeBtn = document.getElementById('v2-menu-close');
    var dialog = document.getElementById('v2-menu-dialog');
    var body = document.body;

    if (!openBtn || !closeBtn || !dialog) return;

    function openMenu() {
        dialog.setAttribute('aria-hidden', 'false');
        body.classList.add('v2-menu-open');
        
        setTimeout(function () {
            var firstLink = dialog.querySelector('a, button[type="button"]');
            if (firstLink && firstLink.focus) {
                firstLink.focus();
            }
        }, 300);
    }

    function closeMenu() {
        dialog.setAttribute('aria-hidden', 'true');
        body.classList.remove('v2-menu-open');
        
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

    var dropdownToggles = dialog.querySelectorAll('.v2-header__nav-link--toggle');
    dropdownToggles.forEach(function (toggle) {
        toggle.addEventListener('click', function (e) {
            var parent = toggle.closest('.v2-header__nav-item--dropdown');
            if (parent) {
                var dropdown = parent.querySelector('.v2-header__dropdown');
                if (dropdown) {
                    e.preventDefault();
                    var isExpanded = parent.classList.contains('v2-header__nav-item--expanded');
                    if (isExpanded) {
                        parent.classList.remove('v2-header__nav-item--expanded');
                        toggle.setAttribute('aria-expanded', 'false');
                    } else {
                        parent.classList.add('v2-header__nav-item--expanded');
                        toggle.setAttribute('aria-expanded', 'true');
                    }
                }
            }
        });
    });
});








