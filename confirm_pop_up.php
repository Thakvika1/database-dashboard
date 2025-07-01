

<?php if ($showConfirm): ?>
    <form id="confirm" method="post">
        <h3>Do you want to delete this user?</h3>
        <input type="hidden" name="confirmed_user_id" value="<?= $userIDToDelete ?>">
        <button type="submit" name="confirm_delete" value="no">No</button>
        <button type="submit" name="confirm_delete" value="yes">Yes</button>
    </form>
<?php endif; ?>