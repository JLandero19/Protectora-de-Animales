<div class="row mt-5">
    <div class="col text-center">
        <div class="block-27">
            <ul>
            <?php
            if ($btn_numbers) {
                if ($btn_previous) {
            ?>
                    <li><a href="index.php?route=<?= $route ?>&page=<?= $btn_previous ?>">&laquo;</a></li>
            <?php
                } else {
            ?>
                    <li class="disabled"><a href="#">&laquo;</a></li>
            <?php
                }
                for ($i=0; $i < count($btn_numbers); $i++) {
                    if (isset($_GET['page'])) {
                        if ($_GET['page'] == $btn_numbers[$i]) {
            ?>
                            <li class="active">
            <?php
                        } else {
            ?>
                            <li>
            <?php
                        }
                    } else {
            ?>
                        <li class="<?php echo $btn_numbers[$i] == 1 ? "active" : ""; ?>">
                    <?php
                    }
            ?>
                        <a href="index.php?route=<?= $route ?>&page=<?= $btn_numbers[$i] ?>"><?= $btn_numbers[$i] ?></a>
                    </li>
            <?php
                }
                if ($btn_next) {
            ?>
                    <li><a href="index.php?route=<?= $route ?>&page=<?= $btn_next ?>">&raquo;</a></li>
            <?php
                } else {
            ?>
                    <li class="disabled"><a href="#">&raquo;</a></li>
            <?php
                }
            }
            ?>

                <!-- <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li> -->
            </ul>
        </div>
    </div>
</div>