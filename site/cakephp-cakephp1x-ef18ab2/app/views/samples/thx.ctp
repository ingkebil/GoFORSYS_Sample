    <fieldset>
        <legend><?php __('Generated sample IDs'); ?></legend>
        <?php if ($ids > 0): ?>
            <ul>
            <?php foreach ($ids as $id): ?>
                <li><?php echo $id['Sample']['id'] ?></li>
            <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </fieldset>

You can ...
<ul>
<li><?php echo $html->link('... view all your sample IDs', array('controller' => 'people', 'action' => 'view', $person_id)); ?></li>
<li><?php echo $html->link('... generate some more sample IDs', array('action' => 'generate')); ?></li>
</ul>
