<?php
?>
<div class="cs-popup info-popup" trigger="<?php echo isset($trigger) ? $trigger : ''; ?>">
    <div class="wrp">
        <div class="w-1" style="padding: 2%;">
            <div class="bot-mrgn-ult about__title"><?php echo isset($title) ? $title : ''; ?></div>
            <p style="max-height: 80vh; overflow-y: auto"><?php echo isset($text) ? $text : ''; ?></p>
        </div>
    </div>
</div>
