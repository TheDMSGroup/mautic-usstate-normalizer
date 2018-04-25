<?php
/**
 * Created by PhpStorm.
 * User: nbush
 * Date: 4/19/18
 * Time: 3:43 PM.
 */
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $view['translator']->trans('mautic.config.tab.usstatenormalizer_config'); ?></h3>
    </div>
    <div class="panel-body">
        <?php foreach ($form->children as $f): ?>
            <div class="row">
                <div class="col-md-6">
                    <?php echo $view['form']->row($f); ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
