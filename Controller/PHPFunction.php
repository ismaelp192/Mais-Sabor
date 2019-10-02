<?php
function get_numeric($val) {
    if (is_numeric($val)) {
      return $val + 0;
    }
    return 0;
  } 
  ?>