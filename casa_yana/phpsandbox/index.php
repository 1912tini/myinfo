<?php include 'server-info.php'; ?>
<?php include 'head.php'; ?>

<div class="container">
    <h2>Server $ File Info</h2>
    <?php if ($server): ?>
        <ul class="list-group">
            <?php foreach($server as $key => $value): ?>
                <li class="list-group-item">
                    <strong><?php echo $key; ?>: </strong>
                    <?php echo $value; ?>
                </li>
            <?php endforeach; ?>
        </ul>
            <?php endif; ?>

    <h2>Client Info</h2>
    <?php if ($client): ?>
        <ul class="list-group">
            <?php foreach($client as $key => $value): ?>
                <li class="list-group-item">
                    <strong><?php echo $key; ?>: </strong>
                    <?php echo $value; ?>
                </li>
            <?php endforeach; ?>
        </ul>
            <?php endif; ?>        
</div>
