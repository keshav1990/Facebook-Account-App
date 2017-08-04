<?php
$this->load->view('common/head');
?>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
<?php
$this->load->view('common/header');
?>
<div class="clearfix"> </div>
<div class="page-container">
<?php
$this->load->view('common/sidebar');
?>
<?php
$this->load->view($theme);
?>
</div>
</body>
</html>