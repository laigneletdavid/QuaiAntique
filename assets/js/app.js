import '../bootstrap';

import '../css/app.scss';

require('bootstrap');

$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});
