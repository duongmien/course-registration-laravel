<h2>Mã Ngành: <?= $data['id'] ?></h2>
<h2>Tên Ngành: <?= $data['name'] ?></h2>
<h1><i>CácLớp Trong Chuyên Ngành : </i></h1>
<?php foreach ($data_class as $row_cl) { ?>
   <li><?= $row_cl['name'] ?></li>
<?php } ?>
<h1><i>Các Học Phần Trong Chuyên Ngành : </i></h1>
<?php foreach ($data_course as $row_c) { ?>
   <li><?= $row_c['name'] ?></li>
<?php } ?>
<h1><i>Các Lớp Học Phần Đang Mở : </i></h1>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
   <thead>
      <tr>
         <th scope="col">Mã LHP</th>
         <th scope="col">Tên HP</th>
         <th scope="col">Số lượng</th>
         <th scope="col">Giảng viên</th>
         <th scope="col">Phòng học</th>
         <th scope="col">Thứ học</th>
         <th scope="col">Tiết học</th>
         <th scope="col">Ngày bắt đầu</th>
         <th scope="col">Học Kỳ</th>
      </tr>
   </thead>
   <tbody>
      <?php foreach ($data_cls as $row1) { ?>
         <tr>
            <td scope="row"><?= $row1['id'] ?></td>
            <td><?= $row1['course_name'] ?></td>
            <td><?= $row1['quantity'] ?></td>
            <td><?= $row1['name_teacher'] ?></td>
            <td><?= $row1['classroom'] ?></td>
            <td><?= $row1['day'] ?></td>
            <td><?= $row1['period'] ?></td>
            <td><?= $row1['start_date'] ?></td>
            <td><?= $row1['s_name'] ?></td>
         </tr>
      <?php } ?>
   </tbody>
</table>