<?php
if (isset($permissions) && isset($key) && array_key_exists($key, $permissions) && $permissions[$key]) {
    echo '';
} else {
    echo 'onclick="return false;" data-disabled="disabled" data-tooltip="Вы не можете совершать данное действие"';
}
