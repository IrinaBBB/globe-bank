<?php $id = $id ?? ''; ?>
<div class="accordion" id="accordionExample">
    <?php $subject_set = find_all_subjects(['visible' => true]); ?>
    <?php while ($subject = mysqli_fetch_assoc($subject_set)) : ?>
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading<?php echo $subject['id']; ?>">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse<?php echo $subject['id']; ?>" aria-expanded="false"
                        aria-controls="collapseTwo">
                    <i class="<?php echo $subject['icon']; ?>"></i><?php echo $subject['menu_name']; ?>
                </button>
            </h2>
            <div id="collapse<?php echo $subject['id']; ?>"
                 class="accordion-collapse collapse <?php if ($subject['id'] == $page_single['subject_id']) echo 'show'; ?>"
                 aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <ul>
                        <?php $page_set = get_pages_by_subject_id($subject['id'], ['visible' => true]); ?>
                        <?php while ($page = mysqli_fetch_assoc($page_set)) : ?>
                            <li>
                                <a <?php if ($id == $page['id']) echo 'class="active"'; ?>
                                        href="<?php echo url_for('/single.php?id=' . $page['id']); ?>"><?php echo $page['menu_name'] ?></a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                    <?php mysqli_free_result($page_set); ?>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                <i class="fa-solid fa-gears"></i>Settings
            </button>
        </h2>
        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
             data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <ul>
                    <li>
                        <a href="<?php echo url_for('/language.php'); ?>">Language</a>
                    </li>
                    <li>
                        <a href="<?php echo url_for('/login.php'); ?>">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php mysqli_free_result($subject_set); ?>
</div>
