<div class="marker-container">
    <div class="marker-card">
        <div class="front face">
            <div style="background-image: url(<?php echo e(get_file_url($row->avatar_id) ?? asset('images/avatar.png')); ?>"></div>
        </div>
        <div class="back face">
            <div style="background-image: url(<?php echo e(get_file_url($row->avatar_id) ?? asset('images/avatar.png')); ?>"></div>
        </div>
        <div class="marker-arrow"></div>
    </div>
</div>
<?php /**PATH /var/www/vhosts/eustach.fr/httpdocs/modules/Company/Views/frontend/layouts/elements/map-marker.blade.php ENDPATH**/ ?>