import {Controller} from "@hotwired/stimulus"; [Controller]

import $ from 'jquery';
import selectorEngine from "bootstrap/js/src/dom/selector-engine";

export default class extends Controller {
    connect() {

            var $reservation = $('#reservation_reserved_at');
            // When sport gets selected ...
            $reservation.change(function () {
                // ... retrieve the corresponding form.
                var $form = $(this).closest('form');
                // Simulate form data, but only include the selected sport value.
                var data = {};
                data[$reservation.attr('name')] = $reservation.val();
                // Submit data via AJAX to the form's action path.
                $.ajax({
                    url: $form.attr('action'),
                    type: $form.attr('method'),
                    data: data,
                    complete: function (html) {
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