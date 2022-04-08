<h2>Mã Học Phần: <?= $data['id'] ?></h2>
<h2>Tên Học Phần: <?= $data['name'] ?></h2>
<h2><i>Các Lớp Học Phần Đang Mở:</i></h2>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th scope="col">Mã LHP</th>
      <th scope="col">Tên HP</th>
      <th scope="col">Số tín chỉ</th>
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
    <?php foreach ($data_cls as $row) { ?>
      <tr>
        <td scope="row"><?= $row['id'] ?></td>
        <td><?= $row['course_name'] ?></td>
        <td><?= $row['course_qualtity'] ?></td>
        <td><?= $row['quantity'] ?></td>
        <td><?= $row['name_teacher'] ?></td>
        <td><?= $row['classroom'] ?></td>
        <td><?= $row['day'] ?></td>
        <td><?= $row['period'] ?></td>
        <td><?= $row['start_date'] ?></td>
        <td><?= $row['s_name'] ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>