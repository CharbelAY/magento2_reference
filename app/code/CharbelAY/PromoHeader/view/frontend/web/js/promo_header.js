define([
    'uiComponent'
], function (
    Component
) {
    'use strict';

    return Component.extend({
        defaults: {
            message: 'Free shipping!',
            template: 'CharbelAY_PromoHeader/promo_header'
        },
        initialize: function () {
            this._super();

            console.log(this.message);
        }
    });
})
