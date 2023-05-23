import {Controller} from "@hotwired/stimulus";

import $ from 'jquery';

export default class extends Controller {
    connect() {


            var $reservation = $('#reservation_reserved_at');

            $reservation.on('input', function () {
                var $form = $(this).closest('form');
                var data = {};
                data[$reservation.attr('name')] = $reservation.val();
                // Submit data via AJAX to the form's action path.
                $.ajax({
                    url: $form.attr('action'),
                    type: $form.attr('method'),
                    data: data,
                    complete: function (html) {
                        console.log($(html.responseText).find('#reservation_reserved_time'));
                        // Replace current position field ...
                        $('#reservation_reserved_time').replaceWith(
                            // ... with the returned one from the AJAX response.
                            $(html.responseText).find('#reservation_reserved_time')
                        );
                        // Position field now displays the appropriate positions.
                    }
                });
            });

    }
}