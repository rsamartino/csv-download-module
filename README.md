Answer to Part 4 of the assessment.

I modeled adding the minicart button on the core [Braintree](https://github.com/magento/magento2/blob/2.3-develop/app/code/Magento/Braintree/etc/frontend/events.xml) implementation. The `shortcut_buttons_container` event is also used by the AmazonPay module.

The admin config was straightforward; I opted to create the csv with javascript from the [cart data](https://github.com/rsamartino/csv-download-module/blob/e92f585663861716117b45bffe13e253ba13285c/view/frontend/web/js/button.js#L46) in local storage, which took a little figuring out but seems to be working well. 
