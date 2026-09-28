<h1><?= esc($title) ?></h1>

<?php if (empty($tasks)): ?>

    <p>No tasks available.</p>

<?php else: ?>

    <table>
        <thead>
            <tr>
               <th>Task</th>
               <th>Status</th>
               <th>Task Date</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($tasks as $task): ?>
              <tr>
                 <td><?= esc($task['title']) ?></td>
                 <td><?= esc($task['status']) ?></td>
                 <td><?= esc($task['task_date']) ?></td>
              </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php endif; ?>