<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
   <h2>Mã Khoa: <?= $data['id'] ?></h2>
   <h2>Tên Khoa: <?= $data['name'] ?></h2>
   <h1><i>Các Chuyên Ngành Trong Khoa: </i></h1>
   <a href="?mod=major&act=detail_major&faculty_id=<?= $_GET['id'] ?>" type="button" class="btn btn-success">Danh Sách Ngành</a>
   <h1><i>Các Lớp Trong Khoa: </i></h1>
   <a href="?mod=class&act=detail_class&faculty_id=<?= $_GET['id'] ?>" type="button" class="btn btn-success">Danh sách lớp</a>
   <h1><i>Các Học Phần Trong Khoa: </i></h1>
   <a href="?mod=course&act=detail_course&faculty_id=<?= $_GET['id'] ?>" type="button" class="btn btn-success">Danh sách học phần</a>
   <h1><i>Các Lớp Học Phần Đang Mở: </i></h1>
   <a href="?mod=class_section&act=detail_classsection&faculty_id=<?= $_GET['id'] ?>" type="button" class="btn btn-success">Danh sách học phần</a>
