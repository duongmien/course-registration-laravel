<h2>Mã Lớp: <?= $data['id'] ?></h2>
<h2>Tên Lớp: <?= $data['name'] ?></h2>
<h1><i>Danh Sách Sinh Viên Trong Lớp : </i></h1>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Họ Tên</th>
            <th scope="col">Ngày sinh</th>
            <th scope="col">Giới Tính</th>
            <th scope="col">Username</th>
            <th scope="col">Lớp</th>
            <th scope="col">Quyền</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data_info as $row) { ?>
            <tr>
                <th scope="row"><?= $row['id'] ?></th>
                <td><?= $row['name'] ?></td>
                <td><?= $row['DoB'] ?></td>
                <td><?= $row['sex'] ?></td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['class_name'] ?></td>
                <td><?= $row['role_name'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>