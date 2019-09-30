define(
    [
        'uiComponent',
        'jquery',
        'Magento_Customer/js/customer-data',
        'domReady!'
    ],
    function (
        Component,
        $,
        customerData
    ) {
        'use strict';

        return Component.extend({

            defaults: {},

            /**
             * @returns {Object}
             */
            initialize: function () {
                this._super()
                    .initComponent();

                return this;
            },

            /**
             * @returns {Object}
             */
            initComponent: function () {
                var $this = $('#' + this.id),
                    cartData = customerData.get('cart'),
                    items = cartData().items,
                    csvHeader = 'Name,Price,SKU,URL,Qty',
                    self = this;

                $this.on('click', function (event) {
                    var csvBody = '';

                    items.forEach(function (item, index) {
                        csvBody += item.product_name + ','
                            + item.product_price_value + ','
                            + item.product_sku + ','
                            + item.product_url + ','
                            + item.qty
                            + '\r\n'
                    });

                    self.downloadCsv(csvHeader + '\r\n' + csvBody);
                });

                return this;
            },

            downloadCsv: function (csv) {
                var blob = new Blob([csv], { type: 'text/csv' }),
                    hiddenElement = document.createElement('a');

                hiddenElement.href = window.URL.createObjectURL(blob);
                hiddenElement.target = '_blank';
                hiddenElement.download = 'cartItems.csv';

                document.body.appendChild(hiddenElement);
                hiddenElement.click();
                document.body.removeChild(hiddenElement);
                console.log('csv fn called')
            },

        });
    }
);
