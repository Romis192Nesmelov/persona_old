<?php
if (!isset($value)) {
    die('Submit internal error');
}
?>
<input type="submit" value="<?php echo $value; ?>" disabled>
