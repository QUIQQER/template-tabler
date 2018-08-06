/**
 * Load QUI
 */
require(['MooTools'], function () {
    // load QUI
    require(['qui/QUI'], function (QUI) {
    });

    // click dropdown workarounds
    var workaroundClickForMenus = function (event) {
        var Target = event.target;

        if (Target.nodeName !== 'A') {
            Target = Target.getParent('a');
        }

        if (!Target.get('data-toggle')) {
            return;
        }

        var Li   = Target.getParent('li, .dropdown');
        var Menu = Li.getElement('.dropdown-menu');

        if (Menu.hasClass('show')) {
            window.location = Target.get('href');
            return true;
        }

        event.stop();

        Menu.addClass('show');
        Menu.focus();
    };


    var dropDownMenus = document.getElements('.dropdown-menu');

    dropDownMenus.set('tabindex', -1);

    dropDownMenus.addEvent('blur', function (event) {
        (function () {
            event.target.removeClass('show')
        }).delay(200);
    });

    // menu
    var menuItems = document.getElements('nav .nav-item a');

    menuItems.addEvent('click', workaroundClickForMenus);

    // profile
    var Profile = document.getElement('.header-profile');

    if (Profile) {
        Profile.addEvent('click', workaroundClickForMenus);
    }
});
