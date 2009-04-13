<?php
function showValue($str) {
    return ($str != null && (is_array($str) || trim($str) != ""));
}
?>