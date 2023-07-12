define([
    'jquery',
    'mage/url',
    'mage/translate'
], function ($, urlBuilder, $t) {
    'use strict';

    $.widget('mage.addReview', {
        options: {
        },

        /** @inheritdoc */
        _create: function () {
            let addReviewForm = this.element ,data = {};

            addReviewForm.on('submit', function (e) {
                e.preventDefault();
                let formData = new FormData(e.currentTarget);

                if (addReviewForm.valid()) {
                    data.review = {
                        title: formData.get('title'),
                        review: formData.get('review'),
                        pros: formData.get('pros'),
                        cons: formData.get('cons'),
                    };

                    $.ajax({
                        type: "POST",
                        url: urlBuilder.build('rest/V1/plumrocket/add/review'),
                        contentType: 'application/json',
                        data: JSON.stringify(data),
                        dataType: 'json'
                    }).done(function (data) {
                        if (data) {
                            addReviewForm.find('input,textarea').val('');
                            alert($t('Your review was added successfully!'));
                        } else {
                            alert($t('Something went wrong! Please check input data.'));
                        }
                        console.log(data);
                    });
                }
            });
        }
    });

    return $.mage.addReview;
});
