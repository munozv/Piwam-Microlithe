<?php
use_helper("I18N") ;
echo json_encode(
  array(
    'IsSuccess' => $success,
    'Msg'       => __($message),
    'Data'      => $data,
  )
);
