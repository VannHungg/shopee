<?php
if (isset($_SESSION['status']) && isset($_SESSION['message'])) {
?>
    <div id="alert">
        <div class="alert-notify">
            <div class="alert alert-<?= $_SESSION['status'] ?>">
                <div class="alert-msg">
                    <strong>Holy guacamole!</strong> <?= $_SESSION['message']; ?>
                </div>
                <div class="alert-close">
                    <i class="fa-solid fa-xmark"></i>
                </div>
            </div>
        </div>
    </div>
<?php
    unset($_SESSION['status']);
    unset($_SESSION['message']);
}
?>

<script>
    setTimeout(() => {
        const alert = document.getElementById('alert');
        if(alert) {
            alert.style.display = 'none';
        }
    }, 3000);
</script>