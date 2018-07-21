<?php
echo sprintf(
"%s %s
%s
%s %s
%s

%s
%s
----------------------------
%s %s",
    __d('contactform', 'Hi, '), Sanitize::clean($data['Name']),
	__d('contactform', 'Thank you for contact us!'),
 	__d('contactform', 'Phone number: '), Sanitize::clean($data['Phone']),
    __d('contactform', 'Quote message: '),

    Sanitize::stripAll($data['Subject']),
    Sanitize::stripAll($data['Message']),

    __d('contactform', 'sent from'), Router::url('/', true)
);