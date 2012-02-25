<?php
echo json_encode(
  array(
    'IsSuccess' => $success,
    'Msg'       => __($message),
    'Data'      => $data,
  )
);
