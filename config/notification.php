<?php

return [
    //value must be a valid strtotime() string
    'docusign_initial_due_days' => '+7', // how many days since date of the booking
    'url_initial_due_days' => '+112', // how many days since date of the Docusign
    '1st_tracking_initial_due_days' => '-100', // (84 days = 12 weeks) how many days prior to the booking arrival date (start date)
    '2nd_tracking_initial_due_days' => '-60', // how many days prior to the booking arrival date (start date)
    '1st_deposit_initial_due_days' => '-49', // how many days prior to the booking arrival date (start date)
    '3rd_tracking_initial_due_days' => '-40', // how many days prior to the booking arrival date (start date)
    'guest_list_initial_due_days' => '-28', // how many days prior to the booking arrival date (start date)
    'invoice_paid_initial_due_days' => '-14', // how many days prior to the booking arrival date (start date)
    'tour_pack_initial_due_days' => '-7', // how many days prior to the booking arrival date (start date)
    'tour_review_initial_due_days' => '+1', // how many days after the booking departure date

];
