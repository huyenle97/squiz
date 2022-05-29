
<div class="sidebar">
    <div class="profile">
        <img src="https://inkythuatso.com/uploads/images/2021/12/logo-dai-hoc-vinh-inkythuatso-01-20-13-39-09.jpg" alt="profile_picture">
        <h3><?php echo $_SESSION['firstname']; ?> <?php echo $_SESSION['lastname']; ?></h3>
        <p>Admin</p>
    </div>
    <ul>
        <li>
            <a href="<?php echo $home_url; ?>admin/index.php" <?php echo $page_title=="Trang chủ" ? "class='active'" : ""; ?>>
                <span class="icon"><i class="fas fa-home"></i></span>
                <span class="item">Trang chủ</span>
            </a>
        </li>
        <li>
            <a href="<?php echo $home_url; ?>admin/read_users.php" <?php echo $page_title=="Danh sách người dùng" ? "class='active'" : ""; ?>>
                <span class="icon"><i class="fas fa-user-friends"></i></span>
                <span class="item">Tài khoản</span>
            </a>
        </li>
        <li>
            <a href="<?php echo $home_url; ?>admin/subject/view/subject.php" <?php echo $page_title=="Danh sách môn học" ? "class='active'" : ""; ?>>
                <span class="icon"><i class="fas fa-book"></i></span>
                <span class="item">Môn học</span>
            </a>
        </li>
        <li>
            <a href="<?php echo $home_url; ?>admin/question/view/question.php" <?php echo $page_title=="Danh sách câu hỏi" ? "class='active'" : ""; ?>>
                <span class="icon"><i class="fas fa-question"></i></span>
                <span class="item">Câu hỏi</span>
            </a>
        </li>
        <li>
            <a href="<?php echo $home_url; ?>admin/exam_config/view/exam_config.php"  <?php echo $page_title=="Cấu hình đề thi" ? "class='active'" : ""; ?>>
                <span class="icon"><i class="fas fa-database"></i></span>
                <span class="item">Cấu hình đề thi</span>
            </a>
        </li>
        <li>
            <a href="<?php echo $home_url; ?>admin/result/view/result.php" <?php echo $page_title=="Danh mục kết quả thi" ? "class='active'" : ""; ?>>
                <span class="icon"><i class="fas fa-chart-line"></i></span>
                <span class="item">Kết quả thi</span>
            </a>
        </li>
        <li>
            <a href="<?php echo $home_url; ?>logout.php">
                <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                <span class="item">Đăng xuất</span>
            </a>
        </li>
    </ul>
</div>

 