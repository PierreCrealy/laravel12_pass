
import $ from 'jquery';

window.App = window.App || {};

(function ($, window, App) {
    'use strict';

    const chain = {
        min: 'abcdefghijklmnopqrstuvwxyz',
        maj: 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
        num: '0123456789',
        sym: '~`!@#$%^&*()_+-=[]{}\\|;:\'",.<>?/',
    };

    App.common = {
        init: function () {
            $('#length').on('input', this.lengthValue)
            $('#generate').on('click', this.generator)
        },
        lengthValue: function()
        {
            $('#length-value').html($('#length').val())
        },
        generator: function () {

            let passwordBuild = '';
            let availableChain = '';

            const length  = $('#length').val();
            const options = $('#options').val();

            availableChain += options.includes('min') ? chain.min : '';
            availableChain += options.includes('maj') ? chain.maj : '';
            availableChain += options.includes('num') ? chain.num : '';
            availableChain += options.includes('sym') ? chain.sym : '';

            let availableChainRandom = [...availableChain].sort(() => Math.random() - 0.5)


            for(var i = 0; i < length; i++)
            {
                const rdmInt = Math.round((Math.random() * length) + 1);

                passwordBuild += availableChainRandom[rdmInt]
            }

            $('#password').val(passwordBuild)
        }
    };
})($, window, window.App);

$(document).ready(function () {

    window.App.common.init();

});
