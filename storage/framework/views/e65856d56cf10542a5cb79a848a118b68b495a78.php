<?php if(!empty($categories)): ?>
    <div class="filter-block">
        <h4><?php echo e($val['title']); ?></h4>
        <div class="form-group">
            <select class="chosen-select" name="category">
                <option value=""><?php echo e(__("-- Please select category --")); ?></option>
                <?php
                    $cat_id = request()->get('category');
                    $traverse = function ($categories, $prefix = '') use (&$traverse, $cat_id) {
                        foreach ($categories as $category) {
                            $selected = '';
                            if ($cat_id == $category->id)
                                $selected = 'selected';

                            $translate = $category->translateOrOrigin(app()->getLocale());
                            printf("<option value='%s' %s>%s</option>", $category->id, $selected, $prefix . ' ' . $translate->name);
                            $traverse($category->children, $prefix . '-');
                        }
                    };
                    $traverse($categories);
                ?>
            </select>
            <span class="icon flaticon-briefcase"></span>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /var/www/vhosts/eustach.fr/httpdocs/modules/Company/Views/frontend/layouts/sidebars/fields/style-1/category.blade.php ENDPATH**/ ?>