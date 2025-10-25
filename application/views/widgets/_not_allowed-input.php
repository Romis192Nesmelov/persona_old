<?php
if (isset($permissions) && isset($key) && array_key_exists($key, $permissions) && $permissions[$key]) {
    echo '';
} else {
    echo 'disabled';
}