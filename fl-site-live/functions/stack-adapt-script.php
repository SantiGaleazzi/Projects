<?php

/***************************
*Add StackAdapt Script
****************************/
add_action('wp_head', 'add_stackadapt');
function add_stackadapt() { ?>
<script>!function(s,a,e,v,n,t,z){if(s.saq)return;n=s.saq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!s._saq)s._saq=n;n.push=n;n.loaded=!0;n.version='1.0';n.queue=[];t=a.createElement(e);t.async=!0;t.src=v;z=a.getElementsByTagName(e)[0];z.parentNode.insertBefore(t,z)}(window,document,'script','https://tags.srv.stackadapt.com/events.js');saq('ts', 'Ur9KecSXJtDfz22jDHs5MQ');</script>
<?php
}