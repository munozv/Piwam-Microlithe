<?php
echo json_encode(
  array(
    'events'  => $events->getRawValue(),
    'issort'  => $issort,
    'start'   => $start,
    'end'     => $end,
    'error'   => $error !== null ? __($error) : $error,
  )
);