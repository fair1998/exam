<?php include("check_session.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include("../link.php"); ?>
    <title>แก้ไขข้อมูลวิชา</title>
</head>

<body class="animsition">
    <?php include("header.php"); ?>

    <!-- content -->
    <div class="row">
        <div class="col-lg-10 mr-auto ml-auto">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col col-md-3">
                            <button type="button" class="btn btn-info" onclick="window.location.href='subject_manage.php'">
                                Back
                            </button>
                        </div>
                        <div class="col-md-9">
                            <strong>แก้ไขข้อมูลวิชา</strong>
                        </div>
                    </div>
                </div>
                <div class="card-body card-block">
                    <?php
                    $sql1 = "SELECT * from tb_subject where sj_id = '" . $_GET["id"] . "'";
                    $rs1 = $con->query($sql1);
                    $r1 = $rs1->fetch_object();
                    ?>
                    <form action="subject_controller.php" method="post" enctype="multipart/form-data" class="form-horizontal">

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">รหัสวิชา</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <p class="form-control-static"><?= $r1->sj_id ?></p>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">ชื่อวิชา</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea name="name" rows="2" maxlength="150" class="form-control" required><?= $r1->sj_name ?></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">หน่วยกิต</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="credit" value="<?= $r1->sj_credit ?>" pattern="[0-9]{1,}" maxlength="1" class="form-control" required>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">ระดับชั้น</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="class" class="form-control" required>
                                    <option value="1" <?php if ($r1->sj_class == 1) {
                                                            echo "selected";
                                                        } ?>>ปวช</option>
                                    <option value="2" <?php if ($r1->sj_class == 2) {
                                                            echo "selected";
                                                        } ?>>ปวส</option>
                                    <option value="3" <?php if ($r1->sj_class == 3) {
                                                            echo "selected";
                                                        } ?>>ป.ตรี</option>
                                </select>
                            </div>
                        </div>

                </div>
                <div class="card-footer" align="center">
                    <input type="hidden" name="id" value="<?= $r1->sj_id ?>">
                    <input type="hidden" name="update" value="update">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                    <button type="reset" class="btn btn-danger">
                        <i class="fa fa-ban"></i> Reset
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end content -->

    <?php include("footer.php"); ?>
    <?php include("../script.php"); ?>
</body>

</html>