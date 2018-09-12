/**
 * Load QUI
 */
require(['MooTools'], function () {
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

    // sign out
    var Logout = document.getElement('.header-profile-menu .logout');
    var Login  = document.getElement('.header-profile-login');

    if (Logout) {
        Logout.addEvent('click', function (event) {
            event.stop();

            require(['controls/users/LogoutWindow'], function (Logout) {
                new Logout().open();
            });
        });
    }

    if (Login) {
        Login.addEvent('click', function (event) {
            event.stop();

            require(['controls/users/LoginWindow'], function (LoginWindow) {
                new LoginWindow({
                    events: {
                        onLoad: function () {
                            console.log(123);
                        }
                    }
                }).open();
            });
        });
    }

    // mobile menu
    var getSlideOut = function () {
        var SlideNode = document.getElement(
            '[data-qui="package/quiqqer/menu/bin/SlideOut"]'
        );

        return QUI.Controls.getById(SlideNode.get('data-quiid'));
    };

    require(['qui/QUI'], function (QUI) {
        QUI.parse(document.body);
    });

    document.getElement('.header-profile-menu-button').addEvent('click', function () {
        var SlideOut = getSlideOut();

        if (SlideOut) {
            SlideOut.toggle();
        }
    });
});
