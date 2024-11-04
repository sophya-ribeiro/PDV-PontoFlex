<?php

/**
 * @var \App\View\AppView $this
 * @var array $params
 * @var string $message
 */
$class = 'bg-white';

if (!empty($params['class'])) {
    $class = $params['class'];
}
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="toast-container position-fixed top-0 end-0 mt-5 me-5">
    <div class="toast align-items-center border-0 p-1 fade show <?= h($class) ?>" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <?= $message ?>
            </div>
            <button type="button" class="btn-close btn-close-black me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>