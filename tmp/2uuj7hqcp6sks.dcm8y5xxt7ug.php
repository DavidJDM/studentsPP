<h1>Student List</h1>

<ol>
<?php foreach (($students?:[]) as $student): ?>
    <li><a href="<?= ($BASE) ?>/view/<?= ($student['sid']) ?>">
        <?= ($student['last']) ?>, <?= ($student['first']) ?></a></li>
<?php endforeach; ?>
</ol>

<a href="<?= ($BASE) ?>/add">Add a Student</a>