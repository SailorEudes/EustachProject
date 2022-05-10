<!-- Filter Block -->
<?php $location_search_style = setting_item('company_location_search_style') ?>
<?php if($list_locations): ?>
    <?php if($location_search_style == 'autocomplete'): ?>
        <?php
        $location_name = "";
        $list_json = [];
        $location_id = request()->get('location');
        $traverse = function ($locations, $prefix = '') use (&$traverse, &$list_json, &$location_name, $location_id) {
            foreach ($locations as $location) {
                $translate = $location->translateOrOrigin(app()->getLocale());
                if ($location_id == $location->id) {
                    $location_name = $translate->name;
                }
                $list_json[] = [
                    'id'    => $location->id,
                    'title' => $prefix.' '.$translate->name,
                ];
                $traverse($location->children, $prefix.'-');
            }
        };
        $traverse($list_locations);
        ?>
        <div class="form-group col-lg-3 col-md-12 col-sm-12 location smart-search">
            <input type="text" class="smart-search-location parent_text form-control" placeholder="<?php echo e(__("Choose a location")); ?>" value="<?php echo e($location_name); ?>" data-onLoad="<?php echo e(__("Loading...")); ?>"
                   data-default="<?php echo e(json_encode($list_json)); ?>">
            <input type="hidden" class="child_id" name="location" value="<?php echo e($location_id); ?>">
            <span class="icon flaticon-map-locator"></span>
        </div>
    <?php else: ?>
        <div class="form-group col-lg-3 col-md-12 col-sm-12 location bc-select-has-delete">
            <span class="icon flaticon-map-locator"></span>
            <select class="chosen-select" name="location">
                <option value=""><?php echo e(__("Choose a location")); ?></option>
                <?php
                    $location_id = request()->get('location');
                    $traverse = function ($locations, $prefix = '') use (&$traverse, $location_id) {
                        foreach ($locations as $location) {
                            $selected = '';
                            if ($location_id == $location->id)
                                $selected = 'selected';
                            $translate = $location->translateOrOrigin(app()->getLocale());
                            printf("<option value='%s' %s>%s</option>", $location->id, $selected, $prefix . ' ' . $translate->name);
                            $traverse($location->children, $prefix . '-');
                        }
                    };
                    $traverse($list_locations);
                ?>
            </select>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH /var/www/vhosts/eustach.fr/httpdocs/modules/Company/Views/frontend/layouts/sidebars/fields/style-4/location.blade.php ENDPATH**/ ?>